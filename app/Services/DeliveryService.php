<?php

namespace App\Services;

use App\Models\DeliveryDetail;
use Illuminate\Support\Facades\Auth;

class DeliveryService
{
    protected $model;

    public function __construct(DeliveryDetail $model)
    {
        $this->model = $model;
    }

    public function getFaq(){
        $faq = $this->model->get();
        return $faq;
    }

    public function store($data){
        if(isset($data['deliveries']) && count($data['deliveries']) > 0){
            foreach($data['deliveries'] as $item){
                $save = new $this->model;
                $save->city_details = $item['city'];
                $save->days = $item['days'];
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
        $update->city_details = $data['city'];
        $update->days = $data['day'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
}
