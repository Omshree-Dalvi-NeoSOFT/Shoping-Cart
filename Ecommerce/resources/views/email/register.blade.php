
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
    <p>
    The great thing about the Internet isn't that you can reconnect with old friends or stay up to date with developing world events or send pictures of newborns immediately around the world. It is simply that you can log on to shopingcart.com from anywhere and order fresh underwear immediately after seeing your life flash before your eyes.
    </p>
    <p>
      <h3>Welcome {{$fname}}</h3>
      <br>
      Following are the Login Credentials :
    </p>
   </div>
    <table class="table text-left" style="text-align: left;">
    <tr>
      <th><b>Name :</b></th>
      <td>{{$fname}} {{$lname}}</td>
    </tr>
    <tr>
    <th><b>Email :</b></th>
    <td>{{$email}}</td>
    </tr>
   <tr>
   <th><b>Password :</b></th>
   <td>{{$password}}</td>
   </tr>
  </tbody>
</table>
<div class="container">
  <p>
    <h2>Thanks & Regards,</h2>
    <h5>Shopping Cart Team.</h5>
  </p>
</div>
<div class="container">
  <p>
    <h6>this is system generated mail..</h6><br>
</p>
</div>

</body>
</html>