<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $service;

    public function __construct(BlogService $service)
    {
        $this->service = $service;
    }


    public function index(BlogDataTable $product)
    {
        return $product->render("pages.blog.index");
    }

    public function create(){
        return view('pages.blog.create');
    }

    public function store(BlogRequest $request){
        try{
            $this->service->store($request->validated());
            toastr()->success('Blog Saved Successfully!');
            return redirect()->route('blog.index');
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function update(BlogRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('Blog Updated Successfully!');
            return redirect()->route('blog.index');
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function edit($id){
        try{
            $data = $this->service->edit($id);
            return view("pages.blog.edit", compact("data"));
        }catch(\Exception $e){
            return response()->json(['success' => false, "msg" => "Something went wrong"], 400);
        }
    }

    public function delete(BlogRequest $request){
        try{
            $this->service->delete($request->validated());
            toastr()->success('Blog Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
