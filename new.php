<?php
include_once('/opt/snstv/db.php');
    @session_start();
    error_reporting(E_ERROR | E_PARSE);
	//$username=$_SESSION['username'];
	$query1="select alias from users_owner where userid='mtnnigeria' limit 1";
	$result = mysqli_query($sqli_connection, $query1);
	$row = mysqli_fetch_assoc($result);
	$owner = $row['alias'];
    $query="select hotspots.name,hotspots.mac,hotspots.geocode,hotspots.adverts_url,hotspots.preview_url, count(*) as impressions from hotspots left join radpostauth on radpostauth.calledstationid like CONCAT('%',hotspots.mac) where radpostauth.calledstationid like CONCAT('%', hotspots.mac) and hotspots.owner = '$owner' group by hotspots.name,hotspots.mac,hotspots.geocode,hotspots.adverts_url,hotspots.preview_url";   
$data = array();
	$result1 = mysqli_query($sqli_connection, $query);
	echo mysqli_fetch_assoc($result1);
	while ($rows = mysqli_fetch_assoc($result1)){
	array_push($data, $rows);
	}

?>
