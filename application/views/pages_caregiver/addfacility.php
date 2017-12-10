<<<<<<< HEAD
=======
<?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68

<div class="container-fluid flex">

    <div class="row justify-content-md-center">
<<<<<<< HEAD
        <div class="col-md-6">
            <h2 class=" text-center headertwo">
=======
        <div class="col col-md-2"></div>
        <div class="col-md-6">
            <h2 class=" text-center ">
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
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
<<<<<<< HEAD
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

=======
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
              <button type="submit"class="btn btn-default btn-lg btn-block ">Add Facility</button>
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
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
