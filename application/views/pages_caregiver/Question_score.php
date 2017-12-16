<row id="question_template">
    {thescores}
     <div class="panel-body question" id="{Question_ID}">
        <p><div class="col-sm-6">{Question}</div>
        <div class="col-sm-3"><img style="width:50px;height:50px;" src='<?php echo base_url();?>{avg_Score}' alt="check"></div>
            <div class="col-sm-3"><button class="btn tab" onclick="getChartQuestion({Question_ID})"> Details </button></div></p>
    </div>
    {/thescores}
</row>


