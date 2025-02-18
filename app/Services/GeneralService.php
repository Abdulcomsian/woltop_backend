<?php

namespace App\Services;

use App\Models\General;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class GeneralService
{
    protected $model;

    public function __construct(General $model)
    {
        $this->model = $model;
    }

    public function priceCharges(){
        return $this->model::where('type', 'charges')->first();
    }

    public function getInfo(){
        return $this->model::where('type', 'footer_information')->first();
    }


    public function updateCharges($data){
        $update = $this->model::updateOrCreate([
            "id" => $data['id']
        ],
        [
            "installation_charges" => $data['installation_charges'],
            "cash_on_delivery_charges" => $data['cash_on_delivery_charges'],
            "shipping_charges" => $data['shipping_charges'],
            "threshold_charges" => $data['threshold_charges'],
            "type" => "charges",
            "unit" => "INR",
        ]);
        return $update->save();
    }

    public function updateInfo($data){
        $update = $this->model::updateOrCreate([
            "id" => $data['id']
        ],
        [
            "contact_no" => $data['contact_number'],
            "address" => $data['address'],
            "email" => $data['email'],
            "type" => "footer_information",
        ]);
        return $update->save();
    }
}
