<div class="row" id="question_template">
    {elder}
    <div class="panel-body elder_tab" id="{Elder_ID}" >
        <div class="col-sm-3">{RoomNumber}</div>
        <div class="col-sm-3"> {FirstName} {LastName}</div>
        <div class="col-sm-3"> <img src="<?php echo base_url();?>{avg_Score}" style="width:50px;height:50px;" alt="Score"></div>
        <div class="col-sm-3"><button class="btn tab" onclick="getChartElder({Elder_ID})"> Details </button></div>
    </div>
    {/elder}
</div>

