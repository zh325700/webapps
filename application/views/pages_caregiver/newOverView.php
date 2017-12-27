
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
        
    
    
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> 

<script type="text/javascript">
    //makes the eventlisteners for the two buttons
    document.getElementById("btn_general").addEventListener("click",getScores);
    
    //change the styling of this body
    document.body.style.display='inline';
    

    /*init()
     * Function:the initiations of the overview page, 
     *          loads in the dropdown menu's and the statistics
     * Input:none
     * Output: the different dorpdown menu's and the statistics views
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
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/event_general",false);
            //Sends the request to the server and then waits for a response
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
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/get_time_divisions",false);
            //sends the new data to the server and update the page
            xmlhttp.send();
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
            xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/get_divisions",false);
            //sends the new data to the server and update the page
            xmlhttp.send();
    }
    
    
    /*getScores()
     * Function: the action preformed when clicked on the general button
     *          it generates a new view in the tabs by asking the server for the data
     *Input: none
     *Output: the view is updated
     * @returns 
     */
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
    
    /*getScoredDiv()
     * Function: the action preformed when clicked on the division dropdown buttons
     *          it generates a new view in the tabs by asking the server for the data
     * Input: The division that is selected
     * Output: The view is updated
     * @param {type} Div
     * @returns {undefined}
     */
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
    
    /*getTimeDiv()
     * Function: the action preformed when clicked on the time-filled in dropdown buttons
     *          it generates a new view in the tabs by asking the server for the data
     * Input: The selected division
     * Output: the view is updated
     * @param {type} Div
     * @returns {undefined}
     */
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
    

    /*getChartElder()
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
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getChartElder?ID_Elder="+elder,false);
        xmlhttp.send();
        //call the function to draw the chart
        drawChart(elder,"elder");
    }
    
     /*getChartQuestion()
     * Function: the action when you press the detail button in a tab, it update the view
     * Input: the question ID
     * Output: the view is updated
     * @param {type} ques
     * @returns {undefined}
     */
    function getChartQuestion(ques){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState === XMLHttpRequest.DONE){
                        document.getElementById("panel_1").innerHTML = xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getChartQuestion?ID_Question="+ques,false);
        xmlhttp.send();
        //call the function to draw the chart
        drawChartqes(ques,"ques");
    }
    
    /*getData()
     * Function: collects the data and put them in the right arrays, first it asks for the different topics
     *           then it aks for the data for each topic
     * Input: The elder id
     * Output: an array with all the data needed in it
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
        //reparse the data giving from the server from string into array
        //topics is the array of every topic
        topics=jQuery.parseJSON(topics);
        //initializing the arrays
        options=[]
        datascore=[];//a temp array to store the scores
        data=[];// the array that will be send to the chartdrawer
        time=[];// the array with the different timepoints(x-axis)
        //loops over every topic in the topic array
        for(var topic in topics){
            //calls a function to collect all the data from the server for each topic
            input=collectData(elder,topics[topic],value);
            //initialize in the data array for each topic
            datascore[topic]=[];
            //loop over every value in the inout from the scores for each topic
            for(var value in input){
                //put every avgScore into the temp array on the right spot
                datascore[topic][value]=input[value][0];
                //checks if the timestamp is already on the x-axis if not adds it to it
                if(time.indexOf(input[value][1])===-1){
                    time.push(input[value][1]);
                }
            }
            //puts the scores from the temp array into the data array
            data[topics[topic]["Type"]]=datascore[topic];
        }
        //cal several functions to set some options
        options["timeaverage"]=getTimeAverage(data);
        options["topicaverage"]=getTopicAverage(data);
        options["colors"]=getColor(data,options);
        options["visible"]=setVisibility(data,options);
        console.log(data);
        console.log(time);
    }
    
    function getTimeAverage(data){
        avg=[0,0,0,0,0,0];
        for(var topic in data){
            for(var value in data[topic]){
                    if(data[topic][value]!==0){
                    sum=avg[value]+data[topic][value];
                    if(avg[value]===0){
                        avg[value]=sum;
                    }
                    else{
                        avg[value]=sum/2;
                    }
                }
            }
        }
        console.log(avg);
        return  avg;
    }
    
    function getTopicAverage(data){
        average=[];
        for(var topic in data){
            var sum=0;
            var count=0;
            for(var value in data[topic]){
                if(data[topic][value]===0){}
                else{
                    sum=sum+data[topic][value];
                    count++;
                }
            }
            if(count!==0){
                average[topic]=sum/count;
            }
            else{
                average[topic]=0
            }
        }
        console.log(average);
        return average;
    }
    
    function setVisibility(data){
        var count=0;
        visible=[];
        for(var topic in data){
            if(options["topicaverage"][topic]<2 && options["topicaverage"][topic]!==0){
                visible[topic]=false;
                count++; 
            }
            else{
                visible[topic]=true;
            }
        }
        if(count===0){
            for(var topic in data){
                if(options["topicaverage"][topic]>0){
                    visible[topic]=false;
                }
            }
        }
        console.log(visible);
        return visible;
    }
    
    function getColor(data){
        var avg=0;
        color=[];
        for(var topic in data){
            if(options["topicaverage"][topic]>4){
                color[topic]="DarkGreen";
            }
            else if(options["topicaverage"][topic]>3){
                color[topic]="ForestGreen";
            }
            else if(options["topicaverage"][topic]>2){
                color[topic]="Gold";
            }
            else if(options["topicaverage"][topic]>1){
                color[topic]="DarkOrange";
            }
            else if(options["topicaverage"][topic]>0){
                color[topic]="Red";
            }
            else{
                color[topic]="White";
            }
        }
        return color;
    }
    
    
    /*getDataqes()
     * 
     * @param {type} ques
     * @returns {undefined}
     */
    function getDataqes(ques){ 
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
        datascore=[];
        data=[];
        time=[];
        for(var div in divisions){
            input=collectDataqes(ques,divisions[div]);
            datascore[div]=[];
            for(var value in input){
                datascore[div][value]=input[value][0];
                if(time.indexOf(input[value][1])===-1){
                    time.push(input[value][1]);
                }
            }
            data[divisions[div]["divisions"]]=datascore[div];
            console.log(divisions[div]);
        }
        console.log(data);
        console.log(time);
    }
    
    function collectData(elder,topic){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                             input = xmlhttp.responseText;
                    }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/test?type="+topic["Type"]+"&ID_elder="+elder,false);
        xmlhttp.send();
        //console.log(input);
        cdata=jQuery.parseJSON(input);
        cdata=cdata["thescores"];
        cdata=convertData(cdata);
        return cdata;
    }
    
    function convertData(data){
        convertdata=[[0,"deze week"],
                    [0,"vorige week"],
                    [0,"deze maand"],
                    [0,"vorige maand"],
                    [0,"vorige zes maanden"],
                    [0,"meer dan zes maanden"]];
        var timenow=new Date();
        var week=100*60*60*24*7;
        var month=100*60*60*24*30;
        var years=100*60*60*24*356;
        for(var values in data){
            var datestamp=Date.parse(data[values]["DateStamp"]);
            var score=parseInt(data[values]["avg_Score"]);
            var difference=timenow-datestamp;
            console.log(difference);
            if(difference<week){ 
                var sum=convertdata[1][0]+score;
                if(convertdata[1][0]===0){
                    convertdata[1][0]=sum;
                }
                else{
                    convertdata[1][0]=sum/2;
                }
            }
            else if(difference<2*week){
                var sum=convertdata[2][0]+score;
                if(convertdata[2][0]===0){
                    convertdata[2][0]=sum;
                }
                else{
                    convertdata[2][0]=sum/2;
                }
            }
            else if(difference<month){
                var sum=convertdata[3][0]+score;
                if(convertdata[3][0]===0){
                    convertdata[3][0]=sum;
                }
                else{
                    convertdata[3][0]=sum/2;
                }
            }
            else if(difference<2*month){
                var sum=convertdata[4][0]+score;
                if(convertdata[4][0]===0){
                    convertdata[4][0]=sum;
                }
                else{
                 convertdata[4][0]=sum/2;
                }
            }
            else if(difference<6*month){
                var sum=convertdata[5][0]+score;
                if(convertdata[5][0]===0){
                    convertdata[5][0]=sum;
                }
                else{
                    convertdata[5][0]=sum/2;
                }
            }
            else{
                var sum=convertdata[6][0]+score;
                if(convertdata[6][0]===0){
                    convertdata[6][0]=sum;
                }
                else{
                    convertdata[6][0]=sum/2;
                }
            }
        }
        return convertdata;
    }
    function collectDataqes(qes,division){
        xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState === XMLHttpRequest.DONE){
                             input = xmlhttp.responseText;
                    }
            };
        xmlhttp.open("GET","<?php echo base_url();?>index.php/OverviewCaregiver/getQuestionScore?division="+division+"&ID_Question"+qes,false);
        xmlhttp.send();
        console.log(input);
        cdata=jQuery.parseJSON(input);
        cdata=cdata["thescores"];
        return cdata;
    }
    
    function drawChart(elder,test){
        getData(elder,test);
        //console.log(time);
        var xarray = time;
        var arrayPrivacyData = data["Privacy"];
        var arrayRelationData = data["PersonalRelationships"];
        var arrayFandMData = data["FoodAndMeals"];
        var arrayActivities = data["Activities"];
        var arrayAutonomy = data["Autonomy"];
        var arrayRespectByStaff = data["RespectByStaff"];
        var arraySafetyAndSecurity = data["SafetyAndSecurity"];
        var arrayStaffResidentBonding = data["StaffResidentBonding"];
        var arrayStaffResponsiveness = data["StaffResponsiveness"];
        var arrayAVG = options["timeaverage"];
        var ctx = document.getElementById("WeeklyTopicScore").getContext("2d");
        var barChartData = {
            labels: xarray,
            datasets: [
                {
                    type: "line",
                    label: "AVG",
                    borderColor: 'Black',
                    backgroundColor: 'BSlack',
                    pointHighlightFill: "#fff",
                    fill: false,
                    data: arrayAVG
                },{
                    label: "Privacy",
                    visible: false,
                    borderColor: "rgba(255, 99, 132,0.5)",
                    backgroundColor: options["colors"]["Privacy"],
                    hidden: options["visible"]["Privacy"],
                    data: arrayPrivacyData,
                    
                }, {
                    label: "PersonalRelationships",
                    borderColor: 'rgba(54, 162, 235,0.5)',
                    backgroundColor: options["colors"]["PersonalRelationships"],
                    fill: false,
                    data: arrayRelationData,
                    hidden: options["visible"]["PersonalRelationships"],
                },
                {
                    label: "FoodAndMeals",
                    borderColor: 'rgba(0, 0, 255,0.5)',
                    backgroundColor: options["colors"]["FoodAndMeals"],
                    fill: false,
                    data: arrayFandMData,
                    hidden: options["visible"]["FoodAndMeals"],
                },
                {
                    label: "Activities",
                    borderColor: 'rgba(0, 255, 0,0.5)',
                    backgroundColor: options["colors"]["Activities"],
                    fill: false,
                    data: arrayActivities,
                    hidden: options["visible"]["Activities"],
                },
                {
                    label: "Autonomy",
                    borderColor: 'rgba(	255,165,0,0.5)',
                    backgroundColor: options["colors"]["Autonomy"],
                    fill: false,
                    data: arrayAutonomy,
                    hidden: options["visible"]["Autonomy"],
                },
                {
                    label: "RespectByStaff",
                    borderColor: 'rgba(54, 162, 235,0.5)',
                    backgroundColor: options["colors"]["RespectByStaff"],
                    fill: false,
                    data: arrayRespectByStaff,
                    hidden: options["visible"]["RespectByStaff"],
                },
                {
                    label: "SafetyAndSecurity",
                    borderColor: 'rgba(54, 162, 235,0.5)',
                    backgroundColor: options["colors"]["SafetyAndSecurity"],
                    fill: false,
                    data: arraySafetyAndSecurity,
                    hidden: options["visible"]["SafetyAndSecurity"],
                },
                {
                    label: "StaffResidentBonding",
                    borderColor: 'rgba(54, 162, 235,0.5)',
                    backgroundColor: options["colors"]["StaffResidentBonding"],
                    fill: false,
                    data: arrayStaffResidentBonding,
                    hidden: options["visible"]["StaffResidentBonding"],
                },
                {
                    label: "StaffResponsiveness",
                    borderColor: 'rgba(54, 162, 235,0.5)',
                    backgroundColor: options["colors"]["StaffResponsiveness"],
                    fill: false,
                    data: arrayStaffResponsiveness,
                    hidden: options["visible"]["StaffResponsiveness"],
                }
            ]
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
                scales:{
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            suggestedMax:5
                        }
                    }],
                    xAxes:[{ticks: {mirror: true}}]
                }
            }
        });   
    }
    function drawChartqes(ques,test){
        getDataqes(ques,test);
        //console.log(time);
        var xarray = time;
        var arraydivision0 = data["0"];
        var arraydivision1 = data["1"];
        var arraydivision2 = data["2"];
        var arraydivision3 = data["3"];
        //var arrayAVG = <?//php echo json_encode($arrayAvgScore); ?>;
        var ctx = document.getElementById("WeeklyTopicScore").getContext("2d");
        var barChartData = {
            labels: xarray,
            datasets: [
                {
                    label: "gelijkvloers",
                    borderColor: "rgb(128,128,128,0.5)",
                    backgroundColor: "rgba(128,128,128,0.5)",
                    fill: false,
                    data: arraydivision0,

                },{
                    label: "verdieping 1",
                    borderColor: "rgba(255, 99, 132,0.5)",
                    backgroundColor: "rgba(255, 99, 132,0.5)",
                    fill: false,
                    data: arraydivision2,

                }, {
                    label: "verdieping 2",
                    borderColor: 'rgba(184,0,0,0.5)',
                    backgroundColor: 'rgba(184,0,0,0.5)',
                    fill: false,
                    data: arraydivision1,
                },
                {
                    label: "verdieping 3",
                    borderColor: 'rgba(54, 162, 235,0.5)',
                    backgroundColor: 'rgba(54, 162, 235,0.5)',
                    fill: false,
                    data: arraydivision3,
                },
                /*{
                    type: "line",
                    label: "AVG",
                    borderColor: 'rgb(153, 102, 255)',
                    backgroundColor: 'rgb(153, 102, 255)',
                    pointHighlightFill: "#fff",
                    fill: false,
                    data: arrayAVG,
                }*/
            ]
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
                scales:{
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });   
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
