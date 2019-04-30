<?php 
    require_once("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu Utama</title>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main-menu.css"></head>
</head>
<body style="background-image: url(img/weather.png);">
<!--navbar-->
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
		          <a class="nav-link" href="#"><img src="img/default.svg" class="img img-responsive rounded-circle" width="40"><span class="sr-only">(current)</span></a>
		    	</li>
		    	<li class="nav-item active">
		          <a class="nav-link" href="profil.php?id=<?php echo  $_SESSION["user"]["id"] ?>" ><?php echo  $_SESSION["user"]["name"] ?></a>
		        </li>
		        <li class="nav-item active">
		          <a class="nav-link" href="#"><?php echo $_SESSION["user"]["email"] ?></a>
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

<!-- Carousel -->
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleControls" data-slide-to="1"></li>
      <li data-target="#carouselExampleControls" data-slide-to="2"></li>

    </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://cdn.anadventurousworld.com/wp-content/uploads/2016/11/IMG_6662.jpg" alt="slide1">
        </div>
        <div class="carousel-item">
            <img src="https://www.pedomanwisata.com/mdh.1429008877.jpg" class="d-block w-100" alt="slide2">
        </div>
        <div class="carousel-item">
            <img src="https://i1.wp.com/www.maioloo.com/maioloo/wp-content/uploads/2016/03/Candi-Prambanan-Yogyakarta-01.jpg.jpg?fit=1200%2C797&ssl=1" class="d-block w-100" alt="slide3">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
  </div>
<!-- Carousel -->

	
	<div class="container px-lg-5">
	<div class="row mx-lg-n5 justify-content-center">
            <form action="" method="post" />
                <div class="form-group">
                    <input type="TEXT" class="col py-3 px-lg-5 border bg-light"  name="search" placeholder="Cari tempat wisata di ... " />
                    <input type="SUBMIT" class="col py-3 px-lg-5 border bg-light" name="submit" value="Cari" />
                </div>
            </form>

            <form action="" method="post" />
                <div class="form-group">
                    <input type="TEXT" class="col py-3 px-lg-5 border bg-light" name="search" placeholder="Cari Tour Guide di ... " />
                    <input type="SUBMIT" class="col py-3 px-lg-5 border bg-light" name="submit2" value="Cari" />
                </div>
            </form>

    </div>
    </div>

    	<div class="container">
		<div class="row d-flex justify-content-around">
 <?php 
            // Connect to the database
            $db = NEW MySQLi("localhost", "root", "", "toge");
            $output = NULL;
            if (isset($_POST['submit'])) {
                $search = $_POST['search'];
                // Query the database
                $resultSet = $db->query("SELECT * FROM destination_t WHERE location = '$search'");
                if ($resultSet->num_rows > 0) {
                    while ($rows = $resultSet->fetch_assoc()) {
                        $name = $rows['name'];
                        $location = $rows['location'];
                        if ($rows['scoreN']) {
                            $score = $rows['score'] / $rows['scoreN'];
                        }
                        $image = $rows['image']; ?>

                        <div class='card mb-3'>
                            <div class='card-body'>

                                <img class="img img-responsive mb-3" width="680" src="img/<?php echo $image ?>" />
                    
                                <h5><?php echo  $name ?></h5>
                                <p>Lokasi: <?php echo $location ?></p>

                            </div>
                        </div>
                    <?php
                    }
                }
                else {
                    $output = "Tidak ada tempat wisata yang relevan.";
                }
            }
            if (isset($_POST['submit2'])) {
                $search = $_POST['search'];
                // Query the database
                $resultSet = $db->query("SELECT * FROM `user_t` WHERE `type` LIKE 'TG' AND `location` LIKE '$search' AND `status` LIKE 'available'");
                if ($resultSet->num_rows > 0) {
                    while ($rows = $resultSet->fetch_assoc()) {
 
                        if ($rows['scoreN']) {
                            $score = $rows['score'] / $rows['scoreN'];
                        }
                        $photo = $rows['photo']; ?>

                        <div class='card mb-3'>
                            <div class='card-body'>
                                <img class="rounded-circle mb-6" width="200" src="img/<?php echo $rows['photo'] ?>" />
                        
                                <h5><?php echo  $rows['name'] ?></h5>
                                <p>Nomor HP: <?php echo $rows['phone'] ?></p>
                                <p>Lokasi: <?php echo $rows['location'] ?></p>
                                <p>Status: <?php echo $rows['status'] ?></p>
                                <a href="profil.php?id=<?php echo $rows['id']?>" class="btn btn-primary btn-lg btn-block"> Profil</a>
                            </div>
                        </div>
                    <?php
                    }
                }
                else {
                    $output = "Tidak ada tempat wisata yang relevan.";
                }
            }
            ?>


    	</div>
    	</div>
<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2019 TOGE</p>
</footer>    




    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>
</html>