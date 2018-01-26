

<?php
$date = $resident['Birthday'];
$idelder = $resident['ID_Elder'];
$idfacility = $resident['ID_facility'];
$firstname = $resident['FirstName'];
$lastname = $resident['LastName'];
$division = $resident['Division'];
$pic = $resident['Picture'];
$language = $resident['Language'];
?>
<div class="container-fluid">
    <div id="blue" class="row">
        <div class="col-sm-offset-0" style="padding-left: 2.5%">
            <h1>
                {Gelieve_geboortedag_vullen}
            </h1>
        </div>
    </div> 

    <div class="row" style="margin-top:1.5%; padding-left:1.5%">
        <div class="col-sm-offset-0 col-sm-2" style="">
            <img src="../../image/photos/<?= $pic ?>" alt="" style=" width: 85%; margin-bottom: 5%" class="align-left"/>
        </div>

        <form id="form">
            <div class="col-sm-offset-1 col-sm-2" style="padding-right:0%; padding-top: 0%">
                <h2>{Birthday}: </h2>
            </div>
            <div class="col-sm-4" > 
                <h2>
                    <input id="date" type="text" class="forms" placeholder="dd/mm/yyyy" 
                           pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" readonly="readonly">
                </h2>
            </div>
        </form>

    </div>
    <div class="row">
        <div class="col-sm-2" style="padding-left: 2.5%">
            <button class="btn button style extrasmall btn-block" style="margin-top: 0"
                    onclick="loadPage('ResidentLogin', 'view')">
                {Dit_ben}<br> {ik_niet}</button>
        </div>

        <div class="col-md-offset-1 col-md-2 col-md-offset-1 col-sm-3" style="padding-right:0.6%">
            <button class="btn button style numpad btn-block" 
                    onclick="javascript:addNumber('1');"> 1 </button>
        </div>
        <div class="col-md-2 col-sm-3" style="padding-left:0.6%;padding-right:0.6%">
            <button class="btn button style numpad btn-block"
                    onclick="javascript:addNumber('2');"> 2 </button>
        </div>
        <div class="col-md-2 col-sm-3" style="padding-left:0.6%">                           
            <button class="btn button style numpad btn-block" 
                    onclick="javascript:addNumber('3');"> 3 </button>
        </div>
    </div>
    <div class="row" style="margin-top: 0.5%; height: 10%; ">
        <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3" style="padding-right:0.6%">
            <button class="btn button style numpad btn-block" 
                    onclick="javascript:addNumber('4');"> 4 </button>
        </div>
        <div class="col-md-2 col-sm-3" style="padding-left:0.6%;padding-right:0.6%">
            <button class="btn button style numpad btn-block"
                    onclick="javascript:addNumber('5');"> 5 </button>
        </div>
        <div class="col-md-2 col-sm-3" style="padding-left:0.6%">                            
            <button class="btn button style numpad btn-block" 
                    onclick="javascript:addNumber('6');"> 6 </button>
        </div>
    </div>
    <div class="row" style="margin-top: 0.5%; height: 10%">
        <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3" style="padding-right:0.6%">
            <button class="btn button style numpad btn-block"
                    onclick="javascript:addNumber('7');"> 7 </button>
        </div>
        <div class="col-md-2 col-sm-3" style="padding-left:0.6%;padding-right:0.6%">
            <button class="btn button style numpad btn-block" 
                    onclick="javascript:addNumber('8');"> 8 </button>
        </div>
        <div class="col-md-2 col-sm-3" style="padding-left:0.6%">                            
            <button class="btn button style numpad btn-block"
                    onclick="javascript:addNumber('9');"> 9 </button>
        </div>
    </div>
    <div class="row" style="margin-top: 0.5%; height: 10%">
        <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3" style="padding-right:0.6%">
            <button class="btn button style numpad btn-block"
                    onclick="javascript:addNumber('0');"> 0 </button>
        </div>
        <div class="col-md-2 col-sm-3"style="padding-left:0.6%;padding-right:0.6%">
            <button class="btn button style numpad btn-block"
                    onclick="javascript:addNumber('delete');"> {Delete} </button>
        </div>
        <div class="col-md-2 col-sm-3" style="padding-left:0.6%">                            
            <button class="btn button style numpad btn-block"
                    onclick="javascript:addNumber('clear');"> {Clear} </button>
        </div>
    </div>

</div>

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
<script src="<?php echo base_url(); ?>/assets/js/loginverification.js"></script>

<script >
                        setDate("<?= $date ?>", "<?= $idelder ?>", "<?= $idfacility ?>",
                                "<?= $firstname ?>", "<?= $lastname ?>", "<?= $division ?>",
                                "<?= $pic ?>", "<?= $language ?>");
</script>

