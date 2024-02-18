<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>Order Details</h1>

   Customer Name : <h3>{{$order->name}}</h3>

   Customer email : <h3>{{$order->email}}</h3>

   Customer phone : <h3>{{$order->phone}}</h3>

   Customer address : <h3>{{$order->address}}</h3>

 product name : <h3>{{$order->product_title}}</h3>

  Price : <h3>{{$order->price}}</h3>

  Ordered quantity : <h3>{{$order->quantity}}</h3>

  payment Status : <h3>{{$order->payment_status}}</h3>
  Product ID : <h3>{{$order->product_id}}</h3>
  <br><br>


  <img height="150" width="220" src="product/{{$order->image}}">
  <br><br>  <br> <br>

  customer's signature >>>>....................<<<<<<(if Recieved by the customer)
  

  <br> <br>   <br> <br>

  Dispatcher's signature>>>>>......................<<<<<<<<
</body>
</html>