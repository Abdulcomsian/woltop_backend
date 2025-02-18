<?php

namespace App\Http\Controllers\WebControllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Page;
use App\Services\PageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $service;

    public function __construct(PageService $service)
    {
        $this->service = $service;
    }

    public function homeIndex()
    {
        try{
            $data = Page::where('type', 'home')->first();
            return view('pages.cms.home', compact("data"));
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function aboutIndex()
    {
        try{
            $data = Page::where('type', 'about')->first();
            return view('pages.cms.about', compact("data"));
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function updateHome(PageRequest $request){
        try{
            $this->service->updateHome($request->validated());
            toastr()->success("Hompage updated successfully");
            return redirect()->back();
        }catch(\Exception $e){
            dd($e->getMessage());
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function updateAbout(Request $request){
        $request->validate([
            "id" => "nullable",
            "name" => "required",
            "description" => "required",
            "title" => "required",
            "team_title" => "required",
            "team_description" => "required",
            "banner_image" => "sometimes",
            "banner_logo" => "sometimes",
        ]);
        try{
            $this->service->updateAbout($request->all());
            toastr()->success("About Page updated successfully");
            return redirect()->back();
        }catch(\Exception $e){
            dd($e->getMessage());
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
