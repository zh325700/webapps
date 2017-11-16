<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('Residents_control/update'); ?>
    <input type="hidden" name="id_elder" value="<?php echo $resident['id_elder']; ?>"        <!--this could be id or id_elder-->
<div class="form-group">
    <label>Last name</label>
    <input type="text" class="form-control" name="lastname" placeholder="Add Lastname"
           value="<?php echo $resident['lastname']; ?>">
</div>
<div class="form-group">
    <label >Description</label>        <!--palce holder is the hint of what is in the box-->
    <textarea id="editor1" type="password" class="form-control" name="description" placeholder="Add description"
              ><?php echo $resident['description']; ?></textarea>   
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>