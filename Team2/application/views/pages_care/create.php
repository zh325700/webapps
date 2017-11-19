<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open_multipart('Residents_control/create'); ?> <!--form_open_multipart so we can add image-->
<div class="form-group">
    <label>Lastname</label>
    <input type="text" class="form-control" name="LastName" placeholder="Add LastName">
</div>
<div class="form-group">
    <label>Upload Image</label>
    <input type="file" name="userfile" size="20"> <!--the name of the input has to be userfile-->
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>