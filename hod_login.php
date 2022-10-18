
<?php
require_once "config.php";
// mysql_select_db();
session_name("hod");
session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: hod_access2.php");
    exit;
    }
if (isset($_POST['submit'])){
    $uname=$_POST['uname'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $query="select * from staff where staff_name='$uname' and password='$password' and role='$role'" ;
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1 && $role=="hod"){
            echo "You have sucessfully logged in";
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["role"] = $role;
            $_SESSION["username"] = $uname; 
            header("location: hod_access2.php");
            echo $role;
            exit();
    }
    else{
        echo "You've entered wrong credentials ";
        echo $role;
        echo ".Please enter correct credentials";
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin login</title>
<link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div style="text-align:center">
<form action="#" method="post">
    <table align='center' style="font-weight:bold;">  
        <tr>
            <td><h1 style='text-align:center'>Hod login</h1></td>
        </tr>
        <tr>
            <td align='right'>
            <label for="role_staff">Role:</label>
            <input type='text' name="role" id="role_staff" required></td>
        </tr>
        <tr>
            <td align='right'>
            <label for="login_staff">name:</label>
            <input type='text' name="uname" id="login_staff" required></td>
        </tr>
        <tr>
            <td>
            <label for="password_staff">Password:</label>
            <input type='password' name="password" id="password_staff" required></td>
        </tr>
        <tr>
            <td align='center'><br>
            <input type="submit" id="submit" value="submit" name="submit" style="display:none;">
                <label for="submit"><img src="login1.jpg" alt="submit" width="80" height="30"></label>
            </td>
        </tr>
    </table>
</form>
</div>
</body>