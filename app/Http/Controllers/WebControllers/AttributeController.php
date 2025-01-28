<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\AttributeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\AttributeValue;
use App\Services\AttributeService;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    protected $service;

    public function __construct(AttributeService $service)
    {
        $this->service = $service;
    }

    public function index(AttributeDataTable $attribute)
    {
        return $attribute->render("pages.attribute.index");
    }

    public function store(AttributeRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Attribute Saved Successfully!');
            return redirect()->back();
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

    public function update(AttributeRequest $request){
        try{
            $data = $this->service->update($request->validated());
            toastr()->success('Attribute Updated Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }

    public function delete(Request $request){
        try{
            $attributeValue = AttributeValue::with('variables')
                ->where('attribute_id', $request->id)
                ->get();

            if ($attributeValue->isNotEmpty() && $attributeValue->pluck('variables')->flatten()->isNotEmpty()) {
                toastr()->error('You can`t delete this attribute because it is assigned to the product!');
                return redirect()->back();
            }

            // Proceed with deletion
            $this->service->delete($request);
            toastr()->success('Attribute Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }
}
