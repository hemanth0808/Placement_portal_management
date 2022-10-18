<?php
include 'config.php';
session_name("hod");
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: hod_login.php");
    exit;
}


	$sql = "SELECT * FROM company";
	$all_categories = mysqli_query($conn,$sql);

	// The following code checks if the submit button is clicked
	// and inserts the data in the database accordingly
	if(isset($_POST['submit']))
	{
		$regdno=$_POST['regdno'];	
		$_SESSION['r']=$regdno;
		header("location:  hod_studentDetails.php");
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
        <link type="text/css" rel="stylesheet" href="stylesheet.css">	
</head>
<body>
<p style="text-align:right;">
<a href="hod_reset_password.php" class="button"><img src="resetpassword.jpg" alt="resetpassword" width="20" height="20"></a>
    <a href="hod_logout.php" class="button" align='right'><img src="signout.jpg" alt="signout" width="20" height="20"></a>
    </p>
	<form method="POST" action="hodcompanylist.php">
        <table align="center">
			<h1 style="text-align:center;font-size:150%">List Of Eligible Student</h1>
		
		<tr><td align="center"><label>Select a Company</label></td>
        <td align="center"><label for="cgpa">CGPA</label></td>
        <td align='center'><label for="backlogs">no of backlogs</label></td>
        </tr>
        <tr>
		</tr>
        <tr>
        <td align="center"><select name="company" required>
			<option></option>
			<?php
				// use a while loop to fetch data
				// from the $all_categories variable
				// and individually display as an option
				while ($category = mysqli_fetch_array(
						$all_categories,MYSQLI_ASSOC)):;
			?>
				<option value="<?php echo $category["companyname"];
					// The value we usually set is the primary key
				?>">
					<?php echo $category["companyname"];
						// To show the category name to the user
					?>
				</option>
			<?php
				endwhile;
				// While loop must be terminated
			?>
		</select><br></td>
            <td align='center'><input type="number" name="cgpa" id="cgpa" step='0.01' min=4 max=10 required><br></td>
            <td align='center'><input type="number" name="backlogs" id="backlogs" min="0" max="5" required></td>
        </tr>
		<tr><td><br></td></tr>
		<tr><td align="right">
		<input type="submit" id="submit" value="submit" name="submit" style="display:none;">
                <label for="submit"><img src="submit.jpg" alt="submit" width="80" height="33"></label></td>
		
        <td>
		<input type="reset" id="reset" style="display:none;">
                <label for="reset"><img src="reset1.jpg" alt="reset" width="80" height="30"></label>
			</td></tr>
	</table>
	</form>
	<br>
	<form method="POST" action="#">
        <table align="center">
		<h1 style="text-align:center;font-size:150%">Placement Details Of Student</h1>
		<tr><td align="right"><label for="regdno">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Regdno:</label></td>
		<td><input type="text"  style="background-image:url(search.jpg);background-position:right; background-repeat:no-repeat;" id="regdno" name="regdno" placeholder="" required/>
            
		</td></tr>
		<tr><td><br></td></tr>
		<tr><td align="right"><input type="submit" id="submit1" value="submit" name="submit" style="display:none;">
                <label for="submit1"><img src="submit.jpg" alt="submit" width="80" height="33"></label></td>
		<td>
		<input type="reset" id="reset1" style="display:none;">
                <label for="reset1"><img src="reset1.jpg" alt="reset" width="80" height="30"></label>
			</td></tr>
		</table>
		</form>
	<br>
</body>
</html>
