		<!--our css and less-->
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/Main.less" />
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/Caregiver.less" />

		<!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        
<link href="<?php echo base_url(); ?>assets/css/care_reg.css" rel="stylesheet" type="text/css"/>
		
	</head>
	<body>
		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		?>
		<div class="container-fluid header">
			<img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100.3%; height:auto" class=""/>
			<div class="top-right2">
			<img class="top-right2" src="<?php echo base_url(); ?>/image/pictograms/home.png" style="border: solid; border-color: #EDEEF4" Value="HOME" Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Overview/newOverView'"/>
			</div>
			<div class="top-right">
				<input Type="button" class="btn btn-lg top-right" Value="LOGOUT" Onclick="location.href = '<?php echo base_url(); ?>index.php/Logout'"/>
			</div>
		</div>
      
