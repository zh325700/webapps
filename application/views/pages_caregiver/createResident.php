<div class="container-fluid flex">

    <div class="row justify-content-md-center">
         <div class="col col-md-2"></div>
           <div class="col-md-6">
            <h2 class=" text-center headertwo">
                Add New Residents
            </h2>
           </div>
    </div>


    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('CaregiverOperateResident/create'); ?> <!--form_open_multipart so we can add image-->
    <div class="row">
        <div class="col-md-8">
            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 ">
                   <label>First Name: </label> 
                </div>
               
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="FirstName" placeholder="Add FirstName">
                    </div>
               
            </div>
            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 ">
                    <label>Last Name:</label> 
                </div>
               
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="LastName" placeholder="Add LastName">
                    </div>
              
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 ">
                    <label>Gender:</label> 
                </div>
                <div class="col-md-6" id="checkboxGroup">
                    <div class="form-group">
                       
                            <div class="col-md-3">
                                <img src="https://cdn2.iconfinder.com/data/icons/person-gender-hairstyle-clothes-variations/48/Female-Side-comb-O-neck-512.png" style="width:40px;height:40px;">

                                <input type="checkbox" name="Sex" value="F" style="width:15px;height:15px;text-align: center;">
                            </div>
                       
                      
                            <div class=" col-md-3">
                                <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/user-male-icon.png" style="width:40px;height:40px;">

                                <input type="checkbox"name="Sex" value="M" style="width:15px;height:15px;text-align: center;">
                            </div>
                       
                    </div>
                </div>
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 ">
                    <label> Birthday:</label> 
                </div>
                
                    <div class="col-md-5 input-group">
                        <input type="date" class="form-control" name="Birthday" placeholder="Add Birthday">
                    </div>
              
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 ">
                    <label> Room Number: </label>
                </div>
                
                    <div class="col-md-2 input-group">
                        <input type="text" class="form-control" name="RoomNumber" placeholder="Add Room number">
                    </div>
               
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 ">
                   <label> Facility:</label>
                </div>
                
                    <div class="col-md-5 input-group">
                        <select name="ID_Facility" class="form-control">
                            <?php foreach ($facilities as $fac): ?>
                                <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                            <?php endforeach; ?>
                        </select>


                        <!--<input type="text" class="form-control" name="ID_Facility" placeholder="Add ID Facility number">-->
                    </div>
               
            </div>

        </div>
        <div class="col-md-3">
            <div class="form-group">
                <p style="font-size: 20px; font-family: sans-serif; font-weight: Bold">Upload Image</p>
                <input type="file" name="userfile" accept="image/*" onchange="loadFile(event)" size="20"><br>
                <img  id="output" width="300px" hight="400px">
                <script>
                    var loadFile = function (event) {
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            </div>
        </div>
    </div>
        <div class="row insert-row"> 
            <div class="col col-md-4"></div>
            <div class="col col-md-2">
            <button type="submit"  class="btn btn-default btn-lg btn-block ">Add Resident</button>
           </div> 
       
            
        </div>



</form>

</div>
<!--Javascript libraries--> 
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
