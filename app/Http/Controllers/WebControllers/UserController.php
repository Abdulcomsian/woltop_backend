<?php

namespace App\Http\Controllers\WebControllers;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index(UsersDataTable $product)
    {
        return $product->render("pages.users.index");
    }

    public function create(){
        return view('pages.users.create');
    }

    public function edit($id){
        try{
            $data = $this->service->edit($id);
            return response()->json(['success' => true, "data" => $data], 200);
        }catch(\Exception $e){
            return response()->json(['success' => false, "msg" => "Something went wrong"], 400);
        }
    }

    public function update(UserRequest $request){
        try{
            $this->service->update($request->validated());
            toastr()->success('User Updated Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }

    public function delete(UserRequest $request){
        try{
            $this->service->delete($request->validated());
            toastr()->success('User Deleted Successfully!');
            return redirect()->back();
        }catch(\Exception $e){
            toastr()->error("Something went wrong");
            return redirect()->back();
        }
    }
}
