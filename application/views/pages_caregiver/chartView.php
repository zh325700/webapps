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
$array = array(
    "Food" => array(
        "Timestamp" => array(
            1, 2, 3, 4, 5, 6, 7
        ),
        "Score" => array(
            1.0, 3.0, 5.0, 4, 2, 9, 12
        )
    ),
    "Drink" => array(
        "Timestamp" => array(
            1, 2, 3, 4, 5, 6, 7
        ),
        "Score" => array(
            7, 6, 5, 4, 3, 2, 1
        )
    )
);
$arrayfoodTime = $array["Food"]["Timestamp"];
$arrayfoodData = $array["Food"]["Score"];
?>
<div id="tt" class="<?php echo json_encode($arrayfoodTime); ?>"></div>
<div class="row">
        <div class=" col-md-4" data-step="1" data-intro="Here is the image of the resident">
            <img class="thumbnail" height="100" width="100"  src="<?php echo base_url(); ?>/image/photos/<?php echo $info['info'][0]->Picture; ?>">
        </div>
        <div class=" col-md-4" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
                <p style="padding-top: 10px; font-size: 20px;"  >Last Name:&emsp;&ensp; <?php echo $info['info'][0]->FirstName; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" >First Name:&emsp;&ensp; <?php echo $info['info'][0]->LastName; ?></p>
                <p style="padding-top: 10px; font-size: 20px;"  >Gender:&emsp;&emsp;&ensp;&ensp; <?php echo $info['info'][0]->Gender; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" >Birthday:&emsp;&emsp;&ensp; <?php echo $info["info"][0]->BirthDay; ?></p>
        </div>
        <div class=" col-md-4">
                <p style="padding-top: 10px; font-size: 20px;" >Room Number:&ensp;&ensp; <?php echo $info["info"][0]->RoomNumber; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" >Facility:&emsp;&emsp;&emsp;&ensp;&ensp; <?php echo $info["info"][0]->Division; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" >Member Since:&emsp; <?php echo $info["info"][0]->Member_Since; ?></p>
        </div>
    </div>
    <div style="width:120vh; height: 50vh;">  <!-- vh stands for the height of the browser-->
        <canvas id="canvas"></canvas>
    </div>
</div>

<script>// how to convert php array to js var?
    var xarray = <?php echo json_encode($arrayfoodTime) ?>;
    var arrayfoodData = <?php echo json_encode($arrayfoodData) ?>;
    var ctx = document.getElementById("canvas").getContext("2d");
    var barChartData = {
        labels: xarray,
        datasets: [{
                label: "Food",
                borderColor: "rgb(255, 99, 132)",
                backgroundColor: "rgb(255, 99, 132)",
                fill: false,
                data: arrayfoodData,
                yAxisID: "y-axis-food",
            }, {
                label: "Drink",
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgb(54, 162, 235)',
                fill: false,
                data: [
                    122, 119, 32, 52, 21, 31, 9
                ],
                yAxisID: "y-axis-drink"
            }]
    };
    var myBar = new Chart(ctx, {
        data: barChartData,
        type: 'bar',
        options: {
            maintainAspectRatio: false, // adjust the size of chart 
            responsive: true,
            hoverMode: 'index',
            stacked: false,
            title: {
                display: true,
                text: 'Chart.js Bar Chart - Multi Axis'
            },
            scales: {
                yAxes: [{
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        borderColor: "rgba(255, 0, 0, 1)",
                        position: "left",
                        id: "y-axis-food",
                    }, {
                        type: "linear", // only linear but allow scale type registration. This allows extensions to exist solely for log scale for instance
                        display: true,
                        position: "right",
                        id: "y-axis-drink",
                        // grid line settings
                        gridLines: {
                            drawOnChartArea: false, // only want the grid lines for one axis to show up
                        },
                    }],
            }
        }
    });

</script>


