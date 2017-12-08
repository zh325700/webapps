
<div class="container-fluid flex">

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h2 class=" text-center headertwo">
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
                    <div class="col col-md-4 fontsize">
                        Name
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="Name" placeholder="Add Name">
                        </div>
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        City
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="City" placeholder="Add City">
                        </div>
                    </div>
                </div>
              

                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        Post Code
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="Postcode" placeholder="Add Postcode">
                        </div>
                    </div>
                </div>
                
                 <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        Street
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="Street" placeholder="Add Street">
                        </div>
                    </div>
                </div>

                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                      Number
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="Number" placeholder="Add number">
                        </div>
                    </div>
                </div>
              
            </div>
           
        </div>
        <div class="row"> 
        <div class="col col-md-6" style="text-align: center;">
            <button type="submit"  class="btn btn-lg">Add Facility</button>
        </div> 
        
        </div>
   

 
</div>       
<script src="<?= base_url() ?>assets/js/jquery.js"></script>

