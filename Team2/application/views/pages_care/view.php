<h2><?php echo $residents['lastname']; ?></h2>
<small class="post-date">Birthday : <?php echo $residents['birthday']; ?></small><br>
<img class="post-thumb" src="../../images/icons/<?php echo $residents['picture']; ?>">
<div class="post-body">
<?php echo $residents['description']; ?>    
</div>

<hr>   
<a class="btn btn-outline-primary pull-left" href="edit/<?php echo $residents['id_elder'];?>">
 Edit</a>
<?php echo form_open('/Residents_control/delete/' .$residents['id_elder']);/*if we click it it goes to /post/delete/3*/?>    
<input type="submit" value="delete" class="btn btn-danger">
 </form>
