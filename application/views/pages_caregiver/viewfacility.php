<<<<<<< HEAD
<h2><?= $title ?></h2>
<?php foreach ($facility as $fac): ?>
    <h3><?php echo $fac['Name']; ?></h3>
    <div class="row">
       
          <div class="col-md-4">
            
            <small class="fontsize">City : <?php echo $fac['City'] ?> </small><br>
             <small class="fontsize">Post code : <?php echo $fac['Postcode'] ?></small><br> 
             <small class="fontsize">Street : <?php echo $fac['Street'] ?> </small><br>
             <small class="fontsize">Number : <?php echo $fac['Number'] ?> </small><br>
             <a class="btn btn-outline-primary pull-left" href="edit/<?php echo $fac['ID_facility'];?>">Edit</a>
            <p><a class="btn btn-link" href="<?php echo site_url('index.php/addfacility_control/delete' . $fac['ID_facility']); ?>"> Read More
                </a></p>
        </div>
    </div>

<?php endforeach; ?>
=======
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
    
    <div class="row"> 
        {facility}
        <form method="post">         
          <div class="col-md-4">  
			<h3 class="text-center"><b>{Name}</b></h3>
			<label class="facility">City:&emsp;&emsp;&emsp;&emsp;&ensp;{City}  </label><br>
			<label class="facility">Post Code:&emsp;&ensp;{Postcode}</label><br> 
			<label class="facility">Street:&emsp;&emsp;&emsp;&ensp;{Street} </label><br>
			<label class="facility">Number:&emsp;&emsp;&ensp;{Number} </label><br>
            <?php if (htmlentities($this->session->userdata('permission')) >= '3'): ?>
            <a class="btn btn-outline-primary pull-left" href="edit/{ID_facility}"><label class="facility">Edit</label></a>
            <p><a class="btn btn-link match" href="<?php echo site_url('index.php/addfacility_control/delete/{ID_facility}'); ?>"><b> Read More</b></a></p>
            <?php endif; ?>
            </div>
        {/facility}
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
>>>>>>> 7ad65d2a49f06c1ce4f148f1a4da62c1764d1e68
