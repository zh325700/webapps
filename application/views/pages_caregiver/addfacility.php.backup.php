<?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>

<div class="container-fluid flex">

    <div class="row justify-content-md-center">
        <div class="col col-md-2"></div>
        <div class="col-md-6">
            <h2 class=" text-center ">
                {Add_New_Facility}
            </h2>
        </div>
    </div>

    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('addfacility_control/addfacility'); ?> <!--form_open_multipart so we can add image-->
        <div class="row">
            <div class="col-md-8">
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                       <label>{Facility_Name}:</label> 
                    </div>
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="Name" placeholder="{Add_Name}">
                    </div>                 
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                        <label>{City}: </label> 
                    </div>                
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="City" placeholder="{Add_City}">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                         <label>{Post}: </label> 
                    </div>
                    <div class="col-md-5 input-group">
                         <input type="text" class="form-control" name="Postcode" placeholder="{Add_Postcode}">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                        <label>{Street}: </label> 
                    </div>
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="Street" placeholder="{Add_Street}">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                      <label>{Number}:</label> 
                    </div>
                    <div class="col-md-5 input-group">
                       <input type="text" class="form-control" name="Number" placeholder="{Add_number}">
                    </div>
                </div>
            </div>
        
        </div>
        <div class="row insert-row"> 
            <div class="col col-md-4"></div>
            <div class="col col-md-2">
              <button type="submit"class="btn btn-default btn-lg btn-block ">{Add_Facility}</button>
           </div> 
        </div>
   
</div>       
<script src="<?= base_url() ?>assets/js/jquery.js"></script>

<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>