
<!--Web Development 2 assignment - C19381781 Josh O'Leary-->
<!--Index.html, contains links to all of our other pages that perform the function for the library.-->


<!DOCTYPE html>
<html>
<head>
		<!--Allows us to use CSS to style our page and give our page a title-->
		<link rel="stylesheet" href="style.css">
		<title>Library Website</title>
</head>
<body>
<?php
	//starting our session to keep progress
	session_start();
?>
	<!--A navbar that will appear on every page to allow for easy navigation throughout the site-->
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
		<h1> TU Dublin Library </h1>
		<div class="des">
		<?
		//will greet the user and let them know that they are signed in
		if(isset($_SESSION['username']))
	{
			echo "<h3> Logged in. Welcome ". $_SESSION["username"] ."!</h3>";
			echo "<h4> See your reserved books below.</h4>";
			echo "<br>";
		
	}
	?>
	</div>

	<?
		//this removes features from the home page when the user is already logged in
		if(!isset($_SESSION['username']))
	{
		echo "<div class='des'>	";
		echo "<h3> Welcome! </h3>";
		echo "<h5> Read below for an introduction to our site. </h5>";
		echo "<br>";
		echo "</div>";
		
		echo "<div class='des'>	";
		echo "<h3> Login </h3>";
		echo "<p> Already have an account with us? Login <a href='login.php'>here</a></p>";
		echo "<br>";
		echo "</div>";

		echo" <div class='des'>";
		echo "<h3> Register </h3>";
		echo "<p> New to the site? Create an account with us <a href='register.php'>here</a></p>";
		echo "<br>";
		echo "</div>";

	}
	?>

	<div class="des">
		<h3> Search </h3>
		<p> Looking to reserve a book? </p>
		<p>Search by name, author or category <a href="search.php">here</a></p>
		<br>
	</div>

<?
	require_once('db.php');
	//Checks if user is logged in and if they are then it will display their reserved books
	if(isset($_SESSION['username']))
		{//start if
			//joins books and reserved tables and allows access to isbn and book title but only if the username matches in the database
			//Took forever to figure this part out hahaha
			$query = "Select Books.ISBN, Books.booktitle, Books.author from Reserved INNER JOIN Books ON Reserved.ISBN=Books.ISBN 
			WHERE Reserved.username = '". $_SESSION['username'] ."'";
			$result = mysqli_query($db, $query);
			echo '<table border="1">'."\n";
			if ($result->num_rows == 0) 
			{
				echo "<h3> You have no books reserved </h3>";
			}
			//print the amount of books reserved into this table
			if ($result->num_rows > 0) 
			{
				echo "<h3> Your reserved books are: </h3>";
				echo "<tr><th>ISBN</th>
					  <th>Title</th>
					  <th>Author</th>
					  </tr>";
					  while ($row = mysqli_fetch_array($result)) 
						{
							echo "<tr><td>";
							echo(htmlentities($row["ISBN"]));
							echo("</td><td>");
							echo(htmlentities($row["booktitle"]));
							echo("</td><td>");
							echo(htmlentities($row["author"]));
							echo("</td><td>");
							echo('<a href="unreserveprocess.php?ISBN='.htmlentities($row[0]).'">Unreserve</a>');
							echo("</td></tr>\n");
						}
			}
			
			
		


			
		}//end if
?>



<br>
<footer>
	<h6>Created by: Josh O'Leary C19381781</h6>
</footer>
</body>
</html>