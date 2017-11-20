<html>
    <head>
        <meta charset="utf-8">
        <title>Team2</title>     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">       
        <link href="../../assets/addResidents.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
    </head>
</html>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class=" text-center headerone">
                    Here come the General header
                </h1>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h2 class=" text-center headertwo">
                    Add New Residents
                </h2>
            </div>
        </div>

        <?php echo validation_errors(); ?>
        <?php echo form_open_multipart('Residents_control/create'); ?> <!--form_open_multipart so we can add image-->
        <div class="row">
            <div class="col-md-8">
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        First Name
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="FirstName" placeholder="Add FirstName">
                        </div>
                    </div>
                </div>
                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        Last Name
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="LastName" placeholder="Add LastName">
                        </div>
                    </div>
                </div>

                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        Gender
                    </div>
                    <div class="col-md-5" id="checkboxGroup">
                        <div class="form-group">
                            <label>
                                <div class="col col-md-3">
                                    <img src="https://cdn2.iconfinder.com/data/icons/person-gender-hairstyle-clothes-variations/48/Female-Side-comb-O-neck-512.png" style="width:40px;height:40px;">
                                </div>
                                <input type="checkbox"name="Sex" id="male" value="M" style="width:15px;height:15px;text-align: center;">
                            </label>
                            <label>
                                <div class="col col-md-3">
                                    <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/256/user-male-icon.png" style="width:40px;height:40px;">
                                </div>
                                <input type="checkbox"name="Sex" value="F" style="width:15px;height:15px;text-align: center;">

                            </label>
                        </div>
                    </div>
                </div>

                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        Birthday
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="date" class="form-control" name="Birthday" placeholder="Add Birthday">
                        </div>
                    </div>
                </div>

                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        Room
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="Room" placeholder="Add Room number">
                        </div>
                    </div>
                </div>

                <div class="row insert-row">
                    <div class="col col-md-1"></div>
                    <div class="col col-md-4 fontsize">
                        ID Instelling
                    </div>
                    <div class="col-md-5">
                        <div class="form-group insert-form">
                            <input type="text" class="form-control" name="ID_instelling" placeholder="Add ID Instelling number">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                
            </div>
        </div>

        <div class="form-group">
            <label>Upload Image</label>
            <input type="file" name="userfile" size="20"> <!--the name of the input has to be userfile-->
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

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
