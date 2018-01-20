<row id="question_template">
    {scores}
     <div class="panel-body question" id="{Topictest}">
        <p>
            <div class="col-sm-6">{Topic}</div>
            <div class="col-sm-3"><img style="width:50px;height:50px;" src='<?php echo base_url();?>{avg_Score}' alt="check"></div>
            <div class="col-sm-3"><button class="btn tab" onclick="getChartTopic('{Topic}')"> Details </button></div>
        </p>
    </div>
    {/scores}
</row>


