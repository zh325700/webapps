        <!--our css and less-->
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>/assets/css/pj_login_resident.less" />
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url(); ?>/assets/css/Resident.less" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/introjs.css" />
        
        <!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

        <!--javascript includes-->
        <script src="<?php echo base_url(); ?>/assets/js/intro.js"></script>

    </head>
    <body>
        <?php
        defined('BASEPATH') OR exit('No direct script access allowed');
        ?>
        	<img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100%; height:auto" alt="header"/>	

		<div class ="row">
                <div class="col-sm-offset-0">
                        <img id="home" class="topIcon" src="<?php echo base_url(); ?>/image/pictograms/home.png"  alt="HOME" Onclick="loadPage('Welcome', 'Resident/menu')"/>
                        <a id="homeLink" class=" top " Onclick="loadPage('Welcome', 'Resident/menu')">{HOME}</a>              
                    </div>
                    <div class="col-sm-offset-1">
                        <h2 class="par1" Onclick="loadPage('Welcome', 'Resident/menu')">Grace-AGE</h2>
                    </div>
                    <div class="col-sm-offset-11">
                          <a href="javascript:void(0);"  onclick="javascript:introJs().setOption('showProgress', true).start();">
			  <img class="top-right" src="<?php echo base_url(); ?>/image/pictograms/information.png" alt=""/>
			  </a>                  
                          <a id="infoLink" class=" top" >Info</a>              
                    </div>
                </div>
