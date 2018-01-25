
<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

    <div class="container-fluid" style="padding-left:2.5%; padding-right:2.5%">
        <div class="row">
            <div class="col-sm-5">
                <h2 class="par1">Grace-AGE</h2>
            </div>
            <div class="col-sm-offset-10">
                <img id="log" class="topIcon" src="<?php echo base_url(); ?>/image/pictograms/logout.png"  value="Log_out" onclick="loadPage('ResidentLogin', 'view')"/>
                <a id="logLink" class=" top" onclick="loadPage('ResidentLogin', 'view')">{Log_out}</a>              
            </div>
            <div class="col-sm-offset-11">
                <a href="javascript:void(0);"  onclick="javascript:introJs().setOption('showProgress', true).start();">
                <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>
                </a>
                <a href="javascript:void(0);"  onclick="javascript:introJs().setOption('showProgress', true).start();">
                <a id="infoLink" class=" top" >Info</a>              
                </a>
            </div>
        </div>
        
        <div class="row"  >
            <div class="col-sm-12">
                <h2> {Please_category} </h2>
            </div>
        </div>

        <div class="row" data-step="1" data-intro="Click block with catagories you interested in to answer questions" data-position='top'>
            <div class="col-sm-3" style="padding-right:0.5%">
                <button id = "newButton1"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=Privacy')">
                    {Privacy}
                </button> 
            </div>        
            <div class="col-sm-3" style="padding-left:0.5%; padding-right:0.5%">
                <button id = "newButton6"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=FoodAndMeals')">
                    {Food}
                </button>
            </div>
            <div class="col-sm-3" style="padding-left:0.5%; padding-right:0.5%">
                <button id = "newButton2"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=Comfort')">
                    {Comfort}
                </button> 
            </div>
            <div class="col-sm-3" style="padding-left:0.5%;">
                <button id = "newButton2"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=Activities')">
                    {Activities}
                </button> 
            </div>
        </div>

        <div class="row" >
            <div class="col-sm-3" style="padding-right:0.5%">
                <button id = "newButton3"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=PersonalRelationships')">
                    {Personal} <br/> {relations}
                </button>
            </div>
            <div class="col-sm-3" style="padding-left:0.5%; padding-right:0.5%">
                <button id = "newButto3"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=DailyDecisions')">
                    {Daily} <br/> {decisions}
                </button>
            </div>
            <div class="col-sm-3" style="padding-left:0.5%; padding-right:0.5%">
                <button id = "newButton"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=RespectByStaff')">
                    {Respect}
                </button> 
            </div>
            <div class="col-sm-3" style="padding-left:0.5%;">
                <button id = "newButton5"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=SafetyAndSecurity')">
                    {Safety}
                </button> 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3" style="padding-right:0.5%">
                 <button id = "newButton"  type="button" class="btn btn-lg question button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=StaffResidentBonding')">
                    {Ga_terug}

                </button> 
            </div>
            <div class="col-sm-3" style="padding-left:0.5%; padding-right:0.5%">
                <button id = "newButton4"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=StaffResponsiveness')">
                    {responsiveness} </br> {the_caregivers}
                </button> 
            </div>
            <div class="col-sm-3"style="padding-left:0.5%; padding-right:0.5%">
                 <button id = "newButton"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=StaffResidentBonding')">
                    {bonding}</br> {Staff}

                </button> 
            </div>
            <div class="col-sm-3" style="padding-left:0.5%">
                 <button id = "newButton"  type="button" class="btn btn-lg style button btn-block" onclick="loadPage('ResidentQuestion','getQuestion?category=StaffResidentBonding')">
                     Informatie <br> woonzorgcentrum

                </button> 
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
