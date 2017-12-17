<html>    
    
    <?php
//    function sortResidentsBySex($sex){
//        foreach($residents as $res){
//            if ($res['Sex'] == $sex){
//                
//            }
//        }
//    }
    ?>
    <head>
		<meta charset="utf-8">
		<title>HCI</title>

		<!-- Latest compiled and minified bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

		<!-- optional theme-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

		<!--our css and less-->
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/pj_login_resident.less" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  <!--autcompletion-->
        
        <!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

		<!--javascript includes-->
		<script type="text/JavaScript" src="<?php echo base_url();?>/assets/js/sha512.js"></script> 
		<script type="text/JavaScript" src="<?php echo base_url();?>/assets/js/forms.js"></script>
		
		<!--load a page-->
		<script>
			function loadPage(controller, page){
				location.href = "<?php echo base_url();?>index.php/" + controller + "/" + page;
			}
		</script>
	</head>
	<body>
		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		?>
		
		<img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100%; height:auto" class=""/>
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-offset-2">
                            <h1>
                                Login resident
                            </h1>
                        </div>
                    </div>
                </div>
                
                <div class="container">
                    <div class="row">
                        <h1>
                            I am a:
                        </h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-lg button style btn-block" id="female_btn" onclick="location.href = '<?php echo base_url(); ?>index.php/LoginResident/loadBySex?sex=F'">
                                Vrouw
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-lg button style btn-block" id="male_btn" onclick="location.href = '<?php echo base_url(); ?>index.php/LoginResident/loadBySex?sex=M'">
                                Man
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div id="overviewResidents" class="col-md-12" style="overflow:scroll; height:available;">
                            <?php
                            foreach ($residents as $res) {
                                $fName = $res['FirstName'];
                                $lName = $res['LastName'];
                                $pic = $res['Picture'];
                                $id = $res['ID_Elder'];
                                ?>
                                <div style="display: inline-block">
                                    <img onclick="loadPage('LoginResident', 'verification?id=<?= $id ?>')"
                                         src="<?php echo base_url(); ?>image/photos/<?php echo $pic; ?>"
                                         alt="<?php echo $lName ?>" 
                                         style="width:200px ;height:200px;border:10px blue;">
                                    <figcaption class="text-center"><?= $fName; ?> <?= $lName; ?> </figcaption>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
    </body>
    
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Javascript libraries -->
  <?php if (isset($js_to_load)) {
	foreach ($js_to_load as $js_lib):
		?>
		<script src="<?php echo base_url(); ?>/assets/js/<?= $js_lib ?>"></script>
	<?php endforeach;
}
?>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/loginResident.js"></script>
</html>
