<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ProductDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Services\ProductService;

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
        return view('pages.product.create');
    }

    public function store(ProductRequest $productRequest)
    {
        try {
            $this->productService->store($productRequest);
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
}
