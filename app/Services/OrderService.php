<?php

namespace App\Services;

use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderService
{
    protected $model;
    protected $userModel;
    protected $productOrderModel;

    public function __construct(Order $model, User $userModel, ProductOrder $productOrderModel)
    {
        $this->model = $model;
        $this->userModel = $userModel;
        $this->productOrderModel = $productOrderModel;
    }

    public function store($data)
    {
       $save = new $this->model();
       $save->address_id = $data['address_id'];
       $save->total_mrp = $data['total_mrp'];
       $save->cart_discount = $data['cart_discount'];
       $save->shipping_charges = $data['shipping_charges'];
       $save->need_installation_service = (bool) $data['need_installation_service'];
       $save->installation_charges = $data['installation_charges'];
       $save->total_amount = $data['total_amount'];
       $save->order_id = generateOrderId($this->model);
       if($save->save()){
        foreach($data['products_orders'] as $item){
            $itemSave = new $this->productOrderModel();
            $itemSave->product_id = $item['product_id'];
            $itemSave->quantity = $item['quantity'];
            $itemSave->order_id = $save->id;
            $itemSave->save();
        }
       }
       return $save;
    }
}
