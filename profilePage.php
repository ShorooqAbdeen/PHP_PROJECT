


<?php
include'config.php';
session_start();
// الاسم , الايميل , الصورة , رقم الحوال , العنوان 
// هلأ الاسم و الايميل  يفترض ياخدهم من الداتا بيز من جدول اليوزر 
//$getUsername= mysqli_real_escape_string($conn , $_POST['username']);
//$getUsername=$_SESSION['USER'];

//$query = "SELECT * FROM user " ;
//$query ="select * from user where username = ' $getUsername';
 

$sql = "select * from user ";
// where username = '$_SESSION['USER']' 

$select_user = mysqli_query($conn,$sql);  
while($row = mysqli_fetch_assoc($select_user)){
    $user_name=$row['username'];
    $user_email=$row['email'];
    echo "<br>";
    echo "<br>";
    echo "<tr>";
    echo "<td>$user_name</td>";
    echo "</tr>";
    echo "<br>";
    echo "<br>";
    echo "<tr>";
    echo "<td>$user_email</td>";
    echo "</tr>";}?>

