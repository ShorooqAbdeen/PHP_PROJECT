<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link href="login.css" type="text/css" rel="stylesheet">
</head>
<body>
    <img class="wave" src="image\wave.svg">
    <form method = "post" action = "">
    <div class = "login">
        <img class = "avatar" src="image\original.jpg">
        <h2>login</h2>
        <div class = "input_text">
            <i class ="fa fa-user"></i>
            <input type = "text" name = "username"  required  placeholder = "Username"/>
            <br>
        </div>
        <div class = "input_text">
            <i class ="fa fa-lock"></i>
            <input type = "password" name = "password"  required  placeholder = "Password"/>
            <br>
        </div>
        <button  class = "btn" type = "submit" name = "login">Login</button>
      <br>
      <br>
      <a href = "signupPage.php"> Signup</a>

    </div>
 
</form>
</body>
</html>

<?php 
include 'config.php';
session_start();

if (isset($_POST['login'])){
    $getUsername= mysqli_real_escape_string($conn,$_POST['username']);
    $getPassword= mysqli_real_escape_string($conn,$_POST['password']);

    header('Location:home.php');

    //$sql = "select * from user where username = ' $getUsername' && password = ' $getPassword'";
    $sql = "select * from user where username = '".$getUsername."' "; 
    $sel_user=mysqli_fetch_object(mysqli_query($conn,$sql));
     $pass=$sel_user->password;

    // ارسال الاستعلام والتحقق من وجود العضو
    if (mysqli_num_rows(mysqli_query($conn,$sql)) > 0 ){

     // اذا تم وجود النتيجة يتم اضافة العضو في السيشن
         if(password_verify($getPassword,$pass)){ //لمقارنة الباسورد الذي ادخلناه بالباسورد الموجود في قاعدة البيانات
        $_SESSION['USER']=$getUsername;
        header('Location:homePage.php');
         echo  "success";
          }else{
           echo "error";
           }
        $_SESSION['PASSWORD']=$getPassword;
        $_SESSION['LOGIN']=TRUE;
       // echo " you are logged in successfully ";

    }else{
        // اذا لم يتم ايجاد اي قيمة يعني لو كانت 0
        echo "username or password error ";
    }
  

}