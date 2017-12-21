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
<div class="row" style="text-align:center">
    <div class=" col-md-2">
    <button class="btn tab" onclick="getScores()" style="margin-top:10px; margin-left: 10px"> Back </button>
    </div>
    <div class=" col-md-10">
    <p style="font-size:25px; color:#404C86"> Bewoners statistiek van <?php echo $info['info'][0]->FirstName; ?> <?php echo $info['info'][0]->LastName; ?> </p>
    </div>
</div>
<div class="row">
        <div class=" col-sm-2" data-step="1" data-intro="Here is the image of the resident">
            <img class="thumbnail" height="100" width="100"  src="<?php echo base_url(); ?>/image/photos/<?php echo $info['info'][0]->Picture; ?>">
        </div>
        <div class=" col-sm-3" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
                <p style="padding-top: 10px; font-size: 20px;"  >{LastName}:&emsp;&ensp;</p>
                <p style="padding-top: 10px; font-size: 20px;" >{FirstName}:&emsp;&ensp;</p>
                <p style="padding-top: 10px; font-size: 20px;"  >{Gender}:&emsp;&emsp;&ensp;&ensp;</p>
                <p style="padding-top: 10px; font-size: 20px;" >{Birthday}:&emsp;&emsp;&ensp;</p>
        </div>
        <div class=" col-sm-2" data-step="2" data-intro="Here you can find Information of residents" >
                <p style="padding-top: 10px; font-size: 20px;"  ><?php echo $info['info'][0]->FirstName; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" ><?php echo $info['info'][0]->LastName; ?></p>
                <p style="padding-top: 10px; font-size: 20px;"  > <?php echo $info['info'][0]->Gender; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" ><?php echo $info["info"][0]->BirthDay; ?></p>
        </div>
        <div class=" col-sm-3">
                <p style="padding-top: 10px; font-size: 20px;" >{RoomNumber}: </p>
                <p style="padding-top: 10px; font-size: 20px;" >{Facility}: </p>
                <p style="padding-top: 10px; font-size: 20px;" >{Member_Since}:</p>
        </div>
        <div class=" col-sm-2">
                <p style="padding-top: 10px; font-size: 20px;" > <?php echo $info["info"][0]->RoomNumber; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" > <?php echo $info["info"][0]->Division; ?></p>
                <p style="padding-top: 10px; font-size: 20px;" > <?php echo $info["info"][0]->Member_Since; ?></p>
        </div>
    </div>
</div>
<div style="width:120vh; height: 70vh;">  <!-- vh stands for the height of the browser-->
    <canvas id="WeeklyTopicScore"></canvas>
</div>