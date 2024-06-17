<?php
$conn = mysqli_connect('localhost','root','','profile');
$sql = "SELECT * FROM posts";
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
    <form action="" method="post" class="profile">
        <div class="image_area">
            <div class="img_area">
                <img src="1.jpg" >
            </div>
            <a href="profile.php">go to profile</a>
        </div>
        <div class="posts_area">
           
            <?php
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <form action="" method="post">
                <input type="hidden" name="id_input" value="<?php echo $row['id']; ?>">
                <div class="post">
                <input name="post_title" type="text" value="<?php echo $row['title']; ?>">
                <textarea name="post_text"><?php echo $row['text']; ?></textarea>
                <button name="update" type="submit">update</button>
                <button name="delete" type="submit">delete</button>
            </div>
                </form>
            <?php
             };  
            ?>
            <?php
            if(isset($_POST['update'])){
                $post_id = $_POST['id_input'];
                $updated_title = $_POST['post_title'];
                $updated_text = $_POST['post_text'];
                $sql = " UPDATE posts SET title = '$updated_title' , text = '$updated_text' WHERE id = $post_id ";
                mysqli_query($conn , $sql);
               
            }
            ?>
            <?php
            if(isset($_POST['delete'])){
                $post_id = $_POST['id_input'];
                $sql = "DELETE FROM posts WHERE id = $post_id";
                mysqli_query($conn , $sql);
            
            }
            ?>
            <?php
            if(isset($_POST['share'])){
                $title = $_POST['new_post_title'];
                $text = $_POST['new_post_text'];
                if(!empty($title)  && !empty($text) ){
                $sql = "INSERT INTO posts (title ,text) VALUES ('$title' , '$text')";
                $sql = mysqli_query($conn ,$sql);
                 
                }
                
            }
            ?>
            <div class="post">
                <h1>now post</h1>
                <input name="new_post_title" type="text" >
                <textarea name="new_post_text"></textarea>
                <button type="submit" name="share">share</button>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <!-- <label for="image"class="update_image_lable">update image</label> -->
                <input type="file" name="image"  id="image" class="update_image_input">
                <button name="upload_image" type="submit">upload</button>
            </form>
            <?php
            if(isset($_POST['upload_image'])){
                if(isset($_FILES['image'])){
                    $image = $_FILES['image']['tmp_name'];
                    $image_content = addslashes(file_get_contents($image));
                    $sql = "INSERT INTO images (image) VALUES = ('$image_content')";
                    mysqli_query($conn, $sql);
                    if($_FILES['image']['error'] !== UPLOAD_ERR_OK){
                        echo 'error uploading file:'. $_FILES['image']['error'];
                    }
                }
                error_reporting(E_ALL);
                ini_set('display_errors',1);
            }
            ?>
            
        </div>
    </form>
    
</body>
</html>