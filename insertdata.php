
<?php  
require_once "config.php";
session_name("staff");
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: staff_login.php");
    exit;
}
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   $count=0;
   $count1=0;
   while($data = fgetcsv($handle))
   {
    
                $item1 = mysqli_real_escape_string($conn, $data[0]);  
                $item2 = mysqli_real_escape_string($conn, $data[1]);
                $item3 = mysqli_real_escape_string($conn, $data[2]);
                //SET FOREIGN_KEY_CHECKS = 0;
                $query = "INSERT into marks(regdno, cgpa, backlogs) values('$item1','$item2','$item3')";
                //$query = "UPDATE marks set cgpa='$item2',backlogs='$item3' WHERE regdno='$item1'";
                try{
                mysqli_query($conn, $query);
                }
                catch(Exception $php_errormsg){
                    $count=$count+1;
                    //echo "<br>Insertion error " .$count;
                    if($count==1){
                    echo "<script>alert('Some record are not inserted as student regdno is already present');</script>";
                    }else{
                        $count=2;
                    }
                }
                $count1=$count1+1;
                //SET FOREIGN_KEY_CHECKS = 1;
   }
   if($count==0){
   fclose($handle);
   //echo "Import is done";
   echo "<script>alert('All records are inserted');</script>";
   }
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Allocate_amount</title>
  <link type="text/css" rel="stylesheet" href="stylesheet.css">
 </head>  
 <body>  
 <table><tr>
        <td>
        <a href="staff_access.php" class="button"><img src="back.jpg" alt="back" width="40" height="40"></a>
</td></tr></table><br><br>
  <form method="post" enctype="multipart/form-data">
    <table align="center">
      <tr><td><br><br><br><br></td></tr>
      <tr><td align="right"><h1>Inserting </h1></td>
      <td><h1>data into database:</h1></td></tr>
      <tr><td>
    <label for="file">Select CSV File:</label></td><td>
    <input type="file" id="file" name="file" required><br></td></tr>
    <tr><td></td><td><br><br><input type="submit" id="submit" value="submit" name="submit" style="display:none;">
                <label for="submit"><img src="submit.jpg" alt="submit" width="80" height="30"></label></td></tr>
    </table>
  </form>
 </body>  
</html>