
<?php

include_once 'db_connect.php';
include_once 'functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
$profpic = '../../images/elderly.jpg';
?>
<html>
    <head>
           <style type="text/css">

          body {
            background-image: url('<?php echo $profpic;?>');
            background-size: cover;
           }
        </style>
        
        <meta charset="utf-8">
        <title>Care givers Login </title>
        <!-- Latest compiled and minified bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        <!-- optional theme-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <script type="text/JavaScript" src="../../js/sha512.js"></script> 
        <script type="text/JavaScript" src="../../js/forms.js"></script> 
        <link rel="stylesheet" href="../../assets/logincg.css">
        
        
    </head>
    <body>
        
        <div class="container-fluid">
            <div class="row top1">
                
            </div>
            <div class="cont">
                <div class="box">
                   
                    <div class="row middle sg">
                        <div class="row sg pic">
                            <div class="col-md-4 col-md-offset-4">
                                <img src="../../images/loginimage1.png" alt="" class="photo">
                            </div>
                        </div>
                         <?php
                          if (isset($_GET['error'])) {
                          echo '<p class="error">Error Logging In!</p>';
                          }
                        ?> 
                        <form action="process_login.php" method="post" name="login_form" class="form-horizontal form ">
                            <div class="input-group y">
                                <span class="input-group-addon"><i class="fa fa-user user"></i></span>
                                <input type="text" name="email" class="form-control" placeholder="Username/e-mail">
                            </div>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-unlock-alt user"></i></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="password">
                            </div>
                                <input type="button" class="bttn" value="Login" onclick="formhash(this.form, this.form.password);" /> 
                                                                       
                        </form>
                           <p>If you don't have a login, please <a href="register.php">register</a></p>
                          
                    </div>
                    
                    
                </div> 
            </div> 
             <div class="container">
              <div class="navbar-text pull-right">
                  <p>Copyright: HCI/webapps project-team 2 &copy; 2017</p>
              </div>
             
           </div>
        </div>


        <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
        <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    </body>
</html>
