<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM user_t WHERE username=:username OR email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar

    if($user){
            // verifikasi password
            if(password_verify($password, $user["password"])){
                // buat Session
                session_start();
                $_SESSION["user"] = $user;
                // login sukses, alihkan ke halaman timeline
                header("Location: timeline2.php");
            }
        else {
          // login gagal, tambahin opsi daftar
          echo "<p mb-4>login gagal, silakan daftar baru saja...</p>";
        }
        }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/login.css"></head>
<body style="background-image: url(img/weather.png);">

<div class="container">
    <p>&larr; <a href="index.php">Home</a>
    <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    <form class="form-signin" action="" method="POST">
      <img class="mb-4" src="img/logo.png" alt="" width="102" height="72">
      <h1 class="h3 mb-3 mr-center font-weight-normal">LOGIN</h1>
      <label for="inputEmail" class="sr-only">Username</label>
      <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" class="form-control" placeholder="Password" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" value="Masuk" name="login">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
    </form>
</div>


  
  

    
</body>
</html>
