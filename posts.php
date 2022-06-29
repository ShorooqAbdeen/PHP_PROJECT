<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Document</title>
</head>
<body>






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

