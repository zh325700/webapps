<div class="container-fluid">
	<div class="row">
		<div class="col col-md-4">
			<img class="Imagelayout"  src="<?php echo base_url();?>/images/photos/<?php echo $residents['Picture']; ?>">
		</div>
		<div class="col col-md-4">
			<h2 style="padding-top: 150px;">Last Name: <?php echo $residents['LastName']; ?></h2>
			<h2 style="padding-top: 50px;">First Name: <?php echo $residents['FirstName']; ?></h2>
			<h3 style="padding-top: 50px;">Gender : <?php echo $residents['Sex']; ?></h3 >
			<h3 style="padding-top: 50px;">Birthday : <?php echo $residents['Birthday']; ?></h3 >
		</div>
		<div class="col col-md-4">
			<h2 style="padding-top: 150px;">Room Number: <?php echo $residents['RoomNumber']; ?></h2>
			<h2 style="padding-top: 50px;">Facility: <?php echo $residents['ID_Instelling']; ?></h2>
			<h2 style="padding-top: 50px;">Member Since: <?php echo $residents['Member_Since']; ?></h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8"></div>
		<div class="col-md-2">
<!--
			<a  class="btn btn-outline-primary btn-lg" style="line-height: 60px;height:80px; width:200px;" href="edit/<?php echo $residents['ID_Elder']; ?>">Edit</a> 
-->
			<button onclick="loadPage('CaregiverOperateResident', 'edit/<?php echo $residents['ID_Elder']; ?>')"> Edit </button>
		   </div>
		<div class="col-md-2">
<!--
			<?php echo form_open('index.php/Residents_control/delete/' . $residents['ID_Elder']); /* if we click it it goes to /post/delete/3 */ ?>    
			<input type="submit" value="delete" class="btn btn-danger btn-lg" style="height:80px; width:200px">
			</form>
-->
			<button onclick="loadPage('CaregiverOperateResident', 'delete/<?php echo $residents['ID_Elder']; ?>')"> Delete </button>
		</div>

	</div>
</div>
<!--Javascript libraries--> 
<script src="<?php echo base_url();?>/assets/js/jquery.js"></script>
