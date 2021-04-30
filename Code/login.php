
<!--Web Development 2 assignment - C19381781 Josh O'Leary-->
<!--login.php to allow users with accounts to login to the site-->

<!DOCTYPE html>
<html>
<head>
		<!--Allows us to use CSS to style our page and give our page a title-->
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<title>Login</title>
</head>
<body>
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


	<h1> Log in </h1>
	<div class="des">



	<?php
		//uses db.php to call for connection
		require('db.php');
		//begins the session
			session_start();

		//if the user tries to log in while already logged in from the navbar then they will be returned to the homepage where they are told they are already logged in
		if(isset($_SESSION['username']))
		{
			header("Location: index.php");
		}
		//executes the log in process if username and password are received
		if(isset($_POST['username']) and isset($_POST['password']))
		{
			//Assinging the values entered into variables.
			$username = $_POST['username'];
			$password = $_POST['password'];

			//Compares variables to actual values within our database
			$query = "SELECT * FROM Users WHERE username = '$username' and password = '$password'";

			$result = mysqli_query($db,$query);
			//if it is true then redirects them to home page signed in, the status of being signed in is held in our session username variable
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['username'] = $username;
				header("Location: index.php");
			}
			else //if they input incorrectly then they must try again
			{
				echo "<h3>Incorrect password or username try again<h3>";
			}


		}
	?>
		<!--The form we use for the user to log in-->
			<h3> Enter your login details </h3>
			<form method="post">
				<p>Username: <input type="text" name="username"></p>
				<p>Password: <input type="password" name="password"></p>
				<input type="submit" value="Login">
			</form>
		</div>


<br>
<footer>
	<h6>Created by: Josh O'Leary C19381781</h6>
</footer>
</body>
</html>