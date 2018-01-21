<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>

 <div class="container-fluid">
    <div class="row justify-content-md-center">
         <div class="col col-md-2"></div>
         <div class="col-md-6">
            <h2 class=" text-center">
                <?= $title ?>
            </h2>
        </div>
    </div> 
    
    <div class="row"> 
        
        <form method="post">         
          <div class="col-md-4">  
			<h3 class="text-center"><b>{facility}{Name}{/facility}</b></h3>
			<label class="facility"><?php echo($text["City"]); ?> {facility}{City}{/facility}  </label></br>
			<label class="facility"><?php echo($text["Post"]); ?> {facility}{Postcode}{/facility}</label></br> 
			<label class="facility"><?php echo($text["Street"]); ?>: {facility}{Street}{/facility} </label></br>
			<label class="facility"><?php echo($text["Number"]); ?>: {facility}{Number}{/facility} </label></br>
            <?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
            <a class="btn btn-outline-primary pull-left" href="edit/{ID_facility}"><label class="facility" style=" text-decoration: underline;"><?php echo($text["EDIT"]); ?></label></a>
            <p><a class="btn btn-link match" href="<?php echo site_url('CaregiverFacility/delete/{ID_facility}'); ?>"><b style=" text-decoration: underline;"> <?php echo($text["DELETE"]); ?></b></a></p>
            <?php endif; ?>
            </div>
        
    </div>
    </div>


<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>
