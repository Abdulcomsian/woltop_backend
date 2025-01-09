<?php

namespace App\Services;

use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

class FaqService
{
    protected $model;

    public function __construct(Faq $model)
    {
        $this->model = $model;
    }

    public function getFaq(){
        $faq = $this->model->get();
        return $faq;
    }
}
