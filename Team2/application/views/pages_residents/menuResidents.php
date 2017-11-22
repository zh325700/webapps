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
                    <img src="../../icons/myPicture.png" alt="" style=" width: 120px" class="align-left"/>
		</div>
		<div class="col-md-4">
                        <h2 class="text-center bar2" >
				Weather report
			</h2>
		</div>
		<div class="col-md-4">
                    <img src="../../icons/information.png" alt="" style=" width: 150px" class="align-right"/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg active style">
                        Family <br/>
                        <img src="../../icons/family.png" style="width: 200px" class=""/>
                    </button>  
		</div>
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg style active" onclick="location.href='<?php echo base_url(); ?>Pages/question'">
                        Questionnaire <br/>
                        <img src="../../icons/questions.png" style="width: 300px" class=""/>
                    </button>  
		</div>
		<div class="col-md-4">
                    <button id = "newButton" type="button" class="btn btn-lg style active">
                        Acctivities <br/>
                        <img src="../../icons/activities.png" style="width: 200px" class=""/>
                    </button>  
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
                    <button id = "newButton" type="button" class="btn btn-lg style active" onclick="location.href='<?php echo base_url(); ?>Pages/loginRes'">
			Log out
                    </button>                   
		</div>
	</div>
</div>
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      <script type="text/javascript" src="../../js/question.js"></script>
</body>
</html>