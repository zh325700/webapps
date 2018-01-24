<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script> 
<style>
    canvas {
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    .chart-container {
        position: relative;
        margin: auto;
        height: 60vh;
        width: 60vw;
      }
</style>
<div class="row" style="text-align:center">
    <div class=" col-sm-2">
    <button class="btn tab" onclick="getScores()" style="margin-top:10px;"> {Back} </button>
    </div>
    <div class=" col-sm-10">
    <p style="font-size:25px; color:#404C86"> {Resident_statistic} <?php echo $info['info'][0]->FirstName; ?> <?php echo $info['info'][0]->LastName; ?> </p>
    </div>
</div>
<div class="row">
    <div class=" col-sm-2" data-step="1" data-intro="Here is the image of the resident">
        <img class="thumbnail" height="50" width="50"  src="<?php echo base_url(); ?>/image/photos/<?php echo $info['info'][0]->Picture; ?>">
    </div>
    <div class="col-sm-10">
        <div class="row">
            <div class=" col-sm-6" data-step="2" >
                <p style="padding-top: 5px; font-size: 15px;"  >{Name}: <?php echo $info['info'][0]->FirstName; ?> <?php echo $info['info'][0]->LastName; ?></p>
               
            </div>
            <div class=" col-sm-6" data-step="2" data-position='left'>
                <p style="padding-top: 5px; font-size: 15px;" >{RoomNumber}: <?php echo $info["info"][0]->RoomNumber; ?> </p>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-6" data-step="2" >
                <p style="padding-top: 5px; font-size: 15px;"  >{Average_Score}: <?php echo $question['question'][0]->avgScore; ?></p>         
            </div>
            <div class=" col-sm-6" data-step="2" data-position='left'>
                <p style="padding-top: 5px; font-size: 15px;" >{Number_filled}: <?php echo $question["question"][0]->numberFilled; ?></p>
            </div>
        </div>
        <div class="row">
            <p style="padding-top: 5px; padding-left:15px; font-size: 15px;"  >{Worst_Topic} <?php echo $worsttopic['worsttopic'][0]->WorstTopic; ?></p>
        </div> 
        <div class="row">
            <p style="padding-top: 5px; padding-left:15px; font-size: 15px;" >{Best_Topic} <?php echo $besttopic["besttopic"][0]->typeBest; ?></p>
        </div>
    </div>
</div>
<div class="row">
    <ul class="list-group" id="alertElderList" style="padding-top: 5px; padding-left:25px; font-size: 20px;"> 
        <li class="list-group-item">{Alert_box} <span></span></li>
    </ul>
</div>
</div>
<div  class="chart-container">  <!-- vh stands for the height of the browser-->
    <canvas id="WeeklyTopicScore"></canvas>
</div>