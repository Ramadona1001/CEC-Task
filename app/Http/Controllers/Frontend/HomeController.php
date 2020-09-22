<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;

class HomeController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();
        $brands     = Brand::all();
        $products   = Product::all();

        $minPrice        = Product::min('price');
        $maxPrice        = Product::max('price');
        
        

        return view('index',compact('categories','brands','products','minPrice','maxPrice'));
    }

    public function filter(Request $request)
    {
        if(isset($_POST["action"]))
        {
            $query = "SELECT * FROM products where 1 = 1";
            if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
            {
                $query .= " AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
            }
            if(isset($_POST["search"]))
            {
                $query .= " AND name like '%".$_POST["search"]."%'";
            }
            if(isset($_POST["brand"]))
            {
                $brand_filter = implode("','", $_POST["brand"]);
                $query .= " AND brand_id IN('".$brand_filter."')";
            }
            if(isset($_POST["cat"]))
            {
                $cat_filter = implode("','", $_POST["cat"]);
                $query .= " AND category_id IN('".$cat_filter."')";
            }

            $result = \DB::select($query);
            $total_row = count($result);
            
            $output = '';
            if($total_row > 0)
            {
                foreach($result as $row)
                {
                    $output .= '
                        <div class="col-lg-4">
                        <div class="panel panel-default">
                        <div class="panel-body">
                        <img src="'.$row->image.'" class="img-responsive img-thumbnail" style="width:200px;height:150px;" alt="">
                        <hr>
                        '.$row->name.'
                        Price : '.$row->price.' EGP
                        </div>
                        <div class="panel-footer">
                        <form  style="display:inline-flex;" class="cartForm">
                        <input type="hidden" name="product_id" value="'.$row->id.'" id="product_id">
                        <input type="number" name="product_qty" id="product_qty" value="1" min="1" step="1" id="" style="margin-right: 10px;">
                        <button type="submit" class="btn btn-primary">c</button>
                        </form>
                        </div>
                        </div>
                        </div>
                    ';
                }
            }
            else
            {
                $output = '<h3 style="text-align:center;color:red;">No Product(s)</h3>';
            }
            
            return $output;
        }

       
    }

    function addToCart(Request $request){
        $cart = '';
        $productid = $request->product_id;
        $productqty =$request->product_qty;
        $product = Product::findOrfail($productid);
        $total = $product->price * $productqty;
        $cart .='
            <li>
                <span class="item">
                    <span class="item-left">
                        <img src="'.$product->image.'" alt="">
                        <span class="item-info">
                            <span>'.$product->name.'</span>
                            <span>'.$total.' EGP - (Qty: '.$productqty.')</span>
                        </span>
                    </span>
                </span>
            </li>
            <li class="divider"></li>
        ';
        
        Cart::add($product->id, $product->name, $productqty, $total, ['image' => $product]);

        return $cart;

        
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return back();
    }

    public function checkout()
    {
        if (\Cart::count() > 0){
            $order = new Order();
            $order->total = Cart::total();
            $order->qty = Cart::count();
            $order->save();

            foreach (Cart::content() as $item) {
                $orderItems = new OrderItem();
                $orderItems->order_id = $order->id;
                $orderItems->product_id = $item->id;
                $orderItems->qty = $item->qty;
                $orderItems->total = $item->price;
                $orderItems->save();
            }
            Cart::destroy();
            return back();
        }else{
            return back();
        }
    }
}
