<div class="panel-group" id="panel_1">
   <div class="panel panel-default">
       <div class="panel-heading">
            <a class="panel-title" data-toggle="collapse" 
               data-parent="#panel_1" href="#panel_element_1" id="panel_heading_1" style="font-size:25px"> 
               {Division} <?php echo($text["title_tab1"]);?> </a>
       </div>
       
       <div id="panel_element_1" class="panel-collapse collapse in">
           <row id="question_template" style="font-size:20px">
           <p><div class="col-sm-4"><?php echo($text["RoomNumber"]);?></div><div class="col-sm-2"><span class="text-nowrap"><?php echo($text["Name"]);?></span></div>
               <div class="col-sm-6"> <?php echo($text["Score"]);?></div></p>
       </row>
           {content_res}
         </div>
    </div>
</div>
                  


