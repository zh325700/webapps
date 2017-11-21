<html>
    <head>
        <meta charset="utf-8">
        <title>Details of residents</title>     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">       
        <link href="../../assets/css/overview-Res.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    </head>
<body>
<h2><?php echo $residents['LastName']; ?></h2>
<small class="post-date">Birthday : <?php echo $residents['Birthday']; ?></small><br>
<img style="width:300px;height:300px;" src="<?= base_url() ?>images/icons/<?php echo $residents['Picture']; ?>">

<hr>   
<a class="btn btn-outline-primary pull-left" href="edit/<?php echo $residents['ID_Elder'];?>">
 Edit</a>
<?php echo form_open('index.php/Residents_control/delete/' .$residents['ID_Elder']);/*if we click it it goes to /post/delete/3*/?>    
<input type="submit" value="delete" class="btn btn-danger">
 </form>
<footer>
    <p>Copyright © 2017 WebApps. Groep T All Rights Reserved.  
        <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
    </p>
</footer>
<!--Javascript libraries--> 
<script src="<?= base_url() ?>assets/js/jquery.js"></script>
</body>
</html>