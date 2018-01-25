<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>HCI</title>

		<!-- Latest compiled and minified bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!-- optional theme-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

		<!--javascript includes-->
		<script src="<?php echo base_url();?>/assets/js/sha512.js"></script> 
		<script src="<?php echo base_url();?>/assets/js/forms.js"></script>
		
		<!--autcompletion-->
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  
		
		<!--load a page-->
		<script>
			function loadPage(controller, page){
				location.href = "<?php echo base_url();?>index.php/" + controller + "/" + page;
			}
		</script>