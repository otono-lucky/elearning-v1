<?php
	session_start();
	include "../connect.php";

	if (isset($_POST['upload'])) {
		$ct = htmlspecialchars($_POST['course_title']);
		$sd = htmlspecialchars($_POST['short_disc']);
		$ld = htmlspecialchars($_POST['long_disc']);
		$co = htmlspecialchars($_POST['course_obj']);
		$inst = htmlspecialchars($_POST['instructor']);
		$dur = htmlspecialchars($_POST['duration']);

		$con = connect();

		$sql = 'INSERT INTO course (course_title, short_disc, long_disc, course_obj, instructor, duration) VALUES ("'.$ct.'", "'.$sd.'", "'.$ld.'", "'.$co.'", "'.$inst.'", "'.$dur.'")';
		$query = mysqli_query($con, $sql) or die(mysqli_error($con));
		$count = mysqli_affected_rows($con);
		if ($count > 0) {
			echo "<script>
		alert('You have successfully uploaded the course')
		window.location.href = 'add_topic.php'
		</script>";
		}else{
			echo "<script>
		alert('Unable to complete upload')
		window.location.href = 'index.php'
		</script>";
		}
	}


?>