
<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>


<div class="container-fluid flex">
    <div class="row">
        <div class=" col-md-4" data-step="1" data-intro="Here is the image of the resident">
            <img class="thumbnail" height="420" width="420"  src="<?php echo base_url(); ?>/image/photos/<?php echo $residents['Picture']; ?>">
        </div>
			<div class=" col-md-4" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
				<p style="padding-top: 20px; font-size: 30px; font-family: italic" >{LastName}:&emsp;&ensp; <?php echo $residents['LastName']; ?></p>
				<p style="padding-top: 20px; font-size: 30px; font-family: italic" >{FirstName}:&emsp;&ensp; <?php echo $residents['FirstName']; ?></p>
				<p style="padding-top: 20px; font-size: 30px; font-family: italic" >{Gender}:&emsp;&emsp;&ensp;&ensp; <?php echo $residents['Sex']; ?></p>
				<p style="padding-top: 20px; font-size: 30px; font-family: italic" >{Birthday}:&emsp;&emsp;&ensp; <?php echo $residents['Birthday']; ?></p>
			</div>
			<div class=" col-md-4">
				<p style="padding-top: 20px; font-size: 30px; font-family: italic" >{RoomNumber}:&ensp;&ensp; <?php echo $residents['RoomNumber']; ?></p>
				<p style="padding-top: 20px; font-size: 30px; font-family: italic" >{Facility}:&emsp;&emsp;&emsp;&ensp;&ensp; <?php echo $fac_name['Name']; ?></p>
				<p style="padding-top: 20px; font-size: 30px; font-family: italic" >{MemberSince}:&emsp; <?php echo $residents['Member_Since']; ?></p>
			</div>
    </div>
    <div class="row">
		<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
        <div class="col-md-6"></div>
        <div class="col-md-2">
            <button class="btn btn-default btn-lg btn-block" value="EDIT" onclick="loadPage('CaregiverOperateResident', 'edit/<?php echo $residents['ID_Elder']; ?>')"/>Edit</button>
        </div>
        <div class="col-md-2">
            
            <?php echo form_open('CaregiverOperateResident/delete/' . $residents['ID_Elder']); /* if we click it it goes to /post/delete/3 */ ?>    

            <button class="btn btn-default btn-lg btn-block" value="DELETE" onclick="loadPage('CaregiverOperateResident', 'delete/<?php echo $residents['ID_Elder']; ?>')"/>Delete</button>
        </div>
		<?php endif; ?>

    </div>
</div>
<!--Javascript libraries--> 
<script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>

<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>
