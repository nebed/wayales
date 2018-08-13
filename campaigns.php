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
    <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
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
        <div class="main-content container-fluid">
	<div class="col-sm-12">
	<div class="card card-table">
	<div class="card-header">
	Campaigns
       <div class="text-right">
	<div class="button btn-hspace">
	<button type="button" class="btn btn-primary"><span class="mdi mdi-collection-plus"></span>  Create New</button>
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
    <script src="/assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      });
      
    </script>
  </body>
</html>
