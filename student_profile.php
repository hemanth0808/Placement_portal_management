<?php
    require_once 'config.php';
    session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: student_login.php");
    exit;
}
    $regdno = $_SESSION["num"];


    //$regdno = $_GET['num'];   
    $sql = "select * from student where regdno ='$regdno'";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
    if ($result->num_rows > 0) {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>student profile</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div id='student'>   

<p style="text-align:right;">
<a href="student_reset_password.php" class="button"><img src="resetpassword.jpg" alt="resetpassword" width="20" height="20"></a>
    <a href="student_logout.php" class="button" align='right'><img src="signout.jpg" alt="signout" width="20" height="20"></a>
    </p>
<h1 align="center">STUDENTS DETAILS</h1><br><br>
<table border='0' cellspacing="0" align="center" style="background: color #757575;font-size: 15px;">    
            <?php
            if(!empty($row))
            foreach($row as $rows)
            { 
            ?>
            <tr><td align="right"><b>Regdno :</b></td>
                <td><?php echo $rows['regdno'];
                $n=$rows['regdno'];
                $sql1="select * from marks where regdno='$n'";
                $result1 = ($conn->query($sql1));
                $row1 = [];
                if ($result->num_rows > 0) {
                // fetch all data from db into array 
                $row1 = $result->fetch_all(MYSQLI_ASSOC);  
                }     
                while($rows1=$result1->fetch_assoc()){
                ?></td>
                <td>&emsp;</td>
                <td align="right"><b>Backlogs :<b></td>
                <td><?php echo $rows1['backlogs']; ?></td></tr>
            <tr><td align="right"><b>Name :<b></td>
                <td><?php echo $rows['name']; ?></td>
                <td></td>
                <td align="right"><b>CGPA :<b></td>
                <td><?php echo $rows1['cgpa']; ?></td></tr>
            <tr><td align="right"><b>Contact :<b></td>
                <td><?php echo $rows['contact'] ?></td></tr>
            <tr><td align="right"><b>Email :<b></td>
                <td><?php echo $rows['email'] ?></td></tr>
            <tr><td align="right"><b>D.O.B :<b></td>
                <td><?php echo $rows['dob'] ?></td>
                <?php } ?>
            </tr>
            <tr><td><br><br><br></td>
            <td><h1>upload placement </h1></td>
            <td><h1>&ensp;details</h1></td></tr>
            <tr><td></td><td><a href="update_placement.php" class="button"><img src="upload.jpg" alt="upload" width="100" height="100"></td>
            
                </tr>
            <?php } ?>
    </table><br><br>
    
    </div>
</body>
</html>

<?php   
    mysqli_close($conn);
?>