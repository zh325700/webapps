
<h2><?= $title ?>, Here should be the general title</h2>
<div class="row justify-content-md-center">
    <div class="col-md-6">
        <h2 class=" text-center headertwo">
            Find Residents
        </h2>
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
    $(function () {

        //autocomplete
        $(".auto").autocomplete({
            source: "findResident.php",
            minLength: 1
        });

    });
</script>
<?php $array = array(); ?>
<?php foreach ($residents as $res): ?>
    <?php
    $array[] = array(
        'LastName' => $res['LastName'],
        'Picture' => $res['Picture'],
        'ID_Elder' => $res['ID_Elder']
    );
    ?> 

<?php endforeach; ?>
<div>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By LastName: </label><input type='text' name='LastName' value='' class='auto'></p>
    </form>
</div>
<?php if (isset($_POST["LastName"])): $lastname = $_POST["LastName"]; ?>      <!--if you input something in the text field-->
    <?php
    $filteredArray = array_filter($array, function($element) use($lastname) {
        return isset($element['LastName']) && $element['LastName'] == $lastname;
    });
    ?><!--find all arrays that have the same lastname and store in $filteredArray-->

    <?php foreach ($filteredArray as $fArray): ?>
        <?php
        $pic = $fArray['Picture'];
        $id = $fArray['ID_Elder'];
        ?>
        <div style="display: inline-block">
                <img onclick="loadPage('CaregiverOperateResident', 'view/<?php echo $id; ?>')" src="<?php echo base_url();?>/image/photos/<?php echo $pic; ?>" alt="<?php echo $lastname ?>" style="width:360px;height:360px;border:10px blue;">
                <figcaption class="text-center"><?php echo $lastname; ?></figcaption>
        </div>
    <?php endforeach; ?>


<?php endif; ?>

