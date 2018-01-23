<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>

 <div class="container-fluid">
    <div id="blue" class="row">
         
         <div class="col-sm-offset-0" style="padding-left:2.5%">
            <h2>
               <?php echo($text["Overview_Facility"]);?>
            </h2>
        </div>
    </div> 
    
    <div class="row"> 
        
        <form method="post">         
          <div id="forms" class="col-sm-offset-0">  
                        
			<h3><b>{facility}{Name}{/facility}</b></h3>
			<label class="facility"><?php echo($text["City"]); ?> {facility}{City}{/facility}  </label></br>
			<label class="facility"><?php echo($text["Postcode"]); ?> {facility}{Postcode}{/facility}</label></br> 
			<label class="facility"><?php echo($text["Street"]); ?> {facility}{Street}{/facility} </label></br>
			<label class="facility"><?php echo($text["Number"]); ?> {facility}{Number}{/facility} </label></br>
            <?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
            
            <div class="col-sm-offset-0 col-md-5 col-sm-5" style="padding-bottom:6%; padding-top: 2%;padding-left:0%; padding-right:2.5%">
                <button class="btn btn-lg btn-block button" onclick="<?php echo site_url('/CaregiverFacility/edit/1');?>"> <?php echo($text["EDIT"]); ?></button>
           </div> 
            <div class="col-md-offset-2 col-sm-offset-2 col-md-5 col-sm-5" style="padding-bottom:6%; padding-top: 2%; padding-right:2.5%;padding-left:0%">
              <button id="delete" class="btn btn-lg btn-block button" onclick="<?php echo site_url('CaregiverFacility/delete/1'); ?>"> <?php echo($text["DELETE"]); ?></button>
           </div>                                    
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
