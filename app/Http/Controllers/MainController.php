<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\TransactionDetail;
use App\Customer;
use App\Cart;
use App\GetpostModel;

class MainController extends Controller
{
    function shops()
    {
        $prd = GetpostModel::AllProduct(100);
    	return view('/shops/index',['title' => 'All Products', 'prd' => $prd]);
    }
    function recent()
    {
        $prd = GetpostModel::RecentProduct(100);
        return view('/shops/index',['title' => 'Recently Posts', 'prd' => $prd]);
    }
    function discount()
    {
        $prd = GetpostModel::BigDiscount(100);
    	return view('/shops/index',['title' => 'Biggest Discount', 'prd' => $prd]);
    }
    function popular()
    {
    	return view('/shops/index',['title' => 'Most Viewed']);
    }
    function search()
    {
        $ctr = $_GET['q'];
        $prd = GetpostModel::SearchProduct($ctr);
        return view('/search/index',['title' => $ctr, 'prd' => $prd]);
    }
    function product($id)
    {
        // TODO: jangan lupa ganti khusu untuk admin
<<<<<<< HEAD
        $newest_products = GetpostModel::RecentProduct(5);
        $prd = GetpostModel::ViewProduct($id);
        $size = GetpostModel::GetSize($id);
        $color = GetpostModel::GetColor($id);
        $image = GetpostModel::GetImage($id);
        return view('/product/index',[
            'title' => 'Product',
            'prd' => $prd,
            'size' => $size,
            'color' => $color,
            'image' => $image,
            'newest_products' => $newest_products
=======
        $product = Product::find($id);
        $product_sizes = $product->sizes;
        $product_colors = $product->colors;
        $product_images = $product->images;
        $product_thumbnail = $product->thumbnail;

        return view('/product/index',[
            'title' => 'Product '.$product->name,
            'product' => $product,
            'product_sizes' => $product_sizes,
            'product_colors' => $product_colors,
            'product_images' => $product_images,
            'product_thumbnail' => $product_thumbnail,
>>>>>>> 6d86dfc34b97162754116fdaa3f89e39562f430e
        ]);
    }
    function category()
    {
        $ctr = $_GET['idctr'];
        $prd = GetpostModel::PostCategory($ctr);
        return view('/category/index',['title' => 'Category', 'prd' => $prd]);
    }
    function purchase($idcart)
    {
        return view('/purchase/index',['title' => 'Purchase '.$idcart]);
    }
    function puchaseAll()
    {
        return view('/purchase/index',['title' => 'Purchase All']);
    }
}

