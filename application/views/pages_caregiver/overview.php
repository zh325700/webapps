
<?php //if (htmlentities($this->session->userdata('permission')) >= '1'): ?>
<?php //if (login_check() == true && htmlentities($this->session->userdata('permission')) >= '1'): ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2" id="left">     
                    <button id="btn_general" class="btn btn-default btn-lg btn-block" >
				{general}
			</button> 
			</br>
			<div class="dropdown" id="dropdown_floors">
					<button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-lg btn-block" id="drowpdown_floors_button">
						Floor
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" id="dropdown_floors_menu">
						{content_div}
					</ul>
			</div>
			</br>
			<div class="dropdown" id="dropdown_time">
				<button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-lg btn-block" id="dropdown_time_button">
					Fill-in history
				</button> 
                                <ul class="dropdown-menu" id="dropdown_time_menu">
                                    {content_fiv}
                                </ul>
			</div>
			</br>
			<div>
				<button class="btn btn-default btn-lg btn-block" id="button_elderly"  onclick="loadPage('Welcome', 'Resident/menu')" >{Login_Resident}</button> 
			</div>
			</br>
			<div>
				<button class="btn btn-default btn-lg btn-block" id="button_resqes" onclick="loadPage('CaregiverOperateResident', 'find')">{Find_Resident}</button> 
			</div>
			</br>
			<?php //if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
				<div>
					<button class="btn btn-default btn-lg btn-block" id="button_addelderly" onclick="loadPage('addfacility_control', 'find')">{Find_Facility}</button> 
				</div>
			</br>
			<div>
				<button class="btn btn-default btn-lg btn-block" id="button_addelderly" onclick="loadPage('CaregiverOperateResident', 'create')">{Add_Resident}</button> 
			</div>
			</br>
			<?php //endif; ?>
			<?php //if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
				<div>
					<button class="btn btn-default btn-lg btn-block" id="button_addelderly" onclick="loadPage('addfacility_control', 'addfacility')">{Add_Facility}</button> 
				</div>
			</br>
			<?php //endif; ?>
		</div>
		<div class="col-sm-8" id="right_center">
					<h3 id="title_type_overview">
						General overview
					</h3>
					<div class="panel-group" id="panel_1">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <a class="panel-title" data-toggle="collapse" 
									data-parent="#panel_1" href="#panel_element_1" id="panel_heading_1"> 
									 Residents results overview </a>
							</div>
							<div id="panel_element_1" class="panel-collapse collapse in">
							 
								{content_res}
						   
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel_1" 
									href="#panel_element_2" id="panel_heading_2"> 
									Question results overview </a>
							</div>
							<div id="panel_element_2" class="panel-collapse collapse">
							   
								{content_qes}
								
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
    //makes the eventlisteners for the two buttons
    document.getElementById("btn_general").addEventListener("click",getScores);
    
    //change the styling of this body
    document.body.style.display='inline';
    
    //is the function for initiating the page with loading in the divisions
    //and the initial tabs
    function init() {
        //xmlhttp is a request to the server to collect data
        xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                            document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                    }
            };
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/event_general",false);
            xmlhttp.send();
        xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        //select the element that has to change
                        document.getElementById("dropdown_time").innerHTML = xmlhttp.responseText;
                    }
            };
            //send the request for data to the server, notice that the path is the server side path
            //it also fetches the data, the keyword false is for synchronous action which means that it waits for the result before it returns
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/get_divisions",false);
            //sends the new data to the server and update the page
            xmlhttp.send();
            document.getElementById('dropdown_floors_button').firstChild.data="{Division_Timestamp}";
            var buttons=document.getElementsByClassName("li");
            for(var i=0,length=buttons.length;i<length;i++){
               value=buttons[i].getAttribute("id");
               console.log(value);
               buttons[i].addEventListener("click",function(){getTimeDiv(value);}); 
               buttons[i].setAttribute("class","li_set");
            }
        xmlhttp= new XMLHttpRequest();
            //starts the function when the page is ready
            xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        //select the element that has to change
                        document.getElementById("dropdown_floors").innerHTML = xmlhttp.responseText;
                    }
            };
            //send the request for data to the server, notice that the path is the server side path
            //it also fetches the data, the keyword false is for synchronous action which means that it waits for the result before it returns
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/get_divisions",false);
            //sends the new data to the server and update the page
            xmlhttp.send();
            //loops over every made button by the server
            //and give it the right EventListener
            var buttons2=document.getElementsByClassName("li");
            for(var i=0,length=buttons2.length;i<length;i++){
                value=buttons2[i].getAttribute("id");
                
               buttons2[i].addEventListener("click",function(){getScoresDiv(value);}); 
            }
    }
    
    
    //is the function that asks the server for the scores and updates the tab with it
    function getScores(){
            xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                            document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                    }
            };
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/event_general");
            xmlhttp.send();
    }
    //is the function that asks the server for the scores and updates the tab with it
    function getScoresDiv(Div){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/event_division?division="+Div,false);
        xmlhttp.send();
    }
    
    function getTimeDiv(Div){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/event_time?division="+Div,false);
        xmlhttp.send();
    }
    //is the function that asks the server for the timestamps and updates the tab with it
    function getTimestamps(){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/event_time",false);
        xmlhttp.send();
    }
</script>
<script type='text/javascript'> window.onload=init; </script>


<!--
<//?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<//?php endif; ?>-->
