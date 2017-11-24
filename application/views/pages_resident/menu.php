<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
                    <h1 class="text-center bar1"></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
                    <img src="<?php echo base_url(); ?>/image/pictograms/myPicture.png" alt="" style=" width: 120px" class="align-left"/>
		</div>
		<div class="col-md-4">
                        <h2 class="text-center bar2" >Weather report</h2>
		</div>
		<div class="col-md-4">
                    <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" style=" width: 150px" class="align-right"/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
                    <button id = "newButton"  type="button" class="btn btn-lg active style" >
                        Family <br/>
                        <img src="<?php echo base_url(); ?>/image/pictograms/family.png" style="width: 180px; padding-right: 35px" class=""/>
                    </button>  
		</div>
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg question active" onclick="loadPage('Resident/categories')">
                        Questionnaire <br/>
                        <img src="<?php echo base_url(); ?>/image/pictograms/questions.png" style="width: 200px" class=""/>
                    </button>  
		</div>
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg style active" style="padding-right: 40px; padding-bottom: 25px; right: -30px">
                        Activities <br/>
                        <img src="<?php echo base_url(); ?>/image/pictograms/activities.png" style="width: 180px; padding-right: 35px" class=""/>
                    </button>  
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
                    <button id = "newButton" type="button" class="btn btn-lg style active" style="width: 40%; left: 230px" onclick="loadPage('Caregiver/home')">Log out</button>                   
		</div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../js/question.js"></script>
