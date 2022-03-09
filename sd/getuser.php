<?php
session_start();
include "../connect.php";


$q = intval($_GET['q']);

$con = connect();

$sql = 'SELECT * FROM topics WHERE id = "'.$q.'"';
$query = mysqli_query($con, $sql) or die(mysqli_error($con));
$trow = mysqli_fetch_assoc($query);
$vid_link = $trow['video_link'];
echo $vid_link;
//echo '<iframe class="embed-responsive-item" src="" allowfullscreen></iframe>';


?>