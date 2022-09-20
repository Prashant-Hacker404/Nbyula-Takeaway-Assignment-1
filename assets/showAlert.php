<?php
    
    function showAlert($error,$message){
        if($error){
            echo '<div class="error">
            <div class="errorBox">
                <h2>Error</h2>
                <p class="errorMessage">'.$message.'</p>
            </div>
        </div>';
        }else{
            echo '<div class="error">
            <div class="successBox">
                <h2>Success</h2>
                <p class="successMessage">'.$message.'</p>
            </div>
        </div>';
        }
    }

    
?>