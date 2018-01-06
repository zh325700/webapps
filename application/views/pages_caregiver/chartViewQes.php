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
    <p style="font-size:25px; color:#404C86"> Statestiek van vraag</p>
    </div>
</div>
<div class="row">
    <div class=" col-md-6" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
        <p style="padding-top: 10px; font-size: 20px;"  >{Topic}:&ensp;&emsp;</p>
        <p style="padding-top: 10px; font-size: 20px;" > {Number_filled}:&emsp;&emsp;&ensp;&ensp;</p>
        <p style="padding-top: 10px; font-size: 20px;" >{Average_Score}:&emsp;&emsp;&ensp;</p>
    </div>
    <div class=" col-md-6">
        <p style="padding-top: 10px; font-size: 20px;"  ><?php echo $info[0]->Topic; ?> </p>
        <p style="padding-top: 10px; font-size: 20px;"  > <?php echo $info[0]->NumberAnswers; ?></p>
        <p style="padding-top: 10px; font-size: 20px;"  > <?php echo $info[0]->avg_score; ?></p>
    </div>
</div>
<div class="row" data-step="2" data-intro="Here you can find Information of residents" data-position='right'>
    <div class=" col-md-6"  id="questionlist" >
        <p style="padding-top: 10px; font-size: 20px;"  >{Questions}:&ensp;&emsp;</p>
    </div>
    <div class=" col-md-3"  id="scorelist" >
        <p style="padding-top: 10px; font-size: 20px;"  >{Score}:&ensp;&emsp;</p>
    </div>
    <div class=" col-md-3">
        
    </div>
</div>
<div style="width:120vh; height: 70vh;">  <!-- vh stands for the height of the browser-->
    <canvas id="WeeklyTopicScore"></canvas>
</div>

