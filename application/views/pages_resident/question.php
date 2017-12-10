
<<<<<<< HEAD
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
=======
<?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>

<div class="container">

	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo base_url(); ?>/image/pictograms/food.png" alt="" class="align-left"/>
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
		</div>
		<div class="col-md-4">
			<h2 class="text-center bar2" id = "question_number">Question 1</h2>
		</div>
		<div class="col-md-4">
<<<<<<< HEAD
			<img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" style=" width: 150px" class="align-right"/>			
=======
			<img src="<?php echo base_url(); ?>/image/pictograms/information.png" alt="" class="align-right"/>			
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
<<<<<<< HEAD
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
=======
			<h3 class="text-center center-block" id = "question_content"><?php echo $first_question;?></h3>
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
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
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
<<<<<<< HEAD
=======


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
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
