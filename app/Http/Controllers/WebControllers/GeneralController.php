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
            $charges = General::where('type', 'charges')->first();
            $footer_information = General::where('type', 'footer_information')->first();
            $favicons = General::where('type', 'favicons')->first();
            return view('pages.general.index', compact("charges", "footer_information", "favicons"));
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
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
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function updateInfo(Request $request){
        $request->validate([
            "id" => "nullable",
            "contact_number" => "required",
            "email" => "required",
            "address" => "required",
            "facebook" => "required",
            "twitter" => "required",
            "instagram" => "required",
        ]);
        
        try{
            $this->service->updateInfo($request->all());
            toastr()->success("Data updated successfully");
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function updateFavIcons(Request $request){
        $request->validate([
            "id" => "nullable",
            "admin_favicon" => "nullable",
            "frontend_favicon" => "nullable",
        ]);
        
        try{
            $this->service->updateFavIcons($request->all());
            toastr()->success("Data updated successfully");
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
