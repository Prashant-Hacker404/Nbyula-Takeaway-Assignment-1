<?php

session_start();
if( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: ./login.php");
    exit();
}else{
    $username = $_SESSION['username'];

include('./assets/db_connect.php');

$checkNewUser = "SELECT * from `users` WHERE `username`='$username'";

$resCheck = mysqli_query($conn,$checkNewUser);

while($row = mysqli_fetch_assoc($resCheck)){
    if($row['checkNewUser'] == 0){
        header("location: ./addDetails.php");
        echo 'this is bug'; 
    }else{
        echo 'hello';
    }
}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TerraFormers Home page</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<?php
    

?>

<body>

    <nav>
        <ul>
            <li><a href="#" id="home">Home</a></li>
            <li><a href="#" id="about">About</a></li>
            <li><a href="#" id="myprofile">My Profile</a></li>
            <li><a href="./assets/logout.php">Logout</a></li>
        </ul>
    </nav>


    <div class="mainContent active">

        <div class="heading">
            <p class="mainheading">Scheduling Meeting</p>
            <p class="info">Platform where one can schedule meeting with others track their avability and off hours to
                schedule
                appoinment easily</p>
        </div>

        <div class="addBox" id="addBox">
            <p id=" schedulebtn">
                <ion-icon id="plusIcon" name="add-outline"></ion-icon>
                Schedule a Metting
            </p>
        </div>

    </div>

    <div class="about">
        <div class="box">
            <h1>Schedule Meeting App Terraformer</h1>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit magni perspiciatis officiis non
                voluptatibus doloremque. Ullam illum quas et esse eligendi sunt beatae rerum vel labore laborum aliquid
                perferendis commodi, quo at dicta vitae magni.
            </p>
        </div>
    </div>


    <div class="profilePage">
        <h1>This is profile page </h1>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./js/script.js"></script>
</body>

</html>