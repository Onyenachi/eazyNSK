<!DOCTYPE html>
<html lang="en">
  <head>
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
                <h2 class="h2_font">Add Product</h2>

                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                  @csrf
               <div class="div_center">
                <label class="lab">Product Title: </label>
                <input type="text" class="input_color" name="title" placeholder="title your product" required="">
                </div>

                <div class="div_center">
                  <label class="lab">Product Description: </label>
                  <input type="text" class="input_color" name="description" placeholder="write description" required="">
                  </div>

                  <div class="div_center">
                    <label class="lab">Product Price: </label>
                    <input type="number" class="input_color" name="price" placeholder="how much?" required="">
                    </div>
                    
                    <div class="div_center">
                      <label class="lab">Discount Price: </label>
                      <input type="number" class="input_color" name="discount" placeholder="how much discount?">
                      </div>

                    <div class="div_center">
                      <label class="lab">Product Quantity: </label>
                      <input type="number" class="input_color" min="0" name="quantity" placeholder="write quantity" required="">
                      </div>


                      <div class="div_center">
                        <label class="lab">Product Category: </label>
                          <select class="input_color" name="category" required="">

                           
                            <option value="" selected="">Add a category here</option> 
                            @foreach($category as $category)
                            <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                              
                            @endforeach
                         
                            
                          </select>
                        </div>

                        {{-- <div class="div_center">
                          <label class="lab">Supplier: </label>
                          <input type="text" class="input_color" min="0" name="supplier" placeholder="your shop name " required="">
                          </div>
     --}}


                        <div class="div_center">
                          <label class="lab" >Product Image: </label>
                          <input type="file"  name="image" required="">
                          </div>

                          <div class="div_center">
                            <label class="lab" >Product Image1: </label>
                            <input type="file"  name="image1" required="">
                            </div>

                            
                            <div class="div_center">
                              <label class="lab" >Product Image2: </label>
                              <input type="file"  name="image2" required="">
                              </div>

                              
                              <div class="div_center">
                                <label class="lab" >Product Image3: </label>
                                <input type="file"  name="image3" required="">
                                </div>

                                
                                <div class="div_center">
                                  <label class="lab" >Product Image4: </label>
                                  <input type="file"  name="image4" required="">
                                  </div>
        

                          <div class="div_center">
                            
                            <input type="submit" class="btn btn-primary" value="Add product">
                            </div>

                          </form>

                    



              </div>
        <!-- body partial ends here -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.style')
  </body>
</html>