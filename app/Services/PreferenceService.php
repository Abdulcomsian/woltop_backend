<?php

namespace App\Services;

use App\Models\DeliveryPreference;
use Illuminate\Support\Facades\Auth;

class PreferenceService
{
    protected $model;

    public function __construct(DeliveryPreference $model)
    {
        $this->model = $model;
    }

    public function store($data){
        if(isset($data['preferences']) && count($data['preferences']) > 0){
            foreach($data['preferences'] as $item){
                $save = new $this->model;
                $save->name = $item['name'];
                $save->time = $item['time'];
                $save->save();
            }
        }
        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        $update->name = $data['name'];
        $update->time = $data['time'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
}
