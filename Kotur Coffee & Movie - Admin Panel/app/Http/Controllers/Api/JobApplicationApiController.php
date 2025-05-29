<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\JobApplication;

class JobApplicationApiController extends Controller
{
    public function store(Request $request)
    {
        // Validate
        $validated = $request->validate([
            'full_name'     => 'required|string|max:255',
            'phone_number'  => 'required|string|max:20',
            'email'         => 'required|email|max:255',
            'position'      => 'required|string|max:255',
            'cv'            => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Store file
        $cvPath = $request->file('cv')->store('uploads/cv', 'public');

        // Save
        $application = JobApplication::create([
            'full_name'    => $validated['full_name'],
            'phone_number' => $validated['phone_number'],
            'email'        => $validated['email'],
            'position'     => $validated['position'],
            'cv_path'      => 'storage/' . $cvPath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Job application submitted successfully.',
            'data' => $application
        ]);
    }
}


