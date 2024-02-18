<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\Models\user; 

use Illuminate\Http\Request;

use App\Models\category;

use App\Models\product;

use App\Models\order;
use Illuminate\Support\Facades\DB;

use PDF;

class Admincontroller extends Controller
{
  public function view_category()
  {

    #selecting all the items from category table
    $data= category::all();
    #sending the items to category page
    return view('admin.category', compact('data'));
  }


  public function add_category( Request $request)
  {
    $data=new category;
    

    $data->category_name=$request->category;
    $data->save();

    return redirect()->back()->with('message', 'Category added successfully');
   
    
  }

  #getting data from category_delete url from category page for deleting with id
  public function delete_category($id){

    #selecting the particular item from the category database using the id gotten from the delete_category url from category page 
    $data=category::find($id);
    #delete the item 
    $data->delete();
    return redirect()->back()->with('message','One category item deleted successfully');
  }

  public function view_product()
  {
    $category=category::all();
    return view('admin.product', compact('category'));
  }

  public function add_product(Request $request) 
  {
    $user=Auth::user();
    $product= new product;

    $product->user_id=$user->id;

    $product->title=$request->title;
    $product->description=$request->description;
    $product->category=$request->category;
    $product->quantity=$request->quantity;
    $product->price=$request->price;
    $product->discount_price=$request->discount;

    $product->supplier=$user->name;

    $product->image=$request->image;
    $product->image1=$request->image1;
    $product->image2=$request->image2;
    $product->image3=$request->image3;
    $product->image4=$request->image4;

    $image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);
    $product->image=$imagename;

    $image1=$request->image1;
    $imagename1=time().'.'.$image1->getClientOriginalExtension();
    $request->image1->move('product_image1',$imagename1);
    $product->image1=$imagename1;


    $image2=$request->image2;
    $imagename2=time().'.'.$image2->getClientOriginalExtension();
    $request->image2->move('product_image2',$imagename2);
    $product->image2=$imagename2;


    $image3=$request->image3;
    $imagename3=time().'.'.$image3->getClientOriginalExtension();
    $request->image3->move('product_image3',$imagename3);
    $product->image3=$imagename3;


    $image4=$request->image4;
    $imagename4=time().'.'.$image4->getClientOriginalExtension();
    $request->image4->move('product_image5',$imagename4);
    $product->image4=$imagename4;

    $product->save();
    return redirect()->back()->with('message','Product added successfully');


  }

public function show_product()  {

 $id=Auth::user()->id;

 $product=product::all();
  
 if($id ==7){  //it means if the id is my id, which i will always save to 7, 
              //let it display every product uploaded.
  return view('admin.show_product', compact('product'));

 
   
 }
 else{
  //it means that if the id is not my id. that is as the websit owner
   //it should not display every product uploaded in this site  
    $product=product::where('user_id','=',$id)->get();
    return view('admin.show_product', compact('product'));
 }
}

public function delete_product($id)

{
  $product=product::find($id);

  $product->delete();

  return redirect()->back()->with('message', 'product deleted successfully');
}

public function update_product($id)
{
  $product=product::find($id);
  $category=category::all();
  return view('admin.update_product', compact('product', 'category'));
}

public function update_product_confirm(Request $request, $id)
{
  $product=product::find($id);

  $product->title=$request->title;
  $product->description=$request->description;
  $product->category=$request->category;
  $product->quantity=$request->quantity;
  $product->price=$request->price;
  $product->discount_price=$request->discount;
  

   $image=$request->image; 
   if($image)
   {
    $product->image=$request->image;
    $imagename=time().'.'.$image->getClientOriginalExtension();
    $request->image->move('product',$imagename);
    $product->image=$imagename;
   }
   

    $product->save();
    return redirect()->back()->with('message', 'Product Updated Successfully');


}

public function order()
{
  $user=Auth::user();
if($user->name !='admin'){

  $order= DB::table('orders')->where('supplier', $user->name)->get();
  return view('admin.order', compact('order'));
}
else{
  $order= order::all(); 
  return view('admin.order', compact('order'));
}




  


  
  //
  // return view('admin.order', compact('order'));
}

public function delivered($id)
{
  $order=order::find($id);
  $order->delivery_status = "Delivered";
  $order->save();
  return redirect()->back();
}

public function print_pdf($id)
{
  $order=order::find($id);
  $pdf = PDF::loadView('admin.pdf',compact('order'));
  return $pdf->download('customer_order-details.pdf');
}

public function searchData(Request $request)
{
  $searchText=$request->search;
  $order=order::where('name', 'LIKE', "%$searchText%")->orWhere('phone', 'LIKE', "%$searchText%")->orWhere('email', 'LIKE', "%$searchText%")->get();

  return view('admin.order',compact('order'));
}

}
