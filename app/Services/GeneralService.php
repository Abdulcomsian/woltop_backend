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
}
