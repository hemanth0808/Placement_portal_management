<?php
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: student_login.php");
    exit;
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
<a href="student_logout.php" class="button" align='right'><img src="signout.jpg" alt="signout" width="20" height="20"></a>
</p>
<form action="upload.php" method='post' enctype="multipart/form-data">    
    <h2 align="center"> PLACEMENT UPDATION</h2>
    <table align='center'>
		<tr>
			<td></td>
			<td align='right'>OfferLetterID:</td>
			<td><input type="number" name='id' placeholder="252x..xx" required></td>
		</tr>
		<tr>
			<td></td>
			<td align='right'>Company Name:</td>
			<td><input type="text" name='title' placeholder="Infosys" required></td>
		</tr>
		<tr>
			<td></td>
			<td align='right'>Package(In LPA):</td>
			<td><input type="number" name='pac' step="0.01" min=0 max=99 placeholder="10" required></td>
		</tr>
		<tr>
			<td></td>
			<td align='right'>OfferLetter:</td>
			<td><input type="file" name='file' placeholder="offerletter.pdf" required></td>
		</tr>
		<tr><td><br><br></td></tr>
        <tr>
			<td></td>
            <td align='right'><input type="submit" id="submit" value="submit" name="submit" style="display:none;">
                <label for="submit"><img src="upload1.jpg" alt="submit" width="80" height="40"></label></td>	
			<td><input type="reset" id="reset" style="display:none;">
                <label for="reset"><img src="reset1.jpg" alt="reset" width="80" height="30"></label></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>