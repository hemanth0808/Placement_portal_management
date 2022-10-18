<link type="text/css" rel="stylesheet" href="stylesheet.css">
<?php 
include 'config.php';
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: student_login.php");
    exit;
}
 

     #retrieve file title
        $title = $_POST["title"]; 
        $id = $_POST["id"];
        $pac = $_POST["pac"];
        $regdno=$_SESSION["num"];
    #file name with a random number so that similar dont get replaced
     $pname = rand(1000,10000)."-".$_FILES["file"]["name"];
    #temporary file name to store file
    $tname = $_FILES["file"]["tmp_name"];
    //$pname="uploaded_files/".$pname;
     #upload directory path
    #TO move the uploaded file to specific location
    move_uploaded_file($tname, "uploaded_files/".$pname);
    #sql query to insert into database
    $sql = "INSERT into package(regdno,id,companyname,package,file) VALUES('$regdno','$id','$title','$pac','$pname')";
    if(mysqli_query($conn,$sql)){
    echo "File Sucessfully uploaded";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    ?>
    <a href="update_placement.php" class="button">Back</a>
    <?php
    }
    else{
        echo "Error";
    }
    ?>
   

