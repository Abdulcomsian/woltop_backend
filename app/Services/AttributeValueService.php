<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Auth;

class AttributeValueService
{
    protected $model;

    public function __construct(AttributeValue $model)
    {
        $this->model = $model;
    }

    public function store($data){
        $save = new $this->model;
        $save->attribute_id = $data['attribute_id'];
        $save->name = $data['name'];
        $save->save();

        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        $update->attribute_id = $data['attribute_id'];
        $update->name = $data['name'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
    
}
