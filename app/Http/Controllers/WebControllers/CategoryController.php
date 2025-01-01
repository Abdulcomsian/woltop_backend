<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\CategoriesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
// use App\Helpers\Helpers;

class CategoryController extends Controller
{
    public function index(CategoriesDataTable $category){
        return $category->render("pages.categories.index");
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => "required",
            'category_image' => "required",
        ]);
        try{
            if($request->file('category_image')){
                $file = $request->file('category_image');
                $fileDestination = public_path('assets/wolpin_media/categories');
                $fileName = uniqid() . '_' . time() . '.' . $file->extension();
                $file_path = asset('assets/wolpin_media/categories') . '/' . $fileName;
                $file->move($fileDestination, $fileName);
            }

            $category = new Category();
            $category->name = $request->category_name;
            if($request->file('category_image')){
                $category->image = $file_path;
            }
            if($category->save()){
                toastr()->success('Category Saved Successfully!');
                return redirect()->back();
            }
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }

    public function deleteCategory(Request $request){
        try{
            $categoryId = $request->category_id;
            $catsProducts = CategoryProduct::where('category_id', $categoryId)->get();
            if($catsProducts->count() > 0){ // means this category have products
                toastr()->error('Category can`t be deleted because this category have products!');
                return redirect()->back();
            }else{
                $category = Category::find($categoryId);
                if($category->delete()){
                    toastr()->success('Category deleted successfully!');
                    return redirect()->back();
                }else{
                    toastr()->error('Something went wrong!');
                    return redirect()->back();
                }
            }
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }

    public function editCategory($id){
        try{
            $category = Category::where('id', $id)->first();
            if($category){
                return response()->json(['status' => true, "data" => $category], 200);
            }else{
                return response()->json(['status' => false, "data" => "No category found"], 400);
            }
        }catch(\Exception $e){
            return response()->json(['status' => false, "data" => "Something went wrong"], 400);
        }
    }

    public function updateCategory(Request $request){
        $request->validate([
            'category_name' => "required",
        ]);
        try{
            if($request->file('category_image')){
                $file = $request->file('category_image');
                $fileDestination = public_path('assets/wolpin_media/categories');
                $fileName = uniqid() . '_' . time() . '.' . $file->extension();
                $file_path = asset('assets/wolpin_media/categories') . '/' . $fileName;
                $file->move($fileDestination, $fileName);
            }

            $category = Category::find($request->category_id);
            $category->name = $request->category_name;
            if($request->file('category_image')){
                $category->image = $file_path;
            }
            if($category->update()){
                toastr()->success('Category Updated Successfully!');
                return redirect()->back();
            }
        }catch(\Exception $e){
            toastr()->error('Something went wrong!');
            return redirect()->back();
        }
    }
}
