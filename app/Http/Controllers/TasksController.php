<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTask;
use App\Http\Requests\UpdateTask;
use App\Repositories\TasksRepository;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    protected $repo;

    public function __construct(TasksRepository $repo)
    {
        $this->repo = $repo;
        $this->middleware('auth');
    }

    public function check($id)
    {
        $this->repo->check($id);

        return back();
    }

    public function index()
    {
        $todos = $this->repo->todos();
        $dones = $this->repo->dones();
        $projects = request()->user()->projects()->pluck('name','id');
        return view('tasks.index', compact('todos','dones','projects'));
    }

    public function create()
    {
        //
    }

    public function store(CreateTask $request)
    {
        $this->repo->create($request);

        return back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(UpdateTask $request, $id)
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
