<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\TeamDataTable;
use App\Http\Controllers\Controller;
use App\Services\TeamService;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $service;

    public function __construct(TeamService $service)
    {
        $this->service = $service;
    }

    public function index(TeamDataTable $datatable)
    {
        return $datatable->render("pages.team.index");
    }

    public function create()
    {
        return view('pages.team.create');
    }

    // public function store(ProductRequest $productRequest)
    // {
    //     try {
    //         $this->productService->store($productRequest);
    //         toastr()->success('Product Saved Successfully!');
    //             return redirect()->back();
    //     } catch(\Exception $e) {
    //         toastr()->error($e->getMessage());
    //         return redirect()->back();
    //     }
    // }

    // public function delete(ProductRequest $productRequest)
    // {
    //     try {
    //         $this->productService->delete($productRequest);
    //         toastr()->success('Product Deleted Successfully!');
    //             return redirect()->back();
    //     } catch(\Exception $e) {
    //         toastr()->error($e->getMessage());
    //         return redirect()->back();
    //     }
    // }

    // public function edit($id)
    // {
    //     try{
    //         $parentCategory = $this->productService->edit($id);
    //         return response()->json(['data' => $parentCategory]);
    //     }catch(\Exception $e){
    //         return response()->json(['error' => $e->getMessage()], 400);
    //     }
    // }

    // public function update(ProductRequest $productRequest)
    // {
    //     try {
    //         $this->productService->update($productRequest);
    //         toastr()->success('Product Updated Successfully!');
    //             return redirect()->back();
    //     } catch(\Exception $e) {
    //         toastr()->error($e->getMessage());
    //         return redirect()->back();
    //     }
    // }
}
