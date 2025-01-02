<?php

namespace Database\Seeders;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
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
            ["color_id" => 1, "title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1234qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
            ["title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1235qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
            ["title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1236qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
            ["title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1237qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
            ["color_id" => 2, "title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1238qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
            ["color_id" => 3, "title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1239qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
            ["color_id" => 4, "title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1245qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
            ["color_id" => 5, "title" => "Wolpin Wallpaper Non-Woven", "slug" => "wolpin-wallpaper-non-woven", "description" => "Free shipping above ₹339, Cash on delivery available at ₹20 COD charges", "price" => 1630, "sale_price" => 799,"sku" => "1267qwer", "featured_image" => "featured.png", "product_type" => "simple", "status" => "publish"],
        ];

        foreach($products as $product){
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
            $proTag->tag_id = 1;
            $proTag->save();
        }
    }
}
