<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {

        $save = new $this->model;
        $save->name = $data->name;
        $save->email = $data->email;
        $save->password = Hash::make($data->password);
        $save->remember_token = rand(0000, 9999);
        $save->save();

        return $save;
    }

    // public function delete($data)
    // {
    //     // Find the product by ID
    //     $product = $this->model->findOrFail($data['product_id']);

    //     // Detach related categories from the pivot table
    //     $product->categories()->detach();

    //     // Detach related tags from the pivot table
    //     $product->tags()->detach();

    //     // Delete related product tags if they exist
    //     if ($product->productTag()->exists()) {
    //         $product->productTag()->delete();
    //     }

    //     // Delete related images
    //     if ($product->images()->exists()) {
    //         foreach ($product->images as $image) {
    //             // Optionally delete the physical file from storage
    //             if (file_exists(public_path($image->image_path))) {
    //                 unlink(public_path($image->image_path));
    //             }
    //             $image->delete();
    //         }
    //     }

    //     // Now delete the product
    //     return $product->delete();
    // }

    // public function edit($id)
    // {
    //     return $this->model::findOrFail($id);
    // }

    // public function update($data)
    // {
    //     $update = $this->model::findOrFail($data['parent_category_id']);
    //     $update->name = $data['name'];
    //     $update->save();

    //     return $update;
    // }
}
