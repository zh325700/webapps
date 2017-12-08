
<div class="container-fluid flex">

    <div class="row justify-content-md-center">
        <div class="col col-md-2"></div>
        <div class="col-md-6">
            <h2 class=" text-center ">
                Add New Facility
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
                       <label>Facility Name:</label> 
                    </div>
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="Name" placeholder="Add Name">
                    </div>                 
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                        <label>City: </label> 
                    </div>                
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="City" placeholder="Add City">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                         <label>Post: </label> 
                    </div>
                    <div class="col-md-5 input-group">
                         <input type="text" class="form-control" name="Postcode" placeholder="Add Postcode">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                        <label>Street: </label> 
                    </div>
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="Street" placeholder="Add Street">
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-5 ">
                      <label>Number:</label> 
                    </div>
                    <div class="col-md-5 input-group">
                       <input type="text" class="form-control" name="Number" placeholder="Add number">
                    </div>
                </div>
            </div>
        
        </div>
        <div class="row insert-row"> 
            <div class="col col-md-4"></div>
            <div class="col col-md-2">
              <button type="submit"  class="btn btn-default btn-lg btn-block ">Add Facility</button>
           </div> 
                 
        </div>
        <div class="row insert-row"> 
        <div class="col col-md-4"></div>
        </div>
</div>       
<script src="<?= base_url() ?>assets/js/jquery.js"></script>

