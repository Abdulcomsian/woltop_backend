<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamService
{
    protected $model;

    public function __construct(Team $model)
    {
        $this->model = $model;
    }
    
    public function store($data){
        if(isset($data['image'])){
            $fileName = rand() . '.' . $data['image']->extension();
            $path = public_path("assets/wolpin_media/team/");
            $data['image']->move($path, $fileName);
        }

        $save  = new $this->model;
        $save->name = $data['name'];
        $save->image = $fileName ?? null;
        $save->bio = $data['bio'];
        $save->designation = $data['designation'];
        $save->portfolio_website = $data['portfolio_website'];
        $save->linkedIn_profile = $data['linkedIn_profile'];
        $save->facebook_profile = $data['facebook_profile'];
        $save->x_profile = $data['x_profile'];
        $save->youtube_profile = $data['youtube_profile'];
        return $save->save();
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        if(isset($data['image'])){
            // removing old file from server folder
            if($update && $update->image != null){
                $oldPath = public_path("assets/wolpin_media/team/" . $update->image);
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }
            }
            // adding new file
            $fileName = rand() . '.' . $data['image']->extension();
            $path = public_path("assets/wolpin_media/team/");
            $data['image']->move($path, $fileName);
            $update->image = $fileName;
        }

        $update->name = $data['name'];
        $update->bio = $data['bio'];
        $update->designation = $data['designation'];
        $update->portfolio_website = $data['portfolio_website'];
        $update->linkedIn_profile = $data['linkedIn_profile'];
        $update->facebook_profile = $data['facebook_profile'];
        $update->x_profile = $data['x_profile'];
        $update->youtube_profile = $data['youtube_profile'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
}
