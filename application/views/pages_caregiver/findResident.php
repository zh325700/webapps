
<div class="row justify-content-md-center">
    <div class="col-md-6">
        <FORM>
            <INPUT Type="BUTTON" Value="Homepage" Onclick="location.href = '<?php echo base_url(); ?>index.php'">
        </FORM>
    </div>
    <div class="col-md-6">
        <h2 class=" text-center">
            Find Residents
        </h2>
    </div>
</div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<?php
$arraylastname = array();
$arrayFirstname = array();
$arrayRoom = array();
$arrayFacility = array();
$arraySex = array();
foreach ($residents as $res) {
    array_push($arraylastname, $res['LastName']);
    array_push($arrayFirstname, $res['FirstName']);
    array_push($arrayRoom, $res['RoomNumber']);
    array_push($arrayFacility, $res['ID_Facility']);
    array_push($arraySex, $res['Sex']);
}
?>
<script type="text/javascript">
                var arraylastname = <?php echo json_encode($arraylastname) ?>; // push $residents into the array
                var arrayRoom = <?php echo json_encode($arrayRoom) ?>;
                var arrayFirstname = <?php echo json_encode($arrayFirstname) ?>;
                var arrayFacility = <?php echo json_encode($arrayFacility) ?>;
                var arraySex = <?php echo json_encode($arraySex) ?>;
                $(function () {
                    //autocomplete
                    $(".autoLastName").autocomplete({
                        source: arraylastname,
                        minLength: 1
                    });
                    $(".autoRoom").autocomplete({
                        source: arrayRoom,
                        minLength: 1
                    });
                    $(".autoFacility").autocomplete({
                        source: arrayFacility,
                        minLength: 1
                    });
                    $(".autoFirstname").autocomplete({
                        source: arrayFirstname,
                        minLength: 1
                    });
                    $(".autoSex").autocomplete({
                        source: arraySex,
                        minLength: 1
                    });
                });
</script>

<div>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By LastName: </label><input type='text' name='LastName' value='' class='autoLastName'></p>
    </form>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By FirstName: </label><input type='text' name='FirstName' value='' class='autoFirstname'></p>
    </form>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By Room Number: </label><input type='text' name='RoomNumber' value='' class='autoRoom'></p>
    </form>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By Facility Number: </label><input type='text' name='ID_Facility' value='' class='autoFacility'></p>
    </form>
    <form action='' method='post'>
        <p><label class="fontsize">Find Residents By Sex: </label><input type='text' name='Sex' value='' class='autoSex'></p>
    </form>
</div>

<!--Add general function here-->
<?php
$array = array();
foreach ($residents as $res) {
    $array[] = array(
        'LastName' => $res['LastName'],
        'FirstName' => $res['FirstName'],
        'Sex' => $res['Sex'],
        'Picture' => $res['Picture'],
        'ID_Elder' => $res['ID_Elder'],
        'RoomNumber' => $res['RoomNumber'],
        'ID_Facility' => $res['ID_Facility']
    );
}

// Defining function getResidentby all kind of related info, you should pass : relatedInfo name && input name && array to store resident to call this func
function getResidentBy($relatedInfo, $nameOfInput, $array) {
    if (isset($_POST[$nameOfInput])) {
        $info = $_POST[$nameOfInput];
        $filteredArray = array_filter($array, function($element) use($info, $relatedInfo) {
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
getResidentBy('LastName', 'LastName', $array);
getResidentBy('RoomNumber', 'RoomNumber', $array);
getResidentBy('ID_Facility', 'ID_Facility', $array);
getResidentBy('Sex', 'Sex', $array);
getResidentBy('FirstName', 'FirstName', $array);
?>







