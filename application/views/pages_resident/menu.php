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

        <div class="row">
                <div class="col-sm-1">
                    <img src="<?php echo base_url(); ?>/image/photos/<?= $this->session->userdata('Picture')?>" alt="" class="align-left"/>
                </div>
                <div class="col-sm-5">
                    <h2 class="par2">{Welcome}, <?= $this->session->userdata('Firstname')?></h2>
                </div>
        </div>

        <div class="row" style="padding-top:2%">
            <div id="awcc1511526958631" class="col-sm-6" >
                        <!--Weather report-->
                        <a  href="https://www.accuweather.com/…/…/27046/weather-forecast/27046" class="aw-widget-legal"></a>
                        <div id="awcc1511526958631" class="aw-widget-current"
                            data-locationkey="" data-unit="c" data-language="nl" 
                            data-useip="true" data-uid="awcc1511526958631"
                            data-step="2" data-intro="You can see today's weather here" data-position='top'>
                        </div>
		</div>
                <div class="col-sm-6" data-step="1" data-intro="Click here to answer the questionaire" data-position='top'>
                    <button id="quest"  type="button" class="btn btn-lg question button btn-block" onclick="loadPage('Welcome','Resident/categories')">                      
                       <img src="<?php echo base_url(); ?>/image/pictograms/questions.png" class="quest"/>
                       {Questionnaire}
                    </button>
                </div>
        </div>

	<div class="row" style="padding-top:0%">
                <div class="col-sm-offset-0 col-sm-6">
                    <button id = "newButton" type="button" class="btn btn-lg style button activity btn-block"
                            data-step="4" data-intro="Click here to see recent activities" data-position='top' onclick="loadPage('CaregiverOperateActivity','ActivityList')">
                       <img src="<?php echo base_url(); ?>/image/pictograms/activities.png" class="align"/>
                        {Activities}
                    </button>
                </div>
                <div class="col-sm-offset-0 col-sm-6">
                    <button id = "newButton"  type="button" class="btn btn-lg button style btn-block family" 
                            data-step="3" data-intro="Watch video your familly sent you" data-position='top'>
                        <img src="<?php echo base_url(); ?>/image/pictograms/family.png" class="family"/>
                        {Family} 
                    </button>
                </div>
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
