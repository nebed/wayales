<?php
	$campaignname = $_POST['inputCampaignName'];
	$startdate = $_POST['inputStartDate'];
	$enddate = $_POST['inputEndDate'];
	$scheduletime = $_POST['inputScheduleTime'];
	$hotspots_array = $_POST['inputHotspots'];
	$web_url = $_POST['inputWebUrl'];
	$youtube_iframe = $_POST['inputIframe'];
	$video_file = $_FILES['file-video'];
	$image_array = $_FILES['file-images'];
	$app_url = $_POST['inputApp'];
	$adtype = $_POST['adtype'];
	echo '<script>$.extend($.gritter.options, { position: \'top-right\' }); $.gritter.add({title: \'Error\', text: \'Some Values Were Missing\', class_name: \'color danger\' }); </script>';
?>
