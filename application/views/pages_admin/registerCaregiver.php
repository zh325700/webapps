
            <div class="container-fluid">
                <div id="blue" class="row">
                    <div class="col-sm-offset-0" style="padding-left:2.5%">
                        <h2 class="text-dark">{Register_Caregiver}</h2>
                    </div>
                </div> 
                <div class="row">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('AdminRegister/register_caregiver'); ?>
                    <div id="forms1" class="col-sm-6" style="padding-left:2.5%; padding-top:2%">
                        <div class="form-group"> <label for="InputName" class="text-dark">{Username}</label>
                            <input type="text" id="InputName" name="username" class="form-control" placeholder="{Add_Username}"
                                   value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>"> </div>

                        <div class="form-group"> <label for="InputEmail1" class="text-dark">{Email_address}</label>
                            <input type="email" id="InputEmail1" name="email" class="form-control" placeholder="{Add_Email}"
                                   value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"> </div>

                        <div class="form-group"> <label class="text-dark">{password}</label>
                            <input type="password" required="" id="password" name="password" class="form-control" placeholder="{Add_password}"> </div>

                        <div class="form-group"> <label class="text-dark">{Confirm_Password} </label><span style="padding-left: 50px" id='message'></span>
                            <input type="password" required="" id="confirm_password" name="confirm_password" class="form-control" placeholder="{Type_Password_again}"> </div>

                        
                    </div>
                    <div id="forms2" class="col-sm-6" style="padding-right:2.5%; padding-top:2%">
                        <div class="form-group" > <label for="Facility" class="text-dark">{Facility}</label>
                            <select required="" id="Facility" name="ID_Facility" class="form-control">
                                <option disabled selected value> -- {Select_Facility} -- </option>
                                <?php foreach ($facilities as $fac): ?>
                                    <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                                <?php endforeach; ?>
                            </select></div>
                        <div class="form-group"> <label for="InputAdminLevel" class="text-dark">{Permission_level}</label>
                            <select required="" id="InputAdminLevel" name="permission" class="form-control">
                                <option disabled selected value> -- {Select_Adminlevel} -- </option>
                                <option value="1">{internship}</option>
                                <option value="2">{Caregiver}</option>
                                <option value="3">{Boss}</option>
                            </select> </div>
                        
                        <div class="row">
                        <div class="col-sm-offset-0 col-md-offset-0 col-md-12" style="padding-bottom:5%;padding-top: 23.5%;padding-left:2.5%; padding-right: 3%">
                            <button type="button" onclick="formhash(this.form, this.form.password)"  class="btn btn-lg btn-block button">{Create_Caregiver}</button>
                        </div>
                    </div>
                    
                      </div>
                    <?php echo form_close(); ?>
                </div>
    
                
            </div>


        <script> // confirm password 
            $('#password, #confirm_password').on('keyup', function () {
                if ($('#password').val() === $('#confirm_password').val()) {
                    $('#message').html('Matching').css('color', 'green');
                } else
                    $('#message').html('Not Matching').css('color', 'red');
            });</script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/js/forms.js" ></script>
        <script src="<?php echo base_url() ?>assets/js/sha512.js" ></script>

