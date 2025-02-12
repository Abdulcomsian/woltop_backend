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

    public function getHomeBanner(){
        return $this->model::where('type', 'home_banner')->first();
    }

    public function getVideo(){
        return $this->model::where('type', 'home_video')->first();
    }

    public function updateBanner($data){
        $updateBanner = $this->model::findOrFail($data['id']);
        $updateBanner->name = $data['banner_text'];
        $updateBanner->link = $data['button_link'];
        if(isset($data['banner_image'])){
            // removing old file from server folder
            if($updateBanner && $updateBanner->main_image != null){
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $updateBanner->main_image);
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }
            }

            $bannerFileName = rand() . '.' . $data['banner_image']->extension();
            $path = public_path("assets/wolpin_media/general/homepage");
            $data['banner_image']->move($path, $bannerFileName);
            $updateBanner->main_image = $bannerFileName;
        }

        if(isset($data['banner_logo'])){
            // removing old file from server folder
            if($updateBanner && $updateBanner->image != null){
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $updateBanner->image);
                if(file_exists($oldPath)){
                    unlink($oldPath);
                }
            }

            $logoFileName = rand() . '.' . $data['banner_logo']->extension();
            $path = public_path("assets/wolpin_media/general/homepage");
            $data['banner_logo']->move($path, $logoFileName);
            $updateBanner->image = $logoFileName;
        }

        return $updateBanner->save();
    }
}
