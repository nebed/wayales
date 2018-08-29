<?php @session_start();
if(!isset($_SESSION['username']))
{
  //if not redirect to login script
        echo "<script>window.open('/login/','_self')</script>";
} else { include '../snstv/campaigns.php';}
//set current time page was requested
$time = $_SERVER['REQUEST_TIME'];
//set session timeout duration to 30 minutes
$timeout_duration = 1800;
/** Look for users LAST_ACTIVITY timestamp.
 *  If it is set and indicates that timeout_duration has passed
 *  remove any previous $_SESSION data and start a new one
 */
if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
if ( isset( $_COOKIE[session_name()] ) ){
setcookie(session_name(), "", time() -3600, "/" );
//clear session from globals
$_SESSION = array();
  session_unset();
  session_destroy();
echo "<script>window.open('https://admin.wayales.com/login/','_self')</script>";}
}
//update LAST_ACTIVITY so that timeout is based on it and user's login time.
$_SESSION['LAST_ACTIVITY'] = $time;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/assets/img/logo-fav.png">
    <title>Wayalés</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/select2/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css"/>
  </head>
  <body>
    <div class="be-wrapper">
      <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
          <div class="be-navbar-header"><a href="index.html" class="navbar-brand"></a>
          </div>
          <div class="be-right-navbar">
          <ul class="nav navbar-nav float-right be-user-nav">
              <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><img src="/assets/img/avatar.png" alt="Avatar"><span class="user-name"><?php echo $_SESSION['username']; ?></span></a>
                <div role="menu" class="dropdown-menu">     
                  <div class="user-info">
                    <div class="user-name"><?php echo $_SESSION['username']; ?></div>
                    <div class="user-position online">Available</div>
                  </div><a href="#" class="dropdown-item"><span class="icon mdi mdi-face"></span> Account</a><a href="#" class="dropdown-item"><span class="icon mdi mdi-settings"></span> Settings</a><a href="/logout.php" class="dropdown-item"><span class="icon mdi mdi-power"></span> Logout</a>
                </div>
              </li>
            </ul>
            <div class="page-title"><span>Campaigns</span></div>
            <ul class="nav navbar-nav float-right be-icons-nav">
              <li class="nav-item dropdown"><a href="#" role="button" aria-expanded="false" class="nav-link be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
              
            </ul>
          </div>
        </div>
      </nav>
      <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Campaigns</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class="active"><a href="#"><i class="icon mdi mdi-portable-wifi"></i><span>Campaigns</span></a>
                  </li>
                  <li class=""><a href="/index/"><i class="icon mdi mdi-home"></i><span>DashBoard</span></a>
                  </li>
		 <li class=""><a href="/intelligence/"><i class="icon mdi mdi-chart-donut"></i><span>Intelligence</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Campaigns</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="/index/">Home</a></li>
              <li class="breadcrumb-item active"><a href="#campaigns">Campaigns</a></li>
	     <li class="breadcrumb-item"><a href="#hotspots">Hotspots</a></li>
            </ol>
          </nav>
	</div>
	<!-- START OF MODAL CONTENT -->
  <form action="" id="campaigndata" method="post" data-parsley-validate="" novalidate=""  >
		<div class="modal colored-header colored-header-primary fade" id="newCampaign" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header modal-header-colored">
	<h4 class="modal-title">Create a New Ad</h4>
	<button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="mdi mdi-close"></span></button>
      </div>
	<div class="modal-body">
		<div class="row"><div class="col-md-12">
			<div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider">General<span class="card-subtitle">General setup for the campaign</span></div> 
                <div class="card-body">
                    <div class="form-group pt-2">
                      <label for="inputCampaignName">Campaign Name</label>
                      <input id="inputCampaignName" name="inputCampaignName" data-parsley-type="alphanum" type="text" d="" required="" placeholder="Enter campaign name" class="form-control">
		            </div>
			<div class="row"><div class="col-md-6">
			<div class="form-group pt-2">
                      <label for="inputStartDate"> Start Date </label>
                        <div id="datetimepicker1"  data-min-view="2" data-date-format="yyyy-mm-dd" data-date-start-date="+1d" class="input-group date datetimepicker">
                          <input id="inputStartDate" name="inputStartDate" required="" size="16" type="text" value="" class="form-control">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></button>
                          </div>
                        </div>
                    </div>
			</div> 
			<div class="col-md-6">
			<div class="form-group pt-2">
                      <label for="inputEndDate"> End Date (leave empty for non-ending)</label>
                        <div id="datetimepicker2" data-min-view="2" data-date-format="yyyy-mm-dd" data-date-start-date="+1d" class="input-group date datetimepicker">
                          <input size="16" name="inputEndDate" type="text" value="" class="form-control">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></button>
                          </div>
                        </div>
                    </div>

			</div></div>
                     	<div class="form-group pt-2">
                      <label for="inputScheduleTime"> Schedule Time (leave empty for all-day) </label>
                        <div id="inputScheduleTime" data-min-view="2" data-date-format="HH:ii p" class="input-group date inputScheduleTime">
                          <input size="16" name="inputScheduleTime" type="text" value="" class="form-control">
                          <div class="input-group-append">
                            <button class="btn btn-primary"><i class="icon-th mdi mdi-time"></i></button>
                          </div>
                        </div>
                    </div>
		<div class="form-group">
                      <label for="inputHotspots">Select Hotspots</label>
      <select multiple="multiple" name="inputHotspots[]" data-parsley-required data-parsley-mincheck="1" class="tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
<?php

foreach ($camp_data as $item){
	echo '<option value="'.$item['name'].'">'.$item['name'].'</option>';
}
?>
		</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"></span>
                     </div>
		<hr/>
		<!-- Ads -->
		<div class="card-header card-header-divider">Ad<span class="card-subtitle">Choose an Ad type and configure for a location</span></div>
		<div class="card-body">
			<ul class="nav nav-tabs nav-fill nav-justified">
                    <li class="nav-item"><a class="nav-link"><span show="websitead" onclick="selectad(this);return false;" data-toggle="tooltip" data-placement="top" title="a website to redirect users to on successful authentication" class="fas fa-external-link-alt fa-3x fa-disabled"></span></a></li>
                    <li class="nav-item"><a class="nav-link"><span show="videoad" onclick="selectad(this);return false;" data-toggle="tooltip" data-placement="top" title="a video ad to be played before user is granted access to internet, youtube or video upload" class="fab fa-youtube fa-3x fa-disabled"></span></a></li>
                    <li class="nav-item"><a class="nav-link"><span show="bannerad" onclick="selectad(this);return false;" data-toggle="tooltip" data-placement="top" title="responsive banner images to be displayed to the user" class="far fa-images fa-3x fa-disabled"></span></a></li>
                    <li class="nav-item"><a class="nav-link"><span show="appinstallad" onclick="selectad(this);return false;" data-toggle="tooltip" data-placement="top" title="app to be downloaded by user from app-store" class="fab fa-app-store fa-3x fa-disabled"></span></a></li>
                  </ul>
		<div class="row mt-4">	<div class="col-md-12">
		                  <div id="websitead" style="display:none">
                	<div class="form-group pt-2">
                      <label for="inputWebUrl">URL</label>
                      <input id="inputWebUrl" name="inputWebUrl" data-parsley-type="url" type="url" d="" placeholder="Ex: http://example.com" class="form-control">
                    </div>
                    </div>
<!--input file video-->
			 <div id="videoad" style="display:none">
		   	<div class="form-group">
                      <label for="inputIframe">Youtube iFrame</label>

                        <textarea id="inputIframe" name="inputIframe" placeholder="paste html here..." class="form-control"></textarea>
                    
		    </div>
		<div class="col-md-4 col-md-offset-8 mt-3"><p>-OR-</p></div> 
			<div class="form-group row">
		      <label for="file-2" class="col-12 col-sm-3 col-form-label text-sm-right">Upload Video File</label>
			<div class="col-12 col-sm-6">
                        <input id="file-2" type="file" accept=".mp4" name="file-video" class="inputfile form-control">
                        <label for="file-2" class="btn-primary"> <i class="mdi mdi-upload"></i><span>Choose file...</span></label>
		    </div>
			</div>
			</div>

<!--end input file video-->

<!-- input images -->
				<div id="bannerad" style="display:none"> 
		     <div class="form-group row">
                      <label for="file-3" class="col-12 col-sm-3 col-form-label text-sm-right">Select Images</label>
                      <div class="col-12 col-sm-6">
                        <input id="file-3" onchange="preview_image(event)" type="file" name="file-images[]" accept=".jpg,.png" data-multiple-caption="{count} files selected" multiple="" class="inputfile">
                        <label for="file-3" class="btn-primary"> <i class="mdi mdi-upload"></i><span>Browse files...</span></label>
                      </div>
                    </div>
			 </div>

<!-- end inpu images -->

<!--app install -->

			 <div id="appinstallad" style="display:none">
		   	<div class="form-group">
                      <label for="inputApp">App Store URL</label>

                        <input for="inputApp" name="inputApp" id="inputApp" placeholder="Ex: play.google.com/newapp" class="form-control">

                    </div> 
		       </div>


<!-- end app install -->
		<input type="hidden" name="adtype" id="adtype" >	
			 </div></div>
		 </div>
		<!-- end Ads -->
                </div>
              </div>
		</div></div>
	</div>
	<div class="modal-footer">
		<div class="text-right">
        	<button type="button" class="btn btn-default" data-dismiss="modal" aria-label="">
          	<span aria-hidden="true"></span>Cancel
	        </button>

        	<button type="submit" name="submit" class="btn btn-primary" aria-label="">
		  <span aria-hidden="true"></span>Save
		</button>
	</div>
	</div>
          </div>
           </div>
           </div>


	<!-- END OF MODAL CONTENT -->	
  </form>
        <div class="main-content container-fluid">
	<div class="col-sm-12">
	<div class="card card-table">
	<div class="card-header">
	Campaigns
       <div class="text-right">
	<div class="button btn-hspace">
	<button type="button" class="btn btn-primary md-trigger" id="launchNewCampaign" data-toggle="modal" data-target="#newCampaign"><span class="mdi mdi-collection-plus"></span>  Create New</button>
	
	</div>
	</div>
	</div>
	<div class="card-body">
	<div class="table-responsive noSwipe">
	<table class="table table-striped table-hover">
	<thead id="campaigns">
	<tr>
                          <th style="width:8%;">
                          </th>
                          <th style="width:20%;">Campaign Name</th>
                        <th style="width:15%;">Hotspots</th>
                          <th style="width:15%;">Impressions</th>
                          <th style="width:15%;">Start Date</th>
                          <th style="width:12%;">End Date</th>
                          <th style="width:10%;"></th>
                        </tr>
	</thead>
	<tbody>
	<tr></tr>
	</tbody>
	</table>
	</div>
	</div>
	</div>
	</div>
          <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Hotspots
                  </div>
                <div class="card-body">
                  <div class="table-responsive noSwipe">
                    <table class="table table-striped table-hover">
                      <thead id="hotspots">
                        <tr>
                          <th style="width:8%;">
                          </th>
                          <th style="width:20%;">Hotspot</th>
			<th style="width:15%;">Serial</th>

                          <th style="width:15%;">Location</th>
                          <th style="width:15%;">Impressions</th>
                          <th style="width:12%;">Launch Date</th>
                          <th style="width:10%;"></th>
                        </tr>
                      </thead>
                      <tbody>
<?php 
foreach ($camp_data as $item){
$htmlPage = <<<HTML
            <tr>
          <td>
          <div class="icon"><span class="mdi mdi-wifi-alt"></span></td>
          <td class="cell-detail"><span>{$item['name']}</span><span class="cell-detail-description">live</span></td>
          <td class="cell-detail"><span>{$item['mac']}</span><span class="cell-detail-description">Mikrotik</span></td>
          <td>{$item['geocode']}</td><td>{$item['impressions']}</td>
          <td>May 6, 2018</td>
          <td class="text-right"><div class="btn-group btn-hspace"><button type="button" data-toggle="dropdown" class="btn btn-secondary dropdown-toggle" aria-expanded="false">Options <span class="icon-dropdown mdi mdi-chevron-down"></span></button><div role="menu" class="dropdown-menu"><a href="{$item['preview_url']}" target="_blank" class="dropdown-item">Preview</a><a href="#" class="dropdown-item">Performance</a><a href="#" class="dropdown-item">Edit</a></div></div></td>
          </tr>
HTML;
echo $htmlPage;
}
?>
			 </tbody>
                    </table>
                  </div>
</div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <nav class="be-right-sidebar">
        <div class="sb-content">
          <div class="tab-navigation">
            <ul role="tablist" class="nav nav-tabs nav-justified">
              <li role="presentation" class="nav-item"><a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab" class="nav-link active">Settings</a></li>
            </ul>
          </div>
          <div class="tab-panel">
            <div class="tab-content">
              
              <div id="tab1" role="tabpanel" class="tab-pane tab-settings active">
                <div class="settings-wrapper">
                  <div class="be-scroller"><span class="category-title">General</span>
                    <ul class="settings-list">
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st1" id="st1"><span>
                            <label for="st1"></label></span>
                        </div><span class="name">Available</span>
                      </li>
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st2" id="st2"><span>
                            <label for="st2"></label></span>
                        </div><span class="name">Enable Phone Verification</span>
                      </li>
                      <li>
                        <div class="switch-button switch-button-sm">
                          <input type="checkbox" checked="" name="st3" id="st3"><span>
                            <label for="st3"></label></span>
                        </div><span class="name">Enable Email Verification</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </div>
    <script src="/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/lib/parsley/parsley.min.js" type="text/javascript"></script>
   <script src="/assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
   <script src="/assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">

    selectad = function (ele) {
	 $('.fa-3x').addClass('fa-disabled');
	 $("#videoad, #bannerad, #websitead, #appinstallad").css('display','none');
	 $("#videoad input, #bannerad input, #websitead input, #appinstallad input").prop('required', false);
    	$(ele).removeClass('fa-disabled');	 
	 var divid ="#" + $(ele).attr("show");
	 $(divid +" input").prop('required',true);
	 $("#videoad input").prop('required', false);
	 document.getElementById("adtype").value = $(ele).attr("show");
	 $(divid).css('display', '');
    
    }
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
    //Select2 tags
    $(".tags").select2({tags: true, width: '100%'});
	
    $("#launchNewCampaign").click(function(){
        $("#newCampaign").modal({backdrop: "static"});
	$(".datetimepicker").datetimepicker({
	startDate: '+0d',
        autoclose: true,
        componentIcon: '.mdi.mdi-calendar',
        navIcons:{
                rightIcon: 'mdi mdi-chevron-right',
                leftIcon: 'mdi mdi-chevron-left'
        }
    });	
	$(".inputScheduleTime").datetimepicker({
	startDate: '+0d',
	endDate: '+1d',
	startView: 0,
	format: 'hh:ii',
        autoclose: true,
        componentIcon: '.mdi.mdi-time',
        navIcons:{
                rightIcon: 'mdi mdi-chevron-right',
                leftIcon: 'mdi mdi-chevron-left'
        }
    });	
    });

	$( '.inputfile' ).each( function(){
      var $input   = $( this ),
        $label   = $input.next( 'label' ),
        labelVal = $label.html();

      $input.on( 'change', function( e )
      {
        var fileName = '';

	if (this.files && this.files.length == 1)
	  fileName = e.target.value.split( '\\' ).pop();
	else if( this.files && this.files.length < 5 )
          fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
        else if( e.target.value )
          fileName = e.target.value.split( '\\' ).pop();

        if( fileName )
          $label.find( 'span' ).html( fileName );
        else
          $label.html( labelVal );
      });
    });

  $("form#data").submit(function(e) {
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: "https://admin.wayales.com/createcampaigns.php",
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false
    });
});
      });
      
    </script>
  </body>
</html>
  
