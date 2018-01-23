		<!--our css and less-->
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/Main.less" />
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/Caregiver.less" />

		<!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        
        
		
	</head>
	<body>
		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		?>
     
                <img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100%; height:auto" class=""/>
                <div>
                    <h2 class="par1">Grace-AGE</h2>
                </div>
                <div>
                    <img id ="log" class="top-right2" src="<?php echo base_url(); ?>/image/pictograms/logout.png"  value="Log_out" Onclick="location.href = '<?php echo base_url(); ?>index.php/Logout'"/>
                </div>
                <div>
                    <a id = "link" class="btn btn-lg top-right" onclick="location.href = '<?php echo base_url(); ?>index.php/Logout'">{Log_out}</a>              
                </div>
                <div>
                    <img id="home" class="top-right2" src="<?php echo base_url(); ?>/image/pictograms/home.png"  Value="HOME" Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Overview/newOverView'"/>
		</div>
                <div class="">
                    <a id = "link2" class="btn btn-lg top-right " Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Overview/newOverView'">{HOME}</a>              
                </div>
            
            