<!--our css and less-->
<link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>/assets/css/pj_login_resident.less" />

<!--compile less files-->
<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

</head>
<body>
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    ?>

    <?php
    $date = $resident['Birthday'];
    $pic = $resident['Picture'];
    ?>
    <div class="container-fluid" style="height: 6%; width:100.3%">
        <div class="row">
            <div class="col-sm-offset-1" style="padding-left: 17px">
                <h1 style="margin-top:0.75%">
                    {Login_verificatie}
                </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-top:0.5%">
            <div class="col-md-2 col-sm-2" style="padding-left: 0">
                <img src="../../image/photos/<?= $pic ?>" alt="" style=" width: 100px" class="align-left"/>
            </div>

            <div class="col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-9">
                <h1 class="par2">{Gelieve_geboortedag_vullen}:</h1>
            </div>
        </div>
        <div class="row" style="margin-top:0%">

            <div class="col-sm-3" style="padding-left: 0">
                <button class="btn button style small btn-block" onclick="loadPage('ResidentLogin', 'view')">
                    {Dit_ben}<br> {ik_niet}</button>
            </div>
            <form action="" id="form">
                <div class="col-md-2 col-sm-3">
                    <h2>{Birthday}: </h2>
                </div>
                <div class="col-md-4 col-sm-offset-1 col-sm-4"> 
                    <h2>
                        <input id="date" type="text" style="width:130%" placeholder="dd/mm/yyyy" 
                               pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" readonly="true">
                    </h2>
                </div>
            </form>

        </div>

        <div class="row" style="height: 10%">
            <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3" >
                <button class="btn button style small btn-block" onclick="javascript:addNumber('1');"> 1 </button>
            </div>
            <div class="col-md-2 col-sm-3">
                <button class="btn button style small btn-block" onclick="javascript:addNumber('2');"> 2 </button>
            </div>
            <div class="col-md-2 col-sm-3">                            
                <button class="btn button style small btn-block" onclick="javascript:addNumber('3');"> 3 </button>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5%; height: 10%">
            <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3">
                <button class="btn button style small btn-block" onclick="javascript:addNumber('4');"> 4 </button>
            </div>
            <div class="col-md-2 col-sm-3">
                <button class="btn button style small btn-block" onclick="javascript:addNumber('5');"> 5 </button>
            </div>
            <div class="col-md-2 col-sm-3">                            
                <button class="btn button style small btn-block" onclick="javascript:addNumber('6');"> 6 </button>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5%; height: 10%">
            <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3">
                <button class="btn button style small btn-block" onclick="javascript:addNumber('7');"> 7 </button>
            </div>
            <div class="col-md-2 col-sm-3">
                <button class="btn button style small btn-block" onclick="javascript:addNumber('8');"> 8 </button>
            </div>
            <div class="col-md-2 col-sm-3">                            
                <button class="btn button style small btn-block" onclick="javascript:addNumber('9');"> 9 </button>
            </div>
        </div>
        <div class="row" style="margin-top: 0.5%; height: 10%">
            <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3">
                <button class="btn button style small btn-block" onclick="javascript:addNumber('0');"> 0 </button>
            </div>
            <div class="col-md-2 col-sm-3">
                <button class="btn button style small btn-block" onclick="javascript:addNumber('delete');"> Delete </button>
            </div>
            <div class="col-md-2 col-sm-3">                            
                <button class="btn button style small btn-block" onclick="javascript:addNumber('clear');"> Clear </button>
            </div>
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

    <script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/loginverification.js"></script>

    <script type="text/javascript">
                           setDate("<?php echo $date ?>", $resident['ID_Elder'], 
                           $resident['ID_facility'], $resident['FirstName'], 
                           $resident['LastName'], $resident['division'], 
                           $resident['Picture']);
    </script>

</body>
</html>
