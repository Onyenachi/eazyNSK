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
        tr{
            border: 1px solid white;
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

              <h2 class="font_size">ALL SUPPLIERS</h2>
              <div style="margin-left: 400px; margin-top: 20px; color: black">

              </div>
            <h5>Number of suppliers </h5>
              <table class="center">
                  <tr class="th_color">
                     <th class="th_deg">S/N</th>  
                     <th class="th_deg">Name</th>  
                     <th class="th_deg">Email</th>  
                     <th class="th_deg">Phone Number</th>  
                     <th class="th_deg">Shop Address(s)</th>  
                       

                   
                  </tr> 

                  <?php  $sn  = 1;  
                  ?>
   
                @foreach($suppliers as $suppliers)
                  <tr>
                    <td><?php echo $sn++; ?></td>
                     <td>{{$suppliers->name}}</td> 
                     <td>{{$suppliers->email}}</td> 
                     <td>{{$suppliers->phone}}</td> 
                     <td>{{$suppliers->address}}</td> 
                     
                  
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