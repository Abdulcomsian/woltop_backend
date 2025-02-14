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
            $video = General::where('type', 'home_video')->first();
            $charges = General::where('type', 'charges')->first();
            return view('pages.general.index', compact("banner", "video", "charges"));
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
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function updateVideo(Request $request){
        $request->validate([
            "id" => "required",
            "video" => "sometimes",
        ]);
        try{
            $this->service->updateVideo($request->all());
            toastr()->success("Data updated successfully");
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function updateCharges(Request $request){
        $request->validate([
            "id" => "nullable",
            "installation_charges" => "required",
            "cash_on_delivery_charges" => "required",
            "threshold_charges" => "required",
            "shipping_charges" => "required",
        ]);
        try{
            $this->service->updateCharges($request->all());
            toastr()->success("Data updated successfully");
            return redirect()->back();
        }catch(\Exception $e){
            dd($e->getMessage());
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
