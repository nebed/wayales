<?php 
include '/opt/snstv/authchange.php';
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
  <body class="be-splash-screen">
    <div class="be-wrapper be-login be-signup">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container sign-up">
            <div class="card card-border-color card-border-color-primary">
              <div class="card-header"><img src="/assets/img/logo-xx.png" alt="logo" width="204" height="80" class="logo-img"><span class="splash-description">Please FIll in The Required Boxes</span></div>
              <div class="card-body">

                <form action="" method="post"><span class="splash-title pb-4">Change Password</span>
                <div class="form-group">
                    <input type="text" name="username" maxlength="50" required="yes" placeholder="Username"  class="form-control">
                  </div>  
                <div class="form-group">
                    <input type="password" name="former" maxlength="50" required="yes" placeholder="Old Password"  class="form-control">
                  </div>
                  <div class="form-group">
                    <input type="password" name="new" required="yes" maxlength="50" placeholder="New Password"  class="form-control">
                  </div>
                  <div class="form-group">
                      <input name="new-confirm" type="password" required="yes" maxlength="50" placeholder="Confirm New Password" class="form-control">
                  </div>
                  <div class="form-group pt-2">
                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-xl">Change</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="splash-footer">&copy; 2018 Wayalés</div>
          </div>
        </div>
      </div>
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
