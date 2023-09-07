<?php
session_start();
error_reporting(0);

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

<head>
  <link rel="stylesheet" href="donation.css">
</head>

<body>

  <?php include("footer.php"); ?>

  <script>
    var navLink = document.getElementsByClassName("nav-link");
    navLink[4].className += " active";
    navLink[8].className += " active";
  </script>

</body>

</html>