<?php 
//session_start();
  include '../assets/constant/config.php';
 try {


    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      
}

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }



?>
<?php
include 'Calendar.php';
$calendar = new Calendar('2021-02-02');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Event Calendar</title>
        <link href="style.css" rel="stylesheet" type="text/css">
        <link href="calendar.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <nav class="navtop">
            <div>
                <h1>Event Calendar</h1>
            </div>
        </nav>
        <div class="content home">
            <?=$calendar?>
        </div>
    </body>
</html>



