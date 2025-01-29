<?php

namespace App\Services;

use App\Models\Reel;
use Illuminate\Support\Facades\Auth;

class ReelService
{
    protected $model;

    public function __construct(Reel $model)
    {
        $this->model = $model;
    }

    public function store($data){
        if(isset($data['reel'])){
            $fileName = rand() . '.' . $data['reel']->extension();
            $path = public_path("assets/wolpin_media/reels/");
            $data['reel']->move($path, $fileName);
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
        if(isset($data['reel'])){
            $fileName = rand() . '.' . $data['reel']->extension();
            $path = public_path("assets/wolpin_media/reels/");
            $data['reel']->move($path, $fileName);
        }

        $update = $this->model::find($data['reel_id']);
        $update->path = $fileName ?? null;
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['reel_id']);
        $destroy->delete();
    }
    
}
