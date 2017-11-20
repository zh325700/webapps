<h2><?php echo $residents['LastName']; ?></h2>
<small class="post-date">Birthday : <?php echo $residents['Birthday']; ?></small><br>
<img class="post-thumb" src="../../images/icons/<?php echo $residents['Picture']; ?>">
<div class="post-body">
<?php echo $residents['FirstName']; ?>    
</div>

<hr>   
<a class="btn btn-outline-primary pull-left" href="edit/<?php echo $residents['ID_Elder'];?>">
 Edit</a>
<?php echo form_open('index.php/Residents_control/delete/' .$residents['ID_Elder']);/*if we click it it goes to /post/delete/3*/?>    
<input type="submit" value="delete" class="btn btn-danger">
 </form>
