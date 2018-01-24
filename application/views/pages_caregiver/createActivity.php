        <link href="<?php echo base_url(); ?>assets/css/care_reg.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>            
<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
        <img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100%; height:auto" class=""/>

        <div class="py-5 bg-primary text-white" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="text-dark">{Add_Activity}</h1>
                        <?php echo validation_errors(); ?>
                        <?php echo form_open_multipart('CaregiverOperateActivity/addActivity'); ?> <!--form_open_multipart so we can add image-->
                        <div class="form-group"> <label for="Title" class="text-dark">{Title}</label>
                            <input required="" type="text" name="Title" class="form-control" id="InputTitle" placeholder="{Add_Activity_Title}"
                                   value="<?php echo isset($_POST["Title"]) ? $_POST["Title"] : ''; ?>"> </div>

                        <div class="form-group"> <label for="Time" class="text-dark">{Time}</label>
                            <input required="" type="date" name="Time" class="form-control" id="InputTime" placeholder="{Add_Time}"
                                   value="<?php echo isset($_POST["Time"]) ? $_POST["Time"] : ''; ?>"> </div>
                        <div class="form-group"> <label for="Description" class="text-dark">{Description}</label>
                            <textarea class="form-control"  name="Description" id="InputDescription" rows="10" placeholder="{Add_Activity_description}"></textarea>
                                      </div>
                        <button style="margin-top: 3vh;" type="submit" class="btn btn-info w-100">{Add_Activity}</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>


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
