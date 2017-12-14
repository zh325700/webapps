<html>
	<head>
		<meta charset="utf-8">
		<title>HCI</title>

		<!-- Latest compiled and minified bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

		<!-- optional theme-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

		<!--our css and less-->
                <link rel="stylesheet/less" type="text/css" href="../../assets/css.new/Main.less" />
                <link rel="stylesheet/less" type="text/css" href="../../assets/css.new/Resident.less" />
                <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  <!--autcompletion-->
        
        <!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>
        </head>
        <body>
            <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                    <h1 class="text-center bar1"></h1>
                            </div>

                    </div>
                    <div class="row">
                            <div class="col-md-4">
                                    <img src="myPicture.png" alt="" style=" width: 150px" class="align-left"/>
                            </div>
                            <div class="col-md-4">
                                    <h2 class="text-center bar2" id = "question_number">Please fille in your birth date:</h2>
                            </div>
                            <div class="col-md-4">
                                <img src="information.png" alt="" style=" width: 150px" class="align-right"/>			
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4">
                                    
                            </div>
                            <div class="col-md-4">
                                        <ul id="keyboard">   
                                            <li class="letter">1</li>  
                                            <li class="letter">2</li>  
                                            <li class="letter">3</li>  
                                            <li class="letter clearl">4</li>  
                                            <li class="letter">5</li>  
                                            <li class="letter">6</li> 

                                            <li class="letter clearl">7</li>  
                                            <li class="letter ">8</li>  
                                            <li class="letter">9</li>  
                                            <li class="letter">0</li>
                                             <li class="delete lastitem">delete</li>  
                                        </ul>  
                            </div>
                            <div class="col-md-4">
                                <form action="" id="form">
                                    Birth date: <br/> <input type="text, submit"><br>
                                    <!--<input type="submit" value="Submit">-->
                                </form>
                            </div>
                    </div>

            </div>
        </body>
</html>