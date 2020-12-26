<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\Repositories\ProjectsRepository;
use Illuminate\Http\Request;
use Image;

class ProjectsController extends Controller
{
    protected $repo;

    public function __construct(ProjectsRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = $this->repo->list();
        return view('welcome', compact('projects'));
    }

    public function show(Project $project)
    {
        $todos = $project->tasks()->where('completion', 0)->get();
        $dones = $project->tasks()->where('completion', 1)->get();
        $projects = request()->user()->projects()->pluck('name','id');
        return view('projects.show', compact('project','todos', 'dones','projects'));
    }

    public function store(CreateProjectRequest $request)
    {
        $this->repo->create($request);
        return back();
    }

    public function update(UpdateProjectRequest $request, $id)
    {
        $this->repo->update($request, $id);
        return back();
    }

    public function destroy($id)
    {
        $this->repo->delete($id);
        return back();
    }
}
