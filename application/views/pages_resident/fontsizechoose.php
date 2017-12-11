
   <div class="container-fluid">
       
        <div class="row">
		<div class="col-md-1 col-sm-1">
                    <img src="../../image/pictograms/myPicture.png" alt="picture" style=" width: 120px; height: 150px" class="align-left"/>
		</div>
		<div class="col-md-10 col-sm-10">
                        <h2 class="text-center" >
				{Can_message}?
			</h2>
		</div>
		<div class="col-md-1 col-sm-1">
                    <img src="../../image/pictograms/information.png" alt="info" style=" width: 150px; height: 150px" class="align-right"/>
                    <br>
                    <br>
                    <br>
                </div>
        </div> 
       
       <script type = "text/javascript">
            
            function doZoomIn()
            {
                var el = document.getElementById('zoom');
                var style = window.getComputedStyle(el, null).getPropertyValue('font-size');
                var fontSize = parseFloat(style);
                if (fontSize > 80) 
                {
                    alert("{maximum_font}");
                    return;
                }  
                // now you have a proper float for the font size (yes, it can be a float, not just an integer)
                el.style.fontSize = (fontSize + 10) + 'px';
            }
            function doZoomOut()
            {
               var el = document.getElementById('zoom');
               var style = window.getComputedStyle(el, null).getPropertyValue('font-size');
               var fontSize = parseFloat(style); 
               el.style.fontSize = (fontSize - 10) + 'px';
            }
            function get_fontsize()
            {
               var el = document.getElementById('zoom');
               var style = window.getComputedStyle(el, null).getPropertyValue('font-size');
               var fontSize = parseFloat(style); 
               return fontSize;
            }
            
            function jumpto_update()
            {     
                $fontSize = get_fontsize();
                //redirect ('/index.php/Fontsize_resident/update_fontsize_resident/'+$fontSize+'/1');   not working here
                location.href='<?php echo base_url(); ?>index.php/Fontsize_resident/update_fontsize_resident/'+$fontSize+'/1';
                
            }         
       </script>
       <div class="row">
		<div class="col-md-2">
                    <button id = "minusButton" type="button" class="btn btn-lg style active font" onclick= "doZoomOut()" >
			-
                    </button>                   
		</div>
                <div class="col-md-8">
                    <h1  id = "zoom" class = "text-center changing" >
			{Text_Message}
                    </h1>                   
		</div>          
                <div class="col-md-2">
                    <button id = "increaseButton" type="button" class="btn btn-lg style active font" onclick= "doZoomIn()">
			+
                    </button>
                <br>
                <br>
                <br>
                <br>
                <br>
                
		</div>
                
	</div>
       
       <div class="row">
		<div class="col-md-12">
                    <button id = "confirmButton" type="button1" class="btn btn-lg style active font" onclick="jumpto_update()" >
			{Confirm}
                    </button>       
		</div> 
        </div>
    </div>    
    </body>
</html>


