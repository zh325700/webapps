<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>



<div class="container">
 

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2">
                    <h1>
                        Privacy
                    </h1>
                </div>
            </div>
        </div>
	<div class="row">
		<div class="col-md-12">
			<h2 class="text-center center-block" id = "question_content"><?php echo $first_question;?></h2>
		</div>
	</div>
	<div class="row">
            <div class="col-md-1"></div>
		<div class="col-md-2">
                        <img src="<?php echo base_url(); ?>/image/pictograms/smiley1.png" onclick="javascript:getQuestion(1)" alt="" class="smiley center-block" usemap="#map"/>
		</div>
		<div class="col-md-2">
                        <img src="<?php echo base_url(); ?>/image/pictograms/smiley2.png" onclick="javascript:getQuestion(1)" alt="" class="smiley center-block" usemap="#map"/>
		</div>
		<div class="col-md-2">
                        <img src="<?php echo base_url(); ?>/image/pictograms/smiley3.png" onclick="javascript:getQuestion(1)" alt="" class="smiley center-block" usemap="#map"/>
		</div>
		<div class="col-md-2">
                        <img src="<?php echo base_url(); ?>/image/pictograms/smiley4.png" onclick="javascript:getQuestion(1)" alt="" class="smiley center-block" usemap="#map"/>
		</div> 
		<div class="col-md-2">
                        <img src="<?php echo base_url(); ?>/image/pictograms/smiley5.png" onclick="javascript:getQuestion(1)" alt="" class="smiley center-block" usemap="#map"/>
		</div>    
            <div class="col-md-1"></div>
	</div>
        <div class="row">
            <div class="col-md-1"></div>
		<div class="col-md-2">
                    <p>Never</p>
		</div>
		<div class="col-md-2">
                    <p>Rarely</p>
		</div>
		<div class="col-md-2">
                    <p>Sometimes</p>
                </div>
		<div class="col-md-2">
                    <p>Most of the time</p>
		</div> 
		<div class="col-md-2">
                    <p>Always</p>
		</div>    
            <div class="col-md-1"></div>
        </div>
	<div class="row">
		<div class="col-md-4">			 
			<button id = "prevButton" type="button" class="btn btn-lg style button " onclick="javascript:previous()">
				Previous <br />Question
			</button>
		</div>
		<div class="col-md-4"></div>
                <div class="col-md-4"></div>
	</div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
<!-- Javascript libraries -->
  <?php if (isset($js_to_load)) {
	foreach ($js_to_load as $js_lib):
		?>
		<script src="<?php echo base_url(); ?>/assets/js/<?= $js_lib ?>"></script>
	<?php endforeach;
}
?>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/question.js"></script>

	<script type="text/javascript">
		loadQuestions(<?php echo json_encode($questions)?>, "<?php echo $category?>");
	</script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
<!-- Javascript libraries -->
  <?php if (isset($js_to_load)) {
	foreach ($js_to_load as $js_lib):
		?>
		<script src="<?php echo base_url(); ?>/assets/js/<?= $js_lib ?>"></script>
	<?php endforeach;
}
?>

<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/question.js"></script>

	<script type="text/javascript">
		loadQuestions(<?php echo json_encode($questions)?>, "<?php echo $category?>");
	</script>

<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>
