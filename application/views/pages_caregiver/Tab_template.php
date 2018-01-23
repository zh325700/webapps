
<div class="panel-group" id="panel_1">
    <div class="panel panel-default">
        <div class="panel-heading">
             <a class="panel-title" data-toggle="collapse" 
                data-parent="#panel_1" href="#panel_element_1" id="panel_heading_1" style="font-size:25px"> 
                {Division}<?php echo($text["division"]); echo($text["title_tab1"]);?></a>
        </div>
        <div id="panel_element_1" class="panel-collapse collapse in">
             <row id="question_template" style="font-size:18px">
                <p><div class="col-sm-3"><?php echo($text["RoomNumber"]);?></div><div class="col-sm-3"><span class="text-nowrap"><?php echo($text["Name"]);?></span></div>
                <div class="col-sm-6"> <?php echo($text["Score"]);?></div></p>
             </row>   
            {content_res}

        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
             <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel_1" 
                href="#panel_element_2" id="panel_heading_2" style="font-size:25px"> 
                 <?php echo($text["division"]); echo($text["title_tab2"]);?></a>
        </div>
        <div id="panel_element_2" class="panel-collapse collapse">
            <row id="question_template" style="font-size:20px">
                <p><div class="col-sm-6"><?php echo($text["Question"]);?></div><div class="col-sm-3"><?php echo($text["Score"]);?></div></p>
        </row>
            {content_qes}

        </div>
    </div>
</div>
    </div>
                        