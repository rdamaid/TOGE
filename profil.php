<?php 
	$db = NEW MySQLi("localhost", "root", "", "toge");

	$id=$_GET["id"];

	$resultSet = $db->query("SELECT * FROM `user_t` WHERE `id` LIKE '$id'");
	$rows = $resultSet->fetch_assoc()


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>profil</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/profil.css">

</head>
<body style="background-image: url(img/weather.png);" >

	<nav class="navbar navbar-light navbar-expand-lg bg-light">
		<div class="container box_1620">
			<a class="navbar-brand" href="timeline2.php">
	    		<img src="img/toge-aja.png" width="100">
	  			</a>
	 			 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      		<span class="navbar-toggler-icon"></span></button>

	   		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      	<li class="nav-item active">
			          <a class="nav-link" href="#"><img src="img/<?php echo  $rows["photo"]; ?>" class="img img-responsive rounded-circle" width="40"><span class="sr-only">(current)</span></a>
			    	</li>
			    	<li class="nav-item active">
			          <a class="nav-link" href="#" ><?php echo  $rows["name"]; ?></a>
			        </li>
			        <li class="nav-item active">
			          <a class="nav-link" href="timeline2.php">HOME</a>
			        </li>
			        <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lainnya</a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			        	<a class="dropdown-item" href="#">about</a>
			          	<a class="dropdown-item" href="logout.php">logout</a>
			        </div>
			      	</li>
			    </ul>
	    	</div>
		</div>
	</nav>

	<!--Jumbotron-->
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<img src="img/<?php echo  $rows["photo"]; ?>" width="25%" class="rounded-circle my-3 img-thumbnail">
			<h1><?php echo  $rows["name"]; ?></h1>
			<p><?php echo $rows["scoreN"]; ?></p>
		</div>

		<div class="container text-center">
			<h4><img src="https://banner2.kisspng.com/20180806/evy/kisspng-computer-icons-clip-art-telephone-symbol-iphone-wire-circle-svg-png-icon-free-download-489035-5b68d471f214a9.9576881915335967859916.jpg" width="30" height="30"> 
			<?php echo $rows['phone']; ?></h4>
			<h4><img src="https://cdn2.iconfinder.com/data/icons/seo-and-marketing-line-2/24/43-512.png" width="30" height="30"> 
			 <?php echo $rows['email']; ?></h4>
		</div>
	</div>
	<!--Jumbotron-->

	<div class="container">
	  <div class="row">
	    <div class="col">
	    	<p>Bila anda ingin mengubah status anda dari "Avaible" menjadi "not Avaible" atau sebaliknnya, anda hanya cukup menekan tombol dibawah ini</p>
	    	<form method="POST" action="">
	    		<button class="btn-primary btn-lg" type="submit" name="submit">Ubah Status</button>
	    	</form>
	    </div>
	    <div class="col">
	      	<p>Bila ingin mengubah informasi data diri anda, anda dapat menekan Ubah Data tombol dibawah</p>
			<a href="ubah.php?id=<?php echo $rows['id']?>" class="btn-primary btn-lg ">Ubah Data</a>
	    </div>
	</div>



<footer class="footer mt-5 pb-4">
<div class="footer">
<div class="container text-center pt-3 mb-3">
<footer class="container">
	<h5> Join Us On</h5>
	<ul class='list-inline'>
		<li class="list-inline-item"><a href="https://www.facebook.com/bayyinahinst/" ><img src="https://cdn.techgyd.com/50-Best-Facebook-Logo-Icons-GIF-Transparent-PNG-Images-33.png" width="50"></a></li>
		<li class="list-inline-item"><a href="https://www.instagram.com/ilmfeed/" ><img src="https://cdn4.iconfinder.com/data/icons/picons-social/57/38-instagram-3-512.png" width="50"></a></li>
		<li class="list-inline-item"><a href="https://twitter.com/YaqeenInstitute" ><img src="https://s3.amazonaws.com/peoplepng/wp-content/uploads/2018/06/27151135/twitter-icon-png-black.png" width="47"></a></li>
		<input type="submit" class="button" name="insert" value="insert" hidden />
		<li class="list-inline-item"><button class="btn btn-lg btn-default btn-block" type="submit" value="WA" name="WA"><img src="https://image.flaticon.com/icons/png/512/33/33447.png" width="47"></button></li>
		
		<?php

		?>
	</ul>
		<p class="mb-1">&copy; 2019 TOGE</p>
</footer>




</body>
</html>
