<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    public function index()
    {
        $this->checkAuth();
        $allProjects = Project::all();

        return view('guests.index', ['projects' => $allProjects]);
    }

    public function admin()
    {
        $allProjects = Project::all();

        return view('admin.admin', ['projects' => $allProjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {


    // }

    public function store(StoreProjectRequest $request)
    {
        $project = new Project;
        $project->name = $request->product_name;
        $project->subtitle = $request->product_header;
        $project->image = $request->product_img;
        $project->url = $request->product_url;
        $project->desc = $request->product_desc;
        $project->save();

        return redirect()->route('admin')->with('success', "Продуктот е успешно додаден");
    }

    // public function show(Project $project)
    // {

    // }

    // public function edit(Project $project)
    // {
    //     //
    // }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        Project::where('id', $request->product_id)
            ->update([
                'name' => $request->product_name,
                'subtitle' => $request->product_header,
                'image' => $request->product_img,
                'url' => $request->product_url,
                'desc' => $request->product_desc
            ]);

        return redirect()->route('admin')->with('update', "Продуктот е успешно променет");;
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin');
    }


    private function checkAuth()
    {
        if (session()->has('admin_id')) {

            return redirect()->route('admin')->send();
        }
    }

    public function send()
    {

        request()->validate(['company_email' => 'email']);

        Mail::to(request('company_email'))->send(new MyEmail(request('company_email'), request('company_phone'), request('company_name')));

        return redirect()->route('guests.index')->with('success', 'Формуларот е успешно испратен!');;
    }
}
