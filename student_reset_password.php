
<?php
require_once "config.php";
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: student_login.php");
    exit;
}
 
// Include config file

 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    $num=$_SESSION["num"];
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE student SET password = '$new_password' WHERE regdno = '$num'";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            //   mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            //   $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            //   $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: student_login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    
</head>
<body>
    <div class="wrapper">
        <h2 align="center">Reset Password</h2>
        <h1 align="center">Please fill out this form to reset your password.</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <table align="center">
            <tr>
                <td align="right">
                <label for="pass">New Password</label>
                </td><td>
                <input type="password" id="pass" name="new_password" required class="form-control<?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo "<br>",$new_password_err; ?></span>
                <td>
            </tr>
            <tr><td align="right">
                <label for="cpass">Confirm Password</label></td><td>
                <input type="password" id="cpass" name="confirm_password" required class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo "<br>", $confirm_password_err; ?></span>
                </td></tr>
            <tr><td> 
            </td><td>
            <br><br> 
            <input type="submit" id="submit" value="submit" name="submit" style="display:none;">
                <label for="submit"><img src="reset1.jpg" alt="submit" width="80" height="30"></label>
                </td></tr>
            </form>
    </div>    
</body>
</html>