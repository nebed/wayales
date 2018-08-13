<?php
@session_start();
error_reporting(E_ERROR | E_PARSE);
//check is session variable has been set previously from login
if(!isset($_SESSION['username']))
{
  //if not redirect to login script
	echo "<script>window.open('/login/','_self')</script>";
} else { require_once '../snstv/info.php';}
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
        <link rel="stylesheet" type="text/css" href="/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/lib/material-design-icons/css/material-design-iconic-font.min.css" />
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        <link rel="stylesheet" href="/assets/css/app.css" type="text/css" />
    </head>

    <body>
        <div class="be-wrapper be-fixed-sidebar">
            <nav class="navbar navbar-expand fixed-top be-top-header">
                <div class="container-fluid">
                    <div class="be-navbar-header">
                        <a href="/index/" class="navbar-brand"></a>
                    </div>
                    <div class="be-right-navbar">
                        <ul class="nav navbar-nav float-right be-user-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><img src="/assets/img/avatar.png" alt="Avatar"><span class="user-name"><?php echo $_SESSION['username']; ?></span></a>
                                <div role="menu" class="dropdown-menu">
                                    <div class="user-info">
                                        <div class="user-name">
                                            <?php echo $_SESSION['username']; ?>
                                        </div>
                                        <div class="user-position online">Available</div>
                                    </div><a href="pages-profile.html" class="dropdown-item"><span class="icon mdi mdi-face"></span> Account</a><a href="#" class="dropdown-item"><span class="icon mdi mdi-settings"></span> Settings</a><a href="/logout.php"
                                        class="dropdown-item"><span class="icon mdi mdi-power"></span> Logout</a>
                                </div>
                            </li>
                        </ul>
                        <div class="page-title"><span>Intelligence</span></div>
                        <ul class="nav navbar-nav float-right be-icons-nav">
                            <li class="nav-item dropdown"><a href="#" role="button" aria-expanded="false" class="nav-link be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="be-left-sidebar">
                <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Intelligence</a>
                    <div class="left-sidebar-spacer">
                        <div class="left-sidebar-scroll">
                            <div class="left-sidebar-content">
                                <ul class="sidebar-elements">
                                    <li class="divider">Menu</li>
                                    <li class="parent"><a href="#"><i class="icon mdi mdi-chart-donut"></i><span>Intelligence</span></a>
                                        <ul class="sub-menu">
                                            <li class="parent active"><a href="#">Hotspots</a>
                                            <ul class="sub-menu">
                                                <?php $_SESSION['hotspothtml'] = $hotspothtml; foreach($hotspothtml as $hotspot){
                                                    echo $hotspot; }?>
                                                
                                        </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class=""><a href="/index/"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
				    <li class=""><a href="/campaigns/"><i class="icon mdi mdi-portable-wifi"></i><span>Campaigns</span></a>
                  			</li>
                                </ul>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            <div class="be-content">
                <div class="page-head">
                    <h2 class="page-head-title">Intelligence</h2>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb page-head-nav">
                            <li class="breadcrumb-item"><a href="/index/">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Intelligence</a></li>
                            <li class="breadcrumb-item active">Charts</li>
                        </ol>
                    </nav>
                    
                </div>
                <div class="main-content container-fluid" id="main-content">
                <h4 class="title">Pick a Date Range</h4>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        
                    <label class="w-100">From
                      <div class="input-group input-group-sm date datetimepicker" style="width: 280px;" data-min-view="2" data-date-format="yyyy-mm-dd">
                        <input class="form-control" id="from-date" size="16" type="text" value="">
                        <div class="input-group-append">
                          <button class="btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></button>
                        </div>
                      </div>
                    </label>
                  </div>                            
                  <div class="form-group">
                    <label class="w-100">To
                      <div class="input-group input-group-sm date datetimepicker" style="width: 280px;" data-min-view="2" data-date-format="yyyy-mm-dd">
                        <input class="form-control" id="to-date" size="16" type="text" value="">
                        <div class="input-group-append">
                          <button class="btn btn-primary"><i class="icon-th mdi mdi-calendar"></i></button>
                        </div>
                      </div>
                    </label>
                  </div>
                    </div>
                    <div class="col-lg-6" style="padding:50px 20px;">
                    <button class="btn btn-space btn-primary btn-lg" onclick="downloadcsv()"><i class="icon icon-left mdi mdi-download"></i>     Download Collected Data</button>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div><span class="title">Sessions/Connections</span><span class="card-subtitle">This is the number of Sessions and Connections for each day in the date range</span>
                                </div>
                                <div class="card-body" id="line-chart-container">
                                    <canvas id="line-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div><span class="title">Return Visitors:New Users</span><span class="card-subtitle">This is the ratio of Returning Users to New Users</span>
                                </div>
                                <div class="card-body" id="return-chart-container">
                                    <canvas id="return-pie-chart" height="180"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div><span class="title">Ages</span><span class="card-subtitle">This is the ratio of Age Ranges</span>
                                </div>
                                <div class="card-body" id="age-chart-container">
                                    <canvas id="age-donut-chart" height="180"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div><span class="title">Gender</span><span class="card-subtitle">This is the ratio of Genders</span>
                                </div>
                                <div class="card-body" id="gender-chart-container">
                                    <canvas id="gender-pie-chart" height="180"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div><span class="title">Operating Systems</span><span class="card-subtitle">This is a ratio of the Operating Systems</span>
                                </div>
                                <div class="card-body" id="os-chart-container">
                                    <canvas id="os-donut-chart" height="180"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div><span class="title">Browser</span><span class="card-subtitle">This is the ratio of Browsers</span>
                                </div>
                                <div class="card-body" id="browser-chart-container">
                                    <canvas id="browser-pie-chart" height="180"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header card-header-divider">
                                    <div class="tools"><span class="icon mdi mdi-chevron-down"></span><span class="icon mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span></div><span class="title">Device Model</span><span class="card-subtitle">This is a Ratio of the Device Models</span>
                                </div>
                                <div class="card-body" id="device-chart-container">
                                    <canvas id="device-donut-chart" height="180"></canvas>
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
        <script src="/assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="/assets/lib/chartjs/Chart.min.js" type="text/javascript"></script>
        <script src="/assets/js/app-charts-chartjs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                //initialize the javascript
                App.init();
                $(".datetimepicker").datetimepicker({
    	autoclose: true,
    	componentIcon: '.mdi.mdi-calendar',
    	navIcons:{
    		rightIcon: 'mdi mdi-chevron-right',
    		leftIcon: 'mdi mdi-chevron-left'
    	}
    });
                downloadcsv = function(){
                    var from_date = document.getElementById('from-date').value;
                    var to_date = document.getElementById('to-date').value;
                    var hotspotid = sessionStorage.getItem("hotspotid");
                    document.location = "https://admin.wayales.com/downloadcsv.php?hotspotid=" + hotspotid + "&fromDate=" + from_date + "&toDate=" + to_date;
                }
                getidforgraph = function(ele) {
                 var hotspotid = ele.id;
                 sessionStorage.hotspotid = hotspotid;
                 var from_date = document.getElementById('from-date').value;
                 var to_date = document.getElementById('to-date').value;
                $.ajax({
                url: "https://admin.wayales.com/data.php?hotspotid=" + hotspotid + "&fromDate=" + from_date + "&toDate=" + to_date,
                method: "GET",
                success: function(data) {
                var responsedata = $.parseJSON(data);
                    console.log(responsedata);
                App.ChartJs(responsedata);
                        }
                    });
                }
            });
        </script>
    </body>

    </html>
