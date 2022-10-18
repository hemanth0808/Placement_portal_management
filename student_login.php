<?php
    require_once "config.php";
    // mysql_select_db();
    session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: student_profile.php");
    exit;
    }

    if (isset($_POST['submit'])){
        $uname=$_POST['uname'];
        $password=$_POST['password'];
        $regdno=$_POST['regdno'];
        $query="select * from student where regdno='$regdno' and name='$uname' and password='$password' ";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){   
            echo "You have sucessfully logged in";
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $uname; 
                if ($result->num_rows > 0) 
                {
                // fetch all data from db into array 
                $row1 = $result->fetch_assoc();  
                }     
                //while($rows1=$result->fetch_assoc())
                //{
                    $num=$row1['regdno']; 
                    $_SESSION["num"] = $num; 
                //}
                header("location: student_profile.php");
                exit(); 
            }
        else{
            
            echo "You entered wrong credentials ";
            echo $uname;
            exit();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>student login</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css">
	<style>
        
    </style>
</head>
<body>
<div style="text-align:center">
    <form action="#" method="post">
        <table align='center' style="font-weight:bold;">  
        <tr>
            <td><h1 style='text-align:center'> student login</h1></td>
        </tr>
        <tr>
            <td align='right'>
            <label for="student_regd">Regdno:</label>
            <input type='text' name="regdno" id="student_regd" required></td>
        </tr>
        <tr>
            <td align='right'>
            <label for="student_name">Name:</label>
            <input type='text' name="uname" id="student_name" required></td>
        </tr>
        <tr>
            <td>
            <label for="student_password">Password:</label>
            <input type='password' id="student_password" name="password" required></td>
        </tr>
        <tr>
            <td align='center'><br>
			<input type="submit" id="submit" value="submit" name="submit" style="display:none;">
                <label for="submit"><img src="login1.jpg" alt="submit" width="80" height="30"></label>
			</td>
        </tr>
        </table>
    </form>
</body>
</html