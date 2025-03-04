<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogService
{
    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function getBlog(){
        $blog = $this->model->get();
        return $blog;
    }

    public function getDetail($slug){
        $blog = $this->model->where('slug', $slug)->first();
        return $blog;
    }

    public function store($data){
        if(isset($data['image'])){
            $fileName = rand() . '.' . $data['image']->extension();
            $path = public_path("assets/wolpin_media/blogs/");
            $data['image']->move($path, $fileName);
        }
        $save = new $this->model;
        $save->user_id = Auth::user()->id;
        $save->title = $data['title'];
        $save->slug = generateUniqueSlug($data['title'], Blog::class, "slug");
        $save->short_description = $data['short_description'];
        $save->description = $data['description'];
        $save->image = $fileName ?? null;
        $save->save();

        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        if(isset($data['image'])){
            // removing old file from server folder
            if($update && $update->image != null){
                $oldPath = public_path("assets/wolpin_media/blogs/" . $update->image);
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }
            }
            // adding new file
            $fileName = rand() . '.' . $data['image']->extension();
            $path = public_path("assets/wolpin_media/blogs/");
            $data['image']->move($path, $fileName);
        }

        $update->user_id = Auth::user()->id;
        $update->title = $data['title'];
        $update->slug = generateUniqueSlug($data['title'], Blog::class, "slug");
        $update->short_description = $data['short_description'];
        $update->description = $data['description'];
        if(isset($fileName) && $fileName != null){
            $update->image = $fileName;
        }
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
}
