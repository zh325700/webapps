          
    <?php if (htmlentities($this->session->userdata('permission')) >= '2' && htmlentities($this->session->userdata('allow_Caregiver')) == 'allow'): ?>

     
            <div class="container-fluid">
                <div id="blue" class="row" style="padding-bottom: 0%">
                    <div class="col-sm-offset-0" style="padding-left:2.5%">
                        <h2>
                            {Add_Activity}
                        </h2>
                    </div>
                </div>
                <div  class="row" style="padding-top: 0%">
                    <?php echo validation_errors(); ?>
                    <?php echo form_open_multipart('CaregiverOperateActivity/addActivity'); ?> <!--form_open_multipart so we can add image-->
                    <div id="forms" class="col-sm-6" >
                        <div class="form-group"> <label for="Title" class="text-dark">{Title}</label>
                            <input required="" type="text" name="Title" class="form-control" id="InputTitle" placeholder="{Add_Activity_Title}"
                                   value="<?php echo isset($_POST["Title"]) ? $_POST["Title"] : ''; ?>"> </div>

                        <div class="form-group" > <label for="Time" class="text-dark">{Time}</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input required="" type="datetime-local" name="Time" class="form-control" id="InputTime"
                                       value="<?php echo isset($_POST["Time"]) ? $_POST["Time"] : ''; ?>"> 
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                        </div>
                    </div>
                    <div id="forms_2" class="col-sm-6" style="padding-top:3%;padding-right:2.5%;padding-bottom: 8%">    
                        <div class="form-group"> <label for="Description" class="text-dark">{Description}</label>
                            <textarea class="form-control"  name="Description" id="InputDescription" rows="10" placeholder="{Add_Activity_description}"></textarea>
                        </div>
                        <button type="submit" class="btn btn-lg button btn-block">{Add_Activity}</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>






        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<?php else: ?>
    <p>
    <br><br><br>
        <span style="text-align: center;" class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
    <br><br><br>
<?php endif; ?>
