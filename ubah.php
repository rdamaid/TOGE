<?php

require("config.php");

	$db = NEW MySQLi("localhost", "root", "", "toge");

	$id=$_GET["id"];

	$resultSet = $db->query("SELECT * FROM `user_t` WHERE `id` LIKE '$id'");
	$rows = $resultSet->fetch_assoc()

;
if(isset($_POST['edit'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    // enkripsi password
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	// pilih type, lokasi, dan status
    $status = $_POST['status'];	
    $phone = $_POST['phone'];


    // menyiapkan query
    $sql = "UPDATE `user_t` SET `email` = ':email', `name` = ':name', `status` = ':status', `phone` = ':phone' WHERE `user_t`.`id` = $id ";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":name" => $name,
        ":email" => $email,
        ":status" => $status,
        ":phone" => $phone
    );
    
    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
     
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
    <title>Edit</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body style="background-image: url(img/weather.png);>

<div class="container mt-5">
        
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">

        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="img/logo.png" alt="" width="200" height="">
            <h2>Ubah Data</h2>
            <p class="lead">Form di bawah ini merupakan data diri anda, data ini akan digunakan untuk kepentingan anda dalam menggunakan jasa dari web kami, atas pengertiannya kami ucapkan terimakasih.</p>
        </div>

        <form action="" method="POST">

            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input class="form-control" type="text" name="name" placeholder="Nama kamu" value="<?php echo $rows['name']?>" />
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" value="<?php echo $rows['email']?>" />
            </div

            <div class="form-group">
                <label for="phone">Nomor HP</label>
                <input class="form-control" type="phone" name="phone" placeholder="+62 800-0000-0000" value="<?php echo $rows['phone']?>" />
            </div>
			
			<div class="form-group">
                <label for="type">Mendaftar Sebagai:</label>
                <label class="radio-inline"><input type="radio" value="Available" <?php $rows['status'] == 'Avaible' ? print "selected" : "" ?> name="status">Avaible</label>
				<label class="radio-inline"><input type="radio" value="not Available" <?php $rows['status'] == 'not Avaible' ? print "selected" : "" ?> name="status">not Avaible</label>
            </div>

            <input type="submit" class="btn btn-success btn-block" name="edit" value="Daftar" />

        </form>
            
        </div>
    </div>
</div>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019 TOGE</p>
  </footer>

</body>
</html>