<?php //if (htmlentities($this->session->userdata('permission')) >= '2'): ?>

<div class="container-fluid flex">

    <div class="row justify-content-md-center">
        <div class="col col-md-2"></div>
          <div class="col-md-6">
            <h2 class=" text-center headertwo">
                {Edit_Residents}
            </h2>
          </div>
    </div>

    <?php echo validation_errors(); ?>
    <?php echo form_open('CaregiverOperateResident/update'); ?>

    <div class="row">
        <div class="col-md-8">
            <input type="hidden" name="ID_Elder" value="<?php echo $resident['ID_Elder']; ?>" >
            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4">
                    <label>{FirstName}: </label> 
                </div>
                
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="FirstName" placeholder="{Add_FirstName}" value="<?php echo $resident['FirstName']; ?>">
                    </div>
            </div>
            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    <label>{LastName}:</label> 
                </div>
                
                     <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="LastName" placeholder="{Add_LastName}" value="<?php echo $resident['LastName']; ?>">
                    </div>
                
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4">
                     <label>{Gender}:</label> 
                </div>
                <div class="col-md-6" id="checkboxGroup">
                    <div class="form-group">
                            <label>
                            <div class=" col-md-3">
                                <img src="https://cdn2.iconfinder.com/data/icons/person-gender-hairstyle-clothes-variations/48/Female-Side-comb-O-neck-512.png" style="width:40px;height:40px;">

                                <input type="checkbox"name="Sex" value="F" style="width:15px;height:15px;text-align: center;"></div>
                        </label>
                        <label>
                            <div class=" col-md-3">
                                <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/user-male-icon.png" style="width:40px;height:40px;">

                                <input type="checkbox"name="Sex" value="M" style="width:15px;height:15px;text-align: center;">
                            </div>
                        </label>
                    </div>
                       
                </div>
            </div>
        

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    <label>{Birthday}:</label>
                </div>
                
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="Birthday" placeholder="Add Birthday" value="<?php echo $resident['Birthday']; ?>">
                    </div>
                
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    <label>{RoomNumber}:</label>
                </div>
                
                    <div class="col-md-2 input-group">
                        <input type="text" class="form-control" name="RoomNumber" placeholder="{Add_Roomnumber}" value="<?php echo $resident['RoomNumber']; ?>">
                    </div>
                
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    <label>{Facility}:</label>
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
                <p style="font-size: 20px; font-family: sans-serif; font-weight: Bold">{Upload_Image}</p>
                <input type="file" name="editImage" accept="image/*" onchange="loadFile(event)" size="20"><br>
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
            <button type="submit"  class="btn btn-default btn-lg btn-block ">{Edit_Resident}</button>
           </div> 
       
            
        </div>
</div>
</form>
<!--Javascript libraries--> 
<script>   // allow to only check one sex 
    $('input[type="checkbox"]').on('change', function () {
        $('input[name="Sex"]').not(this).prop('checked', false);
    });
</script>
<!--
<?php// else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php// endif; ?>
