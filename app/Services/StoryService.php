<?php

namespace App\Services;

use App\Models\Story;
use Illuminate\Support\Facades\Auth;

class StoryService
{
    protected $model;

    public function __construct(Story $model)
    {
        $this->model = $model;
    }

    
}
