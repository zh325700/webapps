<?php if (htmlentities($this->session->userdata('permission')) >= '2' && htmlentities($this->session->userdata('allow_Caregiver')) == 'allow'): ?>

 <div class="container-fluid">
    <div id="blue" class="row">
         
         <div class="col-sm-offset-0" style="padding-left:2.5%">
            <h2>
               <?php echo($text["Overview_Facility"]);?>
            </h2>
        </div>
    </div> 
    <form method="post"> 
    <div class="row" > 
        
        <div  id="forms" class="col-sm-offset-0 col-sm-2" style="padding-top:2%">        
		<h3><b>{facility}{Name}{/facility}</b></h3>
        </div>
    </div>
     
     <div class="row" style="padding-left: 1.5%">
         <div class="col-md-offset-0 col-sm-2">
                <label class="facility"><?php echo($text["City"]); ?> </label><br>
         </div>
         <div class="col-md-offset-2">
                <label class="lab"  >{facility}{City}{/facility}  </label><br>
         </div>
     </div>
     
     <div class="row" style="padding-left: 1.5%">
         <div class="col-md-offset-0 col-sm-2">
		<label class="facility"><?php echo($text["Postcode"]); ?> </label><br> 
         </div>
         <div class="col-md-offset-2">
             <label class="lab" >{facility}{Postcode}{/facility}</label><br>         </div>
     </div>
     
     <div class="row" style="padding-left: 1.5%">
         <div class="col-md-offset-0 col-sm-2">
		<label class="facility"><?php echo($text["Street"]); ?> </label><br>
         </div>
         <div class="col-md-offset-2">
                  <label class="lab" >{facility}{Street}{/facility} </label><br>
         </div>
     </div>
        
     <div class="row" style="padding-left: 1.5%">
         <div class="col-md-offset-0 col-sm-2">
		<label class="facility"><?php echo($text["Number"]); ?> </label><br>
         </div>
         <div class="col-md-offset-2">
                  <label class="lab" >{facility}{Number}{/facility} </label><br>
         </div>
     </div>
                
          
                <?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
              
 
        <div class="row" style="padding-left:2.5%;">    
            <div class="col-sm-offset-0 col-md-5 col-sm-5" style="padding-bottom:6%; padding-top: 2%;padding-left:0%; padding-right:2.5%">
                <button class="btn btn-lg btn-block button" onclick="loadPage('CaregiverFacility', '/edit/1')"> <?php echo($text["EDIT"]); ?></button>
           </div> 

            <div class="col-md-offset-2 col-sm-offset-2 col-md-5 col-sm-5" style="padding-bottom:6%; padding-top: 2%; padding-right:2.5%;padding-left:0%">
                <button id="delete" class="btn btn-lg btn-block button" onclick="loadPage('CaregiverFacility','/delete/1')"> <?php echo($text["DELETE"]); ?></button>
           </div>                                    
            <?php endif; ?>
            </div>
        </form>
    
</div>


<?php else: ?>
<p>
<br><br><br>
<span style="text-align: center;" class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
<br><br><br>
<?php endif; ?>
