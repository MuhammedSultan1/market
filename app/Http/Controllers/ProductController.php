<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index(){
        return Product::all();

        return view('product',['products'=>$data]);
    }

    function addToCart(Request $req)
         {
             if($req->session()->has('user'))
             {
                 $cart = new Product;
                 $cart->user_id=$req->session()->get('user')['id'];
                 $cart->product_id=$req->product_id;
                 $cart->name=$req->name;
                 $cart->price=$req->price;
                 $cart->category=$req->category;
                 $cart->gallery=$req->gallery;
                 $cart->save();
                 return redirect('/cart');
             }
             else
             {
                 return redirect('/login');
             }
         }

    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return Product::where('user_id',$userId)->count();
    }
    
    function cartList()
    {
        $userId=Session::get('user')['id'];
        
        //get everything from the cart
        $products = Product::all();

        foreach($products as $product):
            $tcin = $product['product_id'];
        endforeach;

    
       //for every tcin in the user's database, make an api call which takes the tcins and places them in the api call
       //and gets the products details
         foreach($products as $product):
            $itemDetails = Http::withHeaders([
            'x-rapidapi-host' => 'target1.p.rapidapi.com',
            'x-rapidapi-key' => env('RAPID_API_KEY'),
            ])->get('https://target1.p.rapidapi.com/products/v3/get-details', [
                'tcin' => $tcin,
                'store_id' => '911',
            ])->json()['data']['product'];
        endforeach;

        return view('cart',
        [
        'products' => $products,
        'itemDetails' => $itemDetails,
        'tcin' => $tcin,
        ]);
     }   

     function removeCart($id){
         Product::destroy($id);
         return redirect('cart');
     }

     function orderNow(){
        $userId=Session::get('user')['id'];
        
        //get everything from the cart
        //  return $products = DB::table('products')
        //  ->sum('products.price');
         
        //  return $products = DB::table('products')
        //  ->sum('products.price');

          $total = $products = DB::table('products')
          ->where('products.user_id',$userId)
          ->sum('price');
        //return $products;

        return view('ordernow',[
            'total'=>$total,]);
     }

     function orderPlace(Request $req){
        $userId=Session::get('user')['id'];
        $allCart = Product::where('user_id',$userId)->get();
        foreach($allCart as $cart){
            $order = new Order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status="pending";
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->address=$req->address;
            $order->save();
            Product::where('user_id',$userId)->delete();
        }
         $req->input();
         return redirect('/success');
     }
}