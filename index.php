<?php
error_reporting(E_ERROR | E_PARSE);
@session_start();
//check is session variable has been set previously from login
if(!isset($_SESSION['username']) AND empty($_SESSION['username']))
{
  //if not redirect to login script
echo "<script>window.open('https://admin.wayales.com/login/','_self')</script>";
}else { require_once '../snstv/info.php';}
//set current time page was requested 
$time = $_SERVER['REQUEST_TIME'];
//set session timeout duration to 30 minutes
$timeout_duration = 1800;
/** Look for users LAST_ACTIVITY timestamp.
 *  If it is set and indicates that timeout_duration has passed
 *  remove any previous $_SESSION data and start a new one
 */
if (isset($_SESSION['LAST_ACTIVITY']) && ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
//remove PHPSESSID from browser
if ( isset( $_COOKIE[session_name()] ) ){
setcookie(session_name(), "", time() -3600, "/" );
//clear session from globals
$_SESSION = array();
//clear session from disk 
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
    <link rel="stylesheet" type="text/css" href="/assets/lib/jquery.vectormap/jquery-jvectormap-1.2.2.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/jqvmap/jqvmap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" href="/assets/css/app.css" type="text/css"/>
  </head>
  <body>
    <div class="be-wrapper">
      <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
          <div class="be-navbar-header"><a href="#" class="navbar-brand"></a>
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
            <div class="page-title"><span>DashBoard</span></div>
            <ul class="nav navbar-nav float-right be-icons-nav">
              <li class="nav-item dropdown"><a href="#" role="button" aria-expanded="false" class="nav-link be-toggle-right-sidebar"><span class="icon mdi mdi-settings"></span></a></li>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">DashBoard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class="parent"><a href="#"><i class="icon mdi mdi-home"></i><span>DashBoard</span></a>
                    <ul class="sub-menu">
                      <li class="active" ><a href="#">Info</a>
                      </li>
                      <li><a href="https://admin.wayales.com/intelligence/">Intelligence</a>
                      </li>
                      <li ><a href="https://admin.wayales.com/campaigns/">Campaigns</a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                          <div id="spark1" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">Unique Users</div>
                            <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span data-toggle="counter" data-end=<?php echo $unique_count; ?> class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                          <div id="spark2" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">Brand Views</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end=<?php echo $impression_count; ?> class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                          <div id="spark3" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">Sessions</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end=<?php echo $session_count; ?> class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
                        <div class="widget widget-tile">
                          <div id="spark4" class="chart sparkline"></div>
                          <div class="data-info">
                            <div class="desc">Connections</div>
                            <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-up"></span><span data-toggle="counter" data-end=<?php echo $impression_count; ?> class="number">0</span>
                            </div>
                          </div>
                        </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="widget widget-fullwidth be-loading">
                <div class="widget-head">
                  <div class="tools">
                    <div class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle"><span class="icon mdi mdi-more-vert d-inline-block d-md-none"></span></a>
                      <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item">Week</a><a href="#" class="dropdown-item">Month</a><a href="#" class="dropdown-item">Year</a>
                        <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Today</a>
                      </div>
                    </div><span class="icon mdi mdi-chevron-down"></span><span class="icon toggle-loading mdi mdi-refresh-sync"></span><span class="icon mdi mdi-close"></span>
                  </div>
                  <div class="button-toolbar d-none d-md-block">
                    <div class="btn-group">
                      <button type="button" class="btn btn-secondary">Week</button>
                      <button type="button" class="btn btn-secondary active">Month</button>
                      <button type="button" class="btn btn-secondary">Year</button>
                    </div>
                    <div class="btn-group">
                      <button type="button" class="btn btn-secondary">Today</button>
                    </div>
                  </div><span class="title">Wayalés</span>
                </div>
                <div class="widget-chart-container">
                  <div class="widget-chart-info">
                    <ul class="chart-legend-horizontal">
                      <li><span data-color="main-chart-color1"></span> Connections</li>
                      <li><span data-color="main-chart-color2"></span> Sessions</li>
                      <li><span data-color="main-chart-color3"></span> Impressions</li>
                    </ul>
                  </div>
                  <div class="widget-counter-group widget-counter-group-right">
                    <div class="counter counter-big">
                      <div class="value">100%</div>
                      <div class="desc">Connections</div>
                    </div>
                    <div class="counter counter-big">
                      <div class="value">85%</div>
                      <div class="desc">Sessions</div>
                    </div>
                    <div class="counter counter-big">
                      <div class="value">100%</div>
                      <div class="desc">Impressions</div>
                    </div>
                  </div>
                  <div id="main-chart" style="height: 260px;"></div>
                </div>
                <div class="be-spinner">
                  <svg width="40px" height="40px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                    <circle fill="none" stroke-width="4" stroke-linecap="round" cx="33" cy="33" r="30" class="circle"></circle>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="card card-table">
                <div class="card-header">
                  <div class="tools dropdown"><span class="icon mdi mdi-download"></span><a href="#" role="button" data-toggle="dropdown" class="dropdown-toggle"><span class="icon mdi mdi-more-vert"></span></a>
                    <div role="menu" class="dropdown-menu"><a href="#" class="dropdown-item">Action</a><a href="#" class="dropdown-item">Another action</a><a href="#" class="dropdown-item">Something else here</a>
                      <div class="dropdown-divider"></div><a href="#" class="dropdown-item">Separated link</a>
                    </div>
                  </div>
                  <div class="title">Latest Connections</div>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:37%;">User</th>
                        <th style="width:36%;">Email</th>
                        <th style="width:27%;">Device</th>
                        <th class="actions"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td class="user-avatar"> <img src="/assets/img/avatar6.png" alt="Avatar"><?php echo $info_array[0]['lastname']; ?></td>
                        <td><?php echo $info_array[0]['email']; ?></td>
                        <td><?php echo $info_array[0]['devicetype']; ?></td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-smartphone"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="/assets/img/avatar4.png" alt="Avatar"><?php echo $info_array[1]['lastname']; ?></td>
                        <td><?php echo $info_array[1]['email']; ?></td>
                        <td><?php echo $info_array[1]['devicetype']; ?></td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-smartphone"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="/assets/img/avatar5.png" alt="Avatar"><?php echo $info_array[2]['lastname']; ?></td>
                        <td><?php echo $info_array[2]['email']; ?></td>
                        <td><?php echo $info_array[2]['devicetype']; ?></td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-smartphone"></i></a></td>
                      </tr>
                      <tr>
                        <td class="user-avatar"> <img src="/assets/img/avatar3.png" alt="Avatar"><?php echo $info_array[3]['lastname']; ?></td>
                        <td><?php echo $info_array[3]['email']; ?></td>
                        <td><?php echo $info_array[3]['devicetype']; ?></td>
                        <td class="actions"><a href="#" class="icon"><i class="mdi mdi-smartphone"></i></a></td>
                      </tr>
                    </tbody>
                  </table>
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
    <script src="/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="/assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="/assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="/assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="/assets/js/app-dashboard.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//initialize the javascript
      	App.init();
      	App.dashboard();
      });
      
    </script>
  </body>
</html>
