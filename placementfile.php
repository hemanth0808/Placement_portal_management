<?php
include 'config.php';
    // mysql_select_db();
    session_name("staff");
    session_start();
  
 // Check if the user is logged in, otherwise redirect to login page
 if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
     header("location: staff_login.php");
     exit;
 }
 $regdno=$_POST['id1'];
 //$regdno = $_GET['num'];   
 $sql = "select * from package where id ='$regdno'";
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
    <a href="staff_logout.php" class="button" align='right'><img src="signout.jpg" alt="signout" width="20" height="20"></a>
    </p>
<h1 align="center">STUDENTS DETAILS</h1><br>
<table border='0' cellspacing="0" align="center" style="background: color #757575;font-size: 15px;">    
            <?php
            if(!empty($row))
            foreach($row as $rows)
            { 
                echo $rows['file'];
            ?>
            <tr>
                <?php 
                echo "<td rowspan='6'>" . "<a href=".$rows['file'].' width=100px height="100px">getfile</a>' . "</td>";?></tr>
            <?php } ?>
    </table><br><br>
    
    </div>
</body>
</html>

<?php   
    mysqli_close($conn);
?>