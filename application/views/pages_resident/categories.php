<?php //if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

<div class="container">
	<div class="row">
                <div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="text-center bar2" >{Please_category}</h2>
		</div>
                <div class="col-md-4">
                    <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>
                </div>
	</div>

	<div class="row">
                <div class="col-md-2"></div>
		<div class="col-md-2">
                    <button id = "newButton1"  type="button" class="btn btn-lg style2 category1 button" onclick="loadPage('Question','getQuestion?category=Privacy')">
			{Privacy}
                    </button> 
		</div>
		<div class="col-md-2">
                    <button id = "newButton6"  type="button" class="btn btn-lg style2 category6 button" onclick="loadPage('Question','getQuestion?category=FoodAndMeals')">
                        {Food} <br/> {and} <br/> {Meals}
                    </button>                     
		</div>
		<div class="col-md-2">
                    <button id = "newButton2"  type="button" class="btn btn-lg style2 category2 button" onclick="loadPage('Question','getQuestion?category=Comfort')">
                        {Comfort}
                    </button>                     
		</div>
		<div class="col-md-2">
                    <button id = "newButton2"  type="button" class="btn btn-lg style2 category2 button" onclick="loadPage('Question','getQuestion?category=Activities')">
                        {Activities}
                    </button> 
		</div>   
                <div class="col-md-2"></div>
	</div>
    <div class="row">
        <div class="col-md-2"></div>
    </div>
	<div class="row">
                <div class="col-md-2"></div>
		<div class="col-md-2">
                    <button id = "newButton3"  type="button" class="btn btn-lg style2 category3 button" onclick="loadPage('Question','getQuestion?category=PersonalRelationships')">
                        {Personal} <br/> {relations}
                    </button> 
		</div>
		<div class="col-md-2">
                    <button id = "newButto3"  type="button" class="btn btn-lg style2 category3 button" onclick="loadPage('Question','getQuestion?category=DailyDecisions')">
                        {Daily} <br/> {decisions}
                    </button>                     
		</div>
		<div class="col-md-2">
                    <button id = "newButton"  type="button" class="btn btn-lg style2 category button" onclick="loadPage('Question','getQuestion?category=RespectByStaff')">
                        {Respect} <br/> {by} <br/> {Staff}
                    </button>                     
		</div>
		<div class="col-md-2">
                    <button id = "newButton"  type="button" class="btn btn-lg style2 category button" onclick="loadPage('Question','getQuestion?category=StaffResidentBonding')">
                        {Staff} <br/> {resident} <br/> {bonding}
                    </button> 
		</div>       
                <div class="col-md-2"></div>
	</div>
        <div class="row">
        <div class="col-md-2"></div>
        </div>
	<div class="row">
		
		<div class="col-md-6">
                    <button id = "newButton4"  type="button" class="btn btn-lg category4 button" onclick="loadPage('Question','getQuestion?category=StaffResponsiveness')">
                        {Staff} <br/> {responsiveness}
                    </button>                     
		</div>
		<div class="col-md-6">
                    <button id = "newButton5"  type="button" class="btn btn-lg category5 button" onclick="loadPage('Question','getQuestion?category=SafetyAndSecurity')">
                        {Safety} <br/> {Security}
                    </button>                     
		</div>
		           
	</div>
</div>

<!--
<?php //else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php //endif; ?>
