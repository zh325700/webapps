<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-ofsset-0 col-sm-5">
                <h2 class="par1">Grace-AGE</h2>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-1">
                <a href="javascript:void(0);"  onclick="javascript:introJs().setOption('showProgress', true).start();">
                <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>
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

        <div class="row">
                <div class="col-sm-12" data-step="1" data-intro="Click here to answer the questionaire" data-position='top'>
                    <button id = "newButton" type="button" class="btn btn-lg question button btn-block" onclick="loadPage('Welcome','Resident/categories')">                      
                        <!--<img src="<?php echo base_url(); ?>/image/pictograms/questions.png" class="align"/>-->
                       {Questionnaire}
                    </button>
                </div>
        </div>

	<div class="row">
		<div class="col-sm-6">
                        <!--Weather report-->
                        <a href="https://www.accuweather.com/…/…/27046/weather-forecast/27046" class="aw-widget-legal"></a>
                        <div id="awcc1511526958631" class="aw-widget-current"
                            data-locationkey="" data-unit="c" data-language="nl" 
                            data-useip="true" data-uid="awcc1511526958631"
                            data-step="2" data-intro="You can see today's weather here" data-position='top'>
                        </div>
		</div>
                <div class="col-sm-6">
                    <button id = "newButton"  type="button" class="btn btn-lg button style btn-block family" 
                            data-step="3" data-intro="Watch video your familly sent you" data-position='top'>
                        <!--<img src="<?php echo base_url(); ?>/image/pictograms/family.png" class="align family"/>-->
                        {Family} 
                    </button>
                    <button id = "newButton" type="button" class="btn btn-lg style button activity btn-block"
                            data-step="4" data-intro="Click here to see recent activities" data-position='top'>
                       <!-- <img src="<?php echo base_url(); ?>/image/pictograms/activities.png" class="align"/>-->
                        {Activities}
                    </button>
                </div>
	</div>

	<div class="row">
		<div class="col-sm-offset-9 col-md-offset-10 col-sm-2">
                   <a id = "link" type="button" class="btn btn-lg style logout" onclick="loadPage('ResidentLogin', 'view')">{Log_out}</a>          
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
