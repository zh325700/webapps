<?php //if (htmlentities($this->session->userdata('permission')) >= '2'): ?>


    <div class="container-fluid">
    <div class="row justify-content-md-center">
         <div class="col col-md-2"></div>
         <div class="col-md-6">
            <h2 class=" text-center">
                <?= $title ?>
            </h2>
        </div>
    </div> 
      <?php echo(json_encode('{ccity}'));?>
        <?php echo(json_encode('{city}'));?>
    <div class="row"> 
        {facility}   
        <form method="post"> 
             <?php echo(json_encode('{ccity}'));?>
          <div class="col-md-4">
			<h3 class="text-center"><b>{Name}</b></h3>
			<label class="facility">{ccity}:&emsp;&emsp;&emsp;&emsp;&ensp;{City}  </label><br>
			<label class="facility">{ppostcode}:&emsp;&ensp;{Postcode}</label><br> 
			<label class="facility">{sstreet}:&emsp;&emsp;&emsp;&ensp;{Street} </label><br>
			<label class="facility">{nnumber}:&emsp;&emsp;&ensp;{Number} </label><br>
            <?php// if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
            <a class="btn btn-outline-primary pull-left" href="edit/{ID_facility}"><label class="facility">Edit</label></a>
            <p><a class="btn btn-link match" href="<?php echo site_url('index.php/addfacility_control/delete/{ID_facility}'); ?>"><b> Read More</b></a></p>
            <?php// endif; ?>
            </div>
        {/facility}
    </div>
    </div>

<!--
<?php// else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php //endif; ?>
