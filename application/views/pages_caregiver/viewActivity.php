
<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>


    <div class="container-fluid flex">
        <div class="row">
            <div class=" col-sm-4">
            </div>
            <div class=" col-sm-4" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
                <p style="padding-top: 20px; font-size: 30px; font-family: italic" >{Title}:&emsp;&ensp;<br> <?php echo $activity['Title']; ?></p>
                <p style="padding-top: 20px; font-size: 30px; font-family: italic" >{Time}:&emsp;&ensp;<br> <?php echo $activity['Time']; ?></p>
                <p style="padding-top: 20px; font-size: 30px; font-family: italic" >{Number_Of_Participants}:&emsp;&ensp;<br> <?php echo $count; ?></p>
                <p readonly rows="4" cols="50" style="padding-top: 20px; font-size: 30px; font-family: italic" >
                        {Description}<br>
                        <?php echo sizeof($num_of_activity)?>
                        <?php echo $activity['Description']; ?>
                </p>
            </div>
            <div class=" col-sm-4">
            </div>
        </div>
        <div class="row">
            <?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
                <div class="col-sm-6"></div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">

                    <?php echo form_open('CaregiverOperateActivity/deleteActivity/' . $activity['ID_Activity']); /* if we click it it goes to /post/delete/3 */ ?>    

                    <button class="btn btn-default btn-lg btn-block" value="DELETE" onclick="loadPage('CaregiverOperateActivity', 'deleteActivity/<?php echo $activity['ID_Activity']; ?>')"/>{DELETE}</button>
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
