<?php
if (isset($_POST["submit"])) {
    include_once ("../dbconnect.php");
    $contact = $_POST["contact"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $deposit = $_POST["deposit"];
    $state = $_POST["state"];
    $area = $_POST["area"];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $sqlinsert = "INSERT INTO tbl_room (`contact`, `title`, `description`, `price`, `deposit`, `state`, `area`, `latitude`, `longitude`) 
    VALUES('$contact', '$title', '$description', '$price', '$deposit', '$state', '$area', '$latitude', '$longitude')";

     try {
        $conn->exec($sqlinsert);
        if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])) {
        uploadImage($title);
        }
        echo "<script>alert('Registration Successful')</script>";
        echo "<script>window.location.replace('mainpage.php')</script>";
    } catch (PDOException $e) {
        echo "<script>alert('Registration Failed')</script>";
        echo "<script> window.location.replace('newroom.php')</script>";

    }
}
function uploadImage($title) {
    $target_dir = "../res/images/";
    $target_file = $target_dir . $title . ".png";
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <script src="https://kit.fontawesome.com/1dd357b823.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <script src="../javascript/script.js"></script>

    <title>New Customer</title>
    </head>

    <body>
           
            <div class="w3-header w3-container w3-teal w3-padding-16 w3-center">
                <h1 style="font-size: calc(8px +4vw);"> RENT A ROOM</h1>
                <p style="font-size: calc(8px + 1vw);">We provide a comfortable room</p>
            </div>
 
    <div class="navbar">
        <a href="mainpage.php"><i class="fa fa-fw fa-home"></i> Home</a> 
    </div>

   

    <div class="w3-container w3-padding-64 form-container-reg">
        <div class="w3-card">
            <div class="w3-container w3-teal">
                <p> New Room</p>
            </div>
            <form class="w3-container w3-padding" name="registerForm" action="newroom.php" method="POST" enctype="multipart/form-data" onsubmit="return confirmDialog()">
                <div class="w3-container w3-border w3-center w3-padding">
                    <img class="w3-image w3-round w3-margin" src="../res/images/rent4room.png" style="width: 100%; max-width: 600px;"><br>
                    <input type="file" onchange="previewFile()" name="fileToUpload" id="fileToUpload"><br>
                </div>
                
                
                <p>
                    <i class="fa fa-phone icon"></i>
                    <label>Contact</label>
                    <input class="w3-input w3-border w3-round" name="contact" id="idcontact" type="text" required>
                </p>

                <p>
                    <i class="fa fa-info icon"></i>
                    <label>Title</label>
                    <input class="w3-input w3-border w3-round" name="title" id="idtitle" type="text" required>
                </p>
                <p>
                    <i class="fas fa-house-user icon"></i>
                    <label>Description</label>
                    <textarea class="w3-input w3-border" id="iddescription" name="description" rows="4" cols="50" width="100%" placeholder="Description of the room" required></textarea>
                </p>

                <p>
                    <i class="fa fa-dollar icon"></i>
                    <label>Price</label>
                    <input class="w3-input w3-border w3-round" name="price" id="idprice" type="text" required>
                </p>
                <p>
                    <i class="fas fa-hand-holding-usd icon"></i>
                    <label>Deposit</label>
                    <input class="w3-input w3-border w3-round" name="deposit" id="iddeposit" type="text" required>
                </p>
                <p>
                   <i class="fas fa-map-marker-alt icon"></i>
                   <label>State</label>
                    <input class="w3-input w3-border w3-round" name="state" id="idstate" type="text" required>
                </p>

                <p>
                    <i class="fas fa-map-marker icon"></i>
                    <label>Area</label>
                    <input class="w3-input w3-border w3-round" name="area" id="idarea" type="text" required>
                </p>


                <p>
                    <i class="fa fa-location-arrow icon"></i>
                    <label>Latitude</label>
                    <input class="w3-input w3-border w3-round" name="latitude" id="idlatitude" type="text" required>
                </p>

                <p>
                    <i class="fa fa-location-arrow icon"></i>
                    <label>Longitude</label>
                    <input class="w3-input w3-border w3-round" name="longitude" id="idlongitude" type="text" required>
                </p>

                <div class="row">
                    <input class="w3-input w3-border w3-block w3-teal w3-round" type="submit" name="submit" value="Submit">
                </div>

            </form>
        </div>
    </div>

    <footer class="w3-footer w3-teal w3-center">
    <p>Designed by <br><a class="text-black">| Rent A Room |</a></p>
</footer>

    </body>
</html>