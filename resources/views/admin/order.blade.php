<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style>
         .center{
            margin: auto;
            width: 100%;
            text-align: center;
            border: 1px solid white;
            margin-top: 40px;
        }
        .font_size{
            text-align: center;
            font-size: 20px;
            padding-top: 10px;
        }
        .img_size{
            max-width: 100px;
            max-height: 70px;
        }
        .th_color{
            background: rgb(227, 147, 147);
        }
        .th_deg{
            padding: 10px;
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

              <h2 class="font_size">ALL ORDERS</h2>
              <div style="margin-left: 400px; margin-top: 20px; color: black">
                  <form action="{{url('search')}}" method="get">
                      <input type="text" name="search" placeholder="search for orders">

                      <input type="submit" value="search" class="btn btn-outline-primary">


                  </form>
                  @csrf

              </div>
<h5>Number of Orders {{$count}}</h5>
              <table class="center">
                  <tr class="th_color">
                     <th class="th_deg">Name</th>  
                     <th class="th_deg">Email</th>  
                     <th class="th_deg">Address</th>  
                     <th class="th_deg">Price</th>  
                     <th class="th_deg">Phone</th>  
                     <th class="th_deg">Product title</th> 
                     <th class="th_deg">Quantity</th> 
                   
                     <th class="th_deg">Payment Status</th> 
                     <th class="th_deg">Delivery Status</th> 
                     <th class="th_deg">Image</th> 
                     <th class="th_deg">Delivered</th> 
                     <th class="th_deg">Print Out</th> 
                   
                  </tr> 
                  
                  @forelse ($order as $order)
                
              <tr>
                  <td>{{$order->name}}</td>   
                  <td>{{$order->email}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->price}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->product_title}}</td>
                  <td>{{$order->quantity}}</td>
                  <td>{{$order->payment_status}}</td>
                  <td>{{$order->delivery_status}}</td>
                  
                  <td class="img_size"><img src="product/{{$order->image}}"></td>

                 
                 <td> 
                  
                  @if($order->delivery_status=='processing')
                   <a href="{{url('delivered',$order->id)}}" class="btn btn-primary">Delivered 
                  
                  @else
                  <p style="color: green">Delivered</p>

                  @endif
                </td>
                <td><a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print</td>

                
                 
                  
              </tr>
              @empty
                <tr>
                  <td colspan="16">
                    No data found
                  </td>
                </tr>
                      
                  @endforelse
             
                
                 
              </table> 



              </div>
        <!-- body partial ends here -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.style')
  </body>
</html>