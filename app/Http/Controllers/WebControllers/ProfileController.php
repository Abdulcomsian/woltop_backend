<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $service;

    public function __construct(ProfileService $service)
    {
        $this->service = $service;
    }

    public function index(){
        $data = $this->service->index();
        return view('pages.profile.index', compact("data"));
    }

    public function update(ProfileRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('Profile Updated Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
