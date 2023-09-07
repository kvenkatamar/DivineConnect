<?php
session_start();

include('../otms/includes/config.php');

$servername = 'localhost';
$username = 'root';
$server_password = '';
$dbname = 'temple';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $server_password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<?php include("../temple/header.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <title> SSA Devastanam || Devastanam</title>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">

    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700' rel='stylesheet' type='text/css'>
    <!-- <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <script src="js/jquery.min.js"></script> -->
</head>

<body>

  <?php include("../temple/footer.php"); ?>

</body>
</html>