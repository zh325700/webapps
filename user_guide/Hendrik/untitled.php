<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>




<?php //if (login_check() == true && htmlentities($this->session->userdata('permission')) >= '1'): ?>




<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>



level	|		power
--------+-----------------------------
  1		|		residents menu
		|		find/view residents
  2		|		search for facilities
  		|		add/edit residents
  3		|		add/edit facilities
		|		add/edit caregivers
