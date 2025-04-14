<?php

namespace App\Services;

use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class PageService
{
    protected $model;

    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function getHome(){
        return $this->model::where('type', 'home')->first();
    }

    public function getAbout(){
        return $this->model::where('type', 'about')->first();
    }


    public function updateHome($data){
        $oldHome = $this->model::where('id', $data['id'])->first();
        $bannerFileName = $oldHome->main_image ?? null;
        $logoFileName = $oldHome->image ?? null;
        $fileName = $oldHome->video ?? null;
        $consultationFileName1 = $oldHome->consulation_img_1 ?? null;
        $consultationFileName2 = $oldHome->consulation_img_2 ?? null;
        $path = public_path("assets/wolpin_media/general/homepage");
        if (isset($data['banner_image'])) {
            if ($oldHome && !empty($oldHome->main_image)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->main_image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $bannerFileName = time() . '_' . rand() . '.' . $data['banner_image']->getClientOriginalExtension();
            $data['banner_image']->move($path, $bannerFileName);
        }

        if (isset($data['banner_logo'])) {
            if ($oldHome && !empty($oldHome->image)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $logoFileName = time() . '_' . rand() . '.' . $data['banner_logo']->getClientOriginalExtension();
            $data['banner_logo']->move($path, $logoFileName);
        }

        if (isset($data['video'])) {
            if ($oldHome && !empty($oldHome->video)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->video);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $fileName = time() . '_' . rand() . '.' . $data['video']->getClientOriginalExtension();
            $data['video']->move($path, $fileName);
        }

        if (isset($data['consultation_img_1'])) {
            if ($oldHome && !empty($oldHome->consulation_img_1)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->consulation_img_1);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $consultationFileName1 = time() . '_' . rand() . '.' . $data['consultation_img_1']->getClientOriginalExtension();
            $data['consultation_img_1']->move($path, $consultationFileName1);
        }

        if (isset($data['consultation_img_2'])) {
            if ($oldHome && !empty($oldHome->consulation_img_2)) {
                $oldPath = public_path("assets/wolpin_media/general/homepage/" . $oldHome->consulation_img_2);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $consultationFileName2 = time() . '_' . rand() . '.' . $data['consultation_img_2']->getClientOriginalExtension();
            $data['consultation_img_2']->move($path, $consultationFileName2);
        }

        $update = $this->model::updateOrCreate(
            ["id" => $data['id']],
            [
                "name" => $data['banner_text'] ?? $oldHome->name,
                "link" => $data['button_link'] ?? $oldHome->link,
                "main_image" => $bannerFileName,
                "image" => $logoFileName,
                "video" => $fileName,
                "consulation_img_1" => $consultationFileName1,
                "consulation_img_2" => $consultationFileName2,
                "type" => "home",
            ]
        );

        return $update;

    }

    public function updateAbout($data){
        $oldHome = $this->model::where('id', $data['id'])->first();
        $bannerFileName = $oldHome->main_image ?? null;
        $logoFileName = $oldHome->image ?? null;
        $path = public_path("assets/wolpin_media/general/about");
        if (isset($data['banner_image'])) {
            if ($oldHome && !empty($oldHome->main_image)) {
                $oldPath = public_path("assets/wolpin_media/general/about/" . $oldHome->main_image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $bannerFileName = time() . '_' . rand() . '.' . $data['banner_image']->getClientOriginalExtension();
            $data['banner_image']->move($path, $bannerFileName);
        }

        if (isset($data['banner_logo'])) {
            if ($oldHome && !empty($oldHome->image)) {
                $oldPath = public_path("assets/wolpin_media/general/about/" . $oldHome->image);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $logoFileName = time() . '_' . rand() . '.' . $data['banner_logo']->getClientOriginalExtension();
            $data['banner_logo']->move($path, $logoFileName);
        }

        $title = [
            "title" => $data['title'],
            "team_title" => $data['team_title'],
        ];

        $description = [
            "description" => $data['description'],
            "team_description" => $data['team_description'],
        ];

        $update = $this->model::updateOrCreate(
            ["id" => $data['id']],
            [
                "name" => $data['name'],
                "title" => json_encode($title),
                "description" => json_encode($description),
                "main_image" => $bannerFileName,
                "image" => $logoFileName,
                "type" => "about",
            ]
        );

        return $update;

    }
}
