<<<<<<< HEAD
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
                    <button id = "newButton" type="button" class="btn btn-lg question active" onclick="loadPage('Welcome','Resident/categories')">
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
                    <button id = "newButton" type="button" class="btn btn-lg style active" style="width: 40%; left: 230px" onclick="loadPage('Welcome', 'Caregiver/overview')">Log out</button>                   
		</div>
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/question.js"></script>
=======
<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

<div class="container">
	
	<div class="row">
		<div class="col-md-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/myPicture.png" alt="" class="align-left"/>
		</div>
                <div class="col-md-2"></div>
		<div class="col-md-4">
                        <!--Weather report-->
                        <a href="https://www.accuweather.com/…/…/27046/weather-forecast/27046" class="aw-widget-legal"></a>
                        <div id="awcc1511526958631" class="aw-widget-current"
                            data-locationkey="" data-unit="c" data-language="nl" 
                            data-useip="true" data-uid="awcc1511526958631">
                        </div>
		</div>
                <div class="col-md-2"></div>
		<div class="col-md-2">
                    <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
                    <button id = "newButton"  type="button" class="btn btn-lg button style family" >
                        Family <br/>
                        <img src="<?php echo base_url(); ?>/image/pictograms/family.png" class="family"/>
                    </button>  
		</div>
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg question button" onclick="loadPage('Welcome','Resident/categories')">
                        Questionnaire <br/>
                        <img src="<?php echo base_url(); ?>/image/pictograms/questions.png" class="quest"/>
                    </button>  
		</div>
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg style button activity">
                        Activities <br/>
                        <img src="<?php echo base_url(); ?>/image/pictograms/activities.png" class="family"/>
                    </button>  
		</div>
	</div>
    <div class="row">
        <div class="col-md-12">           
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">           
        </div>
    </div>
	<div class="row">
                <div class="col-md-4"></div>
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg style logout button center-block" onclick="loadPage('Welcome', 'Caregiver/overview')">Log out</button>                   
                </div>
                <div class="col-md-4"></div>
                
	</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/question.js"></script>
<script type="text/javascript" src="https://oap.accuweather.com/launch.js"></script>

<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
