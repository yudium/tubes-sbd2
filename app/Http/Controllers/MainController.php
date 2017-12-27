<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Transaction;
use App\TransactionDetail;
use App\Costumer;
use App\Cart;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    function shops()
    {
    	return view('/shops/index',['title' => 'All Products']);
    }
    function recent()
    {
        return view('/shops/index',['title' => 'Recently Posts']);
    }
    function top()
    {
    	return view('/shops/index',['title' => 'Popular Posts']);
    }
    function popular()
    {
    	return view('/shops/index',['title' => 'Most Viewed']);
    }
    function search()
    {
        $ctr = $_GET['q'];
        return view('/search/index',['title' => $ctr]);
    }
    function product($id)
    {
        // TODO: jangan lupa ganti khusu untuk admin
        $newest_products =
        Product::orderBy('created_at', 'desc')
            ->take(5)
            ->get();
        return view('/product/index',[
            'title' => 'Product '.$id,
            'newest_products' => $newest_products
        ]);
    }
    function category($ctr)
    {
        return view('/category/index',['title' => 'Category '.$ctr]);
    }
    function orderCek(Request $req)
    {
        if (!$req->isMethod('post')) {
            return view('/main/cek',['title' => 'Order Cek']);
        }

        $r = $req->all();
        $trans = Transaction::whereRaw("MD5(`id`) = '{$r['trans_id']}'")->first();

        if (!$trans) {
            return view('/main/cek',[
                'title' => 'Order Cek',
                'order_id_not_found' => true
            ]);
        }

        return view('/main/order-status', [
            'title' => 'Order Status',
            'status' => $trans->status,
        ]);
    }
    function orderProof()
    {
        return view('/main/proof',['title' => 'Order Proof']);
    }

    function purchase($idcart)
    {
        return view('/purchase/index',['title' => 'Purchase '.$idcart]);
    }
    function puchaseAll()
    {
        return view('/purchase/index',['title' => 'Purchase All']);
    }
    function signin()
    {
        return view('/sign/in',['title' => 'Signin']);
    }
    function signup()
    {
        return view('/sign/up',['title' => 'Signup']);
    }
}

