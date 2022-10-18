<?php
   include 'config.php';
   session_name("staff");
   session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: staff_login.php");
    exit;
}
 
   
    $backlog=$_POST['backlogs'];
    $cgpa=$_POST['cgpa'];    
    $company=$_POST['company'];
    $sql = "select * from marks where cgpa >= '$cgpa' and backlogs <='$backlog'";
    $query = "INSERT into company(companyname) values('$company')";
    $_SESSION["cgpa"] = $cgpa;
    $_SESSION["backlog"] = $backlog;
    $_SESSION["company"]=$company;
    $result = ($conn->query($sql));
    $query2="select * from company where companyname='$company'";
    $result2 = ($conn->query($query2));
    $count=0;
    if($result2->num_rows >0){
        $count+=1;
    }
    else{
        $result3=($conn->query($query));
    }

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
    td,th {
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
        <thead>
            <tr>
                <th>Company</th>
                <th>Regdno</th>
                <th>Name</th>
                <th>Contact</th>
                <th>Email</th>
                <th>D.O.B</th>
                <th>backlogs</th>
                <th>cgpa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($row))
            foreach($row as $rows)
            { 
            ?>
            <tr>
                <td><?php echo $company; ?></td>
                <td><?php echo $rows['regdno'];
                $n=$rows['regdno'];
                $sql1="select * from student where regdno='$n'";
                $result1 = ($conn->query($sql1));
                $row1 = [];
                if ($result->num_rows > 0) 
                {
                // fetch all data from db into array 
                $row1 = $result->fetch_all(MYSQLI_ASSOC);  
                }     
                while($rows1=$result1->fetch_assoc())
                {
                ?></td>
                
                <td><?php echo $rows1['name']; ?></td>
                <td><?php echo $rows1['contact'] ?></td>
                <td><?php echo $rows1['email'] ?></td>
                <td><?php echo $rows1['dob'] ?></td>
                <?php } ?>
                <td><?php echo $rows['backlogs']; ?></td>
                <td><?php echo $rows['cgpa']; ?></td>
  
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <p style="text-align:center;"><a href="generatefile.php" class="button"><img src="download.jpg" alt="download" width="200" height="200"></a></p>
</body>
</html>
  
<?php   
    mysqli_close($conn);
?>