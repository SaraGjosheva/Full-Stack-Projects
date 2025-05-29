<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use Illuminate\Support\Facades\Mail;
use App\Mail\JobApplicationConfirmation;

class JobApplicationController extends Controller
{
    public function index()
    {
        $applications = JobApplication::orderBy('created_at', 'desc')->paginate(10);

        return view('jobApplications.job-applications', compact('applications'));
    }

    public function destroy($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->delete();

        return redirect()->route('job.application.index')
            ->with('success', 'Апликацијата за работа успешно одбиена!');
    }

    public function toggleReview($id)
    {
        $application = JobApplication::findOrFail($id);
        $application->reviewed = !$application->reviewed;
        $application->save();

        return redirect()->route('job.application.index')
            ->with('success', 'Апликацијата за работа се прегледува.');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'phone_number'  => 'required|string|max:20',
            'email'         => 'required|email|max:255',
            'position'      => 'required|string|max:255',
            'cv'            => 'required|mimes:pdf|max:2048',
        ]);

        // Store uploaded CV
        $cvPath = $request->file('cv')->store('uploads/cv', 'public');

        // Save to DB
        $application = JobApplication::create([
            'full_name'    => $validated['full_name'],
            'phone_number' => $validated['phone_number'],
            'email'        => $validated['email'],
            'position'     => $validated['position'],
            'cv_path'      => 'storage/' . $cvPath,
        ]);

        // Send email confirmation
        Mail::to($application->email)->send(new JobApplicationConfirmation($application));

        return redirect()->route('thank.you')->with('success', 'Апликацијата за работа е успешно поднесена!');
    }
}
