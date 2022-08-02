<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Models\Customers;
use App\Models\Bill;
use App\Models\Bill_detail;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use Cart;
use App\Http\Requests\billrequest;

class AdminBillController extends Controller
{

    public function postCheckOut(Request $request)
    {
        $cartInfor = Session::get("Cart")->products;
        try {
            $customers = new Customers;
            $customers->name=$request->name;
            $customers->phone_number=$request->phone_number;
            $customers->note=$request->note;
            $customers->save();

            $bill = new Bill;
            $bill->customer_id = $customers->id;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total = Session::get('Cart')->totalPrice;
            $bill->note = $request->note;
            $bill->status = $request->status;
            $bill->save();

            foreach ($cartInfor as $key => $item) {
                $billDetail = new Bill_detail;
                $billDetail->bill_id = $bill->id;
                $billDetail->product_id = $item['productInfo']->id;
                $billDetail->quantily = $item['quantity'];
                $billDetail->price = $item['Price'];
                $billDetail->save();
            }
          // del
           Cart::destroy();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
            toastr()->success('Cảm ơn quý khách đã đặt món');
            return view('user.thanksview');
    }

    public function update(Request $request, $id)
    {
        $bill = Bill::find($id);
        $bill->status = $request->status;
        $bill->save();
        Session::flash('message', "Successfully updated");

        return redirect()->view('admin.HistoryCart.index');
    }
}
