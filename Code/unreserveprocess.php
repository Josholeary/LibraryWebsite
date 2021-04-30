<!DOCTYPE HTML>
<html>
<body>
<?php
	//connects to index where unreserve button is
	require_once ("index.php");
	//connects to database
	require_once ("db.php");
	
	if ($_GET || ISBN['reserved']) {
	$ISBN = mysqli_real_escape_string($db, $_GET['ISBN']);//stores the isbn from table row we clicked
	} 
	else //if the data transfer for whatever reason failed then this error warning would be produced
	{
		echo 'Failed';
	}

	//uses an sqli query to select the particular book in question where it matches the particular row in both the books and reserved tables
	$result = mysqli_query($db,"SELECT reserved FROM Books WHERE ISBN='$ISBN'");
	$row = mysqli_fetch_row($result);
	$result2 = mysqli_query($db,"SELECT username FROM Reserved WHERE ISBN='$ISBN'");
	$row2 = mysqli_fetch_row($result2);

	//writes and activates the querys we need to update the database accordingly
	$sql= "UPDATE Books SET reserved='N' WHERE ISBN = '$ISBN'";
	$query = "DELETE FROM Reserved WHERE ISBN='$ISBN'";
	mysqli_query($db,$sql);
	mysqli_query($db,$query);
	header("Location: index.php"); 
?>
</body>
</html>