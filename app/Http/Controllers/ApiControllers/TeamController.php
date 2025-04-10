<?php

namespace App\Http\Controllers\ApiControllers;
use App\Http\Controllers\Controller;
use App\Http\Resources\TeamResource;
use App\Services\TeamService;
use Illuminate\Http\Request;


class TeamController extends Controller
{
    protected $teamService;
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index(){
        try{
            $team = $this->teamService->index();
            if($team && count($team) > 0){
                return TeamResource::collection($team)->additional(['status' => true]);
            }else{
                return response()->json(['status' => false, "data" => "No team member found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something Went Wrong", "error" => $e->getMessage(), "on line" => $e->getLine()], 400); 
        }
    }
}
