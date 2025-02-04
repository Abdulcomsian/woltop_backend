<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $service;

    public function __construct(TeamService $service)
    {
        $this->service = $service;
    }

    public function index(TeamDataTable $datatable)
    {
        return $datatable->render("pages.team.index");
    }

    public function create()
    {
        return view('pages.team.create');
    }

    public function store(TeamRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Team Member Saved Successfully!');
            return redirect()->route('team.index');
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $data = $this->service->edit($id);
            return view('pages.team.edit', compact("data"));
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function update(TeamRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('Team Member Updated Successfully!');
            return redirect()->route('team.index');
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function delete(TeamRequest $request){
        try{
            $this->service->delete($request->validated());
            toastr()->success('Team Member Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
