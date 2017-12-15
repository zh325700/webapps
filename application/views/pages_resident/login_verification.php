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
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/pj_login_resident.less" />
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />  <!--autcompletion-->
        
        <!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

		<!--javascript includes-->
		<script type="text/JavaScript" src="<?php echo base_url();?>/assets/js/sha512.js"></script> 
		<script type="text/JavaScript" src="<?php echo base_url();?>/assets/js/forms.js"></script>
		
		<!--load a page-->
		<script>
			function loadPage(controller, page){
				location.href = "<?php echo base_url();?>index.php/" + controller + "/" + page;
			}
		</script>
	</head>
	<body>
		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		?>
		
		<img src="<?php echo base_url(); ?>/image/pictograms/header.png" style=" max-width:100%; height:auto" class=""/>
            <?php
                $date = $resident['Birthday'];
                $fontSize = $resident['FontSize']
            ?>
                
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-offset-2">
                            <h1>
                                Login verificatie
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="../../image/photos/elman.png" alt="" style=" width: 150px" class="align-left"/>
                        </div>
                        
                        <div class="col-md-offset-1 col-md-6">
                            <h1 >Please fill in your birth date:</h1>
                        </div>
                    </div>
                    <div class="row">
                            <form action="" id="form">
                                <div class="col-md-offset-3 col-md-2">
                                    <h2>Birth date: </h2>
                                </div>
                                <div class="col-md-4"> 
                                    <h2>
                                        <input id="date" type="text" placeholder="dd/mm/yyyy" 
                                               pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d">
                                    </h2>
                                </div>
                            </form>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="1" value="1" id="1" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="2" value="2" id="2" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">                            
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="3" value="3" id="3" onclick="addNumber(this);"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="4" value="4" id="4" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="5" value="5" id="5" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">                            
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="6" value="6" id="6" onclick="addNumber(this);"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="7" value="7" id="7" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="8" value="8" id="8" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">                            
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="9" value="9" id="9" onclick="addNumber(this);"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="/" value="/" id="/" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="0" value="0" id="0" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2">
                            <input type="button" class="btn btn-lg button style btn-block" 
                                   name="Delete" value="delete" id="delete" onclick="addNumber(this);"/>
                        </div>
                    </div>
                        </div>
                        
                        <script type = "text/javascript">
                            
                            var fontSize = "<?php echo $fontSize ?>";
                            var date = "<?php echo $date ?>";
                            var counter = 0;
                            
                            function addNumber(element){
                                if(element.value === "delete"){
                                    document.getElementById('date').value = "";
                                    counter = 0;
                                } else {
                                    document.getElementById('date').value = 
                                        document.getElementById('date').value + element.value;
                                    counter++;
                                }
                                
                                if(counter === 10){
                                    validateDate();
                                }
                            }
                            
                            function validateDate(){
                                var input = document.getElementById('date').value;
                                var regExp = document.getElementById('date').pattern;
                                var match = input.match(regExp);
                                if (match) {
                                    if (input === date) {
                                        if (fontSize) {
                                            loadPage('Welcome', 'Resident/menu');
                                        } else {
                                            loadPage('Fontsize_resident', 'index');
                                        }
                                    } else {
                                        alert("Datum klopt niet.");
                                    }
                                } else {
                                    alert("Gelieve de datum in volgend formaat in te vullen: dd/mm/yyyy.\n\
                                                Bv: 07/03/1932");
                                }
                            }

                        </script>
                    </div>

                </div>
        </body>
</html>
