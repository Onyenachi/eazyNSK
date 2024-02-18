<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            border: 1px solid white;
            margin-top: 40px;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size{
            width: 150px;
            height: 150px;
        }
        .th_color{
            background: rgb(227, 147, 147);
        }
        .th_deg{
            padding: 20px;
        }

   </style>

   
  </head>
  <body>
    
    <div class="container-scroller"> 

      <!-- partial:partials/_sidebar.html -->
     @include('admin.slide')
      <!-- partial header-->
        @include('admin/header')
      
        <!-- partial header ends here -->
          
        <!-- body partial start here -->
        <div class="main-panel">
            <div class="content-wrapper">

                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
  
                    {{session()->get('message')}}
  
  
                </div>
                @endif

                    <h2 class="font_size">ALL PRODUCTS</h2>
 
                        <table class="center">
                            <tr class="th_color">
                               <th class="th_deg">PRODUCT TITLE</th>  
                               <th class="th_deg">DESCRIPTION</th>  
                               <th class="th_deg">PRODUCT CATEGORY</th>  
                               <th class="th_deg">PRICE</th>  
                               <th class="th_deg">DISCOUNT PRICE</th>  
                               <th class="th_deg">QTY</th> 
                               <th class="th_deg">IMAGE</th> 
                               <th class="th_deg">DELETE</th> 
                               <th class="th_deg">SUPPLIER</th>
                               
                               <th class="th_deg">EDIT</th> 
                            </tr> 
                        @foreach ($product as $product)
                        <tr>
                            <td>{{$product->title}}</td>   
                            <td>{{$product->description}} </td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td>{{$product->quantity}}</td>
                            <td class="img_size"><img src="/product/{{$product->image}}"></td>
                            
                            <td> <a href="{{url('delete_product', $product->id)}}"  class="btn btn-danger" onclick="return confirm('Are you sure to delete this')">Delete </td>

                            <td>{{$product->supplier}}</td>

                            <td > <a href="{{url('update_product', $product->id)}}" class="btn btn-success">Edit </td>
                        </tr> 
                        @endforeach
                           
                        </table> 
                            


                        
                    



              </div>
        <!-- body partial ends here -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.style')
  </body>
</html>