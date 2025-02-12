<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralRequest;
use App\Models\General;
use App\Services\GeneralService;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    protected $service;

    public function __construct(GeneralService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        try{
            $banner = General::where('type', 'home_banner')->first();
            return view('pages.general.index', compact("banner"));
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function updateBanner(GeneralRequest $request){
        try{
            $this->service->updateBanner($request->validated());

            toastr()->success("Data updated successfully");
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
