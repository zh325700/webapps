<h2><?= $title ?></h2>
<?php foreach ($residents as $res): ?>
    <h3><?php echo $res['lastname']; ?></h3>
    <div class="row">
        <div class="col-sm-3">
            <img class="post-thumb" src="../images/icons/<?php echo $res['picture']; ?>">
        </div>
        <div class="col-sm-9">
            <small class="post-date">Birthday : <?php echo $res['birthday'] ?> Member since : <strong><?php echo $res['member_since']; ?>
                </strong></small><br>
            <?php echo word_limiter($res['description'], 20); ?><!--20 means 20 spaces-->
            <br><br>
            <p><a class="btn btn-link" href="<?php echo site_url('/Residents_control/' . $res['id_elder']); ?>"> Read More
                </a></p>
        </div>
    </div>

<?php endforeach; ?>
