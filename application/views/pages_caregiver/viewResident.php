

<?php if (htmlentities($this->session->userdata('permission')) >= '1' && htmlentities($this->session->userdata('allow_Caregiver')) == 'allow'): ?>


<div class="container-fluid flex">
    <div id ="blue" class="row ">
            <div class="col-sm-offset-0" style="padding-left: 2.5%">
                <h2 style="width: 100%">
                    {Information_resident}
                </h2>
            </div>
        </div>
    
    <div class="row">
         <div class="col-sm-offset-0 col-sm-2" data-step="1" data-intro="Here is the image of the resident">
            <img class="" height="140" width="140" alt="resident" style="padding-top: 9%; padding-left:8%; padding-bottom:0%" src="<?php echo base_url(); ?>/image/photos/<?php echo $residents['Picture']; ?>">
        </div>
    </div>

    <div id="forms" class="row" style="padding-top:0%">
        

        <div class="row">
            <div class="col-sm-offset-4 col-sm-1" style="padding-top:0.5%">
                <label>{LastName}</label> <br>
            </div>
            <div class="col-sm-offset-8">
                <label>{RoomNumber}</label> <br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-4 col-sm-2">
                <label class="lab"><?php echo $residents['LastName']; ?></label><br>
            </div>
            <div class="col-sm-offset-8">
                <label class="lab"><?php echo $residents['RoomNumber']; ?></label><br>
            </div>
        </div>
        
        <div class="row" >
            <div class="col-sm-offset-4 col-sm-2" style="padding-top:0.5%">
                <label>{FirstName}</label> <br>
            </div>
            <div class="col-sm-offset-8">
                <label>{Facility}</label> <br>
            </div>
        </div>
        
        <div class="row" >
            <div class="col-sm-offset-4 col-sm-2">
                <label class="lab"><?php echo $residents['FirstName']; ?></label><br>
            </div>
            <div class="col-sm-offset-8">
                <label class="lab"><?php echo $fac_name['Name']; ?></label><br>
            </div>
        </div>
        
        <div class="row" >
            <div class="col-sm-offset-4 col-sm-2" style="padding-top:0.5%">
                <label>{Gender}</label> <br>
            </div>
            <div class="col-sm-offset-8">
                <label>{MemberSince}</label> <br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-4 col-sm-2">
                <label class="lab"><?php echo $residents['Sex']; ?></label><br>
            </div>
            <div class="col-sm-offset-8">
                <label class="lab"><?php echo $residents['Member_Since']; ?></label>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-4 col-sm-2" style="padding-top:0.5%">
                <label>{Birthday}</label> <br>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-offset-4 col-sm-2">
                <label class="lab"><?php echo $residents['Birthday']; ?></label>
            </div>
        </div>
        

    </div>
    <div class="row" style="padding-bottom: 0%; padding-top: 1%">
		<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
        <div class="col-sm-offset-4 col-md-3 col-sm-4" style="padding-left:2.5%;">
            <button class="btn btn-lg btn-block button" value="EDIT" onclick="loadPage('CaregiverOperateResident', 'edit/<?php echo $residents['ID_Elder']; ?>')">{EDIT}</button>
        </div>
        <div class="col-sm-offset-1 col-sm-4 col-md-3" style="padding-right:2.5%">
            
            <?php echo form_open('CaregiverOperateResident/delete/' . $residents['ID_Elder']); /* if we click it it goes to /post/delete/3 */ ?>    

            <button id="delete" class="btn btn-lg btn-block button" value="DELETE" onclick="loadPage('CaregiverOperateResident', 'delete/<?php echo $residents['ID_Elder']; ?>')">{DELETE}</button>
            <?php echo form_close(); ?>
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
</p>git 
<?php endif; ?>
