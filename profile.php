<?php
$conn = mysqli_connect('localhost','root','','profile');
    $sql = "SELECT * FROM  posts ";
    $result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" class="profile">
        <div class="image_area">
            <img src="1.jpg">
            <a href="control.php">update your posts</a>
        </div>
        <div class="posts_area">
            <?php
                while( $row = mysqli_fetch_assoc($result)){
            ?>
            <div class="post">
                <h3 name="title" ><?php echo $row['title'] ;?></h3>
                <p name = "text" ><?php echo $row['text'] ;?></p>
            </div>
            <?php
               }

            ?>
        </div>
    </form>
</body>
</html>