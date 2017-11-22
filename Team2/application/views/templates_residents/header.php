<html>
    <head>
        <meta charset="utf-8">
        <title>Remy House</title>     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">       
        <link href="<?= base_url() ?>assets/css/overview-Res.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <nav class="navbar navbar-expand-sm navbar-light bg-light">
                        <a class="navbar-brand" href="Team2">ciblog</a>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-link">
                                    <a href="<?php echo base_url(); ?>index.php/Main_resident/index">Main_resident</a>
                                </li>
                                <li class="nav-link">
                                    <a href="<?php echo base_url(); ?>index.php/MenuC_control/index">Menu</a>
                                </li>
                                <li class="nav-link">
                                    <a href="<?php echo base_url(); ?>index.php/LoginR_control/index">Login_res</a>
                                </li>
                                <li class="nav-link">
                                    <a href="<?php echo base_url(); ?>index.php/LoginCareGiver_control/index">Care giver Login </a>
                                </li>
                                <li class="nav-link">
                                    <a href="<?php echo base_url(); ?>index.php/Residents_control">Overview of Residents</a>
                                </li>
                                <li class="nav-link">
                                    <a href="<?php echo base_url(); ?>index.php/Residents_control/create">Add Residents</a>
                                </li>
                                <li class="nav-link">
                                    <a href="<?php echo base_url(); ?>index.php/QuestionControl/index">Questionnaire</a>
                                </li>                            
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container-fluid">