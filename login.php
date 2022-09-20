<?php
  include("./assets/db_connect.php");
?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['u_user'];
    $password = $_POST['u_pass'];
    $error = false;
    $message = "";


    include("./assets/showAlert.php");

    if($username == "" || $password == ""){
    $error = true;
    $message = "Please fill all the details in all columns according";
    showAlert($error,$message);
    }
    else{
        $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);

        if($num == 1){

            while($row = mysqli_fetch_assoc($result)){

                if(password_verify($password,$row['password'])){
    
                    // no error got so showing successful login
                    $error  = false;
                    $message ="You have successfully logged in";
                    showAlert($error,$message);

                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;

                    header("location: ./main.php");
                    
                }
                else{
                    $error = true;
                    $message = "Invalid Password Entered Please Re-Enter Correct Passowrd.";
                    showAlert($error,$message);
                }
            }
    
            
            
        }else{
            $error = true;
            $message = "There Is No Account Created With This Username. Invalid Username.";
            showAlert($error,$message);
        }
        
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page - Terraformers</title>

    <link rel="stylesheet" href="./css/login.css" />
</head>

<body>
    <div class="container">
        <div class="formContent">
            <div class="heading">
                <p>Login To Your <span> Account </span></p>
            </div>
            <form action="./login.php" method="post">
                <input type="text" name="u_user" id="u_user" placeholder="Username" />
                <input type="password" name="u_pass" id="u_pass" placeholder="Password" />
                <button type="submit">login</button>
            </form>
            <div class="signup">
                <p>
                    Don't have an account ?<a href="./signup.php"> <span> Create One </span></a>
                </p>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./js/script.js"></script>
</body>

</html>