<?php if (htmlentities($this->session->userdata('permission')) >= '3' && htmlentities($this->session->userdata('allow_Caregiver')) == 'allow'): ?>

<div class="container-fluid flex">

    <div id="blue" class="row">
            <div class="col-sm-offset-0" style="padding-left: 2.5%">
                <h2>
                    {Add_Facility}
                </h2>
            </div>
        </div>


    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('CaregiverFacility/addfacility'); ?> <!--form_open_multipart so we can add image-->
       
    <div class="col-sm-offset-0 col-sm-5" style="padding-left:2.5%; padding-top: 1%">
        <div id="forms" class="row" style="padding-left:0%">
            <label>{Facility_Name}</label> 
        </div>
        <div class="row" >
            <input id="formInput_N" type="text" class="form-control" name="Name" placeholder="{Add_Name}" required>
        </div>
        <div class="row" >
            <label>{City}</label> 
        </div>
        <div class="row">
            <input id="formInput_C" type="text" class="form-control" name="City" placeholder="{Add_City}" required>
        </div>
        <div class="row">
            <label>{Postcode}</label>  
        </div>
        <div class="row">
            <input id="formInput_P" type="text" class="form-control" name="Postcode" placeholder="{Add_Postcode}" required>
         </div>
    </div>
    
    <div class="col-sm-offset-2 col-sm-5" style="padding-right:2.5%; padding-top:2%">
        <div id="forms_2" class="row" style="padding-left:0%">
            <label>{Street}</label> 
        </div>
        <div class="row">
            <input id="formInput_S" type="text" class="form-control" name="Street" placeholder="{Add_Street}" required>
        </div>
        <div class="row">
            <label>{Number}</label> 
        </div>
        <div class="row">
            <input id="formInput_Nu" type="text" class="form-control" name="Number" placeholder="{Add_Number}" required>
        </div>
        <div class="row insert-row" style="padding-bottom:30%">
              <button type="submit" class="btn btn-lg btn-block button form-control">{Add_Facility}</button>
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
