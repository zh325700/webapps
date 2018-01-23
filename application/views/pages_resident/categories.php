
<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-5">
                <h2 class="par1">Grace-AGE</h2>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-1">
                <a href="javascript:void(0);"  onclick="javascript:introJs().setOption('showProgress', true).start();">
                <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>
                </a>
            </div>
        </div>
        
        <div class="row"  >
            <div class="col-sm-12">
                <h2> {Please_category} </h2>
            </div>
        </div>

        <div class="row" data-step="1" data-intro="Click block with catagories you interested in to answer questions" data-position='top'>
            <div class="col-sm-3">
                <button id = "newButton1"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=Privacy')">
                    {Privacy}
                </button> 
            </div>        
            <div class="col-sm-3">
                <button id = "newButton6"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=FoodAndMeals')">
                    {Food}
                </button>
            </div>
            <div class="col-sm-3">
                <button id = "newButton2"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=Comfort')">
                    {Comfort}
                </button> 
            </div>
            <div class="col-sm-3">
                <button id = "newButton2"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=Activities')">
                    {Activities}
                </button> 
            </div>
        </div>

        <div class="row" >
            <div class="col-sm-3">
                <button id = "newButton3"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=PersonalRelationships')">
                    {Personal} <br/> {relations}
                </button>
            </div>
            <div class="col-sm-3">
                <button id = "newButto3"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=DailyDecisions')">
                    {Daily} <br/> {decisions}
                </button>
            </div>
            <div class="col-sm-3">
                <button id = "newButton"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=RespectByStaff')">
                    {Respect}
                </button> 
            </div>
            <div class="col-sm-3">
                <button id = "newButton5"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=SafetyAndSecurity')">
                    {Safety}
                </button> 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <button id = "newButton4"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=StaffResponsiveness')">
                    {responsiveness} </br> {the_caregivers}
                </button> 
            </div>
            <div class="col-sm-6">
                 <button id = "newButton"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=StaffResidentBonding')">
                    {bonding}</br> {Staff}

                </button> 
            </div>
        </div>  
        
        <div class="row">
		<div class="col-md-offset-10 col-sm-offset-9 col-sm-2">
                   <a id = "link" type="button" class="btn btn-lg logout" onclick="loadPage('Welcome', 'Caregiver/overview')">{Log_out}</a>          
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
