<div class="container-fluid">
	<div class="row top1">
		
	</div>
	<div class="cont">
		<div class="box">
			<div class="row middle sg">
				<div class="row sg pic">
					<div class="col-md-4 col-md-offset-4">
						<img src="<?php echo base_url();?>/image/pictograms/logo.jpg" alt="" class="photo">
					</div>
				</div>
				<?php
				if (isset($_GET['error'])) {
				echo '<p class="error">Error Logging In!</p>';
				}
				?> 
				<form action="process_login.php" method="post" name="login_form" class="form-horizontal form ">
					<div class="input-group y">
						<span class="input-group-addon"><i class="fa fa-user user"></i></span>
						<input type="text" name="email" class="form-control" placeholder="Username/e-mail">
					</div>
					<div class="input-group ">
						<span class="input-group-addon"><i class="fa fa-unlock-alt user"></i></span>
						<input type="password" name="password" id="password" class="form-control" placeholder="password">
					</div>
					<input type="button" class="bttn" value="Login" onclick="formhash(this.form, this.form.password);" />
				</form>
			</div>	
		</div> 
	</div>
	<button type="button" onclick="loadPage('Welcome', 'Caregiver/home')" > login </button>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
