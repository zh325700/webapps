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
                                    <span class="fa fa-home solo">{general}</span>
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
                                    <span class="fa fa-anchor solo">{Login_Resident}</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/CaregiverOperateResident/find" id="button_resqes">
                                    <span class="fa fa-anchor solo">{Find_Resident}</span>
                                </a>
                            </li>
                            <?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/addfacility_control/find" id="button_resqes">
                                        <span class="fa fa-anchor solo">{Find_Facility}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/CaregiverOperateResident/create" id="button_resqes">
                                        <span class="fa fa-anchor solo">{Add_Resident}</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/addfacility_control/addfacility" id="button_resqes">
                                        <span class="fa fa-anchor solo">{Add_Facility}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/AdminRegister/register_caregiver" >
                                        <span class="fa fa-anchor solo">{Add_Caregiver}</span>
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
                <div class="row" align="right">
                    <input Type="button" class="btn logout btn-lg" Value="LOGOUT" Onclick="location.href = '<?php echo base_url(); ?>index.php/Logout'"/>
                </div>
            </div>
        
        </div>
        
    <link href='<?php echo base_url()?>/assets/css/fullcalendar.min.css' rel='stylesheet' />
    <link href='<?php echo base_url()?>/assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> 
    <script src='<?php echo base_url()?>/assets/js/moment.js'></script>
    <script src='<?php echo base_url()?>/assets/js/fullcalendar.min.js'></script>
    <script src='<?php echo base_url()?>/assets/js/alert.js'></script>
    <script src='<?php echo base_url()?>/assets/js/chart.js'></script>
<script type="text/javascript">
    //makes the eventlisteners for the two buttons
    document.getElementById("btn_general").addEventListener("click",getScores);
    language="Dutch";
    //change the styling of this body
    document.body.style.display='inline';
    xmlhttp= new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){ //checks if the server is ready
            if(xmlhttp.readyState === XMLHttpRequest.DONE){
                //responsetext is the output send by the server and is placed in the provided placeholder
                language = xmlhttp.responseText;
            }
    };
    //prepare the xmlhttp request, here it's calling a controller function for the statics
    xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getLanguage",false);
    //Sends the request to the server and then waits for a response
    xmlhttp.send();
    /*
     * Function:the initiations of the intro page
     *          shows the callender,chart and alerts
     * @returns 
     */
    function init() {
        //xmlhttp is a request that will be send to the server
        xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){ //checks if the server is ready
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    //responsetext is the output send by the server and is placed in the provided placeholder
                    document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
            };
        //prepare the xmlhttp request, here it's calling a controller function for the statics
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getIntro",false);
        //Sends the request to the server and then waits for a response
        xmlhttp.send();
        //call the function to draw the chart
        drawIntroChart();
        //call the function to make the alerts
        drawIntroAlert();
        //build the callender
        $(document).ready(function() {
            $('#calendar').fullCalendar({
              defaultView: 'listWeek',
              defaultDate: '2017-12-12',
              navLinks: true, // can click day/week names to navigate views
              editable: true,
              eventLimit: true, // allow "more" link when too many events
              events: [

              ]
            });
          });
        //asks the server to build the dropdown menu's
        xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    //select the element that has to change
                    document.getElementById("dropdown_time").innerHTML = xmlhttp.responseText;
                }
            };
            //send the request for data to the server, notice that the path is the server side path
            //it also fetches the data, the keyword false is for synchronous action which means that it waits for the result before it returns
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getTimeDivisions",false);
            //sends the new data to the server and update the page
            xmlhttp.send();
            //changes the tag in the html to fit with the right title
        document.getElementById('dropdown_floors_button').firstChild.data="{Division_Timestamp}";
            
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
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getDropdownDivisions",false);
            //sends the new data to the server and update the page
            xmlhttp.send();
    }
    
    /*
     * Function: calls the server to ask for data and then calls a function to make the alerts
     * 
     */
    function drawIntroAlert(){
        alerts=[];
        xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                           input = xmlhttp.responseText;
                    }
            };
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getAlert",false);
            xmlhttp.send();
        data=jQuery.parseJSON(input);
        //console.log(data);
        makeAlert(data);
    }

    /*
     *Function: the action preformed when clicked on the general button
     *          it generates a new view in the tabs by asking the server for the data
     *Output: the view is updated
     */
    function getScores(){
            xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                            document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                    }
            };
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/eventGeneral");
            xmlhttp.send();
    }
    
    /*
     * Function: the action preformed when clicked on the division dropdown buttons
     *          it generates a new view in the tabs by asking the server for the data
     * Input: The division that is selected
     * Output: The view is updated
     * @param {type} Div
     * @returns {undefined}
     */
    function getScoresDiv(div){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/eventDivision?division="+div,false);
        xmlhttp.send();
    }
    
    /*
     * Function: the action preformed when clicked on the time-filled in dropdown buttons
     *          it generates a new view in the tabs by asking the server for the data
     * Input: The selected division
     * Output: the view is updated
     * @param {type} Div
     * @returns {undefined}
     */
    function getTimeDiv(div){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/eventTime?division="+div,false);
        xmlhttp.send();
    }
    
    /*
     * Function:
     * @returns {undefined}
     *
    function getTimestamps(){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/event_time",false);
        xmlhttp.send();
    }*/
    

    /*
     * Function: the action when you press the detail button in a tab, it update the view
     * Input: the elder ID
     * Output: the view is updated
     * @param {type} elder
     * @returns {undefined}
     */
    function getChartElder(elder){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getChartElder?ID_elder="+elder,false);
        xmlhttp.send();
        //build all the alerts for the elderly
        getAlerts(elder);
        //call the function to draw the chart
        drawChart(elder,"elder");
    }
    
    /*
     *Function: gets the data from the server and then calls a function to build the alerts from it 
     * @param {type} elder
     * @returns {undefined}
     */
    function getAlerts(elder){
        xmlhttp= new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    input = xmlhttp.responseText;
                }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getAlertElder?ID_elder="+elder,false);
        xmlhttp.send();
        data=jQuery.parseJSON(input);
        console.log(data);
        makeElderAlert(data);
    }
   
    
     /*
     * Function: the action when you press the detail button in a tab, it update the view
     * Input: the question ID
     * Output: the view is updated
     * @param {type} ques
     * @returns {undefined}
     */
    function getChartTopic(topic){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState === XMLHttpRequest.DONE){
                document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getChartTopic?topic="+topic,false);
        xmlhttp.send();
        //call the function to draw the chart
        drawQuestionScores(topic);
        drawCharttopic(topic);
    }
    
    /*
     * Function: build the score list for each topic 
     * Input:topic of which the questions should belong to
     * Output: a html list with the uestions and scores
     * @param {type} charttopic
     * @returns {undefined}
     */
    function drawQuestionScores(topic){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
            if(xmlhttp.readyState === XMLHttpRequest.DONE){
                input= xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getTopicQuestions?Topic="+topic,false);
        xmlhttp.send();
        //make from the input string an array again
        var data=jQuery.parseJSON(input);
        //get the parents object in the html
        var parentquestion=document.getElementById("questionlist");
        var parentscore=document.getElementById("scorelist");
        //for each value in the data slot a list item is made
        for(var value in data){
            //create the items
            var childquestion=document.createElement("p");
            var childscore=document.createElement("p");
            //append the right child with the right data
            childquestion.appendChild(document.createTextNode(data[value]["Question"]));
            childscore.appendChild(document.createTextNode(data[value]["Avg_Score"]));
            //append child with the right parrent
            parentquestion.appendChild(childquestion);
            parentscore.appendChild(childscore);
        }
    }
    
    /*
     * Function: collects every topic and then calls a function that manages this data
     * Input: The elder id
     * Output: an array with all the topics
     * @param {type} elder
     * @returns {undefined}
     */
    function getData(elder){ 
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    topics = xmlhttp.responseText;
                }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getTypes",false);
        xmlhttp.send();
        //reparse the data giving from the server from string into array and call the managing function
        topics=jQuery.parseJSON(topics);
        manageElderData(topics,elder);
    }
    
    
    
    
    /*
     * Function: collects every division and then calls a function that manages this data
     * Input: The question id
     * Output: an array with all the divisions
     * @param {type} ques
     * @returns {undefined}
     */
    function getDataqes(question){ 
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    divisions= xmlhttp.responseText;
                }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getDivisions",false);
        xmlhttp.send();
        console.log(divisions);
        divisions=jQuery.parseJSON(divisions);
        manageQesData(divisions,question);
    }
    
    /*
     * Function: collects every division and then calls a function that manages this data
     * Input: The question id
     * Output: an array with all the divisions
     */
    function getDatatopic(topic){ 
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    divisions= xmlhttp.responseText;
                }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getDivisions",false);
        xmlhttp.send();
        divisions=jQuery.parseJSON(divisions);
        manageTopicData(divisions,topic);
    }
    
    /*
     * Function: collect the data from the server for a specific division of a specific topic
     * Input: the specified division and topic
     * Output: the data collected from the server
     */
    function collectDatatopic(topic,divisions){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                             input= xmlhttp.responseText;
                    }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getTopicScores?topic="+topic+"+&Division="+divisions,false);
        xmlhttp.send();
        var cdata=jQuery.parseJSON(input);
        cdata=convertData(cdata);
        return cdata;
    }
    
    /*
     * Function: collect the data from the server for a specific elder of a specific topic
     * Input: the specified elder and topic
     * Output: the data collected from the server
     */
    function collectData(elder,topic){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    input = xmlhttp.responseText;
                }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getElderScores?type="+topic["type"]+"&ID_elder="+elder,false);
        xmlhttp.send();
        var cdata=jQuery.parseJSON(input);
        cdata=cdata["scores"];
        cdata=convertData(cdata);
        return cdata;
    }
    
     /*
     * Function: collect the data from the server for a specific question of a specific division
     * Input: the specified question and division
     * Output: the data collected from the server
     */
    function collectDataqes(question,division){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                             input = xmlhttp.responseText;
                    }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getQuestionScore?division="+division+"&ID_question"+question,false);
        xmlhttp.send();
        var cdata=jQuery.parseJSON(input);
        cdata=cdata["scores"];
        return cdata;
    }
    
     /*
     * Function: collect all the division from the server and then call another method to manage the data
     * Output: the data collected from the server
     */
    function getIntroData(){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    divisions= xmlhttp.responseText;
                }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getDivisions",false);
        xmlhttp.send();
        divisions=jQuery.parseJSON(divisions);
        manageIntroData(divisions); 
    }
    
    /*
     * Function: collect the data from the server for a specific division
     * Input: the specified division
     * Output: the data collected from the server
     */
    function collectDataIntro(division){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                    input = xmlhttp.responseText;
                }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getDivisionScore?division="+division["divisions"],false);
        xmlhttp.send();
        var cdata=jQuery.parseJSON(input);
        cdata=convertData(cdata);
        return cdata;
    }

</script>
<script type='text/javascript'> window.onload=init; </script>



<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>
