<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('Residents_control/update'); ?>
    <input type="hidden" name="ID_Elder" value="<?php echo $resident['ID_Elder']; ?>"        <!--this could be id or id_elder-->
<div class="form-group">
    <label>Last name</label>
    <input type="text" class="form-control" name="LastName" placeholder="Add LastName"
           value="<?php echo $resident['LastName']; ?>">
</div>
<!--<div class="form-group">
    <label >Description</label>        palce holder is the hint of what is in the box
    <textarea id="editor1" type="password" class="form-control" name="description" placeholder="Add description"
              ><?php echo $resident['description']; ?></textarea>   
</div>-->
<button type="submit" class="btn btn-default">Submit</button>
</form>