<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class MenuController extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::orderBy('ProductName')->paginate(20);
        return view('user.menu.index', compact('products', 'categories'));
    }
}
