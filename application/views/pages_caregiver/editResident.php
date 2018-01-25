           
<?php if (htmlentities($this->session->userdata('permission')) >= '2' && htmlentities($this->session->userdata('allow_Caregiver')) == 'allow'): ?>


            <div class="container-fluid">
                <div id="blue" class="row">
         
                <div class="col-sm-offset-0" style="padding-left:2.5%">
                   <h2>
                       {Edit_Residents}
                   </h2>
               </div>
                </div>
                <div class="row">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open('CaregiverOperateResident/update'); ?>
                    <div  id="forms2" class="col-sm-offset-0 col-sm-6" style="padding-left:2.5%">
                        <input type="hidden" name="ID_Elder" value="<?php echo $resident['ID_Elder']; ?>" >
                        <div class="form-group"> <label for="FirstName" class="text-dark">{FirstName}</label>
                            <input required="" type="text" name="FirstName" class="form-control" id="FirstName" placeholder="{Add_FirstName}"
                                   value="<?php echo $resident['FirstName']; ?>"> </div>
                        <div class="form-group"> <label for="LastName" class="text-dark">{LastName}</label>
                            <input required="" type="text" name="LastName" class="form-control" id="LastName" placeholder="{Add_LastName}"
                                   value="<?php echo $resident['LastName']; ?>"> </div>

                        <div class="form-group"> <label  class="text-dark">{Gender}</label>
                            <label style="padding-left: 10vh">
                                <span>
                                    <img src="<?php echo base_url(); ?>/image/pictograms/female.png" alt="female" style="width:40px;height:40px;">

                                    <input  type="checkbox" name="Sex" value="F" style="width:15px;height:15px;text-align: center;">
                                </span>
                            </label>
                            <label style="padding-left: 20vh">
                                <span >
                                    <img src="<?php echo base_url(); ?>/image/pictograms/male.png" alt="male" style="width:40px;height:40px;">

                                    <input  type="checkbox" name="Sex" value="M" style="width:15px;height:15px;text-align: center;">
                                </span>
                            </label>
                        </div>
                        <div class="form-group"> <label for="Birthday" class="text-dark">{Birthday}</label>
                            <input required="" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" type="text" class="form-control" name="Birthday"  id="Birthday"

                                   placeholder="{Day/Month/Year}" value="<?php echo $resident['Birthday']; ?>">
                        </div>

                        <div class="form-group"> <label for="RoomNumber" class="text-dark">{RoomNumber}</label>

                            <input  required="" type="text" class="form-control" name="RoomNumber" id="RoomNumber"

                                    placeholder="{Add_Roomnumber}" value="<?php echo $resident['RoomNumber']; ?>">
                        </div>

                    </div>

                    <div id="forms1" class="col-sm-6">

                        <div class="form-group" > <label for="ID_facility" class="text-dark">{Facility}</label>
                            <select required="" id="ID_facility" name="ID_facility" class="form-control">

                                <option disabled selected value> -- {Select_Facility} -- </option>
                                <?php foreach ($facilities as $fac): ?>
                                    <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group" > <label for="Add_Image" class="text-dark">{Upload_Image}</label><br>
                            <input required="" class="inputfile" id="Add_Image" type="file" name="userfile" accept="image/*" onchange="loadFile(event)" size="20"><br>
                            <img  id="output" width="300" height="170" src="#" >

                            <script>
                                var loadFile = function (event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                            </script>
                        </div>
                        <div class="row">
                              <div class="col-sm-offset-0 col-md-offset-0 col-md-12" >
                            <button type="submit" class="btn btn-lg btn-block button">{EDIT}</button>
                        </div>
                        
                        </div>

                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>


        <script>   // allow to only check one sex 
            $('input[type="checkbox"]').on('change', function () {
                $('input[name="Sex"]').not(this).prop('checked', false);
            });
        </script>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

    <!--Javascript libraries--> 
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
