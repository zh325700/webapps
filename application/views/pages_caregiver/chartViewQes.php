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
$arrayPrivacyWeek = array(0);
$arrayPrivacyScore = array(0);
$arrayRelationshipWeek = array(0);
$arrayRelationshipScore = array(0);


$score = array(
    "Privacy" => array(
        array("Timestamp" => 1,
            "AvgScore" => 1),
        array("Timestamp" => 2,
            "AvgScore" => 2)
    ),
    "relationship" => array(
        array("Timestamp" => 1,
            "AvgScore" => 3),
        array("Timestamp" => 2,
            "AvgScore" => 4)
    )
);
$topic = array(
    "privacy", "relationship"
);


if (!empty($score["Privacy"])) {
    foreach ($score["Privacy"] as $privacy) {
        $arrayPrivacyWeek[] = $privacy["Timestamp"];
        $arrayPrivacyScore[] = $privacy["AvgScore"];
    }
}
if (!empty($score["relationship"])) {
    foreach ($score["relationship"] as $relationship) {
        $arrayRelationshipWeek[] = $relationship["Timestamp"];
        $arrayRelationshipScore[] = $relationship["AvgScore"];
    }
}


$secondarray= array_merge($arrayPrivacyScore,$arrayRelationshipScore);
$newarray = array_merge($arrayPrivacyWeek, $arrayRelationshipWeek);
?>
<div id="st" class="<?php echo json_encode($secondarray); ?>"></div>
<div id="tt" class="<?php echo json_encode($newarray); ?>"></div>

<div class="row" style="text-align:center">
    <div class=" col-md-2">
    <button class="btn tab" onclick="getScores()" style="margin-top:10px; margin-left: 10px"> Back </button>
    </div>
    <div class=" col-md-10">
    <p style="font-size:25px; color:#404C86"> Statestiek van vraag</p>
    </div>
</div>
<div class="row">
        <div class=" col-md-3" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
            <p style="padding-top: 10px; font-size: 20px;"  >{Question}:&ensp;&emsp;</p>
            <p style="padding-top: 10px; font-size: 20px;" > {Number_filled}:&emsp;&emsp;&ensp;&ensp;</p>
            <p style="padding-top: 10px; font-size: 20px;" >{Average_Score}:&emsp;&emsp;&ensp;</p>
        </div>
        <div class=" col-md-5">
            <p style="padding-top: 10px; font-size: 20px;"  ><?php echo $info[0]->question; ?> </p>
            <p style="padding-top: 10px; font-size: 20px;"  > <?php echo $info[0]->NumberAnswers; ?></p>
            <p style="padding-top: 10px; font-size: 20px;"  > <?php echo $info[0]->avg_score; ?></p>
        </div>
        <div class=" col-md-4">
                <p style="padding-top: 10px; font-size: 20px;" >Type:&ensp;&ensp; <?php echo $info[0]->type; ?></p>
        </div>
    </div>
    <div style="width:120vh; height: 50vh;">  <!-- vh stands for the height of the browser-->
        <canvas id="canvas"></canvas>
    </div>
</div>


<div style="width:120vh; height: 70vh;">  <!-- vh stands for the height of the browser-->
    <canvas id="canvas"></canvas>
</div>

<script>// how to convert php array to js var?
    var xarray = <?php echo json_encode($newarray) ?>;
    var arrayfoodData = <?php echo json_encode($arrayPrivacyScore) ?>;
    var arrayRelationData = <?php echo json_encode($arrayRelationshipScore) ?>;
    var ctx = document.getElementById("canvas").getContext("2d");
    var barChartData = {
        labels: xarray,
        datasets: [{
                label: "paviljoen",
                borderColor: "rgb(255, 99, 132)",
                backgroundColor: "rgb(255, 99, 132)",
                fill: false,
                data: arrayfoodData,
//                data: [{x: 0, y: 10}, {x: 1, y: 6}],

            }, {
                label: "verdieping 1",
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
                text: 'Average score of one division'
            },
//            scales: {
//                xAxes: [{
//                        type: 'linear',
//                        position: 'bottom'
//                    }]
//            }

        }
    });

</script>