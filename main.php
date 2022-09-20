<?php

session_start();
if( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
    header("location: ./login.php");
    exit();
}
$username = $_SESSION['username'];

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
    <!-- <div class="navbar">
        <ul>
            <li>Home</li>
            <li>Update Profile</li>
            <li><a href=" ./assets/logout.php">Logout</a></li>
        </ul>
    </div> -->

    <div class="navbar">
        <ion-icon name="apps-outline"></ion-icon>
    </div>


    <div class="mainNavbar">
        <ion-icon name="person-outline"></ion-icon>
        <div class="tab">
            <div class="username">
                <?php
            echo "<p>$username</p>";
            ?>
            </div>
        </div>

        <div class="nav">
            <div class="tab">
                <a href="update.php">My Details</a>
            </div>
            <div class="tab">
                <a href="update.php">Update Profile</a>
            </div>
            <div class="tab">
                <a href="./assets/logout.php" id="logout">Logout</a>
            </div>
        </div>
    </div>

    <div class="heading">
        <p class="mainheading">Scheduling Meeting</p>
        <p class="info">Platform where one can schedule meeting with others track their avability and off hours to
            schedule
            appoinment easily</p>
    </div>

    <div class="addBox">
        <p>
            <ion-icon name="add-outline"></ion-icon>
            Schedule a Metting
        </p>
    </div>



    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./js/script.js"></script>
</body>

</html>