<?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>

<div class="container-fluid flex">

    <div id="blue" class="row">
            <div class="col-sm-offset-0" style="padding-left: 2.5%">
                <h2>
                    {Add_New_Facility}
                </h2>
            </div>
        </div>


    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('CaregiverFacility/addfacility'); ?> <!--form_open_multipart so we can add image-->
        
    <div class="row">
        <div id="forms" class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
            <label>{Facility_Name}</label> 
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Name" placeholder="{Name}" required>
        </div> 
    </div>    
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
            <label>{City}</label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="City" placeholder="{City}" required>
        </div> 
    </div> 
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
             <label>{Postcode}</label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Postcode" placeholder="{Postcode}" required>
        </div> 
    </div> 
    
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
              <label>{Street}</label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Street" placeholder="{Street}" required>
        </div> 
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5 " style="padding-left:2.5%">
              <label>{Number}</label> 
        </div>
    </div>
     
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5" style="padding-left:2.5%">
            <input id="formInput" type="text" class="form-control" name="Number" placeholder="{Number}" required>
        </div> 
    </div>
                
    <div class="row">
        <div class="col-sm-offset-0 col-sm-5" style="padding-left: 2.5%; padding-top: 2%; padding-right:0%">
              <button type="submit"class="btn btn-lg btn-block button form-control">{Add_Facility}</button>
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
