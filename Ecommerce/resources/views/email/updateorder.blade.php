
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="container">
   <div class="container">
       <h3>Update Order Status Mail</h3>
    <p>
    The great thing about the Internet isn't that you can reconnect with old friends or stay up to date with developing world events or send pictures of newborns immediately around the world. It is simply that you can log on to Shopingcart.com from anywhere and order fresh underwear immediately after seeing your life flash before your eyes.
    </p>
    <p>
      <h3> {{$fname}}, Thank You !!</h3>
      <br>
      Following are the Order Details :
    </p>
   </div>
        
   <table class="table text-left" id="example1" style="text-align: left;">  
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
                <th>Customer Name</th>
                <td>{{$fname}} {{$lname}}</td>
            </tr>
            <tr>
                <th>3</th>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>