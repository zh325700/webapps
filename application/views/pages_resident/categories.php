<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2 class="par1">Grace-AGE</h2>
            </div>
            <div class="col-md-8"></div>
            <div class="col-md-1">
                <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <h2> Kies een categorie </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <button id = "newButton1"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=Privacy')">
                    Privacy
                </button> 
            </div>        
            <div class="col-md-3">
                <button id = "newButton6"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=FoodAndMeals')">
                    Eten
                </button>
            </div>
            <div class="col-md-3">
                <button id = "newButton2"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=Comfort')">
                    Comfort
                </button> 
            </div>
            <div class="col-md-3">
                <button id = "newButton2"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=Activities')">
                    Activiteiten
                </button> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <button id = "newButton3"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=PersonalRelationships')">
                    Persoonlijke <br/> omvang
                </button>
            </div>
            <div class="col-md-3">
                <button id = "newButto3"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=DailyDecisions')">
                    Dagelijks <br/> kiezen
                </button>
            </div>
            <div class="col-md-3">
                <button id = "newButton"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=RespectByStaff')">
                    Respect
                </button> 
            </div>
            <div class="col-md-3">
                <button id = "newButton5"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=SafetyAndSecurity')">
                    Veiligheid
                </button> 
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <button id = "newButton4"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=StaffResponsiveness')">
                    Reactievermogen van </br> het personeel
                </button> 
            </div>
            <div class="col-md-6">
                 <button id = "newButton"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('Question','getQuestion?category=StaffResidentBonding')">
                    Een band voelen met </br> wie hier werkt

                </button> 
            </div>
        </div>  
        
        <div class="row">
		<div class="col-md-offset-10 col-md-2">
                   <a id = "link" type="button" class="btn btn-lg style logout" onclick="loadPage('Welcome', 'Caregiver/overview')">Afmelden</a>          
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
