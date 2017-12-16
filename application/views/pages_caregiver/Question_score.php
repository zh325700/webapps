<row id="question_template">
    {thescores}
     <div class="panel-body question" id="{Question_ID}" onclick="getChartQuestion({Question_ID})">
        <p><div class="col-sm-6">{Question}</div><div class="col-sm-6"> <img style="width:15%;height:15%;" src='<?php echo base_url();?>{avg_Score}' alt="check"></div></p>
    </div>
    {/thescores}
</row>


