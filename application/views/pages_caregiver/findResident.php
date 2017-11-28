
<div class="row justify-content-md-center">
    <div class="col-md-6">
        <h2 class=" text-center">
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

<div>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By LastName: </label><input type='text' name='LastName' value='' class='auto'></p>
    </form>
</div>
<div>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By Room Number: </label><input type='text' name='RoomNumber' value='' class='auto'></p>
    </form>
</div>

<!--Add general function here-->
<?php

$array = array();
foreach ($residents as $res){
        $array[] = array(
        'LastName' => $res['LastName'],
        'Picture' => $res['Picture'],
        'ID_Elder' => $res['ID_Elder'],
        'RoomNumber' => $res['RoomNumber']
    );
}
// Defining function
function getResidentBy($relatedInfo, $nameOfInput,$array) {
    if (isset($_POST[$nameOfInput])) {
        $info = $_POST[$nameOfInput];
        $filteredArray = array_filter($array, function($element) use($info,$relatedInfo) {
            return isset($element[$relatedInfo]) && $element[$relatedInfo] == $info;
        });
        foreach ($filteredArray as $fArray) {
            $pic = $fArray['Picture'];
            $id = $fArray['ID_Elder'];
            $lastname = $fArray['LastName'];
            ?>
            <div style="display: inline-block">
                <img onclick="loadPage('CaregiverOperateResident', 'view/<?php echo $id; ?>')" src="<?php echo base_url(); ?>image/photos/<?php echo $pic; ?>" alt="<?php echo $lastname ?>" style="width:360px;height:360px;border:10px blue;">
                <figcaption class="text-center"><?php echo $lastname; ?></figcaption>
            </div>
            <?php

            }
            }
            }

// Calling function
            getResidentBy('LastName', 'LastName',$array);
            getResidentBy('RoomNumber', 'RoomNumber',$array);
            ?>







