


<!DOCTYPE html>
<html>
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
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/Main.less" />
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/Caregiver.less" />
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/Resident.less" />
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  <!--autcompletion-->
        <link href="<?php echo base_url();?>/assets/css/introjs.css" rel="stylesheet" type="text/css"/> <!--for hint of page-->
        <!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

		<!--javascript includes-->
		<script type="text/JavaScript" src="<?php echo base_url();?>/assets/js/sha512.js"></script> 
		<script type="text/JavaScript" src="<?php echo base_url();?>/assets/js/forms.js"></script>
		<script type="text/JavaScript" src="<?php echo base_url();?>/assets/js/intro.js"></script>  <!--hint for pages-->
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
		
		<img src="<?php echo base_url(); ?>/image/pictograms/header.png" style=" max-width:100%; height:auto" class=""/>
                 <a class="btn btn-large btn-success" href="javascript:void(0);" onclick="javascript:introJs().setOption('showProgress', true).start();">Show me how</a>
                 <!--Show  the instruction-->

        <div class="col col-md-4" id="homebutton">
            <input Type="button" class="btn btn-primary btn-lg" Value="HOME" Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Caregiver/overview'"/>
        </div>
