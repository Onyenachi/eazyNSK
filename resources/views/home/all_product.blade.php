<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="product/logo1.png" type="">
      <title> EaszyNSK</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
   </head>
   <body>

   
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header');
         <!-- end header section -->
         <!-- slider section -->
        
         <!-- end slider section -->
         
      <!-- why section -->
 
      <!-- end why section -->
      
      <!-- arrival section -->
     
       <!-- end arrival section -->
      
      <!-- product section -->
      
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Search <span>products</span>
             <div>
               <form action="{{url('searchProduct')}}" method="GET">
               
                <input type="text" name="searchProduct" placeholder="search for product">

                <input type="submit" value="search" class="btn btn-outline-primary">

               </form>
             </div>
          </h2>
       </div>
       <div class="row">
         
         @foreach($product as $product)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$product->id)}}" class="option1">
                        Product Details
                      </a>

                     
                        <a href="{{url('buy',$product->id)}}" class="btn btn-primary">
                          BUY
                        </a>
                        
                      
                  
                    <form action="{{url('add_cart', $product->id)}}" method="POST"> 
                     @csrf

                     <div class="row">
                        <div class="col-md-4"> <input type="number" min="1" value="1" name="quantity" style="width: 100px"></div>
                    
                      <div class="col-md-4"> <input type="submit" value="Add to Cart"></div>
                     </div>
                    
                    </form>

                      </a>
                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{$product->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{$product->title}}
                   </h5>

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

                </div>
                
              
             </div>
             

          </div>
       
         
      @endforeach
         
       </div>
    </div>
  
 </section>
      <!-- end product section -->

      <!-- subscribe section -->
      @include('home.subscriber');
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client');
      
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer');
      <!-- footer end -->
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