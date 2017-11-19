<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('Residents_control/update'); ?>
    <input type="hidden" name="ID_Elder" value="<?php echo $resident['ID_Elder']; ?>"     
<div class="form-group">
    <label>Last name</label>
    <input type="text" class="form-control" name="LastName" placeholder="Add LastName"
           value="<?php echo $resident['LastName']; ?>">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>