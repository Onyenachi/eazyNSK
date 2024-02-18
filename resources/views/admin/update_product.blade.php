<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
   @include('admin.css')

   
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
               
              <div class="div_center">
                <h2 class="h2_font">Update Product</h2>

                <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
               <div class="div_center">
                <label class="lab">Product Title: </label>
                <input type="text" class="input_color" name="title" placeholder="title your product" required="" value="{{$product->title}}">
                </div>

                <div class="div_center">
                  <label class="lab">Product Description: </label>
                  <input type="text" class="input_color" name="description" placeholder="write description" required="" value="{{$product->description}}">
                  </div>

                  <div class="div_center">
                    <label class="lab">Product Price: </label>
                    <input type="number" class="input_color" name="price" placeholder="how much?" required="" value="{{$product->price}}">
                    </div>
                    
                    <div class="div_center">
                      <label class="lab">Discount Price: </label>
                      <input type="text" class="input_color" name="discount" placeholder="how much discount?" value="{{$product->discount_price}}">
                      </div>

                    <div class="div_center">
                      <label class="lab">Product Quantity: </label>
                      <input type="number" class="input_color" min="0" name="quantity" placeholder="write quantity" required="" value="{{$product->quantity}}">
                      </div>


                      <div class="div_center">
                        <label class="lab">Product Category: </label>
                          <select class="input_color" name="category" required="">

                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                              
                            @endforeach
                           
                           
                           
                            
                          </select>
                        </div>

                        <div class="div_center">
                            <label class="lab" >current Product Image: </label>
                           <img style="margin: auto" height="100" width="100"  src="/product/{{$product->image}}">
                            </div>


                        <div class="div_center">
                          <label class="lab" >Change Product Image: </label>
                          <input type="file"  name="image">
                          </div>

                          <div class="div_center">
                            
                            <input type="submit" class="btn btn-primary" value="Update Product">
                            </div>

                          </form>

                    



              </div>
        <!-- body partial ends here -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.style')
  </body>
</html>