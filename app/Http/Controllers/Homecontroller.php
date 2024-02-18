<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\user; 
use App\Models\product; 
use App\Models\cart; 
use App\Models\order; 

use Illuminate\Support\Facades\DB;

use Session;
use Stripe;


class Homecontroller extends Controller
{

    public function index(){
        $product=product::all();
        return view('home.userpage', compact('product'));

        
    }

   public function redirect()
   {

    $usertype = Auth::user()->usertype;
    if($usertype=='1')

    {
        return view('admin.home');
    }
    else{
        $product=product::all();
        return view('home.userpage', compact('product'));

        
    }

   }

   public function product_details($id)
   {
    $product=product::find($id);
        return view('home.product_details', compact('product'));
   }

   public function add_cart(Request $request,$id)
   {
    
    if(Auth::id())
    {
       $user=Auth::user();



       $product=product::find($id);

       $cart=new cart;

        $cart->supplier=$product->supplier;

       $cart->name=$user->name;

       $cart->email=$user->email;

       $cart->phone=$user->phone;

       $cart->address=$user->address;

       $cart->user_id=$user->id;

       $cart->product_title=$product->title;

    if($product->discount_price!=null)
         {
            $cart->price=$product->discount_price * $request->quantity;
         }
    else
         {
            $cart->price=$product->price * $request->quantity;
         }
          

       $cart->image=$product->image;

       $cart->product_id=$product->id;

       $cart->quantity=$request->quantity;

       $cart->save();

    
       return redirect()->back();
      
    }


    else{
        return redirect('login');
    }

   }

   public function show_cart()
   {
    if(Auth::user())
    {

    
    $id=Auth::user()->id;
    $cart=cart::where('user_id','=',$id)->get();
    $count = DB::table('carts')->where('user_id','=' , $id)->count();
    return view('home.show_cart', compact('cart'));
    }
    else
    {
        return redirect('login');
    }
   }

   public function remove_cart($id)
   {
    $cart=cart::find($id);
    $cart->delete();
    return redirect()->back();
   }

   public function cash_order()
   {
    $user=Auth::user();

    $userid=$user->id;

    $data=cart::where('user_id','=',$userid)->get();
  

    foreach($data as $data)
    {
        $order=new order;

        $order->supplier=$data->supplier; 

        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;
        $order->product_title=$data->product_title;
        $order->price=$data->price;
        $order->quantity=$data->quantity;
        $order->image=$data->image;
        $order->product_id=$data->product_id;
        $order->payment_status='Paid Through Monnify';
        $order->delivery_status='processing';

        $order->save();

        $cart_id=$data->id;

        $cart=cart::find($cart_id);

        $cart->delete();
    }
    return redirect()->back()->with('message', 'You have successfully placed your order and we are processing it.');
   }



public function stripe()


{
    return view('home.stripe');

}

/**
 * success response method.
 *
 * @return \Illuminate\Http\Response
 */
public function stripePost(Request $request)
{
    Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Making payment for the order." 
    ]);
  
    Session::flash('success', 'Payment successful!');
          
    return back();
}


public function monify($totalprice)
{
    return view('home.monify',compact('totalprice'));
}


public function searchProduct(Request $request)

{
    $searchText=$request->searchProduct;
    $product=product::where('title', 'LIKE', "%$searchText%")->orWhere('description', 'LIKE', "%$searchText%")->orWhere('category', 'LIKE', "%$searchText%")->get();

    return view('home.all_product',compact('product'));
}

public function all_product()
{
    $product=product::all();
    return view('home.all_product', compact('product'));

}





public function buy($id)
{
    $user=Auth::user();
    if($user){

         $product=product::find($id);
    }
    else{
        return redirect('login');
    }


     return view('home.buy', compact('product'));
 }

 public function about()
 {
    return view('home.about');
 }

 public function blog()
 {
    return view('home.blog');
 }

}











