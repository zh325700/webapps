<row id="question_template">
    {theelder}
    <div class="panel-body elder_tab" id="{Elder_ID}" onclick="getChartElder({Elder_ID})">
        <p><div class="col-sm-3">{RoomNumber}</div><div class="col-sm-3"> {FirstName} {LastName}</div>
        <div class="col-sm-6"> <img src="<?php echo base_url();?>{avg_Score}" style="width:15%;height:15%;"></imgur></div></p>
    </div>
    {/theelder}
</row>

