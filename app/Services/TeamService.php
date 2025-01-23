<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TeamService
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index(){
        return $this->model::whereHas('roles', function($query){
            $query->where('name', 'staff');
        })->get();
    }
}
