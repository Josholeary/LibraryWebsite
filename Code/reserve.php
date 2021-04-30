
<!--Web Development 2 assignment - C19381781 Josh O'Leary-->
<!--reserve.php allows a user with an account that is logged in to reserve a given book on the site-->



<!DOCTYPE html>
<html>
<head>
		<!--Allows us to use CSS to style our page and give our page a title-->
		<link type="text/css" rel="stylesheet" href="style.css"/>
		<title>Reserve</title>
</head>
<body>

<?php
	require_once("db.php");

	require_once("search.php");

	echo "<h1> Search results </h1>";
	echo "<h4> Reserve a book from our table below </h4>";
	//if the user is not logged in they cant use this feature so they are redirected to the login page to first login
	if(!isset($_SESSION['username']))
	{
		header("Location: login.php");
	}

		//will execute if it is not empty, isset does not work as a null value even counts as set
		if(!empty($_POST['title']))
		{
			//stores a trimmed version of the users input into a variable
			$searchtitle = trim ($_POST['title']);
			
			//selects from the books table an unreserved book that closely matches the users input in search.php
			$query1 = "SELECT * FROM Books WHERE Reserved = 'N' AND booktitle LIKE '%$searchtitle%'";
			$result1 = mysqli_query($db, $query1);

			echo '<table border="1">'."\n";
			if ($result1->num_rows == 0) 
			{
				echo "<h3> No book found </h3>";
			}
		
	
				if ($result1->num_rows > 0) 
				{
					echo "<tr><th>ISBN</th>
				          <th>Title</th>
				          <th>Author</th>
					  	  </tr>";
					while ($row1 = mysqli_fetch_array($result1)) 
					{
						echo "<tr><td>";
						echo(htmlentities($row1["ISBN"]));
						echo("</td><td>");
						echo(htmlentities($row1["booktitle"]));
						echo("</td><td>");
						echo(htmlentities($row1["author"]));
						echo("</td><td>");
						echo('<a href="reserveprocess.php?ISBN='.htmlentities($row1[0]).'">Reserve</a>');
						echo("</td></tr>\n");
					}
				}	
		}

		//will execute if author is given an actual value instead of just being set as a zero value still counts as set
		if(!empty($_POST['author']))
		{	
			//puts the trimmed version of whatever author the user typed in into a variable
			$searchauthor = trim ($_POST['author']);
			//selects an author from the books table that matches the inputted author
			$query2 = "SELECT * FROM Books WHERE Reserved = 'N' AND author LIKE '%$searchauthor%'";

			$result2 = mysqli_query($db, $query2);

			echo '<table border="1">'."\n";
			if ($result2->num_rows == 0) 
			{
				echo "<h3> No book found </h3>";
			}

	
				if ($result2->num_rows > 0) 
				{
					echo "<tr><th>ISBN</th>
				          <th>Title</th>
				          <th>Author</th>
					  	  </tr>";
					while ($row2 = mysqli_fetch_array($result2)) 
					{
						echo "<tr><td>";
						echo(htmlentities($row2["ISBN"]));
						echo("</td><td>");
						echo(htmlentities($row2["booktitle"]));
						echo("</td><td>");
						echo(htmlentities($row2["author"]));
						echo("</td><td>");
						echo('<a href="reserveprocess.php?ISBN='.htmlentities($row2[0]).'">Reserve</a>');
						echo("</td></tr>\n");
					}
				}	
		}


		//will execute if category is given an actual value instead of just being set as a zero value still counts as set
		if(!empty($_POST['category']))
		{	
			//puts category chosen from search.php into variables
			$searchcat = ($_POST['category']);
			//will search both our tables for books that are not reserved and that match the category
			$query3 = "SELECT booktitle, author, ISBN FROM Books  INNER JOIN Category ON Books.categoryid = Category.categoryid WHERE categorydesc LIKE '%$searchcat%' AND Reserved = 'N' ";

			$result3 = mysqli_query($db, $query3);
			//if no results match then it will give the message
			echo '<table border="1">'."\n";
			if ($result3->num_rows == 0) 
			{
				echo "<h3> No book found </h3>";
			}

				//prints the table out with our results from the search
				if ($result3->num_rows > 0) 
				{
					echo "<tr><th>ISBN</th>
				          <th>Title</th>
				          <th>Author</th>
					  	  </tr>";
					while ($row3 = mysqli_fetch_array($result3)) 
					{
						echo "<tr><td>";
						echo(htmlentities($row3["ISBN"]));
						echo("</td><td>");
						echo(htmlentities($row3["booktitle"]));
						echo("</td><td>");
						echo(htmlentities($row3["author"]));
						echo("</td><td>");
						echo('<a href="reserveprocess.php?ISBN='.htmlentities($row3[0]).'">Reserve</a>');
						echo("</td></tr>\n");
					}
				}	
		}





	

?>

</body>
</html>