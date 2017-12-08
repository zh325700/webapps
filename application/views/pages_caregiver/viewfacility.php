
    <div class="container-fluid">
    <div class="row justify-content-md-center">
         <div class="col col-md-2"></div>
         <div class="col-md-6">
            <h2 class=" text-center">
                <?= $title ?>
            </h2>
        </div>
    </div> 
    
    <div class="row"> 
        {facility}
        <form method="post">         
          <div class="col-md-4">  
              <h3 class="text-center"><b>{Name}</b></h3>
            <label class="facility">City:&emsp;&emsp;&ensp;&ensp;{City}  </label><br>
            <label class="facility">Post Code:&ensp;{Postcode}</label><br> 
            <label class="facility">Street:&emsp;&emsp;{Street} </label><br>
            <label class="facility">Number:&emsp;&emsp;{Number} </label><br>
            <a class="btn btn-outline-primary pull-left" href="edit/{ID_facility}"><label class="facility">Edit</label></a>
            <p><a class="btn btn-link match" href="<?php echo site_url('index.php/addfacility_control/delete/{ID_facility}'); ?>"><b> Read More</b>
              </a></p>
            </div>
        {/facility}
    </div>
    </div>
    
     

    
   
