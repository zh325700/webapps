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
     
                <img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100%; height:auto"/>
                <div class ="row">
                    <div class="col-sm-offset-0">
                        <img id="home" class="topIcon" src="<?php echo base_url(); ?>/image/pictograms/home.png"  Value="HOME" Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Overview/newOverView'"/>
                        <a id="homeLink" class=" top " Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Overview/newOverView'">{HOME}</a>              
                    </div>
                    <div class="col-sm-offset-1">
                        <h2 class="par1" Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Overview/newOverView'">Grace-AGE</h2>
                    </div>
                    <div class="col-sm-offset-11">
                        <img id="log" class="topIcon" src="<?php echo base_url(); ?>/image/pictograms/logout.png"  value="Log_out" Onclick="location.href = '<?php echo base_url(); ?>index.php/Logout'"/>
                        <a id="logLink" class=" top" onclick="location.href = '<?php echo base_url(); ?>index.php/Logout'">{Log_out}</a>              
                    </div>
                </div>

                
            
                
            
            