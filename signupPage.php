<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <link href="signup.css" type="text/css" rel="stylesheet">
</head>
<body>
    <div>
<form method= "post" enctype = "multipart/form-data" >
    <div class = "signup">
    <h2>Signup</h2>
    <div class = "input_text">
  <input type ="text" name = "name" placeholder = "Name"  required/>
  <br>
</div>
<div class = "input_text">
   <input type = "email" name = "email"placeholder = "Email address"  required/>
   <br>
   </div>
   <div class = "input_text">
   <input type ="password" name = "passwd" placeholder = "Password"  required/>
   <br>
   </div>
   <button class="btn" type ="submit" name = "signup" >Sign up</button>
   <br>
   <br>
   <a href= "login.php">Login</a>
</div>
    </form>
</div>
</body>
</html>
<?php
include'config.php'; // لاستدعاء ملف الاتصال بقاعدة البيانات 
if (isset($_POST['signup'])){
    $user = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['passwd'];

    $sql = "INSERT INTO user (username , password , email )
VALUES('$user',' $password', '$email')";

if (mysqli_query($conn , $sql)){
    echo "Account successfully created ";
}else{
    echo "Registration falid , there appears to be an error in the fields data ";
}
}


