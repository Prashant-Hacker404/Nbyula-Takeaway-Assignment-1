<?php
  include("./assets/db_connect.php");
?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['u_email'];
    $username = $_POST['u_name'];
    $password = $_POST['u_pass'];
    $error = false;
    $message = "";

    
    include("./assets/showAlert.php");

    if($email == "" || $password == "" || $username == "" ){
        $error = true;
        $message = "Please fill all the details in all columns according";
        showAlert($error,$message);
    }
    else{
        $uppercase = preg_match('@[A-Z]@',$password);
        $lowercase = preg_match('@[a-z]@',$password);
        $check_number = preg_match('@[0-9]@',$password);
        $specialChar = preg_match('@[^\w]@',$password);

        if(!$uppercase || !$lowercase || !$check_number || !$specialChar || strlen($password) < 8){
            $error = true;
            $message = "Passowrd should be at least 8 charecter in length and should include ar least one uppercase letter, one lowercase letter and one special charecter";
            showAlert($error,$message);
        }
        else{
            
        $checkusername_match = false;
        $usernamecheck = "SELECT * FROM users";
        $resusercheck  = mysqli_query($conn,$usernamecheck);
        $numcheck = mysqli_num_rows($resusercheck);

        if($numcheck > 0){
            while( $rows = mysqli_fetch_assoc($resusercheck)){
                 if($username  == $rows['username']){
                    $checkusername_match = true; 
                 }
            }
        }


        if($checkusername_match == false){
            
            $hash = password_hash($password,PASSWORD_DEFAULT);
            
            $inssql = "INSERT INTO `users`(`username`,`password`,`email`) VALUES ('$username','$hash','$email')";

            $resins = mysqli_query($conn,$inssql);
            
            if(!$resins){
                $error = true;
                $message = "Sorry failed to enter the data due to network or server issue please try after some time.";
                showAlert($error,$message);
            }else{

                $error = false;
                $message = "Your Account Is Successfully Created";
                showAlert($error,$message);
            }
            
        }
        else{
            $error = true;
            $message = "Username alredy exist please enter a unique unsername";
            showAlert($error,$message);
        }
        
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
    <title>SignUp Page - Terraformers</title>

    <link rel="stylesheet" href="./css/signup.css" />
</head>

<body>
    <div class="container">
        <div class="formContent">
            <div class="heading">
                <p>
                    <span>Create </span>A New Account
                </p>
            </div>
            <form action="./signup.php" method="post">
                <input type="email" name="u_email" id="u_email" placeholder="Email" />

                <input type="text" name="u_name" id="u_name" placeholder="Username" />


                <input type="password" name="u_pass" id="u_pass" placeholder="Password" />
                <button type="submit">Sign Up</button>
            </form>
            <div class="signup">
                <p>
                    Already have an account ?<a href="./login.php"> <span> Log In </span></a>
                </p>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>

    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="./js/script.js"></script>
</body>

</html>