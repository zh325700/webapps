
<?php if (htmlentities($this->session->userdata('permission')) >= '1' && htmlentities($this->session->userdata('allow_Caregiver')) == 'allow'): ?>


    <div class="container-fluid">
        <div id="blue" class="row">
            <div class="col-sm-offset-0" style="padding-left:2.5%">
                <h2>
                    {Activity_information}
                </h2>
            </div>
        </div> 
        <div class="row">
            <div class=" col-sm-offset-0 col-sm-5" id="forms" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
                <label >{Title}</label> <br> <label class="lab" style="padding-left: 10%"><?php echo $activity['Title']; ?></label><br>
                <label >{Time}</label> <br> <label class="lab" style="padding-left: 10%"><?php echo $activity['Time']; ?></label><br>
                <label >{Number_Of_Participants}</label> <br> <label class="lab" style="padding-left: 10%"><?php echo $count; ?></label><br>
                <label >
                        {Description}</label> <br> 
                <label class="lab col-sm-offset-0" style="padding-left: 10%"><?php echo $activity['Description']; ?></label>
            </div>
        </div>
        <div class="row">
            <?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
                <div class="col-sm-6"></div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-offset-6 col-sm-6" style="padding-bottom:3%; padding-right:2.5%; padding-top:2%">

                    <?php echo form_open('CaregiverOperateActivity/deleteActivity/' . $activity['ID_Activity']); /* if we click it it goes to /post/delete/3 */ ?>    

                    <button id="delete" class="btn btn-lg btn-block button" value="DELETE" onclick="loadPage('CaregiverOperateActivity', 'deleteActivity/<?php echo $activity['ID_Activity']; ?>')"/>{DELETE}</button>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <!--Javascript libraries--> 
    <script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>

<?php else: ?>
    <p>
    <br><br><br>
        <span style="text-align: center;" class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
    <br><br><br>
<?php endif; ?>
