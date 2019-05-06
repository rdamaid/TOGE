<?php 
    require_once("auth.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesbuk Timeline</title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">

            <div class="card">
                <div class="card-body text-center">

                    <img class="img img-responsive rounded-circle mb-3" width="160" src="img/<?php echo $_SESSION['user']['photo'] ?>" />
                    
                    <h3><?php echo  $_SESSION["user"]["name"] ?></h3>
                    <p><?php echo $_SESSION["user"]["email"] ?></p>
                    
                    <p><a href="logout.php">Logout</a></p>
                </div>
            </div>

            
        </div>


        <div class="col-md-8">

            <form action="" method="post" />
                <div class="form-group">
                    <input type="TEXT" name="search" placeholder="Cari tempat wisata di ... " />
                    <input type="SUBMIT" name="submit" value="Cari" />
                </div>
            </form>

            <form action="" method="post" />
                <div class="form-group">
                    <input type="TEXT" name="search" placeholder="Cari Tour Guide di ... " />
                    <input type="SUBMIT" name="submit2" value="Cari" />
                </div>
            </form>

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
                        $name = $rows['name'];
                        $location = $rows['location'];
                        $status = $rows['status'];
                        $phone = $rows['phone'];
                        if ($rows['scoreN']) {
                            $score = $rows['score'] / $rows['scoreN'];
                        }
                        $photo = $rows['photo']; ?>

                        <div class='card card-group'>
                            <div class='card-body'>
                                <img class="img img-responsive mb-6" width="200" src="img/<?php echo $photo ?>" />
                                <h5><?php echo  $name ?></h5>
                                <p>Nomor HP: <?php echo $phone ?></p>
                                <p>Lokasi: <?php echo $location ?></p>
                                <p>Status: <?php echo $status ?></p>
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

            

            <?php echo $output; ?>

            <?php 
            /*
            if (isset($_POST['submit'])) {

                $search = $_POST[]

                // Query the database
                $resultSet = $db->query("SELECT * FROM ")
            }
            */
            ?>
<!---
            <?php for($i=0; $i < 6; $i++){ ?>
            <div class="card mb-3">
                <div class="card-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis veritatis nemo ad recusandae labore nihil iure qui eum consequatur, officiis facere quis sunt tempora impedit ullam reprehenderit facilis ex amet!
                </div>
            </div>
            <?php } ?>
--->
        </div>
    
    </div>
</div>

</body>
</html>
