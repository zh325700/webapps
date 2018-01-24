/*
 * Function: collects the data, managis it and prepare the right data and options for the charts
 * Input: an array with all the divisions;
 * Output: all the data and options needed for the chart
 * @param {type} divisions
 * @returns {undefined}
 */
function  manageIntroData(divisions){
    //initialising the arrays
    options=[];
    datascore=[];
    data=[];
    time=[];
    options["label"]=[];
    options["visible"]=[];
    //loop over every division
    for(var div in divisions){
        //call a method to collect the data for each division
        var input=collectDataIntro(divisions[div]);
        datascore[div]=[];
        //for ever value we got back
        for(var value in input){ 
            //put the score in the score array
            datascore[div][value]=input[value][0];
            //looks if the timestamp is already in the timearray
            //if not add it
            if(time.indexOf(input[value][1])===-1){
                time.push(input[value][1]);
            }
        }
        //put the scorearray into the data array under the right index
        data[divisions[div]["divisions"]]=datascore[div];
        //fill in some options, label is how the dataset is called in the legend
        //visible is if the dataset is visible
        options["label"][div]=divisions[div]["divisions"];
        options["visible"][divisions[div]["divisions"]]=false;
    }
    //call functions to determine the options
    //color is the color of the graph and type is what kind of graph it should be
    options["topicaverage"]=getTopicAverage(data);
    options["color"]=getColor(data);
    options["type"]=getType("line");
    options["timeaverage"]=0;
    //select a titletext based on the language
    if(language==="Dutch"){
        options["titletext"]="Algemeen overzicht van de afdelingen";
    }
    else{
        options["titletext"]="General overview of the divisions";
    }
}

/*
 * Function: fill in the type of the graph
 * Input: the type of graph
 * Output a filled in graph
 * @param {type} typetext
 * @returns {Array}
 */
function getType(typetext){
    var type=[];
    for(var value in data){
        type[value]=typetext;
    }
    return type;
}

/*
 * Function:collects the data, managis it and prepare the right data and options for the charts
 * Input: an array with all the topics and the id of the elder;
 * Output: all the data and options needed for the chart
 * @param {type} topics
 * @param {type} elder
 * @returns {undefined}
 */
function manageElderData(topics,elder){
    //initializing the arrays
    options=[];
    var datascore=[];//a temp array to store the scores
    data=[];// the array that will be send to the chartdrawer
    time=[];// the array with the different timepoints(x-axis)
    options["label"]=[];
    //loops over every topic in the topic array
    for(var topic in topics){
        //calls a function to collect all the data from the server for each topic
        var input=collectData(elder,topics[topic],value);
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
        options["label"][topic]=topics[topic]["Type"];
    }
    //call several functions to set some options
    options["timeaverage"]=getTimeAverage(data);
    options["topicaverage"]=getTopicAverage(data);
    options["color"]=getColor(data,options);
    options["visible"]=setVisibility(data,options);
    options["type"]=getType("bar");
    if(language==="Dutch"){
        options["titletext"]="Overzicht bewoner";
    }
    else{
        options["titletext"]="General overview of the resident";
    }
}

/*
 * Function:collects the data, managis it and prepare the right data and options for the charts
 * Input: an array with all the divisions and the specific topic;
 * Output: all the data and options needed for the chart
 * @param {type} divisions
 * @param {type} topic
 * @returns {undefined}
 */
function manageTopicData(divisions,topic){
    //initialise the arrays
    datascore=[];
    data=[];
    time=[];
    //loop over every division
    for(var div in divisions){
        //collect the data for every division
        input=collectDatatopic(topic,divisions[div]['divisions']);
        datascore[div]=[];
        //go over every value in the collectet data and put it in the right place
        //also makes the time data
        for(var value in input){
            datascore[div][value]=input[value][0];
            if(time.indexOf(input[value][1])===-1){
                time.push(input[value][1]);
            }
        }
        //stores the right dataset with the right key
        data[divisions[div]["divisions"]]=datascore[div];
        options["label"][div]=divisions[div]["divisions"]
    }
    //set some options for the graph
    options["timeaverage"]=getTimeAverage(data);
    options["topicaverage"]=getTopicAverage(data);
    options["color"]=getColor(data,options);
    options["visible"]=setVisibility(data,options);
    options["type"]=getType("bar");
    if(language==="Dutch"){
        options["titletext"]="Overzicht categorie";
    }
    else{
        options["titletext"]="General overview of the topic";
    }
}

/*
 * Function:collects the data, managis it and prepare the right data and options for the charts
 * Input: an array with all the divisions and the specific topic and a specific question ID;
 * Output: all the data and options needed for the chart
 * @param {type} divisions
 * @param {type} ques
 * @returns {undefined}
 */
function manageQesData(divisions,question){
    datascore=[];
    data=[];
    time=[];
    for(var div in divisions){
        input=collectDataqes(question,divisions[div]);
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
}

/*Function:calculates the average of each time set
* input: the data set
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
   return visible;
}

/*Function: set the color of the bars for each topic based on the average topic score
* 
* @param {type} data
* @returns {Array|color}
*/
function getColor(data){
    console.log(options["topicaverage"]),
    //initialises values
    color=[];
    console.log(color);
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
    console.log(color);
    return color;
}

/*
 * Function:convert the data collected in the required data for the graph
 * Output: the data collected from the server
 * Input: a converted data
 * @param {type} data
 * @returns {Array|convertdata}
 */
function convertData(data){
    //console.log(data);
    //first the y-axes labels are determined by the selected language
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
    //initiliasing the timestamps and the reference values
    var timenow=new Date();
    var week=1000*60*60*24*7;
    var month=1000*60*60*24*30;
    var years=1000*60*60*24*356;
    //looks at every value in the data
    for(var values in data){
        //gets the timestamp and the score out of the data
        var datestamp=Date.parse(data[values]["DateStamp"]);
        var score=parseInt(data[values]["avg_Score"]);
        //calculate the time difference
        var difference=timenow.getTime()-datestamp;
        //based on the timedifference the data is placed in its place in the converted array
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

/*
 * Function: makes the dataset for the charts based on the recieved data and options
 * @param {type} data
 * @param {type} options
 * @returns {Array|makedatasets.datasets}
 */
function makedatasets(data,options){
    var datasets=[];
    var value=0;
    //loops over every dataset
    for(var dataset in data){
        //set the right datasetvalues and options with the options of the chart
        var dataset={type: options["type"][value],
        label: options["label"][value],
        borderColor: options["color"][dataset],
        backgroundColor: options["color"][dataset],
        pointHighlightFill: "#fff",
        hoverBackgroundColor: options["color"][dataset],
        hidden:options["visible"][dataset],
        fill: false,
        data: data[dataset]};
        datasets.push(dataset);
        value++;
    }
    //set an average dataset if selected in the options
    if(options["timeaverage"]!==0){
        if(language==="Dutch"){
            var titleavg="Gem"
        }
        else{
            var titleavg="Avg"
        }
        var dataset={
            type: "line",
            label: titleavg,
            borderColor: 'Black',
            backgroundColor: 'BSlack',
            pointHighlightFill: "#fff",
            fill: false,
            data: options["timeaverage"]
            };
        datasets.push(dataset);
    }
    return datasets;
}

/*
 * Function: call the function to collect the data and build the graph from the data
 * @returns {undefined}
 */
function drawIntroChart(){
    getIntroData();
    var xarray = time;
    var ctx = document.getElementById("WeeklyTopicScore").getContext("2d");
    var barChartData = {
        labels: xarray,
        datasets: makedatasets(data,options)
    };
    var myBar = new Chart(ctx, {
        data: barChartData,
        type: 'bar',
        options: {
            // adjust the size of chart 
            maintainAspectRatio:false,
            legend: {
                position: 'top',
                fontfamily: "myriad-pro-condensed, sans-serif",
                fontstyle:"normal"
            },
            title: {
                display: true,
                text: options["titletext"],
                fontfamily: "myriad-pro-condensed, sans-serif",
                fontstyle:"normal"
            },
            scales:{
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMax:5,
                        fontfamily: "myriad-pro-condensed, sans-serif",
                        fontstyle:"normal"
                    }
                }],
                xAxes:[{ticks:{
                            mirror: true,
                            fontfamily: "myriad-pro-condensed, sans-serif",
                            fontstyle:"normal"}}]
            }
        }
    });   
}
function drawChart(elder,test){
    getData(elder,test);
    console.log(makedatasets(data,options));
    var xarray = time;
    var ctx = document.getElementById("WeeklyTopicScore").getContext("2d");
    var barChartData = {
        labels: xarray,
        datasets: makedatasets(data,options)
    };
    var myBar = new Chart(ctx, {
        data: barChartData,
        type: 'bar',
        options: {
            // adjust the size of chart 
            maintainAspectRatio:false,
            legend: {
                position: 'right'
            },
            title: {
                display: true,
                text: options["titletext"]
            },
            scales:{
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        suggestedMax:5,
                        fontfamily: "myriad-pro-condensed, sans-serif",
                        fontstyle:"normal"
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
                text: 'Average score of one topic',
                fontfamily: "myriad-pro-condensed, sans-serif",
                fontstyle:"normal"
            },
            scales:{
                yAxes: [{
                    ticks: {
                         beginAtZero: true,
                        suggestedMax:5,
                        fontfamily: "myriad-pro-condensed, sans-serif",
                        fontstyle:"normal"
                    }
                }]
            }
        }
    });   
}

function drawCharttopic(topic){
    getDatatopic(topic);
    var xarray = time;
    var ctx = document.getElementById("WeeklyTopicScore").getContext("2d");
    var barChartData = {
        labels: xarray,
        datasets: makedatasets(data,options)
    };
    var myBar = new Chart(ctx, {
        data: barChartData,
        type: 'bar',
        options: {
            // adjust the size of chart 
            maintainAspectRatio:false,

            legend: {
                position: 'top'
            },
            title: {
                display: true,
                text: options["titletext"]
            },
            scales:{
                yAxes: [{
                    ticks: {
                         beginAtZero: true,
                        suggestedMax:5,
                        fontfamily: "myriad-pro-condensed, sans-serif",
                        fontstyle:"normal"
                    }
                }]
            }
        }
    });   
}

