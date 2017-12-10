<?php //if (htmlentities($this->session->userdata('permission')) >= '1'): ?>


<div class="container-fluid">
    <div class="row justify-content-md-center">
         <div class="col col-md-2"></div>
         <div class="col-md-6">
            <h2 class=" text-center">
                {Find_Residents}
            </h2>
        </div>
    </div>
    <style>
        form  { display: table;      }
        p     { display: table-row;  }
        label { display: table-cell; }
        input { display: table-cell; }
    </style>
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
    <div class="row">
        <div class="col-md-4">
            <form  action='' method='post'>
                <p style="padding-top:100px"><label  >{LastName}: </label><input type='text' name='LastName' value='' class='autoLastName'></p>
                <p><label >{FirstName}: </label><input type='text' name='FirstName' value='' class='autoFirstname'></p>
                <p><label >{RoomNumber}: </label><input type='text' name='RoomNumber' value='' class='autoRoom'></p>
                <p><label >{Facility}: </label>
                    <select name="ID_Facility" class="form-control">
					<option value=""> - {Select_Facility} - </option>
                        <?php foreach ($facilities as $fac): ?>
                            <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <!--<input type='text' name='ID_Facility' value='' class='autoFacility'></p>-->
                <p><label class="fontsize">{Gender}: </label><input type='text' name='Sex' value='' class='autoSex'></p>
               <div class="row insert-row"> 
                <div class="col col-md-4"></div>
                   <div class="col col-md-12">
                      <button class="btn btn-default btn-lg btn-block " type="submit" value="{FIND}" name="findres" style="left: 115%; top: 15px"/>Find</button>;
                   </div>
               </div>
            </form>
        </div>
        <div class="col-md-8" style="overflow:scroll;height:700px;width: 66%;">
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
                            <img onclick="loadPage('CaregiverOperateResident', 'view/<?php echo $id; ?>')" src="<?php echo base_url(); ?>image/photos/<?php echo $pic; ?>" alt="<?php echo $lastname ?>" style="width:300px;height:300px;border:10px blue;">
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

        </div>
    </div>
</div>

<!--
<?php //else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php //endif; ?>
