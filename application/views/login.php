
<div class="container-fluid">
	
        
	<div class="cont">
            <div class="row">
                <h2 class="par1" style="color: #00008C;">Grace-AGE</h2>
                 
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
				<form action="<?php echo base_url();?>index.php/Process_login/user_login" method="post" name="login_form" class="form-horizontal form ">
					<div class="input-group ">
						
						<input type="text" name="email" class="form-control" placeholder="Username/E-mail">
					</div>
					<div class="input-group ">
						
						<input type="password" name="password" id="password" class="form-control" placeholder="password">
					</div>
                                        <div class="input-group">
                                            <select name="language" >
                                                <option value="Dutch">Nederlands</option>
                                                <option value="English">Engels</option>
                                            </select>
                                        </div>
					<button class="btn-outline-primary btn-lg btn-block login-button"  onclick="formhash(this.form, this.form.password);" > LOGIN </button>
				</form>
			</div>	
		</div> 
            </div>
	</div>
	
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
