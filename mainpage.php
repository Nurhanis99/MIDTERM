<?php
include_once("../dbconnect.php");
$sqlroom = "SELECT * FROM tbl_room ORDER BY id DESC";
$stmt = $conn->prepare($sqlroom);
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$rows = $stmt->fetchAll();
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

    <title>Main Page</title>
    </head>

    <body>
    <div class="w3-header w3-container w3-teal w3-padding-16 w3-center">
               <h1 style="font-size: calc(30px +6vw);"> RENT A ROOM</h1>
                <p style="font-size: calc(8px + 1vw);">We provide a comfortable room</p>
    </div>

    <div class="navbar">
        <div id="idnavbar">
            <a href="newroom.php"><i class="fa fa-fw fa-user-plus"></i> New Room</a> 
        </div>
    </div>

    <div class="w3-grid-template">
<?php
foreach($rows as $room){
    $contact = $room['contact'];
    $title = $room['title'];
    $description = $room['description'];
    $price = $room['price'];
    $deposit = $room['deposit'];
    $state = $room['state'];
    $area = $room['area'];
    $dateCreated = $room['dateCreated'];
    $latitude = $room['latitude'];
    $longitude = $room['longitude'];
    echo "<div class='w3-center w3-padding'>";
    echo "<div class='w3-card-4 w3-pale-blue'>";
    echo "<header class='w3-container w3-teal'>";
    echo "<h5>$title</h5>";
    echo "</header>";
    echo "<img class='w3-image' src=../res/images/$title.png" .
    " onerror=this.onerror=null;this.src='../res/images/rent4room.png'" 
    . " style='width:100%;height:250px'>";
    echo "<div class='w3-container w3-left-align'><hr>";
    echo "
    <i class='fa fa-phone' style='font-size 16px;'></i> Contact: &nbsp&nbsp$contact<br>
    <i class='fas fa-house-user' style='font-size 16px;'></i> Description: &nbsp&nbsp$description<br>
    <i class='fa fa-dollar' style='font-size 16px;'></i> Price: &nbsp&nbsp$price<br>
    <i class='fas fa-hand-holding-usd' style='font-size 16px;'></i> Deposit: &nbsp&nbsp$deposit<br>
    <i class='fas fa-map-marker-alt' style='font-size 16px;'></i> State: &nbsp&nbsp$state<br>
    <i class='fas fa-map-marker' style='font-size 16px;'></i> Area: &nbsp&nbsp$area<br>
    <i class='fas fa-calendar-alt' style='font-size 16px;'></i> Date Created: &nbsp&nbsp$dateCreated<br>
    <i class='fa fa-location-arrow' style='font-size 16px;'></i> Latitude: &nbsp&nbsp$latitude<br>
    <i class='fa fa-location-arrow' style='font-size 16px;'></i> Longitude: &nbsp&nbsp$longitude<br></p><hr>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

}
?>
</div>

<footer class="w3-footer w3-teal w3-center">
    <p>Designed by <br><a class="text-black">| Rent A Room |</a></p>
</footer>

  
    </body>
</html>