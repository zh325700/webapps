
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link href="<?php echo base_url(); ?>assets/css/overview.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<!--    <div>-->
        <img src="<?php echo base_url(); ?>/image/pictograms/headernew.png" style=" max-width:100%; height:auto" class=""/>
<!--        <div class="graceAge">
            <h1> Fullscreen Hero image </h1>
        </div>
    </div>-->
    <?php if (htmlentities($this->session->userdata('permission')) >= '1'): ?>
        <div class="container-fluid">
            <div id="wrapper">

                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <nav id="spy">
                        <ul class="sidebar-nav nav">
                            <li>
                                <a href="#anch2" id="btn_general">
                                    <span class="fa fa-home solo">General</span>
                                </a>
                            </li>
                            <li class="dropdown" id="dropdown_floors">   <!--with this id style change.-->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="drowpdown_floors_button">Floors <span class="caret"></span></a>
                                 <ul class="dropdown-menu" id="dropdown_time_menu">
                                    {content_div}
                                </ul>
                            </li>
                            <li class="dropdown" id="dropdown_time">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdown_time_button">Fill in history <span class="caret"></span></a>
                                <a href="#anch2"  id="button_timestamp">
                                    <span class="fa fa-anchor solo">Fill-in history</span>
                                </a>
                            </li>
                            <li>
                                <a  href="<?php echo base_url(); ?>index.php/LoginResident/view"  id="button_elderly">
                                    <span class="fa fa-anchor solo">Login Resident</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/CaregiverOperateResident/find" id="button_resqes">
                                    <span class="fa fa-anchor solo">Find Resident</span>
                                </a>
                            </li>
                            <?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/addfacility_control/find" id="button_resqes">
                                        <span class="fa fa-anchor solo">Find Facility</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/CaregiverOperateResident/create" id="button_resqes">
                                        <span class="fa fa-anchor solo">Add Resident</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/addfacility_control/addfacility" id="button_resqes">
                                        <span class="fa fa-anchor solo">Add Facility</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/AdminRegister/register_caregiver" >
                                        <span class="fa fa-anchor solo">Add Caregiver</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>

                <!-- Page content -->
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
    
    
    
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> 

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
            E_panels=document.getElementsByClassName("elder_tab");
            E_value=[];
            for(var i=0,length=E_panels.length;i<length;i++){
               E_value[i]=E_panels[i].getAttribute("id");
              // E_panels[i].addEventListener("click",function(){getChartElder(E_value[i]);}); 
            }
            Q_panels=document.getElementsByClassName("question");
            for(var j=0,length=Q_panels.length;i<length;i++){
                Q_value=Q_panels[i].getAttribute("id");
               Q_panels[i].addEventListener("click",function(){getChartQuestion(Q_value);}); 
            }
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
    
    
    function getChartElder(elder){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getChartElder?ID_Elder="+elder,false);
        xmlhttp.send();
        console.log(document.getElementById("st").getAttribute("class").split(","));
        var xarray = document.getElementById("tt").getAttribute("class").split(",",3);
        var arrayfoodData = document.getElementById("st").getAttribute("class").split(",",3);
        var arrayRelationData = document.getElementById("st").getAttribute("class").split(",");
        var ctx = document.getElementById("canvas").getContext("2d");
        var barChartData = {
            labels: xarray,
            datasets: [{
                    label: "Privacy",
                    borderColor: "rgb(255, 99, 132)",
                    backgroundColor: "rgb(255, 99, 132)",
                    fill: false,
                    data: arrayfoodData,
    //                data: [{x: 0, y: 10}, {x: 1, y: 6}],

                }, {
                    label: "Relationship",
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgb(54, 162, 235)',
                    fill: false,
                    data: arrayRelationData,
    //                data: [{x: 1, y: 9}, {x: 2, y: 6}],
                }]
        };
        var myBar = new Chart(ctx, {
            data: barChartData,
            type: 'bar',
            options: {
                // adjust the size of chart 
                responsive: true,

                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Average score of one topic'
                },
    //            scales: {
    //                xAxes: [{
    //                        type: 'linear',
    //                        position: 'bottom'
    //                    }]
    //            }

            }
        });
    }
    
     function getChartQuestion(ques){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getChartQuestion?ID_Question="+ques,false);
        xmlhttp.send();
        //var xarray = document.getElementById("tt").getAttribute("class").split(",",3);
        var xarray=[1,2,3,4,5,6];
        //var arrayfoodData = document.getElementById("st").getAttribute("class").split(",",3);
        var arrayfoodData=[3,3,4,3,4,3];
        //var arrayRelationData = document.getElementById("st").getAttribute("class").split(",");
        var arrayRelationData=[2,2,3,2,2,1];
        var ctx = document.getElementById("canvas").getContext("2d");
        var barChartData = {
            labels: xarray,
            datasets: [{
                    label: "Privacy",
                    borderColor: "rgb(255, 99, 132)",
                    backgroundColor: "rgb(255, 99, 132)",
                    fill: false,
                    data: arrayfoodData,
    //                data: [{x: 0, y: 10}, {x: 1, y: 6}],

                }, {
                    label: "Relationship",
                    borderColor: 'rgb(54, 162, 235)',
                    backgroundColor: 'rgb(54, 162, 235)',
                    fill: false,
                    data: arrayRelationData,
    //                data: [{x: 1, y: 9}, {x: 2, y: 6}],
                }]
        };
        var myBar = new Chart(ctx, {
            data: barChartData,
            type: 'bar',
            options: {
                // adjust the size of chart 
                responsive: true,

                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Average score of one topic'
                },
    //            scales: {
    //                xAxes: [{
    //                        type: 'linear',
    //                        position: 'bottom'
    //                    }]
    //            }

            }
        });
    }
</script>
<script type='text/javascript'> window.onload=init; </script>

    </body>

<?php else: ?>
    <p>
        <br><br><br>
    <center>
        <span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
    </center>
    <br><br><br>
    </p>
<?php endif; ?>