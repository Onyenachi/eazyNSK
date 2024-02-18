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
                    <h2 class="h2_font">Add Category</h2>

                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf

                        <input type="text" class="input_color" name="category" placeholder="category name">
                        <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                    </form>
                </div>
                <div>
                    <table class="center">

                        <tr>
                            <td>Category Name</td>
                            <td>Action</td>
                        </tr>
                        <!-- looping through the items in category table -->
                        @foreach ($data as $data )
                            
                        <tr>
                            <td>{{$data->category_name}}</td>
                            <td> 
                             <a onclick="return confirm('Are You Sure To Delete This?')" href="{{url('delete_category', $data->id)}}" class="btn btn-danger">Delete 
                            </td>
                        </tr>

                        @endforeach
                    </table>
                </div>

            </div>
        </div>
       
        <!-- body partial ends here -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.style')
  </body>
</html>