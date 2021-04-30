<!DOCTYPE HTML>
<html>
<body>
<?php
	//connect to the original reserve page
	require_once ("reserve.php");
	//connect to datbase
	require_once ("db.php");
	
	if ($_GET || ISBN['reserved']) {
	$ISBN = mysqli_real_escape_string($db, $_GET['ISBN']);	//stores the isbn from table row we clicked
	$date = date("Y-m-d");	//stores current date
	} 
	else //if the data transfer for whatever reason failed then this error warning would be produced
	{
		echo 'Failed';
	}

	//uses an sqli query to select the particular book in question where it matches the particular row
	$result = mysqli_query($db,"SELECT reserved FROM Books WHERE ISBN='$ISBN'");
	$row = mysqli_fetch_row($result);

	//it then updates the  books table by calling the book as reserved by setting its status to Y
	$sql= "UPDATE Books SET reserved='Y' WHERE ISBN = '$ISBN'";
	//it then updates the reserved table and inserts the new reservation into it
	$query = "INSERT INTO Reserved(ISBN, username, reserveDate)  VALUES('$ISBN', '{$_SESSION['username']}', '$date')";
	mysqli_query($db,$sql);
	mysqli_query($db,$query);
	header("Location: reserve.php"); //takes us back to home page which refreshes everything for us so everything updates
?>
</body>
</html>