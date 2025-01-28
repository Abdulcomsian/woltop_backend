<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Attribute as ModelsAttribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\ParentCategory;
use App\Models\Tag;
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
        return view('pages.product.create', compact("parent_categories", "categories", "tags", "attributes", "colors"));
    }

    public function store(Request $request)
    {
        try {
            $this->productService->store($request);
            toastr()->success('Product Saved Successfully!');
            return redirect()->back();
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
            $parentCategory = $this->productService->edit($id);
            return response()->json(['data' => $parentCategory]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(ProductRequest $productRequest)
    {
        try {
            $this->productService->update($productRequest);
            toastr()->success('Product Updated Successfully!');
                return redirect()->back();
        } catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function fetchAttributesValues(Request $request){
        try{
            $data = $this->productService->fetchAttributeValues($request);
            // $html = view('partials.components.attributes-values', compact("data"))->render();
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
}
