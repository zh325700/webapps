
<div class="panel-group" id="panel_1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
             <a  data-toggle="collapse" data-parent="#panel_1" 
                 href="#panel_element_1" id="panel_heading_1" style="font-size:25px"> 
                {Division}<?php echo($text["division"]); echo($text["title_tab1"]);?></a>
            </div>
        </div>
        <div id="panel_element_1" class="panel-collapse collapse in">
            <div class="panel-body">   
                <row id="question_template" style="font-size:15px">
                   <div class="col-sm-3"><?php echo($text["RoomNumber"]);?></div>
                   <div class="col-sm-3"><?php echo($text["Name"]);?></div>
                   <div class="col-sm-6"> <?php echo($text["Score"]);?></div>
                </row>   
               {content_res}
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
             <a data-toggle="collapse" data-parent="#panel_1" 
                href="#panel_element_2" id="panel_heading_2" style="font-size:25px"> 
                 <?php echo($text["division"]); echo($text["title_tab2"]);?></a>
            </div>
        </div>
        <div id="panel_element_2" class="panel-collapse collapse">
            <div class="panel-body">
                <row id="question_template" style="font-size:20px">
                    <p><div class="col-sm-6"><?php echo($text["Question"]);?></div><div class="col-sm-3"><?php echo($text["Score"]);?></div></p>
                </row>
                {content_qes}
            </div>
        </div>
    </div>
</div>
 
                        