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
        if($adtype == "bannerad"){
        	if(count($_FILES['file-images']['name']) > 0){
        	//Loop through each file
        		for($i=0; $i<count($_FILES['file-images']['name']); $i++) {
          		//Get the temp file path
            			$tmpFilePath = $_FILES['file-images']['tmp_name'][$i];
				//Make sure we have a filepath
            			if($tmpFilePath != ""){
            			//save the filename
			                $shortname = $_FILES['file-images']['name'][$i];
					//save the url and the file
					mkdir("/opt/campaigns/$campaignname",0777);
			                $filePath = "/opt/campaigns/$campaignname/".$shortname;
					 //Upload the file into the temp dir
			                if(move_uploaded_file($tmpFilePath, $filePath)) {
						echo '<script>$.extend($.gritter.options, { position: \'top-right\' }); $.gritter.add({title: \'Success\', text: \'Files Exist\', class_name: \'color success\' }); </script>';
					}
		              }
		        }
  	       } 
        }
	elseif($adtype== "appinstallad"){
	
	}
	elseif($adtype=="websitead"){
	
	}
	elseif($adtype=="videoad"){
	
	}
	else{
	
	}
?>
