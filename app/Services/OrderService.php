<?php

namespace App\Services;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderService
{
    protected $model;
    protected $userModel;

    public function __construct(Order $model, User $userModel)
    {
        $this->model = $model;
        $this->userModel = $userModel;
    }

    public function store($data)
    {
       $save = new $this->model();
       $save->address_id = $data['address_id'];
       $save->total_mrp = $data['total_mrp'];
       $save->cart_discount = $data['cart_discount'];
       $save->shipping_charges = $data['shipping_charges'];
       $save->need_installation_service = true;
       $save->installation_charges = $data['installation_charges'];
       $save->total_amount = $data['total_amount'];
       $save->order_id = generateOrderId($this->model);
       $save->save();
       return $save;
    }
}
