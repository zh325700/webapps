<div class="container-fluid flex">
    <div class="row">
        <div class=" col-md-4" data-step="1" data-intro="Here is the image of the resident">
            <img class="thumbnail" height="420" width="420"  src="<?php echo base_url(); ?>/image/photos/<?php echo $residents['Picture']; ?>">
        </div>
        <div class=" col-md-4" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
            <p style="padding-top: 20px; font-size: 30px; font-family: italic" >Last Name: <?php echo $residents['LastName']; ?></p>
            <p style="padding-top: 100px; font-size: 30px; font-family: italic" >First Name: <?php echo $residents['FirstName']; ?></p>
            <p style="padding-top: 100px; font-size: 30px; font-family: italic" >Gender: <?php echo $residents['Sex']; ?></p>
            <p style="padding-top: 100px; font-size: 30px; font-family: italic" >Birthday: <?php echo $residents['Birthday']; ?></p>
        </div>
        <div class=" col-md-4">
            <p style="padding-top: 20px; font-size: 30px; font-family: italic" >Room Number: <?php echo $residents['RoomNumber']; ?></p>
            <p style="padding-top: 100px; font-size: 30px; font-family: italic" >Facility: <?php echo $residents['ID_Facility']; ?></p>
            <p style="padding-top: 100px; font-size: 30px; font-family: italic" >Member Since: <?php echo $residents['Member_Since']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-2">
            <input class="btn btn-primary btn-lg" value="EDIT" onclick="loadPage('CaregiverOperateResident', 'edit/<?php echo $residents['ID_Elder']; ?>')"/> 
        </div>
        <div class="col-md-2">
            
            <?php echo form_open('index.php/Residents_control/delete/' . $residents['ID_Elder']); /* if we click it it goes to /post/delete/3 */ ?>    

            <input class="btn btn-danger btn-lg" value="DELETE" onclick="loadPage('CaregiverOperateResident', 'delete/<?php echo $residents['ID_Elder']; ?>')"/> 
        </div>

    </div>
</div>
<!--Javascript libraries--> 
<script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
