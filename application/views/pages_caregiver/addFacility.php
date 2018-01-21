<?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>

<div class="container-fluid flex">

    <div id="blue" class="row">
            <div class="col-sm-offset-0" style="padding-left: 2.5%">
                <h2>
                    Add New Facility
                </h2>
            </div>
        </div>


    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('CaregiverFacility/addfacility'); ?> <!--form_open_multipart so we can add image-->
        
    <div class="row">
        <div id="forms" class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
            <label>Facility Name:</label> 
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 input-group" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Name" placeholder="Name" required>
        </div> 
    </div>    
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
            <label>City: </label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 input-group" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="City" placeholder="City" required>
        </div> 
    </div> 
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
             <label>Post Code: </label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 input-group" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Postcode" placeholder="Post code" required>
        </div> 
    </div> 
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
              <label>Street: </label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 input-group" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Street" placeholder="Street" required>
        </div> 
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
              <label>Number:</label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 input-group" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Number" placeholder="number" required>
        </div> 
    </div>
                
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5" style="padding-left: 2.5%; padding-top: 2%">
              <button type="submit"class="btn btn-lg btn-block button form-control">Add Facility</button>
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
