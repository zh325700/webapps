<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h2 class="par1">Grace-AGE</h2>
            </div>
            <div class="col-sm-8"></div>
            <div class="col-sm-1">
                <img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>
            </div>
        </div>

        <div class="row">
                <div class="col-sm-1">
                    <img src="<?php echo base_url(); ?>/image/photos/picture.png" alt="" class="align-left"/>
                </div>
                <div class="col-sm-5">
                    <h2 class="par2">Welkom, Maria</h2>
                </div>
        </div>

        <div class="row">
                <div class="col-sm-12">
                    <button id = "newButton" type="button" class="btn btn-lg question button btn-block" onclick="loadPage('Welcome','Resident/categories')">                      
                        <img src="<?php echo base_url(); ?>/image/pictograms/questions.png" class="align"/>
                       Vragenlijst
                    </button>
                </div>
        </div>

	<div class="row">
		<div class="col-sm-6">
                        <!--Weather report-->
                        <a href="https://www.accuweather.com/…/…/27046/weather-forecast/27046" class="aw-widget-legal"></a>
                        <div id="awcc1511526958631" class="aw-widget-current"
                            data-locationkey="" data-unit="c" data-language="nl" 
                            data-useip="true" data-uid="awcc1511526958631">
                        </div>
		</div>
                <div class="col-sm-6">
                    <button id = "newButton"  type="button" class="btn btn-lg button style btn-block" >
                        <img src="<?php echo base_url(); ?>/image/pictograms/family.png" class="align"/>
                        Familie
                    </button>
                    <button id = "newButton" type="button" class="btn btn-lg style button activity btn-block">
                        <img src="<?php echo base_url(); ?>/image/pictograms/activities.png" class="align"/>
                        Activiteiten
                    </button>
                </div>
	</div>

	<div class="row">
		<div class="col-sm-offset-10 col-sm-2">
                   <a id = "link" type="button" class="btn btn-lg style logout" onclick="loadPage('LoginResident', 'view')">Afmelden</a>          
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
