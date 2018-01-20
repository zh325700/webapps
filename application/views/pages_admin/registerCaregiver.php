
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/care_reg.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100%; height:auto" class=""/>
        <div class="py-5 bg-primary text-white" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="text-dark">{Register_Caregiver}</h1>
                        <p class="text-dark">{Welcome}</p>
                        <?php echo form_open_multipart('AdminRegister/register_caregiver'); ?>
                        <div class="form-group"> <label for="InputName" class="text-dark">{Username}</label>
                            <input type="text" name="username" class="form-control" id="InputName" placeholder="{Username}"
                                   value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>"> </div>

                        <div class="form-group"> <label for="InputEmail1" class="text-dark">{Email_address}</label>
                            <input type="email" name="email" class="form-control" id="InputEmail1" placeholder="{Enter_email}"
                                   value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"> </div>

                        <div class="form-group"> <label class="text-dark">{password}</label>
                            <input type="password" required="" id="password" name="password" class="form-control" placeholder="{password}"> </div>

                        <div class="form-group"> <label class="text-dark">{Confirm_Password} </label><span style="padding-left: 50px" id='message'></span>
                            <input type="password" required="" id="confirm_password" name="confirm_password" class="form-control" placeholder="{Type_Password_again}"> </div>

                        
                    </div>
                    <div class="col-sm-6" style="margin-top: 11.2vh;">
                        <div class="form-group" > <label for="Facility" class="text-dark">{Facility}</label>
                            <select required="" name="ID_Facility" class="form-control">
                                <option disabled selected value> -- {Select_Facility} -- </option>
                                <?php foreach ($facilities as $fac): ?>
                                    <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                                <?php endforeach; ?>
                            </select></div>
                        <div class="form-group"> <label for="InputAdminLevel" class="text-dark">{Permission_level}</label>
                            <select required="" id="admin" name="permission" class="form-control">
                                <option disabled selected value> -- {Select_Adminlevel} -- </option>
                                <option value="1">{internship}</option>
                                <option value="2">{Caregiver}</option>
                                <option value="3">{Boss}</option>
                            </select> </div>
                        <button type="button" onclick="formhash(this.form, this.form.password)"  class="btn btn-info w-100">{Create_Caregiver}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <script> // confirm password 
            $('#password, #confirm_password').on('keyup', function () {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Matching').css('color', 'green');
                } else
                    $('#message').html('Not Matching').css('color', 'red');
            });</script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="<?php echo base_url() ?>assets/js/forms.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/js/sha512.js" type="text/javascript"></script>

    </body>
    <div class="container">
        <center><p style="font-size:15px;">Copyright: HCI/webapps project-team 2 &copy; 2017</p></center>
    </div>

</html>