
<!--Web Development 2 assignment - C19381781 Josh O'Leary-->
<!--search.php allows a user of the site to search a book to see if it is available-->



<!DOCTYPE html>
<html>
<head>
		<!--Allows us to use CSS to style our page and give our page a title-->
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<title>Search</title>
</head>
<body>
	<! A navbar that will appear on every page to allow for easy navigation throughout the site>
	<div class="nav">
			<ul>
							<li><a href="index.php">Homepage</a></li>
							<li><a href="login.php">Login</a></li>
							<li><a href="search.php">Search books</a></li>
							<li><a href="register.php">Register</a></li>
							<li><a href="logout.php">Log out</a></li>
			</ul>
		<br>
	</div>

				<h1> Search </h1>
				<div class="des">
				<h4> Search for a particular book and reserve it using our search system below</h4>


<?php
require_once("db.php");
	session_start();

	if(!isset($_SESSION['username']))
	{
		header("Location: login.php");
	}

?>


	<form method="POST" action="reserve.php">
		<p>Book title:<input type="text" name="title"></p>
	  	<p>Book author:<input type="text" name="author"></p>
	  	<?
	  		require_once('db.php');
	  		echo "<p>Category:<select name='category'></p>";
	  		$categoryid = 0;
	  		$search = "Select a category";
	  		$query = "SELECT * FROM Category";
	  		$result = mysqli_query($db, $query);
	  		echo '<option value="'.$categoryid.'">'.$search.'</option>';

	  		while($row = mysqli_fetch_array($result))
	  		{
	  			echo '<option value="'.$row['categorydesc'] .'">' .$row['categorydesc']. '</option>';
	  		}





		
			echo "</select>";
		?>
		<br>
	  	<input type="submit" value="Search">
	 </form>

</div>

<br>
<footer>
	<h6>Created by: Josh O'Leary C19381781</h6>
</footer>
</body>
</html>