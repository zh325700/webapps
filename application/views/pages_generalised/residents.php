        <!--our css and less-->
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>/assets/css/residentsLore.less" />
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
		<div class="container-fluid header">
		  <img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100.3%; height:auto" class=""/>
		  <div class="col-sm-5 par1">
			   <h2 class="par1">Grace-AGE</h2>
		  </div>
		  <div class="top-right2">
		  <img class="top-right2" src="<?php echo base_url(); ?>/image/pictograms/home.png" style="border: solid; border-color: #EDEEF4"onclick="loadPage('Welcome', 'Resident/menu')"/>
		  </div>
		  <div class="top-right">
			  <a href="javascript:void(0);"  onclick="javascript:introJs().setOption('showProgress', true).start();">
			  <img class="top-right" src="<?php echo base_url(); ?>/image/pictograms/information.png" alt=""/>
			  </a>
		  </div>
		</div>
