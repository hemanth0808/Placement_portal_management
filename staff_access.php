<?php
session_name("staff");
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: staff_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin portal</title>
	<link type="text/css" rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div id='staff'>
    
    <table align='right'><tr>
        <td>
    <a href="staff_reset_password.php" class="button"><img src="resetpassword.jpg" alt="resetpassword" width="20" height="20"></a>
</td><td >
    <a href="staff_logout.php" class="button"><img src="signout.jpg" alt="signout" width="20" height="20"></a>
</td></tr></table><br><br>
    <form action="student_details.php" method="post" enctype="multipart/form-data">
    
		
    <table align='center'>
        <tr><td style="text-align:right;"><h1>DATA FILE</h1></td>
        <td><h1>UPLOADING</h1></td></tr>
        <tr><td style="text-align:left;"><a href="updatedata.php" class="button"><img src="update.jpg" alt="update" width="200" height="200"></a></td>
        <td style="text-align:left;"><a href="insertdata.php" class="button"><img src="insert.jpg" alt="insert" width="200" height="200"></a></td></tr>
    <tr><td><h2 style="text-align:right;">Choose the</h2></td> 
            <td><h2 style="text-align:left;">selection criteria</h2></td></tr>
         <tr>
            <td align='right'>
                <label for="company">CompanyName:</label></td>
            <td><input type="text" name="company" id="company" placeholder="Infosys" required></td>
        </tr>
		
        <tr>
            <td align='right'>
                <label for="backlogs">no of backlogs:</label></td>
            <td><input type="number" name="backlogs" id="backlogs" min="0" max="5" placeholder="0" required></td>
        </tr>
		<tr><td align='right'>or</td></tr>
		<tr>
			<td align='right'>
                <label for="cgpa">cgpa:</label></td>
			<td><input type="number" name="cgpa" id="cgpa" step="0.01" min=4 max=10 placeholder="10.00" required></td>
		</tr>
		<tr>
		<td><br></td>
		</tr>
        <tr>
            <td align='right' >
                <!--<input type="submit" value="VIEW DETAILS" class='button'-->   
                <input type="submit" id="submit" value="submit" name="submit" style="display:none;">
                <label for="submit"><img src="viewdetails.jpg" alt="submit" width="100" height="30"></label>
			</td>
			<td>
            <input type="reset" id="reset" style="display:none;">
                <label for="reset"><img src="reset1.jpg" alt="reset" width="80" height="30"></label>
			</td>
        </tr>
    </table>
</form>
</div>
</body>
</html>