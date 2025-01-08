<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\ProductVariable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ["color_id" => 1, "title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven","short_description" => "Free shipping above ₹339. this is the short description" ,"description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 234,"sku" => "1234qwer", "featured_image" => "featured.png", "product_type" => "variable", "status" => "publish", "discount" => 40],
            ["color_id" => 1, "title" => "Second Product", "slug" => "second_product", "short_description" => "Free shipping above ₹339. this is the short description", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1234, "sale_price" => 234,"sku" => "1235qwer", "featured_image" => "featured.png", "product_type" => "variable", "status" => "publish", "discount" => 20],
            ["color_id" => 3, "title" => "Third Product", "slug" => "third_product", "short_description" => "Free shipping above ₹339. this is the short description", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 4567, "sale_price" => 345,"sku" => "1236qwer", "featured_image" => "featured.png", "product_type" => "variable", "status" => "publish", "discount" => 30],
            ["color_id" => 2, "title" => "Fourth Product", "slug" => "fourth_product", "short_description" => "Free shipping above ₹339. this is the short description", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 5678, "sale_price" => 567,"sku" => "1237qwer", "featured_image" => "featured.png", "product_type" => "variable", "status" => "publish", "discount" => 50],
            ["color_id" => 2, "title" => "Fifth Product", "slug" => "fifth_product", "short_description" => "Free shipping above ₹339. this is the short description", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 2356, "sale_price" => 123,"sku" => "1238qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish", "discount" => 20],
            ["color_id" => 3, "title" => "Sixth Product", "slug" => "sixth_product", "short_description" => "Free shipping above ₹339. this is the short description", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 4567, "sale_price" => 890,"sku" => "1239qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish", "discount" => 30],
            ["color_id" => 4, "title" => "Seventh Product", "slug" => "seventh_product", "short_description" => "Free shipping above ₹339. this is the short description", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 5678, "sale_price" => 890,"sku" => "1245qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish", "discount" => 23],
            ["color_id" => 5, "title" => "Eigth Product", "slug" => "eigth_product", "short_description" => "Free shipping above ₹339. this is the short description", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 3456, "sale_price" => 799,"sku" => "1267qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish", "discount" => 45],
        ];

        $totalProducts = count($products);
        $half = floor($totalProducts / 2);

        foreach($products as $index => $product){
            $p = Product::create($product);
            $catPro = new CategoryProduct();
            $catPro->product_id = $p->id;
            $catPro->category_id = 1;
            $catPro->save();

            $proImg = new ProductImage();
            $proImg->product_id = $p->id;
            $proImg->image_path = env('APP_URL') . "assets/wolpin_media/products/gallery_images/gallery_1.png";
            $proImg->save();


            $proTag = new ProductTag();
            $proTag->product_id = $p->id;
            $proTag->tag_id = $index < $half ? 2 : 3;
            $proTag->save();

            if($product['product_type'] == "variable"){
                $attributeValueIds = [1,2];
                foreach($attributeValueIds as $id){
                    $proVar = new ProductVariable();
                    $proVar->attribute_value_id = $id;
                    $proVar->product_id = $p->id;
                    $proVar->save();
                }
            }
        }
    }
}
