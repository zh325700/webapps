
<h2><?= $title ?></h2>


<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
<script type="text/javascript">
    $(function () {

        //autocomplete
        $(".auto").autocomplete({
            source: "index.php",
            minLength: 1
        });

    });
</script>
<?php $array = array(); ?>
<?php foreach ($residents as $res): ?>
    <?php
    $array[] = array(
        'LastName' => $res['LastName'],
        'Picture' => $res['Picture'],
        'ID_Elder' => $res['ID_Elder']
    );
    ?> 

<?php endforeach; ?>
<?php echo json_encode($array); ?>
<div>
<form action='' method='post'>
    <p><label>LastName:</label><input type='text' name='LastName' value='' class='auto'></p>
</form>
</div>
<?php
   $lastname = $_POST["LastName"];
?>
<?php if(in_array($lastname, $array)): ?>
<?php echo $lastname ?>
<?php $found_key = array_search(lolz, array_column($array, 'LastName'));
$pic = $array[$found_key]['Picture'];
$id = $array[$found_key]['ID_Elder'];
?>
<div style="display: inline-block">
    <a class="Imagelayout" href="<?php echo site_url('index.php/Residents_control/' . $id); ?>">
        <img src="<?= base_url() ?>images/icons/<?php echo $pic; ?>" alt="<?php echo $lastname ?>" style="width:360px;height:360px;border:10px blue;">
        <figcaption class="text-center"><?php echo $lastname; ?></figcaption>
    </a>
</div>
<?php endif; ?>

