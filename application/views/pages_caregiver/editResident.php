<div class="container-fluid flex">

    <div class="row justify-content-md-center">
        <div class="col-md-6">
            <h2 class=" text-center headertwo">
                Edit Residents
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
                <div class="col col-md-4 fontsize">
                    First Name
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <input type="text" class="form-control" name="FirstName" placeholder="Add FirstName"
                               value="<?php echo $resident['FirstName']; ?>">
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
                        <input type="text" class="form-control" name="LastName" placeholder="Add LastName"
                               value="<?php echo $resident['LastName']; ?>">
                    </div>
                </div>
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    Gender
                </div>
                <div class="col-md-5" >
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
                    Birthday
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <input type="date" class="form-control" name="Birthday" placeholder="Add Birthday"
                               value="<?php echo $resident['Birthday']; ?>">
                    </div>
                </div>
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    Room Number
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <input type="text" class="form-control" name="RoomNumber" placeholder="Add Room number"
                               value="<?php echo $resident['RoomNumber']; ?>">
                    </div>
                </div>
            </div>

            <div class="row insert-row">
                <div class="col col-md-1"></div>
                <div class="col col-md-4 fontsize">
                    Facility
                </div>
                <div class="col-md-5">
                    <div class="form-group insert-form">
                        <select name="ID_Facility" class="form-control">
                            <option disabled selected value> -- Select a Facility -- </option>
                            <?php foreach ($facilities as $fac): ?>
                                <option value="<?php echo $fac['ID_facility']; ?>"><?php echo $fac['Name']; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                </div>
            </div>

        </div> 
        <div class="col-md-4">
            <div class="form-group">
                <label>Upload Image</label>
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
    <div class="row"> 
        <div class="col col-md-4" style="text-align: center;">
            <button type="submit"  class="btn btn-success btn-lg">Edit Residents</button>
        </div> 
        <div class="col col-md-4"></div>
    </div>
</div>
</form>
<!--Javascript libraries--> 
<script>   // allow to only check one sex 
    $('input[type="checkbox"]').on('change', function () {
        $('input[name="Sex"]').not(this).prop('checked', false);
    });
</script>
