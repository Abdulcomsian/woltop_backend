<?php
namespace App\Http\Controllers\WebControllers;

use App\DataTables\AttributeValueDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeValueRequest;
use App\Models\Attribute as ModelsAttribute;
use App\Models\AttributeValue;
use App\Models\ProductVariable;
use App\Services\AttributeValueService;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    protected $service;

    public function __construct(AttributeValueService $service)
    {
        $this->service = $service;
    }

    public function index(AttributeValueDataTable $attribute)
    {
        $attributes = ModelsAttribute::get();
        return $attribute->render("pages.attributevalue.index", ["attributes" => $attributes]);
    }

    public function store(AttributeValueRequest $request){
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

    public function update(AttributeValueRequest $request){
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
            $attributeValue = ProductVariable::where('attribute_value_id', $request->id)->get();

            if ($attributeValue->isNotEmpty()) {
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