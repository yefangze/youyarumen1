<?php


namespace App\Repositories;


use App\Task;

class TasksRepository
{
    public function find($id)
    {
        return Task::findOrFail($id);
    }

    public function check($id)
    {
        $task = $this->find($id);
        $task->update([
            'completion' => (int)true
        ]);
    }

    public function create($request)
    {
       return Task::create([
            'name' => $request->name,
            'completion' => (int) false,
            'project_id' => $request->project
        ]);
    }

    public function update($request, $id)
    {
        $task = $this->find($id);
        $task->update([
            'name' => $request->name,
            'project_id' => $request->project_id
        ]);
    }

    public function delete($id)
    {
       $task = $this->find($id);
       $task->delete();
    }

    public function todos()
    {
        return auth()->user()->tasks()->where('completion',0)->paginate(1);
    }

    public function dones()
    {
        return auth()->user()->tasks()->where('completion',1)->paginate(1);
    }
}
