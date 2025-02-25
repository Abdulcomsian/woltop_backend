<?php

namespace App\Services;

use App\Models\CouponUser;
use App\Models\Order;
use App\Models\ProductOrder;
use App\Models\User;
use App\Models\VariationOption;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderService
{
    protected $model;
    protected $userModel;
    protected $productOrderModel;
    protected $variationOptionModel;
    protected $couponUserModel;

    public function __construct(Order $model, User $userModel, ProductOrder $productOrderModel, VariationOption $variationOptionModel, CouponUser $couponUserModel)
    {
        $this->model = $model;
        $this->userModel = $userModel;
        $this->productOrderModel = $productOrderModel;
        $this->variationOptionModel = $variationOptionModel;
        $this->couponUserModel = $couponUserModel;
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
            $product_id = $item['product_id'];
            if($item['variable_id'] != null){
                $variation = $this->variationOptionModel::where('id', $item['variable_id'])->first();
                $product_id = $variation->product_id;
            }
            $itemSave = new $this->productOrderModel();
            $itemSave->order_id = $save->id;
            $itemSave->product_id = $product_id;
            $itemSave->quantity = $item['quantity'];
            $itemSave->variable_id = $item['variable_id'] ?? null;
            $itemSave->save();

            if($data['is_coupon_applied'] == true){
                $couponSave = new $this->couponUserModel;
                $couponSave->user_id = Auth::check() ?  Auth::user()->id : $data['user_id'];
                $couponSave->coupon_id = $data['coupon_id'] ?? null;
                $couponSave->save();
            }
        }
       }
       return $save;
    }
}
