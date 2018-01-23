
<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>


<div class="container-fluid flex">
    <div id ="blue" class="row ">
            <div class="col-sm-offset-0" style="padding-left: 2.5%">
                <h2 style="width: 100%">
                    {Information_resident}
                </h2>
            </div>
        </div>
    <div class="row">
        <div class="col-md-offset-0 col-sm-3" data-step="1" data-intro="Here is the image of the resident">
            <img class="" height="260" width="240" style="padding-top: 10%; padding-left:5%" src="<?php echo base_url(); ?>/image/photos/<?php echo $residents['Picture']; ?>">
        </div>
        <div id="forms" class="col-md-offset-1 col-sm-offset-1 col-sm-3" style="padding-left:0%" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
            <label>{LastName}:</label> <br> <label class="lab">&emsp;&emsp;&emsp;&emsp;<?php echo $residents['LastName']; ?></label><br>
            <label>{FirstName}:</label> <br> <label class="lab">&emsp;&emsp;&emsp;&emsp;<?php echo $residents['FirstName']; ?></label><br>
            <label>{Gender}:</label> <br> <label class="lab">&emsp;&emsp;&emsp;&emsp;<?php echo $residents['Sex']; ?></label><br>
            <label>{Birthday}:</label> <br> <label class="lab">&emsp;&emsp;&emsp;&emsp;<?php echo $residents['Birthday']; ?></label>
	</div>
	<div id="forms" class="col-md-offset-0 col-sm-offset-0 col-sm-4">
            <label>{RoomNumber}:</label> <br> <label class="lab">&emsp;&emsp;&emsp;&emsp;<?php echo $residents['RoomNumber']; ?></label><br>
            <label>{Facility}:</label> <br> <label class="lab">&emsp;&emsp;&emsp;&emsp;<?php echo $fac_name['Name']; ?></label><br>
            <label>{MemberSince}:</label> <br> <label class="lab">&emsp;&emsp;&emsp;&emsp;<?php echo $residents['Member_Since']; ?></label>
	</div>
    
    </div>
    <div class="row" style="padding-bottom: 4%; padding-top: 2%">
		<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>

        <div class="col-sm-offset-4 col-md-offset-4 col-md-2 col-sm-3" style="padding-left:0%;padding-right:0%">
            <button class="btn btn-lg btn-block button" value="EDIT" onclick="loadPage('CaregiverOperateResident', 'edit/<?php echo $residents['ID_Elder']; ?>')"/>{EDIT}</button>
        </div>
        <div class="col-sm-offset-0 col-md-offset-1 col-sm-4 col-md-3" style="padding-left:2.5%; padding-right:6%">
            
            <?php echo form_open('CaregiverOperateResident/delete/' . $residents['ID_Elder']); /* if we click it it goes to /post/delete/3 */ ?>    

            <button id="delete" class="btn btn-lg btn-block button" value="DELETE" onclick="loadPage('CaregiverOperateResident', 'delete/<?php echo $residents['ID_Elder']; ?>')"/>{DELETE}</button>
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
