<h2><?= $title ?></h2>
<?php foreach ($residents as $res): ?>
    <h3><?php echo $res['LastName']; ?></h3>
    <div class="row">
        <div class="col-sm-3">
            <img class="post-thumb" src="../images/icons/<?php echo $res['Picture']; ?>">
        </div>
        <div class="col-sm-9">
            <small class="post-date">Birthday : <?php echo $res['Birthday'] ?> Member since : <strong><?php echo $res['Member_Since']; ?>
                </strong></small><br>
            <p><a class="btn btn-link" href="<?php echo site_url('/Residents_control/' . $res['ID_Elder']); ?>"> Read More
                </a></p>
        </div>
    </div>

<?php endforeach; ?>
