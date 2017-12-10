<<<<<<< HEAD
<div class="container-fluid flex">

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h2 class=" text-center headertwo">
                Add New Residents
            </h2>
        </div>
=======
<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>

<div class="container-fluid flex">

    <div class="row justify-content-md-center">
         <div class="col col-md-2"></div>
           <div class="col-md-6">
            <h2 class=" text-center headertwo">
                Add New Residents
            </h2>
           </div>
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
    </div>


    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('CaregiverOperateResident/create'); ?> <!--form_open_multipart so we can add image-->
    <div class="row">
        <div class="col-md-8">
            <div class="row insert-row">
                <div class="col col-md-1"></div>
<<<<<<< HEAD
                <div class="col col-md-4 fontsize">
                    First Name
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <input type="text" class="form-control" name="FirstName" placeholder="Add FirstName">
                    </div>
                </div>
            </div>
            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    Last Name
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <input type="text" class="form-control" name="LastName" placeholder="Add LastName">
                    </div>
                </div>
=======
                <div class="col col-md-4 ">
                   <label>First Name: </label> 
                </div>
               
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="FirstName" placeholder="Add FirstName" value="<?php echo isset($_POST["FirstName"]) ? $_POST["FirstName"] : ''; ?>">
                    </div>
               
            </div>
            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 ">
                    <label>Last Name:</label> 
                </div>
               
                    <div class="col-md-5 input-group">
                        <input type="text" class="form-control" name="LastName" placeholder="Add LastName" value="<?php echo isset($_POST["LastName"]) ? $_POST["LastName"] : ''; ?>">
                    </div>
              
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
<<<<<<< HEAD
                <div class="col col-md-4 fontsize">
                    Gender
                </div>
                <div class="col-md-5" id="checkboxGroup">
                    <div class="form-group">
                        <label>
                            <div class=" col-md-3">
                                <img src="https://cdn2.iconfinder.com/data/icons/person-gender-hairstyle-clothes-variations/48/Female-Side-comb-O-neck-512.png" style="width:40px;height:40px;">

                                <input type="checkbox"name="Sex" value="F" style="width:15px;height:15px;text-align: center;"></div>
                        </label>
                        <label>
=======
                <div class="col col-md-4 ">
                    <label>Gender:</label> 
                </div>
                <div class="col-md-6" id="checkboxGroup">
                    <div class="form-group">
                       
                            <div class="col-md-3">
                                <img src="https://cdn2.iconfinder.com/data/icons/person-gender-hairstyle-clothes-variations/48/Female-Side-comb-O-neck-512.png" style="width:40px;height:40px;">

                                <input type="checkbox" name="Sex" value="F" style="width:15px;height:15px;text-align: center;">
                            </div>
                       
                      
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
                            <div class=" col-md-3">
                                <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/user-male-icon.png" style="width:40px;height:40px;">

                                <input type="checkbox"name="Sex" value="M" style="width:15px;height:15px;text-align: center;">
                            </div>
<<<<<<< HEAD
                        </label>
=======
                       
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
                    </div>
                </div>
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
<<<<<<< HEAD
                <div class="col col-md-4 fontsize">
                    Birthday
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <input type="date" class="form-control" name="Birthday" placeholder="Add Birthday">
                    </div>
                </div>
=======
                <div class="col col-md-4 ">
                    <label> Birthday:</label> 
                </div>
                
                    <div class="col-md-5 input-group">
                        <input type="date" class="form-control" name="Birthday" placeholder="Add Birthday" value="<?php echo isset($_POST["Birthday"]) ? $_POST["Birthday"] : ''; ?>">
                    </div>
              
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
<<<<<<< HEAD
                <div class="col col-md-4 fontsize">
                    Room Number
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <input type="text" class="form-control" name="RoomNumber" placeholder="Add Room number">
                    </div>
                </div>
=======
                <div class="col col-md-4 ">
                    <label> Room Number: </label>
                </div>
                
                    <div class="col-md-2 input-group">
                        <input type="text" class="form-control" name="RoomNumber" placeholder="Add Room number" value="<?php echo isset($_POST["RoomNumber"]) ? $_POST["RoomNumber"] : ''; ?>">
                    </div>
               
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
<<<<<<< HEAD
                <div class="col col-md-4 fontsize">
                    Facility
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <select name="ID_Facility" class="form-control">
=======
                <div class="col col-md-4 ">
                   <label> Facility:</label>
                </div>
                
                    <div class="col-md-5 input-group">
                        <select name="ID_Facility" class="form-control">
						<option disabled selected value> -- Select a Facility -- </option>
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
                            <?php foreach ($facilities as $fac): ?>
                                <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                            <?php endforeach; ?>
                        </select>


                        <!--<input type="text" class="form-control" name="ID_Facility" placeholder="Add ID Facility number">-->
                    </div>
<<<<<<< HEAD
                </div>
            </div>

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Upload Image</label>
=======
               
            </div>

        </div>
        <div class="col-md-3">
            <div class="form-group">
                <p style="font-size: 20px; font-family: sans-serif; font-weight: Bold">Upload Image</p>
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
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
<<<<<<< HEAD
    <div class="row"> 
        <div class="col col-md-4" style="text-align: center;">
            <button type="submit"  class="btn btn-lg">Add Residents</button>
        </div> 
        <div class="col col-md-4"></div>
    </div>
=======
        <div class="row insert-row"> 
            <div class="col col-md-4"></div>
            <div class="col col-md-2">
            <button type="submit"  class="btn btn-default btn-lg btn-block ">Add Resident</button>
           </div> 
       
            
        </div>
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68



</form>

</div>
<!--Javascript libraries--> 
<<<<<<< HEAD
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
=======
<script>   // allow to only check one sex 
    $('input[type="checkbox"]').on('change', function () {
        $('input[name="Sex"]').not(this).prop('checked', false);
    });
</script>


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
