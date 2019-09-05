<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Color;
use App\Model\Image;
use App\Model\Product;
use Illuminate\Http\Request;
use Validator;
use DB;

class HomeController extends Controller
{
    public function home(){
        $brands = DB::table('brands')->get();
        $categories = DB::table('categories')->get();
        /** Feature Product */
        $products = DB::table('products')->where('is_featured', true)->limit(10)->get();
        foreach ($products as $product) {
            $image = empty($product->image_id) == true ? 'product.gif' : Image::find($product->image_id)->large;
            if (file_exists('image/products/'.$image)) {
                $product->image = '/image/products/'.$image;
            }else{
                $product->image = '/image/products/product.gif';
            }
            $product->category = empty($product->category_id) == true ? '' : Product::find($product->id)->category->name;
            $product->color = empty($this->color) == true ? '' : Color::getColorName($this->color);
        }
        /** Latest Product */
        $lProducts = DB::table('products')->orderBy('id', 'DESC')->limit(10)->get();
        foreach ($lProducts as $product) {
            $image = empty($product->image_id) == true ? 'product.gif' : Image::find($product->image_id)->large;
            if (file_exists('image/products/'.$image)) {
                $product->image = '/image/products/'.$image;
            }else{
                $product->image = '/image/products/product.gif';
            }
            $product->category = empty($product->category_id) == true ? '' : Product::find($product->id)->category;
            $product->color = empty($this->color) == true ? '' : Color::getColorName($this->color);
        }
        $data['lProducts'] = $lProducts;
        $data['products'] = $products;
        $data['categories'] = $categories;
        $data['brands'] = $brands;
        // dd($data);
        return view('front.home',$data);
    }
}
