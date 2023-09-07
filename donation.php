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
  <!-- contact -->
	<div class="contact">
	<div class="container">
		<h2>Donation For SSA Devastanam</h2>
					<!----- contact-grids ----->		
					<div class="contact-grids">
						<div class="clearfix"> </div>
						<!----- contact-form ------>
						<div class="contact-form">
							<form method="post">
								<div class="contact-form-row">
									<div>
										<span>City :</span>
										<input type="text" class="form-control" value="" name="city" required="true">
									</div>
									<div>
										<span>State :</span>
										<input type="text" class="form-control" value="" name="state" required="true">
									</div>
									<div>
										<span>Country :</span>
										<input type="text" class="form-control" value="" name="country" required="true">
									</div>
									<div>
										<br>
										<span>PAN Number :</span>
										<input type="text" class="form-control" value="" name="pannum" required="true">
									</div>
									<div>
										<br>
										<span>Donation Type:</span>
										<select type="text" class="form-control" value="" name="dtype" required="true">
											<option value="">Choose Donation Type</option>
											<option value="Developement">Developement</option>
											<option value="Item">Item</option>
											<option value="Annadanam">Annadanam</option>
											<option value="Maintenance">Maintenance</option>
										</select>
									</div>									
									<div>
										<br>
										<span>Donation Amount:</span>
										<input type="text" class="form-control" value="" name="damt" required="true">
									</div>
									<div>
										<br>
										<span>Payment Option:</span>
										<select type="text" class="form-control" value="" name="paymentoption" required="true">
											<option value="">Choose Payment Option</option>
											<option value="Cash">Cash</option>
											<option value="UPI">UPI</option>
											<option value="Wallet">Wallet</option>
											<option value="Card">Card</option>
										</select>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
								<div class="contact-form-row2">
									<span>Donation Description :</span>
									<textarea name="message" class="form-control"> </textarea>
								</div>
								<input type="submit" value="Donate" name="submit">
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