<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="home.css" type="text/css" rel="stylesheet">
</head>
<body>
    <header>
<div id = "logo">
<h1>My Space</h1>    
</div>    

<nav> 
    <ul> 
        <li> 
        <a href = "login.php">LOGIN</a>
        </li>
        <li> 
        <a href = "signupPage.php">SIGNUP</a>
            </li>

            <li> 
        <a href = "profilePage.php">PROFILE</a>
            </li>
    </ul>
</nav>

</header>


<div>
    <form  action = "" method = "post" enctype = "multipart/form-data" >
    <input type = "text" name = "user" placeholder = "Name"/>
    <br>
    <textarea id = "text" name = "Mypost" cols = "30" row = "50" placeholder = "Write here about anything that comes in your mind .."></textarea>
    <br>
    <input id = "imgBtn" type = "file" name = "pic" />
    <br>
    <button id = "btn1" type = "submit" name = "submit"> Post</button>
    <button id = "btn2">Cancle</button>

</form>
</div>
<br> 
<br>
<table class="table table-striped table-dark">
                        <tbody>
    <?php 
                        include'config.php';
        $query = "SELECT * FROM posts ORDER BY post_id DESC";
        $select_posts = mysqli_query($conn,$query);  
        while($row = mysqli_fetch_assoc($select_posts)){
        $post_id            = $row['post_id'];
        $post_image         = $row['picture'];
        $post_content       = $row['text'];
        $post_creater    = $row['create_at'];

        echo "<tr>";
        echo "<td>$post_creater</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>$post_content</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td><img width='500' src='image/$post_image'></td>";
      
        echo "</tr>";}?>
        </tbody></table></div></div>
</body>
</html>

<?php
include'config.php';
if(isset($_POST['submit'])) {
    $writer = $_POST['user'];
    $post_content = $_POST['Mypost'];
$post_image        = $_FILES['pic']['name'];
$post_image_temp   = $_FILES['pic']['tmp_name'];
$writer = $_POST['user'];
move_uploaded_file($post_image_temp, "image/$post_image" );
$sql = "INSERT INTO posts (text ,picture,create_at)
VALUES( '$post_content ' , '$post_image' , '$writer')";    
$create_post_query = mysqli_query($conn, $sql);    
$the_post_id = mysqli_insert_id($conn);
}?>     


