<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> 
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
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
        <div class=" col-sm-2" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
                <p style="padding-top: 10px; font-size: 20px;"  >{Name}:&emsp;&ensp;</p>
        </div>
        <div class=" col-sm-3" data-step="2" data-intro="Here you can find Information of residents" >
                <p style="padding-top: 10px; font-size: 20px;"  ><?php echo $info['info'][0]->FirstName; ?> <?php echo $info['info'][0]->LastName; ?></p>
        </div>
        <div class=" col-sm-2">
                <p style="padding-top: 10px; font-size: 20px;" >{RoomNumber}: </p>
        </div>
        <div class=" col-sm-3">
                <p style="padding-top: 10px; font-size: 20px;" > <?php echo $info["info"][0]->RoomNumber; ?></p>
        </div>
    </div>
</div>
<div style="width:120vh; height: 70vh;">  <!-- vh stands for the height of the browser-->
    <canvas id="WeeklyTopicScore"></canvas>
</div>