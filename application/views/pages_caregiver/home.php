<header>
	<h1>
	Overview
	</h1>
</header>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2" id="left">     
			<button class="btn btn-default btn-lg btn-block">
				General
			</button> 
			</br>
			<div class="dropdown" id="dropdown_floors">
					<button data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-lg btn-block" id="drowpdown_flors_button">
						Floor
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" id="dropdown_floors_menu">
						<li class="li" id="li_1">
							Gelijkvloers
						</li>
						<li class="li" id="li_2">
							Eerste verdiep
						</li>
						<li class="li" id="li_3">
							Tweede verdiep
						</li>
						<li class="li" id="li_4">
							Derde verdiep
						</li>
					</ul>
			</div>
			</br>
			<div>
				<button class="btn btn-default btn-lg btn-block" id="button_restime">Fill-in history</button> 
			</div>
			</br>
			<div>
				<button class="btn btn-default btn-lg btn-block" id="button_resqes" onclick="loadPage('CaregiverOperateResident', 'find')">Find Resident</button> 
			</div>
			</br>
			<div>
				<button class="btn btn-default btn-lg btn-block" id="button_addelderly" onclick="loadPage('CaregiverOperateResident', 'create')">Add Resident</button> 
			</div>
			</br>
			<div>
				<button class="btn btn-default btn-lg btn-block" id="button_elderly"  onclick="loadPage('Resident/menu')" >Login Resident</button> 
			</div>
			</br>
		</div>
		<div class="col-sm-8" id="right_center">
					<h3 id="title_type_overview">
						General overview
					</h3>
					<div class="panel-group" id="panel_1">
						<div class="panel panel-default">
							<div class="panel-heading">
								 <a class="panel-title" data-toggle="collapse" 
									data-parent="#panel_1" href="#panel_element_1" id="panel_heading_1"> 
									 Residents results overview </a>
							</div>
							<div id="panel_element_1" class="panel-collapse collapse in">
								<div class="panel-body" id="pb_1">
								   <a href=#> Marie </a>
								</div>
								<div class="panel-body" id="pb_2">
								   <a href=#> Jef </a>
								</div>
								<div class="panel-body" id="pb_3">
								   <a href=#> Hans </a>
								</div>
								<div class="panel-body" id="pb_4">
								   <a href=#> Lieven </a>
								</div>
								<div class="panel-body" id="pb_5">
								   <a href=#> Maria </a>
								</div>
								<div class="panel-body" id="pb_6">
								   <a href=#> Jozef </a>
								</div>
								<div class="panel-body" id="pb_7">
								   <a href=#> Rik </a>
								</div>
								<div class="panel-body" id="pb_8">
								   <a href=#> Marie </a>
								</div>
								<div class="panel-body" id="pb_9">
								   <a href=#> Jean </a>
								</div>
								<div class="panel-body" id="pb_10">
								   <a href=#> Marie </a>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								 <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel_1" 
									href="#panel_element_2" id="panel_heading_2"> 
									Question results overview </a>
							</div>
							<div id="panel_element_2" class="panel-collapse collapse">
								<div class="panel-body" id="pb_2_1">
									vraag 1
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
