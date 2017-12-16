 <div class="panel-group" id="panel_1">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <a class="panel-title" data-toggle="collapse" 
                                            data-parent="#panel_1" href="#panel_element_1" id="panel_heading_1" style="font-size:25px"> 
                                            {division}{title_tab1} </a>
                                    </div>
                                    <row id="question_template" style="font-size:20px">
                                            <p><div class="col-sm-3">{RoomNumber}</div><div class="col-sm-3"> {FirstName} {LastName}</div>
                                            <div class="col-sm-6"> {Score}</div></p>
                                    </row>
                                    <div id="panel_element_1" class="panel-collapse collapse in">
                                     
                                        {content_res}
                                   
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel_1" 
                                            href="#panel_element_2" id="panel_heading_2" style="font-size:25px"> 
                                            {division}{title_tab2} </a>
                                    </div>
                                    <div id="panel_element_2" class="panel-collapse collapse">
                                        <row id="question_template" style="font-size:20px">
                                            <p><div class="col-sm-6">{Question}</div><div class="col-sm-3">{Score}</div></p>
                                    </row>
                                        {content_qes}
                                        
                                    </div>
                            </div>
                        </div>
                    </div>
