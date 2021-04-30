
<!--Web Development 2 assignment - C19381781 Josh O'Leary-->
<!--register.php allows a user to register an account on the site-->



<!DOCTYPE html>
<html>
<head>
		<!--Allows us to use CSS to style our page and give our page a title-->
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<title>Register</title>
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

		<h1> Register </h1>
		<div class="des">
<?php
		//connects to database
		require_once('db.php');
		//starts the session
		session_start();
		//will only display this message if user is not logged in
		if(!isset($_SESSION['username']))
		{
			echo "<h3> Sign up to register an account with us. </h3>";
			echo "<br>";
		}



		$errors=0;

		//if the user is logged in it will prevent them from registering a new account until they log out
		if(isset($_SESSION['username']))
		{
			echo "<br>";
			echo "<h3>You're already logged in, log out if you wish to make a new account.</h3>";
			echo "<br>";
			echo "<h3>Log out <a href='logout.php'>here</a> <br></h3>";
		}

			//if username has been set then it will activate the variables and other code
			if(isset($_POST['username']))
			{//start if
				$username = mysqli_escape_string($db,($_POST['username']));

				$password = mysqli_escape_string($db,($_POST['password']));

				$password2 = mysqli_escape_string($db,($_POST['password2']));

				$firstname = mysqli_escape_string($db,($_POST['firstname']));

				$lastname = mysqli_escape_string($db,($_POST['lastname']));

				$addressline1 = mysqli_escape_string($db,($_POST['addressline1']));

				$addressline2 = mysqli_escape_string($db,($_POST['addressline2']));

				$city = mysqli_escape_string($db,($_POST['city']));

				$telephone = mysqli_escape_string($db,($_POST['telephone']));

				$mobile = mysqli_escape_string($db,($_POST['mobile']));


				//error  checking in registration, if an error is detected the errors variable goes to one and the query wont execute

				//checks if username is already taken
				$userquery = "SELECT * FROM Users WHERE username='$username'";
  				$result = mysqli_query($db, $userquery);
  				$user = mysqli_fetch_assoc($result);

  				if ($user) 
  				{ // if user exists
    				if ($user['username'] === $username) 
    				{
      					echo "<h3> Username already exists</h3>";
      					$errors = 1;
    				}
    			}

    			//making sure passwords match
    			if ($password != $password2) 
				{
					echo "<h3> Passwords must match</h3>";
					$errors = 1;
				}


    			//check for password length
    			if(strlen($password) < 6)
				{
					echo "<h3> Password must be less than 6 characters </h3>";
					$errors = 1;
				}

				//checking telephone for numeric values
				if (!is_numeric($telephone))
				{
					echo "<h3> Telephone must be numeric </h3>";
					$errors = 1;
				}

				//checking mobile for numeric values
				if (!is_numeric($mobile))
				{
					echo "<h3> Mobile must be numeric </h3>";
					$errors = 1;
				}

				//making sure mobile is 10 digits
				if (strlen($mobile) != 10)
				{
					echo "<h3> Mobile must be 10 digits </h3>";
					$errors = 1;
				}



				if($errors == 0)
				{ //if there are no errors then the query will be allowed
					$query = "INSERT INTO Users(username, password, firstname, lastname, addressline1, addressline2, city, telephone, mobile)
								  VALUES('$username', '$password', '$firstname', '$lastname', '$addressline1', '$addressline2', '$city','$telephone','$mobile')";
						mysqli_query($db,$query);
						echo "<h3> Account succesfully registered</h3>";
				}

							
		}//end if
		//this hides the registration form from the user if theyre logged in to prevent them from registering while logged in
	if(!isset($_SESSION['username']))
		{

		echo "<h5> Enter your details to register </h5>";
		echo "<form method='post'>";
		echo "<p>Username: <input type='text' name='username'></p>";
		echo "<p>Password: <input type='password' name='password'></p>";
		echo "<p>Confirm Password: <input type='password' name='password2'></p>";
		echo "<p>First name: <input type='text' name='firstname'></p>";
		echo "<p>Last name: <input type='text' name='lastname'></p>";
		echo "<p>Address Line 1: <input type='text' name='addressline1'></p>";
		echo "<p>Address Line 2: <input type='text' name='addressline2'></p>";
		echo "<p>City: <input type='text' name='city'></p>";
		echo "<p>Telephone: <input type='text' name='telephone'></p>";
		echo "<p>Mobile: <input type='text' name='mobile'></p>";
		echo "<input type='submit' name='Register' value='Register'>";
		echo "</form>";
	}
	?>
</div>

<br>
<footer>
	<h6>Created by: Josh O'Leary C19381781</h6>
</footer>
</body>
</html>


