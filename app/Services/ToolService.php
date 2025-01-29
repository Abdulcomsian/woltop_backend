<?php

namespace App\Services;

use App\Models\Tool;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class ToolService
{
    protected $model;

    public function __construct(Tool $model)
    {
        $this->model = $model;
    }

    public function store($data){
        if(isset($data['image'])){
            $fileName = rand() . '.' . $data['image']->extension();
            $path = public_path("assets/wolpin_media/tools/");
            $data['image']->move($path, $fileName);
        }
        $save = new $this->model;
        $save->name = $data['name'];
        $save->slug = Str::slug($data['name']);
        $save->description = $data['description'];
        $save->image = $fileName ?? null;
        $save->price = $data['price'];
        $save->sale_price = $data['sale_price'];
        $save->save();

        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        if(isset($data['image'])){
            $fileName = rand() . '.' . $data['image']->extension();
            $path = public_path("assets/wolpin_media/tools/");
            $data['image']->move($path, $fileName);
        }

        $update = $this->model::find($data['id']);
        $update->name = $data['name'];
        $update->slug = Str::slug($data['name']);
        $update->description = $data['description'];
        $update->image = $fileName ?? null;
        $update->price = $data['price'];
        $update->sale_price = $data['sale_price'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['reel_id']);
        $destroy->delete();
    }
    
}
