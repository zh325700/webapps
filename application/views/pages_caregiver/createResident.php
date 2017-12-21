<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/care_reg.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>           

        <img src="<?php echo base_url(); ?>/image/pictograms/header.png" style=" max-width:100%; height:auto" class=""/>


        <div class="py-5 bg-primary text-white" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Add Resident</h1>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('CaregiverOperateResident/create'); ?> <!--form_open_multipart so we can add image-->
                        <div class="form-group"> <label for="FirstName" class="text-dark">{FirstName}</label>
                            <input required="" type="text" name="FirstName" class="form-control" id="InputName" placeholder="{Add_FirstName}"
                                   value="<?php echo isset($_POST["FirstName"]) ? $_POST["FirstName"] : ''; ?>"> </div>

                        <div class="form-group"> <label for="LastName" class="text-dark">{LastName}</label>
                            <input required="" type="text" name="LastName" class="form-control" id="InputName" placeholder="{Add_LastName}"
                                   value="<?php echo isset($_POST["LastName"]) ? $_POST["LastName"] : ''; ?>"> </div>

                        <div class="form-group"> <label for="Gender" class="text-dark">{Gender}</label>
                            <label style="padding-left: 10vh">
                                <div>
                                    <img src="https://cdn2.iconfinder.com/data/icons/person-gender-hairstyle-clothes-variations/48/Female-Side-comb-O-neck-512.png" style="width:40px;height:40px;">

                                    <input  type="checkbox" name="Sex" value="F" style="width:15px;height:15px;text-align: center;">
                                </div>
                            </label>
                            <label style="padding-left: 20vh">
                                <div >
                                    <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/user-male-icon.png" style="width:40px;height:40px;">

                                    <input   type="checkbox"name="Sex" value="M" style="width:15px;height:15px;text-align: center;">
                                </div>
                            </label>
                        </div>

                        <div class="form-group"> <label for="Birthday" class="text-dark">{Birthday}</label>
                            <input required="" pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" type="text" class="form-control" name="Birthday"
                                   placeholder="Day/Month/Year" value="<?php echo isset($_POST["Birthday"]) ? $_POST["Birthday"] : ''; ?>">
                        </div>

                        <div class="form-group"> <label for="RoomNumber" class="text-dark">{RoomNumber}</label>
                            <input  required="" type="text" class="form-control" name="RoomNumber" 
                                    placeholder="{Add_Roomnumber}" value="<?php echo isset($_POST["RoomNumber"]) ? $_POST["RoomNumber"] : ''; ?>">
                        </div>
                        <button style="margin-top: 3vh;" type="submit" class="btn btn-info w-100">{Add_Resident}</button>
                    </div>
                    <div class="col-sm-6" style="margin-top: 6.5vh;">
                        <div class="form-group" > <label for="ID_Facility" class="text-dark">{Facility}</label>
                            <select required="" name="ID_Facility" class="form-control">
                                <option disabled selected value> -- {Select_Facility} -- </option>
                                <?php foreach ($facilities as $fac): ?>
                                    <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" > <label for="Add Image" class="text-dark">{Upload_Image}</label><br>
                            <input required="" class="inputfile" type="file" name="userfile" accept="image/*" onchange="loadFile(event)" size="20"><br>
                            <img  id="output" width="300px" hight="400px">
                            <script>
                                var loadFile = function (event) {
                                    var output = document.getElementById('output');
                                    output.src = URL.createObjectURL(event.target.files[0]);
                                };
                            </script>
                        </div>

                    </div>
                    </form>
                </div>
            </div>

            </div>

            <!--Javascript libraries--> 
            <script>   // allow to only check one sex 
                $('input[type="checkbox"]').on('change', function () {
                    $('input[name="Sex"]').not(this).prop('checked', false);
                });
            </script>


            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </body>

<?php else: ?>
    <p>
        <br><br><br>
    <center>
        <span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
    </center>
    <br><br><br>
    </p>
<?php endif; ?>
