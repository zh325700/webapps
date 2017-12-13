<html>    
    
    <?php
    function sortResidentsBySex($sex){
        foreach($residents as $res){
            if ($res['Sex'] == $sex){
                
            }
        }
    }
    ?>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2>
                        Graceage: login bewoners
                    </h2>
                
                    <h3>
                        Welkom
                    </h3>
                </div>
            </div>
            <div class="row">
                <div>     
                    <button class="btn btn-default btn-lg" id="female_btn" onclick="location.href = '<?php echo base_url(); ?>index.php/LoginResident/loadBySex?sex=F'">
                        vrouw
                    </button>
                    <button class="btn btn-default btn-lg " id="male_btn" onclick="location.href = '<?php echo base_url(); ?>index.php/LoginResident/loadBySex?sex=M'">
                        Man
                    </button> 
                    <button class="btn btn-default btn-lg " id="male_btn" onclick="loadPage('Welcome', 'Resident/menu')">
                        Skip to resident page
                    </button>
                </div>
            </div>
            <div class="row">
                <h2>
                    Ik ben:
                </h2>
            </div>
            <div class="row">
                <div id="overviewResidents" class="col-md-12" style="overflow:scroll;height:700px;">
                    <?php
                    foreach ($residents as $res){
                        $fName = $res['FirstName'];
                        $lName = $res['LastName'];
                        $pic = $res['Picture'];
                        ?>
                            <div style="display: inline-block">
                                <img onclick="loadPage('LoginResident', 'next')" src="<?php echo base_url(); ?>image/photos/<?php echo $pic; ?>" alt="<?php echo $lName ?>" style="width:300px;height:300px;border:10px blue;">
                                <figcaption class="text-center"><?= $fName;?> <?= $lName;?> </figcaption>
                            </div>
                        <?php
                    }
                    
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <center>HCI/webapps project: team 2</center>
                    </p>
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
