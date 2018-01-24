<?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>

<div class="container-fluid">

    <div id="blue" class="row">
        <div class="col-sm-offset-0" style="padding-left:2.5%">
            <h2>
                Edit Facility
            </h2>
        </div>
    </div>

    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('CaregiverFacility/update'); ?> <!--form_open_multipart so we can add image-->
    
    <div class="col-sm-offset-0 col-sm-5">
        <input type="hidden"  name="ID_facility" value="<?php echo $facility['ID_facility']; ?>">
        <div id="forms" class="row">
            <label>{Facility_Name}</label> 
        </div>
        <div class="row" style="padding-left:2.5%">
            <input type="text" class="form-control" name="Name" placeholder="Add Name" value="<?php echo $facility['Name']; ?>" required>
        </div>
        <div class="row" style="padding-left:2.5%">
            <label>{City}</label> 
        </div>
        <div class="row" style="padding-left:2.5%">
            <input type="text" class="form-control" name="City" placeholder="Add City" value="<?php echo $facility['City']; ?>" required>
        </div>
        <div class="row" style="padding-left:2.5%">
            <label>{Postcode}</label>  
        </div>
        <div class="row" style="padding-left:2.5%">
            <input type="text" class="form-control" name="Postcode" placeholder="Add Postcode" value="<?php echo $facility['Postcode']; ?>" required>        </div>
    </div>
    
    <div class="col-sm-offset-2 col-sm-5" style="padding-right:2.5%">
        <input type="hidden"  name="ID_facility" value="<?php echo $facility['ID_facility']; ?>">
        <div id="forms" class="row" style="padding-left:0%">
            <label>{Street}</label> 
        </div>
        <div class="row">
            <input type="text" class="form-control" name="Street" placeholder="Add Street" value="<?php echo $facility['Street']; ?>" required>
        </div>
        <div class="row">
            <label>{Number}</label> 
        </div>
        <div class="row">
            <input type="text" class="form-control" name="Number" placeholder="Add number" value="<?php echo $facility['Number']; ?>" required>
        </div>
        <div class="row insert-row" style="padding-bottom:30%">
            <button class="btn btn-lg btn-block button"  type = "submit">Edit</button>
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
