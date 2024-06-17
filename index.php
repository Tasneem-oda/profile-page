<?php
$conn = mysqli_connect('localhost','root','','profile');
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM admins WHERE email = '$email'";
    $result = mysqli_query($conn,$sql);
    if($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    if($row['password'] == $password){
       header('location:profile.php');
    }else{
       header('location:index.php');
    };
    };
};
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
    <form method="post" class="login">
        <h1>write your email and password</h1>
        <label for="email">Your email</label>
        <input type="text" name="email" id="email" placeholder="Enter your email">
        <label for="password">password</label>
        <input type="text" placeholder="Password" id="password" name="password">
        <!-- <button class="loginbtn" name="login" type="submit">login</button> -->
        <input type="submit" class="loginbtn" name="login" value="login">
    </form>
   
</body>
</html>