		<!--our css and less-->
        <link rel="stylesheet/less" type="text/css" href="<?php echo base_url();?>/assets/css/pj_login_resident.less" />
		
        <!--compile less files-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.1/less.min.js"></script>

	</head>
	<body>
		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');
		?>
		
            <?php
                $date = $resident['Birthday'];
                $pic = $resident['Picture'];
            ?>
                <div class="container-fluid" style="height: 6%; width:100.3%">
                    <div class="row">
                        <div class="col-sm-offset-1" style="padding-left: 17px">
                            <h1 style="margin-top:0.75%">
                                {Login_verificatie}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" style="margin-top:0.5%">
                        <div class="col-md-2 col-sm-2" style="padding-left: 0">
                            <img src="../../image/photos/<?= $pic?>" alt="" style=" width: 100px" class="align-left"/>
                        </div>
                        
                        <div class="col-md-offset-1 col-md-6 col-sm-offset-1 col-sm-9">
                            <h1 class="par2">{Gelieve_geboortedag_vullen}:</h1>
                        </div>
                    </div>
                    <div class="row" style="margin-top:0%">
                        
                        <div class="col-sm-3" style="padding-left: 0">
                            <button class="btn button style small btn-block" onclick="loadPage('ResidentLogin', 'view')">
                                {Dit_ben}<br> {ik_niet}</button>
                        </div>
                            <form action="" id="form">
                                <div class="col-md-2 col-sm-3">
                                    <h2>{Birthday}: </h2>
                                </div>
                                <div class="col-md-4 col-sm-offset-1 col-sm-4"> 
                                    <h2>
                                        <input id="date" type="text" style="width:130%" placeholder="dd/mm/yyyy" 
                                               pattern="(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\d\d" readonly="true">
                                    </h2>
                                </div>
                            </form>
                        
                    </div>
                    
                      <div class="row" style="height: 10%">
                        <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3" >
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="1" value="1" id="1" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="2" value="2" id="2" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2 col-sm-3">                            
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="3" value="3" id="3" onclick="addNumber(this);"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0.5%; height: 10%">
                        <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3">
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="4" value="4" id="4" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="5" value="5" id="5" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2 col-sm-3">                            
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="6" value="6" id="6" onclick="addNumber(this);"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0.5%; height: 10%">
                        <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3">
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="7" value="7" id="7" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="8" value="8" id="8" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2 col-sm-3">                            
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="9" value="9" id="9" onclick="addNumber(this);"/>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 0.5%; height: 10%">
                        <div class="col-md-offset-3 col-md-2 col-sm-offset-3 col-sm-3">
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="0" value="0" id="0" onclick="addNumber(this);"/>
                        </div>
                        <div class="col-md-2 col-sm-3">
                            <input type="button" class="btn btn-lg button style btn-block" style="height: 100%; border-radius: 10px; border: solid 2px #EDEEF4; background: #EDEEF4;"
                                   name="Delete" value="delete" id="delete" onclick="addNumber(this);"/>
                        </div>
                    </div>
                        </div>
                        
                        <script type = "text/javascript">
                            
                            
                            var date = "<?php echo $date ?>";
                            var counter = 0;
                            
                            function addNumber(element){
                                if(element.value === "delete"){
                                    document.getElementById('date').value = document.getElementById('date').value.slice(0,-1);
                                    if(counter > 0){
                                        counter--;
                                    }
                                } else {
                                    document.getElementById('date').value = 
                                        document.getElementById('date').value + element.value;
                                    counter++;
                                    if (counter === 2 || counter === 5){
                                        document.getElementById('date').value = 
                                                document.getElementById('date').value + "/";
                                        counter++;
                                
                                    }
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
                                            <?php 
                                                $this->session->set_userdata('idelder', $resident['ID_Elder']);
                                                $this->session->set_userdata('idfacility', $resident['ID_facility']);
                                                $this->session->set_userdata('firstname', $resident['FirstName']);
                                                $this->session->set_userdata('lastname', $resident['LastName']);
                                                $this->session->set_userdata('division', $resident['division']);
                                                $this->session->set_userdata('picture', $resident['Picture']);
                                            ?>
                                            loadPage('Welcome', 'Resident/menu');
                                    } else {
                                        document.getElementById('date').value = "";
                                        counter = 0;
                                        alert("Datum klopt niet.");
                                        
                                    }
                                } else {
                                    document.getElementById('date').value = "";
                                    counter = 0;
                                    alert("Gelieve de datum in volgend formaat in te vullen: dd/mm/yyyy.\n\
                                                Bv: 07/03/1932");
                                }
                            }

                        </script>
                    </div>

                </div>
        </body>
</html>
