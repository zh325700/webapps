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