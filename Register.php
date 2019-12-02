<?php
$msg = "";



if(isset($_POST['submit'])){


$con = new mysqli('localhost','root','','PasswordHash');

$name = $con->real_escape_string($_POST['name']);
$email = $con->real_escape_string ($_POST['email']);
$password = $con->real_escape_string  ($_POST['password']);
$cpassword = $con->real_escape_string  ($_POST['Cpassword']);

if ($password != $cpassword)
$msg = "please check your passwords!";
else{
$hash = password_hash($password, PASSWORD_BCRYPT);

$con->query("INSERT INTO users (name,email,password) VALUES ('$name', '$email', '$hash') ");
$msg="Congratulatios you have been registered!";
}
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password hash</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container" style="margin-top: 100px;">
<div class="row justify-content-center">
<div class="col-md-6 col-md-offset-3" alighn="center">
<img src="logo2.png"><br><br>

<?php if ($msg != "") echo $msg . "<br><br>";?>

<form method="post" action="Register.php">

<input class="form-control" minlegth="3"  name="name" placeholder="Name..."><br>
<input class="form-control" name="email" type="email" placeholder="Email..."><br>
<input class="form-control" minlegth="5"  name="password" type="password" placeholder="password..."><br>
<input class="form-control" minlegth="5" name="Cpassword" type="password" placeholder="Confirm password..."><br>
<input class="btn btn-primary" name="submit" type="submit" value="Register..."><br>

</form>


</div>
</div>

</div>

</body>
</html>