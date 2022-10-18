<?php
   include 'config.php';
   session_name("hod");
   session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: hod_login.php");
    exit;
}
 
   
    $regdno=$_SESSION['r'];
    $sql = "select * from package where regdno='$regdno'";
    $result = ($conn->query($sql));
    //declare array to store the data of database
    $row = []; 
  
    if ($result->num_rows > 0) 
    {
        // fetch all data from db into array 
        $row = $result->fetch_all(MYSQLI_ASSOC);  
    }   
?>
  
<!DOCTYPE html>
<html>
    <head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
<style>
    .tab {
        border: 1px solid black;
        padding: 10px;
        margin: 5px;
        text-align: center;
    }
</style>
</head>
  
<body style="background: color #959595;">
<p style="text-align:right;">
    <a href="staff_logout.php" class="button" align='right'><img src="signout.jpg" alt="signout" width="20" height="20"></a>
    </p>
    <table border='3' cellspacing="0" align="center" style="background: color #757575;">
        <thead class="tab">
            <tr>
                <th>OfferId</th>
                <th>Company Name</th>
                <th>Package</th>
                <th>Offerletter</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($row))
            foreach($row as $rows)
            { 
            ?>
            <tr>
                <td><?php echo $rows['id'];?></td>
                <td><?php echo $rows['companyname']; ?></td>
                <td><?php echo $rows['package']; ?></td>
                <td><?php echo $rows['file']; ?></td>
                <?php 
                echo "<td>" . "<a href=" .'"uploaded_files/' . $rows['file'].'"'.' width=100px height="100px" style="text-decoration:none;color:black;"  target="_blank"><img src="getfile.jpg" alt="getfile" width="20" height="20"></a>' . "</td>";?>
  
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <!--<form method="post" action="placementfile.php" >
        <table align="center">
            <tr><td><br><br><br></td></tr>
            <tr><td style="text-align:right;"><label for="id1">Offer ID:</label></td>
            <td><input type="number" name="id1" id="id1"></td></tr>
            <tr><td style="text-align:right;"><input type="reset" id="reset" >
                <img src="reset1.jpg" alt="reset" width="200" height="200"></td>
            <td><input type="submit" value="GetFile" class="button"></td></tr>
        </table>
    </form>-->
</body>
</html>
  
<?php   
    mysqli_close($conn);
?>