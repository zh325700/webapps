<h2><?= $title ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('addfacility_control/update'); ?>
    <input type="hidden" name="ID_facility" value="<?php echo $facility['ID_facility']; ?>"     
<div class="form-group">
    <label>City</label>
    <input type="text" class="form-control" name="City" placeholder="Add City"
           value="<?php echo $facility['City']; ?>">
</div>
<button type="submit" class="btn btn-default">Submit</button>
</form>