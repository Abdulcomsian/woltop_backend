<?php

namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class TeamService
{
    protected $model;

    public function __construct(Team $model)
    {
        $this->model = $model;
    }

    public function getTeam(){
        $team = Team::get();
        return $team;
    }
}
