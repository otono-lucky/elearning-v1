<?php
	session_start();
	
	include "connect.php";

	 
    if (!isset($_SESSION['email'])) {
       header("Location:login.php");
    }

    if (isset($_GET['logout'])) {
        session_unset();
        session_destroy();
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<p>Hi, <?php echo $_SESSION['firstname']; ?>, Welcome! Now You can <a href="dashboard.php?logout">Logout</a></p>

</body>
</html>