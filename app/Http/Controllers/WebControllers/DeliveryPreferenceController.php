<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\DeliveryPreferenceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PreferenceRequest;
use App\Models\AddressDetail;
use App\Models\DeliveryPreference;
use App\Services\PreferenceService;
use Illuminate\Http\Request;

class DeliveryPreferenceController extends Controller
{
    protected $service;

    public function __construct(PreferenceService $service)
    {
        $this->service = $service;
    }


    public function index(DeliveryPreferenceDataTable $data)
    {
        return $data->render("pages.preference.index");
    }

    public function create(){
        return view('pages.preference.create');
    }

    public function store(PreferenceRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Delivery Preferences Saved Successfully!');
            return redirect()->route('preference.index');
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $data = $this->service->edit($id);
            return response()->json(['success' => true, "data" => $data], 200);
        }catch(\Exception $e){
            return response()->json(['success' => false, "msg" => "Something went wrong"], 400);
        }
    }

    public function update(PreferenceRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('Delivery Preference Updated Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function delete(PreferenceRequest $request){
        try{
            $address = AddressDetail::where('delivery_preference_id', $request->id)->get();
            if($address && count($address) > 0){
                toastr()->error("This preference is being used in an address. You can`t delete this");
                return redirect()->back();
            }

            $this->service->delete($request->validated());
            toastr()->success('Delivery Preference Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
