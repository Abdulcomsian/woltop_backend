<?php

namespace App\Services;

use App\Models\Coupon;
use App\Models\CouponUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CouponService
{
    protected $model;
    protected $couponUserModel;

    public function __construct(Coupon $model, CouponUser $couponUserModel)
    {
        $this->model = $model;
        $this->couponUserModel = $couponUserModel;
    }

    public function store($data){
        $save = new $this->model;
        $save->name = $data['name'];
        $save->short_description = $data['short_description'];
        $save->long_description = $data['description'];
        $save->type = $data['type'];
        $save->price = $data['price'];
        $save->is_countable = $data['is_countable'] == "yes" ? true : false;
        $save->counting = $data['counting'] ?? null;
        $save->start_date = $data['start_date'] ?? null;
        $save->end_date = $data['end_date'] ?? null;
        $save->status = $data['status'];
        $save->save();

        return $save;
    }

    public function edit($id){
        return $this->model::findOrFail($id);
    }

    public function update($data){
        $update = $this->model::find($data['id']);
        $update->name = $data['name'];
        $update->short_description = $data['short_description'];
        $update->long_description = $data['description'];
        $update->type = $data['type'];
        $update->price = $data['price'];
        $update->is_countable = $data['is_countable'] == "yes" ? true : false;
        $update->counting = $data['counting'] ?? null;
        $update->start_date = $data['start_date'] ?? null;
        $update->end_date = $data['end_date'] ?? null;
        $update->status = $data['status'];
        $update->save();
        return $update;
    }

    public function delete($data){
        $this->couponUserModel::where('coupon_id', $data['id'])->delete();
        $destroy = $this->model::findOrFail($data['id']);
        $destroy->delete();
    }
}
