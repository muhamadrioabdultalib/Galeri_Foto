<?php
    session_start();
    if(isset($_SESSION["login"])){
        header("Location:admin.php");
    } require "function.php";
    if(isset($_POST["submit"])){
        $username= $_POST['fusername'];
        $password = $_POST['fpassword'];

        $result = mysqli_query($koneksi, "SELECT * FROM akun WHERE username='$username'");
        if(mysqli_num_rows($result) === 1){
            $row= mysqli_fetch_assoc($result);
            if(password_verify($password,$row['password'])){
                $_SESSION["login"]=true;
                header("Location: admin.php");
                exit;}}
        $error= true;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN GALERI FOTO</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="wrap-card">
        <h1>Log In</h1>
        <?php  if(isset($error)){ ?>
               <p style="color: red;">USERNAME ATAU PASSWORD ANDA SALAH </p> 
        <?php } ?>
        <form action="login.php" method="post">
            <div class="card-name">
                <label for="email">usernama</label>
                <input type="text" name="fusername" id="email">
            </div>
            <div class="card-name">
                <label for="password">password</label>
                <input type="password" name="fpassword" id="password">
            </div>
            <div class="card-name">
                <button type="submit" name="submit">Log In</button>
            </div>
        </form>
        <span>buat akun <a href="registrasi.php">di sini</a></span>
    </div>
</body>
</html>
