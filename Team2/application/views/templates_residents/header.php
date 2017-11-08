<html>
    <head>
        <meta charset="utf-8">
        <title>ciBlog</title>     
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">       
        <link href="../../styles/mycss.css" rel="stylesheet" type="text/css"/>
    </head>
</html>
<script>
function previous()
{
     location.href = "http://localhost/a17_webapps02/Team2/index.php/questionone/";
} 
function next()
{
    location.href = "http://localhost/a17_webapps02/Team2/index.php/questiontwo/";
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
                      </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid">