<?php if (htmlentities($this->session->userdata('permission')) >= '3' && htmlentities($this->session->userdata('allow_Caregiver')) == 'allow'): ?>

<div class="container-fluid">

    <div id="blue" class="row">
        <div class="col-sm-offset-0" style="padding-left:2.5%">
            <h2>
                {Edit_Facility}
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
            <input type="text" class="form-control" name="Name" placeholder="{Add_Name}" value="<?php echo $facility['Name']; ?>" required>
        </div>
        <div class="row" style="padding-left:2.5%">
            <label>{City}</label> 
        </div>
        <div class="row" style="padding-left:2.5%">
            <input type="text" class="form-control" name="City" placeholder="{Add_City}" value="<?php echo $facility['City']; ?>" required>
        </div>
        <div class="row" style="padding-left:2.5%">
            <label>{Postcode}</label>  
        </div>
        <div class="row" style="padding-left:2.5%">
            <input type="text" class="form-control" name="Postcode" placeholder="{Add_Postcode}" value="<?php echo $facility['Postcode']; ?>" required>        </div>
    </div>
    
    <div class="col-sm-offset-2 col-sm-5" style="padding-right:2.5%">
        <input type="hidden"  name="ID_facility" value="<?php echo $facility['ID_facility']; ?>">
        <div id="forms_2" class="row" style="padding-left:0%">
            <label>{Street}</label> 
        </div>
        <div class="row">
            <input type="text" class="form-control" name="Street" placeholder="{Add_Street}" value="<?php echo $facility['Street']; ?>" required>
        </div>
        <div class="row">
            <label>{Number}</label> 
        </div>
        <div class="row">
            <input type="text" class="form-control" name="Number" placeholder="{Add_Number}" value="<?php echo $facility['Number']; ?>" required>
        </div>
        <div class="row insert-row" style="padding-bottom:30%">
           <button class="btn btn-lg btn-block button" type="submit" >{EDIT}</button>
        </div>
    </div>   
    <?php echo form_close()?>
</div>    

<script src="<?= base_url() ?>assets/js/jquery.js"></script>


<?php else: ?>
<p>
<br><br><br>
<span style="text-align: center;" class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
<br><br><br>
<?php endif; ?>
