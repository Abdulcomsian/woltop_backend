<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\ParentCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParentCategoryRequest;
use App\Services\ParentCategoryService;
use Illuminate\Http\Request;

class ParentCategoryController extends Controller
{
    protected $parentCategoryService;

    public function __construct(ParentCategoryService $parentCategoryService)
    {
        $this->parentCategoryService = $parentCategoryService;
    }

    public function index(ParentCategoryDataTable $parentCategory){
        return $parentCategory->render("pages.parent_categories.index");
    }

    public function store(ParentCategoryRequest $parentCategoryRequest)
    {
        try {
            $this->parentCategoryService->store($parentCategoryRequest);
            toastr()->success('Parent Category Saved Successfully!');
                return redirect()->back();
        } catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function delete(ParentCategoryRequest $parentCategoryRequest)
    {
        try {
            $this->parentCategoryService->delete($parentCategoryRequest);
            toastr()->success('Parent Category Deleted Successfully!');
                return redirect()->back();
        } catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        try{
            $parentCategory = $this->parentCategoryService->edit($id);
            return response()->json(['data' => $parentCategory]);
        }catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function update(ParentCategoryRequest $parentCategoryRequest)
    {
        try {
            $this->parentCategoryService->update($parentCategoryRequest);
            toastr()->success('Parent Category Updated Successfully!');
                return redirect()->back();
        } catch(\Exception $e) {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
}
