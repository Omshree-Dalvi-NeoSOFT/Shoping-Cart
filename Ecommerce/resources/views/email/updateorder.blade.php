
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="container">
   <div class="container">
       <h3>Update Order Status Mail</h3>
    <p>
    The great thing about the Internet isn't that you can reconnect with old friends or stay up to date with developing world events or send pictures of newborns immediately around the world. It is simply that you can log on to jcpenney.com from anywhere and order fresh underwear immediately after seeing your life flash before your eyes.
    </p>
    <p>
      <h3> {{$email}}, Thank You !!</h3>
      <br>
      Following are the Order Details :
    </p>
   </div>
        
   <table class="table" id="example1">  
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Order Specification</th>
                <th scope="col">Order Details</th>
            </tr>
        </thead> 
        <tbody>   
            <tr>
                <th>1</th>
                <th>Customer Email</th>
                <td>{{$email}}</td>
            </tr>
            <tr>
                <th>2</th>
                <th>Order Status</th>
                <td>{{$status}}</td>
            </tr> 
        </tbody>                
    </table>

    <div class="container">
  <p>
    <h2>Thanks & Regards,</h2><br>
    <h5>Shopping Cart Team.</h5>
  </p>
</div>

</body>
</html>