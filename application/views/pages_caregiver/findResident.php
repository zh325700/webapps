<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

    <div class="container-fluid">
        <div id ="blue" class="row ">
            <div class="col-sm-offset-0" style="padding-left: 2.5%">
                <h2 >
                    {Find_Residents}
                </h2>
            </div>
        </div>
        <style>
            label { display: table-cell; }
            input { display: table-cell; flex-direction: column;}

            .alignColumn{
                display: flex;
                flex-direction: column;
            }
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
            array_push($arrayFacility, $res['ID_facility']);
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
            <div id="forms" class="col-sm-offset-0 col-sm-4">
                <form   action='' method='post'>
                    <div class="form-group"><label >{LastName} </label><input id="formInput" type='text' name='LastName' placeholder="{LastName}" class='autoLastName form-control'></div>
                    <div class="form-group"><label >{FirstName} </label><input id="formInput" type='text' name='FirstName' placeholder="{FirstName}"  class='autoFirstname form-control'></div>
                    <div class="form-group"><label >{RoomNumber} </label><input id="formInput" type='text' name='RoomNumber' placeholder="{RoomNumber}" class='autoRoom form-control'></div>
                    <div class="form-group"><label >{Facility} </label>
                        <select name="ID_facility" id="formInput" class="form-control">
                            <option value=""> - {Select_Facility} - </option>
                            <?php foreach ($facilities as $fac): ?>
                                <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                            <?php endforeach; ?>
                        </select></div>
                    
                    <div class="form-group"> <label for="Gender" class="text-dark">{Gender}</label>
                            <label style="padding-left: 5vh">
                                <div>
                                    <img src="<?php echo base_url(); ?>/image/pictograms/female.png" style="width:40px;height:40px;">

                                    <input  type="checkbox" name="Sex" value="F" style="width:15px;height:15px">
                                </div>
                            </label>
                            <label style="padding-left: 10vh">
                                <div >
                                    <img src="<?php echo base_url(); ?>/image/pictograms/male.png" style="width:40px;height:40px;">

                                    <input   type="checkbox"name="Sex" value="M" style="width:15px;height:15px">
                                </div>
                            </label>
                        </div>

                    <div class="form-group">
                        <button class="btn btn-lg btn-block form-control button" type="submit" value="{FIND}" name="findres" />{FIND}</button>
                    </div>
                </form>
            </div>
            <div class="col-sm-8" style="overflow:scroll; padding-top: 3%" height="320" width="320">

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
                        'ID_facility' => $res['ID_facility']
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
                            <div style="display: inline-block" class="col-sm-offset-2">
                                <img onclick="loadPage('CaregiverOperateResident', 'view/<?php echo $id; ?>')" src="<?php echo base_url(); ?>image/photos/<?php echo $pic; ?>" alt="<?php echo $lastname ?>" style="width:200px; height:200px; border:10px blue;" >
                                <figcaption class="text-center"><?php echo $lastname; ?></figcaption>
                            </div>
                            <?php
                        }
                    }
                }

// Calling function
                getResidentBy('LastName', 'LastName', $array);
                getResidentBy('RoomNumber', 'RoomNumber', $array);
                getResidentBy('ID_facility', 'ID_facility', $array);
                getResidentBy('Sex', 'Sex', $array);
                getResidentBy('FirstName', 'FirstName', $array);
                ?>

            </div>
        </div>
    </div>

    <script>   // allow to only check one sex 
        $('input[type="checkbox"]').on('change', function () {
            $('input[name="Sex"]').not(this).prop('checked', false);
        });
    </script>


<?php else: ?>
    <p>
        <br><br><br>
    <center>
        <span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
    </center>
    <br><br><br>
    </p>
<?php endif; ?>
