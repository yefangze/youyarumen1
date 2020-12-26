<?php
namespace App\Repositories;

use App\Project;
use Image;

class ProjectsRepository
{
    public function list()
    {
        return request()->user()->projects()->get();
    }

    public function create($request)
    {
        //        dd($request->user()->projects());
        $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' => $this->thumb($request)
        ]);
    }

    public function find($id)
    {
        return Project::findOrFail($id);
    }

    public function delete($id)
    {
        $project = $this->find($id);
        $project->delete();
    }

    public function update($request, $id)
    {
        $project = $this->find($id);

        $project->name = $request->name;

        if ($request->hasFile('thumbnail')){
            $project->thumbnail = $this->thumb($request);
        }
        $project->save();
    }

    public function thumb($request)
    {
        if ($request->hasFile('thumbnail')){
            $thumb = $request->thumbnail;
            $name = $thumb->hashName();
            $thumb->storeAs('public/thumbs/cropped',$name);

            $path = storage_path('app/public/thumbs/original/' . $name);
            Image::make($thumb)->resize(200,90)->save($path);
            return $name;
        }

    }


}
