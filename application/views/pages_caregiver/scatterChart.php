<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> 
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    /*  For chart  	red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'*/
</style>
<?php
$arrayWeek = array("Last_Three_Week", "last_two_Week", "last_Week");

$arrayPrivacyScore = array();
$arrayFoodAndMealsScore = array();
$arraySafetyAndSecurityScore = array();
$arrayComfortScore = array();
$arrayAutonomyScore = array();
$arrayRespectByStaffScore = array();
$arrayStaffResponsivenessScore = array();
$arrayActivitiesScore = array();
$arrayPersonalRelationshipsScore = array();
$arrayDailyDecisionsScore = array();

$arrayAvgScore = array();

$arrayScore = array();


//array_push($arrayScore, $arrayPrivacyScore);
//array_push($arrayScore, $arrayFoodAndMealsScore);
//array_push($arrayScore, $arraySafetyAndSecurityScore);
//array_push($arrayScore, $arrayComfortScore);
//array_push($arrayScore, $arrayAutonomyScore);
//array_push($arrayScore, $arrayRespectByStaffScore);
//array_push($arrayScore, $arrayStaffResponsivenessScore);
//array_push($arrayScore, $arrayActivitiesScore);
//array_push($arrayScore, $arrayPersonalRelationshipsScore);
//array_push($arrayScore, $arrayDailyDecisionsScore);

//if in some week resident not fill in the questionaire in some topic, The AVG will be 0.

$topic = array(
    "Privacy", "FoodAndMeals", "PersonalRelationships"
);

$score = array(
    "Privacy" => array(
        array("Timestamp" => "Last_Three_Week",
            "AvgScore" => 10),
        array("Timestamp" => "last_two_Week",
            "AvgScore" => 30),
        array("Timestamp" => "last_Week",
            "AvgScore" => 20)
    ),
    "FoodAndMeals" => array(
        array("Timestamp" => "Last_Three_Week",
            "AvgScore" => 3),
        array("Timestamp" => "last_two_Week",
            "AvgScore" => 5),
        array("Timestamp" => "last_Week",
            "AvgScore" => 20)
    ),
    "PersonalRelationships" => array(
        array("Timestamp" => "Last_Three_Week",
            "AvgScore" => 0),
        array("Timestamp" => "last_two_Week",
            "AvgScore" => 0),
        array("Timestamp" => "last_Week",
            "AvgScore" => 20)
    ),
);



if (!empty($score["Privacy"])) {
    foreach ($score["Privacy"] as $privacy) {
        $arrayPrivacyScore[] = $privacy["AvgScore"];
    }
}
if (!empty($score["PersonalRelationships"])) {
    foreach ($score["PersonalRelationships"] as $relationship) {
        $arrayPersonalRelationshipsScore[] = $relationship["AvgScore"];
    }
}
if (!empty($score["FoodAndMeals"])) {
    foreach ($score["FoodAndMeals"] as $foodAndMeal) {
        $arrayFoodAndMealsScore[] = $foodAndMeal["AvgScore"];
    }
}

$arrayScore[] = $arrayPrivacyScore;
$arrayScore[] = $arrayFoodAndMealsScore;
$arrayScore[] = $arraySafetyAndSecurityScore;
$arrayScore[] = $arrayComfortScore;
$arrayScore[] = $arrayAutonomyScore;
$arrayScore[] = $arrayRespectByStaffScore;
$arrayScore[] = $arrayStaffResponsivenessScore;
$arrayScore[] = $arrayActivitiesScore;
$arrayScore[] = $arrayPersonalRelationshipsScore;
$arrayScore[] = $arrayDailyDecisionsScore;

echo json_encode($arrayScore);

for ($j = 0; $j < 3; $j ++) {
    $count =0;
    $arrayAvgScore[$j] = 0;
    for ($i = 0; $i < 10; $i ++) {
        $sum = array_sum($arrayScore[$i]);
       
       
        if($sum!=0){
          if($arrayScore[$i][$j] != 0){
            $arrayAvgScore[$j] += $arrayScore[$i][$j];
            $count++;
//            $arrayAvgScore[$i] += $arrayScore[$j][$i];  
        }          
        }

    }
    $arrayAvgScore[$j] = $arrayAvgScore[$j]/$count;
}
?>

<div style="width:120vh; height: 70vh;">  <!-- vh stands for the height of the browser-->
    <canvas id="WeeklyTopicScore"></canvas>
</div>

<script>// how to convert php array to js var?
    var xarray = <?php echo json_encode($arrayWeek) ?>;

    var arrayPrivacyData = <?php echo json_encode($arrayPrivacyScore) ?>;
    var arrayRelationData = <?php echo json_encode($arrayPersonalRelationshipsScore) ?>;
    var arrayFandMData = <?php echo json_encode($arrayFoodAndMealsScore) ?>;
    var arrayAVG = <?php echo json_encode($arrayAvgScore) ?>;

    var ctx = document.getElementById("WeeklyTopicScore").getContext("2d");
    var barChartData = {
        labels: xarray,
        datasets: [{
                label: "Privacy",
                borderColor: "rgba(255, 99, 132,0.5)",
                backgroundColor: "rgba(255, 99, 132,0.5)",
                fill: false,
                data: arrayPrivacyData,

            }, {
                label: "PersonalRelationships",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: 'rgba(54, 162, 235,0.5)',
                fill: false,
                data: arrayRelationData,
            },
            {
                label: "FoodAndMeals",
                borderColor: 'rgba(54, 162, 235,0.5)',
                backgroundColor: 'rgba(54, 162, 235,0.5)',
                fill: false,
                data: arrayFandMData,
            },
            {
                type: "line",
                label: "AVG",
                borderColor: 'rgb(153, 102, 255)',
                backgroundColor: 'rgb(153, 102, 255)',
                pointHighlightFill: "#fff",
                fill: false,
                data: arrayAVG,
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
        }
    });

</script>


