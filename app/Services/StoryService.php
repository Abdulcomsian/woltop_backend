<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class StoryService
{
    protected $model;

    public function __construct(Story $model)
    {
        $this->model = $model;
    }

    public function store($data){
        if(isset($data['story'])){
            $fileName = rand() . '.' . $data['story']->extension();
            $path = public_path("assets/wolpin_media/stories/");
            $data['story']->move($path, $fileName);
        }

        $save = new $this->model;
        $save->path = $fileName ?? null;
        $save->save();

        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        if(isset($data['story'])){
            $fileName = rand() . '.' . $data['story']->extension();
            $path = public_path("assets/wolpin_media/stories/");
            $data['story']->move($path, $fileName);
        }

        $update = $this->model::find($data['story_id']);
        $update->path = $fileName ?? null;
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['story_id']);
        $destroy->delete();
    }
    
}
