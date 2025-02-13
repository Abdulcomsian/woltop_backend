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
            $fileName = rand() . '.' . $data['reel']->getClientOriginalExtension();
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
        $update = $this->model::find($data['reel_id']);
        if(isset($data['reel'])){
            // removing old file from server folder
            if($update && $update->path != null){
                $oldPath = public_path("assets/wolpin_media/reels/" . $update->path);
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }
            }
            // adding new file
            $fileName = rand() . '.' . $data['reel']->getClientOriginalExtension();
            $path = public_path("assets/wolpin_media/reels/");
            $data['reel']->move($path, $fileName);
        }
        $update->path = $fileName ?? null;
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['reel_id']);
        $destroy->delete();
    }
    
}
