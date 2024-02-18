
<!DOCTYPE html>
<html>
    <base href="/public">
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="product/logo1.png" type="">
      <title>eazyNSK</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <link ref="stylesheet" href="home/style.css">
<style>
   .center{
      padding: center;
      margin: 70px;
     
   }
</style>

   </head>
   <body>
         <!-- header section strats -->
         @include('/home.header')
      <div style="padding: 5%">
         <div class="slider">
            <div class="sides">
               <input type="radio" name="radio-brn" id="radio1">
               <input type="radio" name="radio-brn" id="radio2">
               <input type="radio" name="radio-brn" id="radio3">
               <input type="radio" name="radio-brn" id="radio4">
               <div class="slide first">
                  <img height="30%" width="35%" src="product/{{$product->image}}" alt="">                 
               </div>
               <div class="slide">
                  <img height="30%" width="35%" src="product_image1/{{$product->image1}}" alt="">                 
               </div>
               <div class="slide">
                  <img height="30%" width="35%" src="product_image2/{{$product->image2}}" alt="">                 
               </div>
               <div class="slide">
                  <img height="30%" width="35%" src="product_image3/{{$product->image3}}" alt="">                 
               </div>
               {{-- automatic navigation --}}
               <div class="navigation-auto">
                  <div class="auto-btn1"></div>
                  <div class="auto-btn2"></div>
                  <div class="auto-btn3"></div>
                  <div class="auto-btn4"></div>

               </div>
               {{-- automatic navigation ends --}}

           

            </div>
               </div class="navigation-maual">
                  <label for="radio1" class="manual-btn"></label>
                  <label for="radio2" class="manual-btn"></label>
                  <label for="radio3" class="manual-btn"></label>
                  <label for="radio4" class="manual-btn"></label>
               <div>
            
         </div>
         

         
<div class="detail-box">
   <h5>
     {{$product->title}}
   </h5>
 </div>

  {{-- checking if the product table has value in it discount price to display to customer --}}
   @if($product->discount_price!=null)
   
   <h6 style=" color:red" >
     discount price
     <br>
     #{{$product->discount_price}}
  </h6> 

  <h6 style="text-decoration:line-through; color:blue" >  
     price
     <br>                 
     #{{$product->price}}
   </h6>
 

  @else
     <h6 style="color: blue">  
        price
        <br>                 
        #{{$product->price}}
      </h6>

   @endif

   <h6>Product Category:{{$product->category}}</h6>
   <h6>Product Description:{{$product->description}}</h6>
   <h6>Available Quantity:{{$product->quantity}}</h6>
   <br>

   <form action="{{url('add_cart', $product->id)}}" method="POST"> 
      @csrf

      <div class="row">
         <div style="padding-left: 6%"> <input type="number" min="1" value="1" name="quantity" style="width: 100px"></div>
     
       <div style="padding-left: 1%"> <input type="submit" value="Add to Cart"></div>
      </div>

     </form>

      </div>
         

       












    
    
      <div class="cpy_">
         <p class="mx-auto">© 2024 All Rights Reserved By <a href="https://www.eazynsk.com/">eazyNSK logistics and more</a><br>
         
           
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>











