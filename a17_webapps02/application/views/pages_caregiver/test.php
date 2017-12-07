<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>';
 echo 'is mysqli connection enabled?:  ';
 var_dump(function_exists("mysqli_connect"));
 echo '<p>  </p>';
 phpinfo(); ?> 
 </body>
</html>
