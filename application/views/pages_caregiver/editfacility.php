<?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>

<div class="container-fluid flex">

    <div class="row justify-content-md-center">
        <div class="col col-md-2"></div>
        <div class="col-md-6">
            <h2 class=" text-center ">
                Edit Facility
            </h2>
        </div>
    </div>

    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('addfacility_control/update'); ?> <!--form_open_multipart so we can add image-->
        <div class="row">
            <div class="col-md-8">
                <input type="hidden" name="ID_facility" value="<?php echo $facility['ID_facility']; ?>" >
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                       <label>Facility Name:</label> 
                    </div>
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="Name" placeholder="Add Name" value="<?php echo $facility['Name']; ?>">
                    </div>                 
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                        <label>City: </label> 
                    </div>                
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="City" placeholder="Add City" value="<?php echo $facility['City']; ?>">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                         <label>Post: </label> 
                    </div>
                    <div class="col-md-5 input-group">
                         <input type="text" class="form-control" name="Postcode" placeholder="Add Postcode" value="<?php echo $facility['Postcode']; ?>">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                        <label>Street: </label> 
                    </div>
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="Street" placeholder="Add Street" value="<?php echo $facility['Street']; ?>">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                      <label>Number:</label> 
                    </div>
                    <div class="col-md-5 input-group">
                       <input type="text" class="form-control" name="Number" placeholder="Add number" value="<?php echo $facility['Number']; ?>">
                    </div>
                </div>
            </div>
        
        </div>
        <div class="row insert-row"> 
            <div class="col col-md-4"></div>
            <div class="col col-md-2">
              <button class="btn btn-default btn-lg btn-block" onclick="loadPage('Addfacility_control', 'update/<?php echo $facility['ID_facility']; ?>')">{Edit}</button>
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
