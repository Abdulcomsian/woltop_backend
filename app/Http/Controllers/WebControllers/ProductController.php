<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute as ModelsAttribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\ParentCategory;
use App\Models\Product;
use App\Models\Tag;
use App\Models\VariationOption;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(ProductDataTable $product)
    {
        return $product->render("pages.product.index");
    }

    public function create()
    {
        $parent_categories = ParentCategory::get();
        $categories = Category::get();
        $tags = Tag::get();
        $attributes = ModelsAttribute::get();
        $colors = Color::get();
        $products = Product::with('variables')->where('status', 'publish')->get();
        return view('pages.product.create', compact("parent_categories", "categories", "tags", "attributes", "colors", "products"));
    }

    public function store(ProductRequest $request)
    {
        try {
            $this->productService->store($request->validated());
            toastr()->success('Product Saved Successfully!');
            return redirect()->route('product.index');
        } catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function delete(ProductRequest $productRequest)
    {
        try {
            $this->productService->delete($productRequest);
            toastr()->success('Product Deleted Successfully!');
            return redirect()->back();
        } catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try{
            $data = $this->productService->edit($id);
            $parent_categories = ParentCategory::get();
            $categories = Category::get();
            $tags = Tag::get();
            $attributes = ModelsAttribute::get();
            $colors = Color::get();
            $groupedVariables = [];
            foreach ($data->productVariables as $variable) {
                $attributeId = $variable->attributes->attribute->id;
                $attributeName = $variable->attributes->attribute->name;
                $attributeValueId = $variable->attributes->id;
                $attributeValueName = $variable->attributes->name;

                if (!isset($groupedVariables[$attributeId])) {
                    $groupedVariables[$attributeId] = [
                        'attribute_id' => $attributeId,
                        'attribute_name' => $attributeName,
                        'values' => [],
                    ];
                }

                $groupedVariables[$attributeId]['values'][$attributeValueId] = $attributeValueName;
            }

            $groupedVariables = array_values($groupedVariables);
            $selectedAttributes = $data->productVariables->pluck('attributes.attribute.id')->toArray();
            $productVariations = VariationOption::where('product_id', $id)->get();
            return view('pages.product.edit', compact("data", "parent_categories", "categories", "tags", "attributes", "colors", "groupedVariables", "selectedAttributes", "productVariations"));
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function update(ProductRequest $productRequest)
    {
        try {
            $this->productService->update($productRequest->validated());
            toastr()->success('Product Updated Successfully!');
            return redirect()->route("product.index");
        } catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function fetchAttributesValues(Request $request){
        try{
            $data = $this->productService->fetchAttributeValues($request);
            return response()->json(["data" => $data], 200);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function getCategories(Request $request){
        try{
            $data = $this->productService->getCategories($request);
            return response()->json(["status" => true, "data" => $data], 200);
        }catch(\Exception $e){
            return response()->json(["status" => false, 'error' => $e->getMessage()], 400);
        }
    }

    public function deleteImage(Request $request){
        $request->validate([
            "image_id" => "required",
        ]);

        try{
            $this->productService->deleteImage($request);
            toastr()->success('Image Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
