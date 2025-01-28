<?php

namespace App\Services;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Auth;

class AttributeService
{
    protected $model;
    protected $attributeValueModel;

    public function __construct(Attribute $model, AttributeValue $attributeValueModel)
    {
        $this->model = $model;
        $this->attributeValueModel = $attributeValueModel;
    }

    public function store($data){
        $save = new $this->model;
        $save->name = $data['name'];
        $save->save();

        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        $update->name = $data['name'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $this->attributeValueModel::where('attribute_id', $data['id'])->delete();
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
    
}
