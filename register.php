<?php

$gagal = NULL;

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	
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
        //
    
        // register gagal, cari username atau email yang lain
        $gagal = "<div class='alert alert-info center'>
                    <p><strong>Maaf,</strong> Username atau Email telah terpakai.</p>
                </div>";
		
    
    } else {
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	// pilih type, lokasi, dan status
    $type =<?php

$gagal = NULL;

require_once("config.php");

if(isset($_POST['register'])){
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
        //
    
        // register gagal, cari username atau email yang lain
        $gagal = "<div class='alert alert-info center'>
                    <p><strong>Maaf,</strong> Username atau Email telah terpakai.</p>
                </div>";
		
    
    } else {
        // filter data yang diinputkan
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        // enkripsi password
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        // pilih type, lokasi, dan status
        $type = $_POST['type'];	
        $location = $_POST['location'];	
        $status = 'available';	
        $phone = $_POST['phone'];

        // menyiapkan query
        $sql = "INSERT INTO user_t (name, username, email, password, type, location, status, phone) 
                VALUES (:name, :username, :email, :password, :type, :location, :status, :phone)";
        $stmt = $db->prepare($sql);

        // bind parameter ke query
        $params = array(
            ":name" => $name,
            ":username" => $username,
            ":password" => $password,
            ":type" => $type,
            ":email" => $email,
            ":location" => $location,
            ":status" => $status,
            ":phone" => $phone
        );
        
        // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);

        // jika query simpan berhasil, maka user sudah terdaftar
        // maka alihkan ke halaman login
        if($saved) header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body style="background-color: #d3fff9">

<div class="container mt-5">
        
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="img/logo.png" alt="" width="200" height="">
            <h2>Form Pendaftaran</h2>
            <p class="lead">Form di bawah ini merupakan data diri anda, data ini akan digunakan untuk kepentingan anda dalam menggunakan jasa dari web kami, atas pengertiannya kami ucapkan terimakasih.</p>
            <p>&larr; <a href="index.php">Home</a>
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </div>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" placeholder="Nama kamu" />
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" name="username" placeholder="Username" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" placeholder="Password" />
            </div>

            <div class="form-group">
                <label for="phone">Nomor HP</label>
                <input class="form-control" type="phone" name="phone" placeholder="+62 800-0000-0000" />
            </div>
			
			<div class="form-group">
                <label for="type">Mendaftar Sebagai:</label>
                <label class="radio-inline"><input type="radio" value="TR" name="type" checked>Tourist</label>
				<label class="radio-inline"><input type="radio" value="TG" name="type">Tour Guide</label>
            </div>

            <div class="form-group">
                <p>Jika anda adalah Tour Guide, dimana lokasi anda?</p>
                <label for="location">Lokasi</label>
                <select name="location" size="1">
                    <option value="bogor">Bogor</option>
                    <option value="jakarta">Jakarta</option>
                    <option value="bandung">Bandung</option>
                    <option value="lampung">Lampung</option>
                </select>
            </div>

            <input class="form-control" type="status" name="status" value="available" hidden />

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>
    </div>
</div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019 TOGE</p>
  </footer>

</body>
</html>
