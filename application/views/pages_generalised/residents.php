        <!--our css and less-->
       
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
		<div class ="row">
                <div class="col-sm-offset-0">
                        <img id="home" class="topIcon" src="<?php echo base_url(); ?>/image/pictograms/home.png"  Value="HOME" Onclick="loadPage('Welcome', 'Resident/menu')"/>
                        <a id="homeLink" class=" top " Onclick="loadPage('Welcome', 'Resident/menu')">{HOME}</a>              
                    </div>
                    <div class="col-sm-offset-1">
                        <h2 class="par1" Onclick="location.href = '<?php echo base_url(); ?>index.php/Welcome/Overview/newOverView'">Grace-AGE</h2>
                    </div>
                    <div class="col-sm-offset-11">
                          <a href="javascript:void(0);"  onclick="javascript:introJs().setOption('showProgress', true).start();">
			  <img class="top-right" src="<?php echo base_url(); ?>/image/pictograms/information.png" alt=""/>
			  </a>                    </div>
                </div>
