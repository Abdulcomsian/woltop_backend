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

    public function getFavIcon(){
        return $this->model::where('type', 'favicons')->first();
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
            "facebook_link" => $data['facebook'],
            "twitter_link" => $data['twitter'],
            "instagram_link" => $data['instagram'],
            "type" => "footer_information",
        ]);
        return $update->save();
    }

    public function updateFavIcons($data){
        $oldHome = $this->model::where('id', $data['id'])->first();
        $path = public_path("assets/wolpin_media/general/homepage");
        $admin_favicon = $oldHome->twitter_link ?? null;
        $frontend_favicon = $oldHome->instagram_link ?? null;
        $main_logo = $oldHome->facebook_link ?? null;
        if(isset($data['main_logo'])){
            if ($oldHome && !empty($oldHome->facebook_link)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->facebook_link);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $main_logo = time() . '_' . rand() . '.' . $data['main_logo']->getClientOriginalExtension();
            $data['main_logo']->move($path, $main_logo);
        }


        if(isset($data['admin_favicon'])){
            if ($oldHome && !empty($oldHome->twitter_link)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->twitter_link);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $admin_favicon = time() . '_' . rand() . '.' . $data['admin_favicon']->getClientOriginalExtension();
            $data['admin_favicon']->move($path, $admin_favicon);
        }

        if(isset($data['frontend_favicon'])){
            if ($oldHome && !empty($oldHome->instagram_link)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->instagram_link);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $frontend_favicon = time() . '_' . rand() . '.' . $data['frontend_favicon']->getClientOriginalExtension();
            $data['frontend_favicon']->move($path, $frontend_favicon);
        }
        $update = $this->model::updateOrCreate([
            "id" => $data['id']
        ],
        [
            "facebook_link" => $main_logo,
            "twitter_link" => $admin_favicon,
            "instagram_link" => $frontend_favicon,
            "type" => "favicons",
        ]);
        return $update->save();
    }
}
