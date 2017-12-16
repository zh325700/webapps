<row id="question_template">
    {theelder}
    <div class="panel-body elder_tab" id="{Elder_ID}" >
        <p><div class="col-sm-3">{RoomNumber}</div><div class="col-sm-3"> {FirstName} {LastName}</div>
        <div class="col-sm-3"> <img src="<?php echo base_url();?>{avg_Score}" style="width:50px;height:50px;"></imgur></div>
        <button class="btn tab" onclick="getChartElder({Elder_ID})"> Details </button></p>
    </div>
    {/theelder}
</row>

