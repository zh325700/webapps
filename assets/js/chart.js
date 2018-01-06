function  manageIntroData(divisions){
    options=[];
    datascore=[];
    data=[];
    time=[];
    for(var div in divisions){
        input=collectDataIntro(divisions[div]);
        datascore[div]=[];
        for(var value in input){ 
            datascore[div][value]=input[value][0];
            if(time.indexOf(input[value][1])===-1){
                time.push(input[value][1]);
            }
        }
        data[divisions[div]["divisions"]]=datascore[div];
    }
    options["topicaverage"]=getTopicAverage(data);
    options["color"]=getColor(data);
    console.log(time);
    console.log(options["color"]);
    console.log(data);
}

function manageElderData(topics,elder){
    //initializing the arrays
        options=[];
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
        //console.log(data);
        //console.log(time);
}
function manageTopicData(divisions,topic){
    datascore=[];
    data=[];
    time=[];
    console.log(divisions);
    for(var div in divisions){
        input=collectDatatopic(topic,divisions[div]['divisions']);
        datascore[div]=[];
        for(var value in input){
            datascore[div][value]=input[value][0];
            if(time.indexOf(input[value][1])===-1){
                time.push(input[value][1]);
            }
        }
        data[divisions[div]["divisions"]]=datascore[div];
        console.log(data);
    }
    options["timeaverage"]=getTimeAverage(data);
    options["colors"]=getColor(data,options);
    console.log(datascore);
    console.log(data);
    console.log(time);
}

function manageQesData(divisions,ques){
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

/*Function:calculates the average of each time set
* 
* @param {type} data
* @returns {Array|avg}
*/
function getTimeAverage(data){
   //initialises the array
   avg=[0,0,0,0,0,0];
   //loop through each topic
   for(var topic in data){
       //loop through each time value in a topic
       for(var value in data[topic]){
           //if the score isn't zero then it calculates a temp avg
           //keeping in mind that if it's the first value it shouldn't be divided by 2
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
   //console.log(avg);
   return  avg;
}

/*Function:get the average score for each topic
* 
* @param {type} data
* @returns {Array|average}
*/
function getTopicAverage(data){
   //initialises the array
   average=[];
   //loops over every topic
   for(var topic in data){
       var sum=0;
       var count=0;
       //loops over every value in a topic
       for(var value in data[topic]){
           //when a score is not zero is get added in the sum and the counter adds up
           if(data[topic][value]===0){}
           else{
               sum=sum+data[topic][value];
               count++;
           }
       }
       //if the count is not zero then the sum is divided by the count
       if(count!==0){
           average[topic]=sum/count;
       }
       else{
           average[topic]=0;
       }
   }
   //console.log(average);
   return average;
}

/*Function:set the boolean if the bar will be visible, based on the average topicscore
* 
*/
function setVisibility(data){
   //initialises values
   var count=0;
   visible=[];
   //loop through each topic
   for(var topic in data){
       //if the topic average score is above zero but less or equel then two then the bar is shown
       if(options["topicaverage"][topic]<=2 && options["topicaverage"][topic]!==0){
           visible[topic]=false;
           count++; 
       }
       else{
           visible[topic]=true;
       }
   }
   //if there is nothing shown on the graph then every none-zero topic will be shown
   if(count===0){
       for(var topic in data){
           if(options["topicaverage"][topic]>0){
               visible[topic]=false;
           }
       }
   }
   //console.log(visible);
   return visible;
}

/*Function: set the color of the bars for each topic based on the average topic score
* 
* @param {type} data
* @returns {Array|color}
*/
function getColor(data){
    //initialises values
    var avg=0;
    color=[];
    //loop through each topic
    for(var topic in data){
        //set the color based on the average topic score
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

function convertData(data){
    if(language==="Dutch"){
        convertdata=[[0,"deze week"],
                    [0,"vorige week"],
                    [0,"deze maand"],
                    [0,"vorige maand"],
                    [0,"vorige zes maanden"],
                    [0,"meer dan zes maanden"]];
    }
    else{
        convertdata=[[0,"this week"],
                    [0,"previous week"],
                    [0,"this month"],
                    [0,"previous month"],
                    [0,"previous six months"],
                    [0,"more then six months ago"]];
    }
    var timenow=new Date();
    var week=100*60*60*24*7;
    var month=100*60*60*24*30;
    var years=100*60*60*24*356;
    for(var values in data){
        var datestamp=Date.parse(data[values]["DateStamp"]);
        var score=parseInt(data[values]["avg_Score"]);
        var difference=timenow-datestamp;
        if(difference<week){ 
            var sum=convertdata[0][0]+score;
            if(convertdata[0][0]===0){
                convertdata[0][0]=sum;
            }
            else{
                convertdata[0][0]=sum/2;
            }
        }
        else if(difference<2*week){
            var sum=convertdata[1][0]+score;
            if(convertdata[1][0]===0){
                convertdata[1][0]=sum;
            }
            else{
                convertdata[1][0]=sum/2;
            }
        }
        else if(difference<month){
            var sum=convertdata[2][0]+score;
            if(convertdata[2][0]===0){
                convertdata[2][0]=sum;
            }
            else{
                convertdata[2][0]=sum/2;
            }
        }
        else if(difference<2*month){
            var sum=convertdata[3][0]+score;
            if(convertdata[3][0]===0){
                convertdata[3][0]=sum;
            }
            else{
             convertdata[3][0]=sum/2;
            }
        }
        else if(difference<6*month){
            var sum=convertdata[4][0]+score;
            if(convertdata[4][0]===0){
                convertdata[4][0]=sum;
            }
            else{
                convertdata[4][0]=sum/2;
            }
        }
        else{
            var sum=convertdata[5][0]+score;
            if(convertdata[5][0]===0){
                convertdata[5][0]=sum;
            }
            else{
                convertdata[5][0]=sum/2;
            }
        }
    }
    return convertdata;
}

function drawIntroChart(){
    getIntroData();
    var xarray = time;
    var arrayDivision0 = data["0"];
    var arrayDivision1 = data["1"];
    var arrayDivision2 = data["2"];
    var arrayDivision3 = data["3"];
    var ctx = document.getElementById("WeeklyTopicScore").getContext("2d");
    var barChartData = {
        labels: xarray,
        datasets: [
            {
                type: "line",
                label: "Division0",
                borderColor: options["color"][0],
                backgroundColor: options["color"][0],
                pointHighlightFill: "#fff",
                fill: false,
                data: arrayDivision0
            },
            {
                type: "line",
                label: "Division1",
                borderColor: options["color"][1],
                backgroundColor: options["color"][1],
                pointHighlightFill: "#fff",
                fill: false,
                data: arrayDivision1
            },
            {
                type: "line",
                label: "Division2",
                borderColor: options["color"][2],
                backgroundColor: options["color"][2],
                pointHighlightFill: "#fff",
                fill: false,
                data: arrayDivision2
            },
            {
                type: "line",
                label: "Division3",
                borderColor: options["color"][3],
                backgroundColor: options["color"][3],
                pointHighlightFill: "#fff",
                fill: false,
                data: arrayDivision3
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
                position: 'top'
            },
            title: {
                display: true,
                text: 'General overview of the divisions'
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
                data: arrayPrivacyData

            }, {
                label: "PersonalRelationships",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: options["colors"]["PersonalRelationships"],
                fill: false,
                data: arrayRelationData,
                hidden: options["visible"]["PersonalRelationships"]
            },
            {
                label: "FoodAndMeals",
                borderColor: 'rgba(0, 0, 255,0.5)',
                backgroundColor: options["colors"]["FoodAndMeals"],
                fill: false,
                data: arrayFandMData,
                hidden: options["visible"]["FoodAndMeals"]
            },
            {
                label: "Activities",
                borderColor: 'rgba(0, 255, 0,0.5)',
                backgroundColor: options["colors"]["Activities"],
                fill: false,
                data: arrayActivities,
                hidden: options["visible"]["Activities"]
            },
            {
                label: "Autonomy",
                borderColor: 'rgba(	255,165,0,0.5)',
                backgroundColor: options["colors"]["Autonomy"],
                fill: false,
                data: arrayAutonomy,
                hidden: options["visible"]["Autonomy"]
            },
            {
                label: "RespectByStaff",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: options["colors"]["RespectByStaff"],
                fill: false,
                data: arrayRespectByStaff,
                hidden: options["visible"]["RespectByStaff"]
            },
            {
                label: "SafetyAndSecurity",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: options["colors"]["SafetyAndSecurity"],
                fill: false,
                data: arraySafetyAndSecurity,
                hidden: options["visible"]["SafetyAndSecurity"]
            },
            {
                label: "StaffResidentBonding",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: options["colors"]["StaffResidentBonding"],
                fill: false,
                data: arrayStaffResidentBonding,
                hidden: options["visible"]["StaffResidentBonding"]
            },
            {
                label: "StaffResponsiveness",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: options["colors"]["StaffResponsiveness"],
                fill: false,
                data: arrayStaffResponsiveness,
                hidden: options["visible"]["StaffResponsiveness"]
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
                position: 'top'
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
                data: arraydivision0

            },{
                label: "verdieping 1",
                borderColor: "rgba(255, 99, 132,0.5)",
                backgroundColor: "rgba(255, 99, 132,0.5)",
                fill: false,
                data: arraydivision2

            }, {
                label: "verdieping 2",
                borderColor: 'rgba(184,0,0,0.5)',
                backgroundColor: 'rgba(184,0,0,0.5)',
                fill: false,
                data: arraydivision1
            },
            {
                label: "verdieping 3",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: 'rgba(54, 162, 235,0.5)',
                fill: false,
                data: arraydivision3
            }
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
                position: 'top'
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

function drawCharttopic(topic){
    getDatatopic(topic);
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
                backgroundColor: options["color"]["3"],
                fill: false,
                data: arraydivision0

            },{
                label: "verdieping 1",
                borderColor: "rgba(255, 99, 132,0.5)",
                backgroundColor:options["color"]["3"],
                fill: false,
                data: arraydivision2

            }, {
                label: "verdieping 2",
                borderColor: 'rgba(184,0,0,0.5)',
                backgroundColor: options["color"]["3"],
                fill: false,
                data: arraydivision1
            },
            {
                label: "verdieping 3",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: options["color"]["3"],
                fill: false,
                data: arraydivision3
            },
            {
                type: "line",
                label: "AVG",
                borderColor: 'rgb(153, 102, 255)',
                backgroundColor: 'rgb(153, 102, 255)',
                pointHighlightFill: "#fff",
                fill: false,
                data: options["timeaverage"]
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
                position: 'top'
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

