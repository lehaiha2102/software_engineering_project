<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;
use Session;
use App\Models\Customers;
use App\Models\Bill;
use App\Models\Bill_detail;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
{
    public function home(){
        return view('user.master.index');
    }
    public function index()
    {
        $products = DB::table('products')->get();
        return view('user.cart.index', compact('products'));
    }

    public function AddCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if($product != null) {
            $oldcart = session()->has('Cart') ? session('Cart') : null;
            $newcart = (new Cart($oldcart))->AddCart($product, $id);
            session()->put('Cart', $newcart);
        } else {
            toastr()->errors('Không tìm thấy sản phẩm');
        }
        Session::save();
        return view('user.cart.cart_demo', compact('newcart'));
    }

    public function DeleteItemCart(Request $request, $id){
        $oldcart = session()->has('Cart') ? session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(Count( $newcart->products) > 0) {
            Session::put('Cart', $newcart);
        } else {
           Session::forget('Cart');
        }
        return view('user.cart.cart_demo', compact('newcart'));
    }

    public function detailcart(){
        return view('user.cart.index');
    }

    public function DeleteListItemCart(Request $request, $id){
        $oldcart = session()->has('Cart') ? session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->DeleteItemCart($id);
        if(Count( $newcart->products) > 0) {
            Session::put('Cart', $newcart);
        } else {
           Session::forget('Cart');
        }
        return view('user.cart.list-cart');
    }

    public function SaveListItemCart(Request $request, $id, $quantity)
    {
        $oldcart = session()->has('Cart') ? session('Cart') : null;
        $newcart = new Cart($oldcart);
        $newcart->UpdateItemCart($id, $quantity);
        Session::put('Cart', $newcart);
        return view('user.cart.list-cart');
    }

    public function SaveAllListItemCart(Request $request){

        foreach($request-> $data as $item) {
            $oldcart = session()->has('Cart') ? session('Cart') : null;
            $newcart = new Cart($oldcart);
            $newcart->UpdateItemCart($item['key'], $item['value']);
            Session::put('Cart', $newcart);
        }
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $search = Product::where('ProductName','like',"%$keyword%")->take(50)->paginate(10);
        return view('user.search.index', compact('search', 'keyword'));
    }
}
