<?php 
error_reporting(E_ERROR | E_PARSE);
require_once '../snstv/db.php';
$fromDate = $_GET['fromDate'];
$toDate = $_GET['toDate'];
$hotspotid = $_GET['hotspotid'];

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: attachment; filename=export-$fromDate-$toDate.csv");

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('MAC Address', 'Firstname', 'Lastname','Email Address','Gender','Mobile Number','Customer Status','Work Place','Company','Age', 'Device','OS','Browser','Network IP','Hotspot Serial No'));
$query1 = "select distinct(radpostauth.username), userinfo.firstname,userinfo.lastname,userinfo.email,userinfo.gender,userinfo.mobilephone,userinfo.customer_status,userinfo.pwork,userinfo.company,userinfo.age,userinfo.devicetype,userinfo.ostype,userinfo.browser,userinfo.ipaddress,userinfo.hotspotid from radpostauth left join userinfo on radpostauth.username = userinfo.username where radpostauth.authdate between'".$fromDate." 00:00:00' and '".$toDate." 23:59:59' and calledstationid like '%".$hotspotid."'";
$rows = mysqli_query($sqli_connection, $query1);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) {fputcsv($output, $row);}

?>
