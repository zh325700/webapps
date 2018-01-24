
<!--our css and less-->
<link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>/assets/css/pj_login_resident.less" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/introjs.css" />

<!--compile less files-->
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

<!--javascript includes-->
<script type="text/JavaScript" src="<?php echo base_url(); ?>/assets/js/intro.js"></script>

</head>
<body>
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>




    <?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-1" style="padding-left: 20px">
                    <img src="<?php echo base_url(); ?>/image/pictograms/<?= $category ?>.png" alt="" class="align"/>
                </div>
                <div class="col-sm-offset-1">
                    <h1>
                        <?= $category ?> (vraag <p id="question_number" style="display: inline">1</p>)
                    </h1>
                </div>
            </div>
        </div>

        <div class="container" >   
            <div class="row" data-step="1" data-intro="Here you can see the questions" data-position='right'>
                <div class="col-sm-8" style="padding-left: 20px">
                    <h2 id = "question_content"></h2>
                </div>
            </div>


            <div class="row" data-step="2" data-intro="select answer by click the faces" data-position='top'>
                <div class="col-sm-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/smiley1.png" onclick="javascript:getQuestion(1)" alt="" class="smiley" usemap="#map"/>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/smiley2.png" onclick="javascript:getQuestion(2)" alt="" class="smiley" usemap="#map"/>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/smiley3.png" onclick="javascript:getQuestion(3)" alt="" class="smiley" usemap="#map"/>
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/smiley4.png" onclick="javascript:getQuestion(4)" alt="" class="smiley" usemap="#map"/>
                </div> 
                <div class="col-sm-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/smiley5.png" onclick="javascript:getQuestion(5)" alt="" class="smiley" usemap="#map"/>
                </div>    
                <div class="col-sm-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/dontknow.png" onclick="javascript:getQuestion(1)" alt="" class="smiley" usemap="#map"/>
                </div> 
            </div>

            <div class="row">
                <div class="col-sm-2">
                    <p >{Never}</p>
                </div>
                <div class="col-sm-2">
                    <p>{Rarely}</p>
                </div>
                <div class="col-sm-2">
                    <p>{Sometimes}</p>
                </div>
                <div class="col-sm-2">
                    <p>{Most_time}</p>
                </div> 
                <div class="col-sm-2">
                    <p>{Always}</p>
                </div>  
                <div class="col-sm-2">
                    <p>{Ik_weet} </br>{het_niet}</p>
                </div> 
            </div>

            <div class="row">
                <div class="col-sm-offset-0 col-sm-3">
                    <a id = "previousBtn" type="button" class="btn btn-lg logout" onclick="javascript:previous()">{Ga_terug}</a>          
                </div>     
            </div>


            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

            <!-- Javascript libraries -->
            <?php
            if (isset($js_to_load)) {
                foreach ($js_to_load as $js_lib):
                    ?>
                    <script src="<?php echo base_url(); ?>/assets/js/<?= $js_lib ?>"></script>
                <?php
                endforeach;
            }
            ?>

            <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/question.js"></script>

            <script type="text/javascript">
                        loadQuestions(<?php echo json_encode($questions) ?>, "<?php echo $category ?>", "<?php echo $this->session->userdata('ID_Elder') ?>");
            </script>

<?php else: ?>
            <p>
                <br><br><br>
            <center>
                <span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
            </center>
            <br><br><br>
            </p>
<?php endif; ?>
