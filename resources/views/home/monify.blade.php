<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>pay with monify</title>

  
  <style>
    body{
      font-family: Arial, Helvetica, sans-serif;
    }
    form{
      max-width: 400px;
      margin: auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    label{
      display: block;
      margin-bottom: 5px;

    }

    input[type="text"],
    input[type="address"],
    input[type="tel"],
    input[type="email"],

    button{
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 3px;
    }

    button{

      background-color: blue;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    button:hover {
      background-color: #0056b3;

    }
  </style>
   <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>
    
</head>
<body>
  <form id="payment">
    <label for="customerName">Customer Name: </label>
    <input type="text" name="name" id="customerName" name="customerName" required>

    <label for="customerEmail">Customer Email: </label>
    <input type="email" name="email" id="customerEmail" required name="email">



    <label for="customerName">Customer Address: </label>
    <input type="address" name="" id="customerAddress" required name="customerAddress">
    

    <label for="customerName">Customer Phone: </label>
    <input type="tel" name="" id="customerPhone" required name="customerPhone">

    <button type="button" onclick="payWithMonnify()">Click To Pay</button>
    
  </form>
  <script>
  function payWithMonnify(){
    const customerName = document.getElementById("customerName").value;
    const customerEmail = document.getElementById("customerEmail").value;
    const customerAddress = document.getElementById("customerAddress").value;
    const customerPhone= document.getElementById("customerPhone").value;

    MonnifySDK.initialize({
      amount:{{$totalprice}},
      currency: "NGN",
      reference: "EASY" + Math.floor(Math.random() * 1000000000000 + 1),
      customerName: customerName,
      customerAddress: customerAddress,
      customerPhone: customerPhone,
      customerEmail: customerEmail,
      apiKey: "MK_TEST_U3ZHRTNTTK",
      contractCode: "7621034608",
      paymentDescription: "test monnify",
      isTestMode: true,
      onComplete: function(response){
         //when the payment is successfull
        const paymentSuccessful = true;
        if(paymentSuccessful){
          window.location.href="{{url('cash_order')}}" 
        }
      },

      onClose: function(data){
         //when the payment is successfull
         window.location.href="{{url('/show_cart')}}"
      }
     

    });
  }
</script>
</body>
</html>