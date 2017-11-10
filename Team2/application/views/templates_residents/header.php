<html>
    <head>
        <meta charset="utf-8">
        <title>ciBlog</title>     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">       
        <link href="../../../styles/mycss.css" rel="stylesheet" type="text/css"/>
    </head>
</html>
<script>
function previous()
{
     location.href = "<?php echo base_url(); ?>Pages/view/questionone";
} 
function next()
{
    location.href = "<?php echo base_url(); ?>Pages/view/questiontwo";
}
</script>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="Team2">ciblog</a>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav">
                        <li class="nav-link">
                          <a href="<?php echo base_url(); ?>">Home</a>
                        </li>
                        <li class="nav-link">
                          <a href="<?php echo base_url(); ?>about">About</a>
                        </li>
                        <li class="nav-link">
                          <a href="<?php echo base_url(); ?>posts">Blog</a>
                        </li>
                        <li class="nav-link">
                          <a href="<?php echo base_url(); ?>Main_resident/index">Main_resident</a>
                        </li>
                        <li class="nav-link">
                          <a href="<?php echo base_url(); ?>MenuC_control/index">Menu</a>
                        </li>
                        <li class="nav-link">
                          <a href="<?php echo base_url(); ?>LoginR_control/index">Login_res</a>
                        </li>
                      </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">