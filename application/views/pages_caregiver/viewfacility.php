<?php if (htmlentities($this->session->userdata('permission')) >= '2'): ?>


    <div class="container-fluid">
    <div class="row justify-content-md-center">
         <div class="col col-md-2"></div>
         <div class="col-md-6">
            <h2 class=" text-center">
                <?= $title ?>
            </h2>
        </div>
    </div> 
      <?php echo(json_encode($text));?>
        <?php echo(json_encode($facility));?>
    <div class="row"> 
           
        <form method="post"> 
             <?php //echo(json_encode('{ccity}'));?>
             <?php echo(json_encode('facility'));?>
          <div class="col-md-4">
			<h3 class="text-center"><b>{Name}</b></h3>
			<label class="facility">{City}:&emsp;&emsp;&emsp;&emsp;&ensp;{facility}{City}{/facility}  </label><br>
			<label class="facility">{Postcode}:&emsp;&ensp;{facility}{Postcode}{/facility}</label><br> 
			<label class="facility">{Street}:&emsp;&emsp;&emsp;&ensp;{facility}{Street}{/facility} </label><br>
			<label class="facility">{Number}:&emsp;&emsp;&ensp;{facility}{Number}{/facility} </label><br>
            <?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
            <a class="btn btn-outline-primary pull-left" href="edit/{ID_facility}"><label class="facility">Edit</label></a>
            <p><a class="btn btn-link match" href="<?php echo site_url('index.php/addfacility_control/delete/{ID_facility}'); ?>"><b> Read_More</b></a></p>
            <?php endif; ?>
            </div>
    </div>
    </div>

<?php else: ?>
<p>
<br><br><br>
<center>
<span class="error">You are not logged in or you are not authorized to access this page.</span> Please <a href="<?php echo base_url(); ?>">login</a> with the proper account.
</center>
<br><br><br>
</p>
<?php endif; ?>
