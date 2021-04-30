
<!--Log out page to allow users that are signed in to log out-->

<!DOCTYPE HTML>
<html>
<body>
<?php
//starts session so it carries over
session_start();
//if the user is logged in it destroys the session, logging them out, then returns them to the log in page so they know theyre logged out
if(isset($_SESSION['username']))
{
session_unset();
session_destroy();
header("location:login.php");
exit();
}
else //if they are not logged in and try to log out it will simply direct them to the login page to show they arent even logged in
{
	header("Location: login.php");
}
?>
</body>
</html>