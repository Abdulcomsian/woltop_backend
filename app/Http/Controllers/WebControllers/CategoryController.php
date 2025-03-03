<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ParentCategory;
use App\Models\CategoryProduct;
use App\Http\Controllers\Controller;
use App\DataTables\CategoriesDataTable;
// use App\Helpers\Helpers;

class CategoryController extends Controller
{
    public function index(CategoriesDataTable $category)
    {
        $parentCategories = ParentCategory::latest()->get();
        return $category->render("pages.categories.index",compact('parentCategories'));
    }

    public function storeCategory(Request $request){
        $request->validate([
            'category_name' => 'required|string|max:255',
            'category_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try{
            if($request->file('category_image')){
                $file = $request->file('category_image');
                $fileDestination = public_path('assets/wolpin_media/categories');
                $fileName = uniqid() . '_' . time() . '.' . $file->extension();
                $file->move($fileDestination, $fileName);
            }

            if($request->file('video')){
                $file = $request->file('video');
                $fileDestination = public_path('assets/wolpin_media/categories');
                $videoFileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($fileDestination, $videoFileName);
            }

            if($request->file('banner')){
                $file = $request->file('banner');
                $fileDestination = public_path('assets/wolpin_media/categories');
                $bannerFileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($fileDestination, $bannerFileName);
            }

            $category = new Category();
            $category->name = $request->category_name;
            $category->description = $request->description;
            if($request->parent_cat_id != "none"){
                $category->parent_category_id = $request->parent_cat_id;
            }
            if($request->file('category_image')){
                $category->image = $fileName;
            }
            if($request->file('video')){
                $category->video = $videoFileName;
            }

            if($request->file('banner')){
                $category->banner_image = $bannerFileName;
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
            $catsProducts = CategoryProduct::where('category_id', $categoryId)->withTrashed()->get();
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

            if($request->file('video')){
                $file = $request->file('video');
                $fileDestination = public_path('assets/wolpin_media/categories');
                $videoFileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($fileDestination, $videoFileName);
            }

            if($request->file('banner')){
                $file = $request->file('banner');
                $fileDestination = public_path('assets/wolpin_media/categories');
                $bannerFileName = uniqid() . '_' . time() . '.' . $file->getClientOriginalExtension();
                $file->move($fileDestination, $bannerFileName);
            }

            $category = Category::find($request->category_id);
            if($request->edit_parent_cat_id != "none"){
                $category->parent_category_id = $request->edit_parent_cat_id;
            }else{
                $category->parent_category_id = null;
            }
            $category->name = $request->category_name;
            $category->description = $request->description;
            if($request->file('category_image')){
                $category->image = $fileName;
            }
            if($request->file('video')){
                $category->video = $videoFileName;
            }
            if($request->file('banner')){
                $category->banner_image = $bannerFileName;
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
