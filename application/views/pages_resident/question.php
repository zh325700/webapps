
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GraceAge</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../../css/question.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>

    <div class="container-fluid">
        
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center bar1">
				
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<img src="../../images/food.png" alt="" style=" width: 150px" class="align-left"/>
		</div>
		<div class="col-md-4">
			<h2 
                            class="text-center bar2"
                            id = "question_number">
				Question 1
			</h2>
		</div>
		<div class="col-md-4">
                        <img src="../../icons/information.png" alt="" style=" width: 150px" class="align-right"/>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3 
                            class="text-center"
                            id = "question_content">
				Question content
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
                    <img src="../../images/Smileys.png" alt="" style="width:850px" class="center" usemap="#map"/>
                    <map name="map">
                            <area shape="circle" coords="80,90,80" href="javascript:getQuestion()" id="smiley" >
                            <area shape="circle" coords="250,90,80" href="javascript:getQuestion()" id="smiley">
                            <area shape="circle" coords="425,90,80" href="javascript:getQuestion()" id="smiley">
                            <area shape="circle" coords="600,90,80" href="javascript:getQuestion()" id="smiley">
                            <area shape="circle" coords="770,90,80" href="javascript:getQuestion()" id="smiley">
                    </map>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">			 
                    <button id = "newButton" type="button" class="btn btn-lg style active" 
                            onclick="location.href='<?php echo base_url(); ?>Pages/categories'">
				Previous <br />Question
			</button>
		</div>
		<!--<div class="col-md-4">
                    <a href="#" onclick="return getQuestion();"> test success </a>
                    <div id="output">waiting for action</div>
		</div>-->
		<div class="col-md-4">
		</div>
	</div>
</div>

    <!--<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      
    <!-- Javascript libraries -->
      <?php if (isset($js_to_load)) {
        foreach ($js_to_load as $js_lib):
            ?>
            <script src="<?= base_url() ?>assets/js/<?= $js_lib ?>"></script>
        <?php endforeach;
    }
    ?>
    <script type="text/javascript" src="../../js/question.js"></script>

           
  </body>
</html>