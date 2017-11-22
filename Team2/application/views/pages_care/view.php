<html>
    <head>
        <meta charset="utf-8">
        <title>Details of residents</title>     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">       
        <link href="<?php echo base_url(); ?>assets/css/overview-Res.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <div class="container-fluid">
            <div class="row">
                <div class="col col-md-4">
                    <img class="Imagelayout"  src="<?= base_url() ?>images/icons/<?php echo $residents['Picture']; ?>">
                </div>
                <div class="col col-md-4">
                    <h2 style="padding-top: 150px;">Last Name: <?php echo $residents['LastName']; ?></h2>
                    <h2 style="padding-top: 50px;">First Name: <?php echo $residents['FirstName']; ?></h2>
                    <h3 style="padding-top: 50px;">Gender : <?php echo $residents['Sex']; ?></h3 >
                    <h3 style="padding-top: 50px;">Birthday : <?php echo $residents['Birthday']; ?></h3 >
                </div>
                <div class="col col-md-4">
                    <h2 style="padding-top: 150px;">Room Number: <?php echo $residents['RoomNumber']; ?></h2>
                    <h2 style="padding-top: 50px;">Facility: <?php echo $residents['ID_Instelling']; ?></h2>
                    <h2 style="padding-top: 50px;">Member Since: <?php echo $residents['Member_Since']; ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-2">
                    <a  class="btn btn-outline-primary btn-lg" style="line-height: 60px;height:80px; width:200px;" href="edit/<?php echo $residents['ID_Elder']; ?>">
                            Edit</a> 
                   </div>
                <div class="col-md-2">
                    <?php echo form_open('index.php/Residents_control/delete/' . $residents['ID_Elder']); /* if we click it it goes to /post/delete/3 */ ?>    
                    <input type="submit" value="delete" class="btn btn-danger btn-lg" style="height:80px; width:200px">
                    </form>
                </div>

            </div>
        </div>

        <footer>
            <p>Copyright © 2017 WebApps. Groep T All Rights Reserved.  
                <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
            </p>
        </footer>
        <!--Javascript libraries--> 
        <script src="<?= base_url() ?>assets/js/jquery.js"></script>
    </body>
</html>