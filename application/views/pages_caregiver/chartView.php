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
    <div class=" col-md-2">
    <button class="btn tab" onclick="getScores()" style="margin-top:10px; margin-left: 10px"> Back </button>
    </div>
    <div class=" col-md-10">
    <p style="font-size:25px; color:#404C86"> Bewoners statistiek van <?php echo $info['info'][0]->FirstName; ?> <?php echo $info['info'][0]->LastName; ?> </p>
    </div>
</div>
<div class="row">
    <div class=" col-sm-2" data-step="1" data-intro="Here is the image of the resident">
        <img class="thumbnail" height="50" width="50"  src="<?php echo base_url(); ?>/image/photos/<?php echo $info['info'][0]->Picture; ?>">
    </div>
    <div class="col-sm-10">
        <div class="row">
            <div class=" col-sm-3" data-step="2" >
                <div class="row"><p style="padding-top: 10px; font-size: 14px;"  >{Name}:&emsp;&ensp;</p></div>
            </div>
            <div class=" col-sm-3" data-step="2">
                <div class="row"><p style="padding-top: 10px; font-size: 14px;"  ><?php echo $info['info'][0]->FirstName; ?> <?php echo $info['info'][0]->LastName; ?></p></div>
            </div>
            <div class=" col-sm-3" data-step="2" data-position='left'>
                <div class="row"><p style="padding-top: 10px; font-size: 14px;" >{RoomNumber}: </p></div>
            </div>
            <div class=" col-sm-3" data-step="2" data-position='right'>
                <div class="row"><p style="padding-top: 10px; font-size: 14px;" > <?php echo $info["info"][0]->RoomNumber; ?></p></div>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-3" data-step="2" >
                <div class="row"><p style="padding-top: 10px; font-size: 14px;"  >{Average_Score}:&emsp;&ensp;</p></div>            
            </div>
            <div class=" col-sm-3" data-step="2">
                <div class="row"><p style="padding-top: 10px; font-size: 14px;"  ><?php echo $question['question'][0]->avgScore; ?> </p></div>
            </div>
            <div class=" col-sm-3" data-step="2" data-position='left'>
                <div class="row"><p style="padding-top: 10px; font-size: 14px;" >{Number_filled} : </p></div>
            </div>
            <div class=" col-sm-3" data-step="2" data-position='right'>
                <div class="row"><p style="padding-top: 10px; font-size: 14px;" > <?php echo $question["question"][0]->numberFilled; ?></p></div>
            </div>
        </div>
        <div class="row">
            <div class=" col-sm-3" data-step="2">
                <div class="row"><p style="padding-top: 10px; font-size: 14px;"  >{Worst_Topic}:&emsp;&ensp;</p></div> 
            </div>
            <div class=" col-sm-3" data-step="2">
                 <div class="row"><p style="padding-top: 10px; font-size: 14px;"  ><?php echo $worsttopic['worsttopic'][0]->WorstTopic; ?> <?php echo $worsttopic['worsttopic'][0]->WorstScore; ?> </p></div>
            </div>
            <div class=" col-sm-3" data-step="2" data-position='left'>
                <div class="row"><p style="padding-top: 10px; font-size: 14px;" >{Best_Topic}: </p></div>
            </div>
            <div class=" col-sm-3" data-step="2" data-position='right'>
                <div class="row"><p style="padding-top: 10px; font-size: 14px;" > <?php echo $besttopic["besttopic"][0]->typeBest; ?> <?php echo $besttopic["besttopic"][0]->avg_ScoreBest; ?></p></div>
            </div>
        </div> 
    </div>
</div>
<div class="row">
    <ul class="list-group" id="alertElderList">
        <li class="list-group-item">{Alert_box} <span></span></li>
    </ul>
</div>
</div>
<div  class="chart-container">  <!-- vh stands for the height of the browser-->
    <canvas id="WeeklyTopicScore"></canvas>
</div>