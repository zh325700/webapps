
<h2><?= $title ?></h2>
<?php $cout = 0; ?>
<?php foreach ($residents as $res): ?>

    <div style="display: inline-block" >
        <a href="<?php echo site_url('index.php/Residents_control/' . $res['ID_Elder']); ?>">
            <img class="ImageBorder"  src="<?= base_url() ?>images/icons/<?php echo $res['Picture']; ?>" alt="<?php echo $res['LastName'] ?>" style="width:500px;height:500px;">
             <figcaption>Caption goes here</figcaption>
        </a>
    </div>


<?php endforeach; ?>
