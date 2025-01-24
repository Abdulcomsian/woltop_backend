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

        $story = new $this->model;
        $story->path = $fileName ?? null;
        $story->save();

        return $story;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }
    
}
