<?php
/*
if (login_check() == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}*/
?>

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
