
<h2><?= $title ?></h2>
<?php $cout = 0; ?>
<?php foreach ($residents as $res): ?>

    <div style="display: inline-block">
        <a class="Imagelayout" href="<?php echo site_url('index.php/Residents_control/' . $res['ID_Elder']); ?>">
            <img src="<?= base_url() ?>images/icons/<?php echo $res['Picture']; ?>" alt="<?php echo $res['LastName'] ?>" style="width:360px;height:360px;border:10px blue;">
             <figcaption class="text-center"><?php echo $res['LastName']; ?></figcaption>
        </a>
    </div>

<?php endforeach; ?>
