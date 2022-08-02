<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Customers;
use App\Models\Bill;
use DB;
use App\Http\Requests\productrequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(10);
        $products = Product::orderBy('ProductName')->paginate(20);
        return view('admin.Product.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productrequest $request)
    {
        Product::create([
            'ProductName'=>$request->ProductName,
            'ProductSlug'=>Str::slug($request->ProductName),
            'ProductImage'=>$request->ProductImage,
            'ProductPurchasePrice'=>$request->ProductPurchasePrice,
            'ProductPrice'=>$request->ProductPrice,
            'ProductPromotionPrice'=>$request->ProductPromotionPrice,
            'ProductCondition'=>$request->ProductCondition,
            'ProductUnit'=>$request->ProductUnit,
            'CategoryId'=>$request->CategoryId,
        ]);
        return redirect()->route('product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($ProductSlug)
    {
        $categories = Category::all();
        $product = Product::where('ProductSlug', $ProductSlug)->first();
        return view('admin.Product.update', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $ProductSlug)
    {
        $product = Product::where('ProductSlug', $ProductSlug)->first();
        $product->ProductName = $request->ProductName;
        $product->ProductSlug = Str::slug($request->ProductName);
        $product->ProductPrice = $request->ProductPrice;
        $product->ProductPromotionPrice = $request->ProductPromotionPrice;
        // $product->ProductCondition = $request->ProductCodition;
        if($product->ProductCondition == 1){
            $request->ProductCondition = "Còn hoạt động";
        } else {
            $request->ProductCondition = "Tạm ngừng hoạt động";
        }
        $product->ProductUnit = $request->ProductUnit;
        $product->CategoryId = $request->CategoryId;
        $product->ProductImage = $request->ProductImage;
        $product->ProductPurchasePrice = $request->ProductPurchasePrice;
        $product->save();
        return redirect()->Route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $ProductSlug)
    {
        $product = Product::where('ProductSlug', $ProductSlug)->first();
        $product->delete();
        return redirect()->Route('product');
    }

    public function listproduct(){
        $customers = DB::table('customers')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        $this->data['customers'] = $customers;
        return view('admin.HistoryCart.index',$this->data);
    }

    public function productdetail($id){

        $customerInfo = DB::table('customers')
                        ->join('bills', 'customers.id', '=', 'bills.customer_id')
                        ->select('customers.*', 'bills.id as bill_id', 'bills.total as bill_total', 'bills.note as bill_note', 'bills.status as bill_status')
                        ->where('customers.id', '=', $id)
                        ->first();

        $billInfo = DB::table('bills')
                    ->join('bill_details', 'bills.id', '=', 'bill_details.bill_id')
                    ->leftjoin('products', 'bill_details.product_id', '=', 'products.id')
                    ->where('bills.customer_id', '=', $id)
                    ->select('bills.*', 'bill_details.*', 'products.ProductName as product_name')
                    ->get();

        $this->data['customerInfo'] = $customerInfo;
        $this->data['billInfo'] = $billInfo;
        return view('admin.HistoryCart.bill_detail',$this->data);
    }
}
