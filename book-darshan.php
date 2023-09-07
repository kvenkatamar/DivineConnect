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


<?php
if (isset($_POST["submit"])) {
    $uid = $_SESSION["otmsuid"];
    $dod = $_POST["dod"];
    $tod = $_POST["tod"];
    $totmem = $_POST["totmem"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $ip = $_POST["ip"];
    $ipnum = $_POST["ipnum"];
    $message = $_POST["message"];
    $bookingnum = mt_rand(100000000, 999999999);
    $_SESSION["bookingnum"] = $bookingnum;
    $darshanbookid = $_GET["darshanbookid"];
    $query = mysqli_query($con, "insert into tblbookseva(BookingNumber,UserID,TempleID,DateofSeva,TimeofSeva,TotalMember,City,State,Country,IdentityProof,IdentityProofnumber,Message) value('$bookingnum','$uid','$darshanbookid','$dod','$tod','$totmem','$city','$state','$country','$ip','$ipnum','$message')");
    if ($query) {
        echo "<script>window.location.href='thank-you.php'</script>";
    } else {
        echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
} ?>


<?php include("../temple/header.php"); ?>

<head>
    <link rel="stylesheet" href="donation.css">
</head>

<body>
    <!-- contact -->
    <div class="contact">
        <div class="container">
            <h2>Book Seva</h2>
            <!----- contact-grids ----->
            <div class="contact-grids">
                <div class="clearfix"> </div>
                <!----- contact-form ------>
                <div class="contact-form">
                    <form method="post">
                        <div class="contact-form-row">
                            <div>
                                <span>
                                    <span>Seva Name :</span>
                                    <select type="text" class="form-control" value="" name="sname" required="true">
                                        <option value="">Choose Seva</option>
                                        <option value="Archana">Archana - Daily</option>
                                        <option value="GotranamarchanaM">Gotranamarchana - Monthly</option>
                                        <option value="GotranamarchanaY">Kalyanam - Yearly</option>
                                        <option value="AnnaPrasana">Anna Prasana</option>
                                        <option value="Abhisekham">Abhisekham - Friday</option>
                                        <option value="KalyanamM">Kalyanam - Monthly</option>
                                        <option value="KalyanamS">Kalyanam - Individual</option>
                                        <option value="Homam">Homam</option>
                                    </select>
                            </div>
                            <div>
                                <span>
                                    <span>Seva Amount</span>
                                    <input type="text" class="form-control" value="" name="pseva" required="true">
                            </div>
                            <div>
                                <span>
                                    <span>Date of Seva :</span>
                                    <input type="date" class="form-control" value="" name="dod" required="true">
                            </div>
                            <div>
                                <span>
                                    <span>Time of Seva :</span>
                                    <input type="time" class="form-control" value="" name="tod" required="true">
                            </div>
                            <br>
                            <div>
                                <span>
                                    <span>No of Devotees :</span>
                                    <input type="text" class="form-control" value="" name="totmem" required="true">
                            </div>
                            <div>
                                <span>
                                    <span>City :</span>
                                    <input type="text" class="form-control" value="" name="city" required="true">
                            </div>
                            <div>
                                <span>
                                    <span>State :</span>
                                    <input type="text" class="form-control" value="" name="state" required="true">
                            </div>
                            <div>
                                <span>
                                    <span>Country :</span>
                                    <input type="text" class="form-control" value="" name="country" required="true">
                            </div>
                            <div>
                                <span>
                                    <span>Identity Proof :</span>
                                    <select type="text" class="form-control" value="" name="ip" required="true">
                                        <option value="">Choose Identity Proof</option>
                                        <option value="Adhar Card">Adhar Card</option>
                                        <option value="Voter Card">Voter Card</option>
                                        <option value="Adhar Card">Passport Card</option>
                                        <option value="Adhar Card">Driving License</option>
                                    </select>
                            </div>
                            <div>
                                <span>
                                    <span>Identity Proof Number:</span>
                                    <input type="text" class="form-control" value="" name="ipnum" required="true">
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="clearfix"> </div>
                        <div class="contact-form-row">
                            <span>Message :</span>
                            <textarea name="message" class="form-control"> </textarea>
                        </div>
                        <input type="submit" value="submit" name="submit">
                    </form>
                </div>
                <!----- contact-form ------>
            </div>
            <!----- contact-grids ----->

        </div>
    </div>

    <?php include("footer.php"); ?>

</body>

</html>