
<!--
  <body onload='javascript:loadQuestions(<?= json_encode($questions)?>)'>
-->



<div class="container-fluid">
    <div class="row">
		<div class="col-md-12">
			<h1 class="text-center bar1"></h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo base_url(); ?>/image/pictograms/food.png" alt="" style=" width: 150px" class="align-left"/>
		</div>
		<div class="col-md-4">
			<h2 class="text-center bar2" id = "question_number">Question 1</h2>
		</div>
		<div class="col-md-4">
			<img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" style=" width: 150px" class="align-right"/>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center" id = "question_content"><?php echo $first_question;?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<img src="<?php echo base_url(); ?>/image/pictograms/Smileys.png" alt="" style="width:850px" class="center" usemap="#map"/>
			<map name="map">
					<area shape="circle" coords="80,90,80" href="javascript:getQuestion(1)" id="smiley" >
					<area shape="circle" coords="250,90,80" href="javascript:getQuestion(2)" id="smiley">
					<area shape="circle" coords="425,90,80" href="javascript:getQuestion(3)" id="smiley">
					<area shape="circle" coords="600,90,80" href="javascript:getQuestion(4)" id="smiley">
					<area shape="circle" coords="770,90,80" href="javascript:getQuestion(5)" id="smiley">
			</map>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">			 
			<button id = "prevButton" type="button" class="btn btn-lg style active" onclick="javascript:previous()">
				Previous <br />Question
			</button>
		</div>
		<div class="col-md-4">
		</div>
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
		loadQuestions(<?php echo json_encode($questions)?>);
	</script>
