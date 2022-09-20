<?php
$servername = "localhost";
$username = "root";
$passowrd = "";
$database = "terraformer";

$conn = mysqli_connect($servername,$username,$passowrd,$database);


if(!$conn){
    header("Location: ./assets/handleError.php");
}
?>