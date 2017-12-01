<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center bar1"></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<h2 class="text-center bar2" >Please chose a category</h2>                   
		</div>
		<div class="col-md-4">
			<img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" style=" width: 150px" class="align-right"/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12"></div>
	</div>
	<div class="row">
		<div class="col-md-3" style="top:-100px; left: 15px">
				<button id = "newButton"  type="button" class="btn btn-lg active category" onclick="loadPage('Question','getQuestion?category=Privacy')">
					Privacy
				</button> 
		</div>
		<div class="col-md-3" style="top:-100px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" style="padding-top: 0px; padding-bottom: 0px" onclick="loadPage('Question','getQuestion?category=FoodAndMeals')">
                        Food <br/> and <br/> Meals
                    </button>                     
		</div>
		<div class="col-md-3" style="top:-100px; right: 15px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" onclick="loadPage('Question','getQuestion?category=Comfort')">
                        Comfort
                    </button>                     
		</div>
		<div class="col-md-3" style="top:-100px; right: 35px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" onclick="loadPage('Question','getQuestion?category=Activities')">
                        Activities
                    </button> 
		</div>            
	</div>
	<div class="row">
		<div class="col-md-3" style="top:-80px; left: 15px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" style="padding-top: 25px; padding-bottom: 25px" onclick="loadPage('Question','getQuestion?category=PersonalRelationships')">
                        Personal <br/> relations
                    </button> 
		</div>
		<div class="col-md-3" style="top:-80px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" style="padding-top: 25px; padding-bottom: 25px" onclick="loadPage('Question','getQuestion?category=DailyDecisions')">
                        Daily <br/> decisions
                    </button>                     
		</div>
		<div class="col-md-3"style="top:-80px; right: 15px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" style="padding-top: 0px; padding-bottom: 0px" onclick="loadPage('Question','getQuestion?category=RespectByStaff')">
                        Respect <br/> by <br/> staff
                    </button>                     
		</div>
		<div class="col-md-3" style="top:-80px; right: 35px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" style="padding-top: 0px; padding-bottom: 0px" onclick="loadPage('Question','getQuestion?category=StaffResidentBonding')">
                        Staff <br/> resident <br/> bonding
                    </button> 
		</div>            
	</div>
	<div class="row">
		<div class="col-md-3" style="bottom:60px"></div>
		<div class="col-md-3" style="bottom:60px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" style="padding-bottom: 0px; padding-top: 0px; padding-left: 10px; width: 205%; left: -215px" onclick="loadPage('Question','getQuestion?category=StaffResponsiveness')">
                        Staff <br/> responsiveness
                    </button>                     
		</div>
		<div class="col-md-3" style="bottom:60px">
                    <button id = "newButton"  type="button" class="btn btn-lg active category" style="padding-bottom: 0px; padding-top: 0px; width: 205%; right: 15px" onclick="loadPage('Question','getQuestion?category=SafetyAndSecurity')">
                        Safety and <br/> Security
                    </button>                     
		</div>
		<div class="col-md-3" style="bottom:60px"></div>            
	</div>
</div>
