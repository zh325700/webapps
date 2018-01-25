<div class="container-fluid">
    <div id="blue" class="row">
        <div class="col-sm-offset-0" style="padding-left: 2.5%">
            <h1>
                {Login_resident}
            </h1>
        </div>
    </div>      

    <!--                    <div class="row">
                            <div class="col-sm-4">
                                <h1>
                                    Ik verblijf op :
                                </h1>
                            </div>
                            <div class="col-sm-7 dropdown" style="padding-left: 0;">
                                <button class="btn style btn-block" type="button" data-toggle="dropdown"><?= $division ?><span class="caret"/></button>
                                <ul class="dropdown-menu" style="text-height: text-size"> <h1>
                                    <li><a href="<?php echo base_url(); ?>index.php/ResidentLogin/loadByDivision?division=0">Verdieping 0</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/ResidentLogin/loadByDivision?division=1">Verdieping 1</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/ResidentLogin/loadByDivision?division=2">Verdieping 2</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo base_url(); ?>index.php/ResidentLogin/loadByDivision?division=3">Verdieping 3</a></li> </h1>
                                </ul>
                            </div>
                        </div>-->
    <div class="row" data-step="1" data-intro="Choose your gender" data-position='top'>
        <div class="col-sm-4" style="margin-top: 1%; padding-left: 2.5%">
            <h1>
                {Ik_ben_een} :
            </h1>
        </div>

        <div class="col-md-4 col-sm-4" style="padding-left: 2.5%" >
            <button class="btn style btn-block" id="female_btn" onclick="location.href = '<?php echo base_url(); ?>index.php/ResidentLogin/loadBySex?sex=F'">
                {Vrouw}
            </button>
        </div>
        <div class="col-md-4 col-sm-4" style="padding-right: 2.5%">
            <button class="btn style btn-block" id="male_btn" onclick="location.href = '<?php echo base_url(); ?>index.php/ResidentLogin/loadBySex?sex=M'">
                {Man}
            </button>
        </div>
    </div> 
    <div class="row">
        <div class="col-sm-12" style="padding-left: 2.5%">
            <h1>
                {Selecteer_foto}:
            </h1>
        </div>
    </div>
    <div class="row" data-step="2" data-intro="Choose your picture" data-position='top' style="padding-left:2.5%; padding-right:2.5%">
        <div id="overviewResidents" class="col-md-12 border-style " style="overflow-y: scroll; height: 50%;">
            <?php
            foreach ($residents as $res) {
                $fName = $res['FirstName'];
                $lName = $res['LastName'];
                $pic = $res['Picture'];
                $id = $res['ID_Elder'];
                ?>
                <div class="col-sm-3 col-md-2" style="display: inline-block; margin-top: 2%; margin-bottom: 2%; margin-right: 4%; margin-left:4%">
                    <img onclick="loadPage('ResidentLogin', 'verification?id=<?= $id ?>')"
                         src="<?php echo base_url(); ?>image/photos/<?php echo $pic; ?>"
                         alt="<?php echo $lName ?>" 
                         style="width:200px ;height:200px;border:10px blue;">
                    <div class="col-sm-6 figcaption"><?= $fName; ?> <?= $lName; ?> </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- Javascript libraries -->
<?php
if (isset($js_to_load)) {
    foreach ($js_to_load as $js_lib):
        ?>
        <script src="<?php echo base_url(); ?>/assets/js/<?= $js_lib ?>"></script>
        <?php
    endforeach;
}
?>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/loginResident.js"></script>
</html>

