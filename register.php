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
	$con = mysqli_connect($servername, $username, $server_password, $dbname);
	mysqli_select_db($con, $dbname);
} catch (PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>

<?php
// session_start();
error_reporting(0);
if (isset($_POST['submit'])) {
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$gotram = $_POST['gotram'];
	$contno = $_POST['mobilenumber'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$password = md5($_POST['password']);
	$ret = mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
	$result = mysqli_fetch_array($ret);
	if ($result > 0) {
		echo '<script>alert("This email or Contact Number already associated with another account.")</script>';
	} else {
		$query = mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password) value('$fname', '$lname', '$contno', '$email', '$password')");
		if ($query) {

			echo '<script>alert("You have successfully registered.")</script>';

		} else {

			echo '<script>alert("Something Went Wrong. Please try again")</script>';
		}
	}
}
if (isset($_POST['login'])) {
	$emailcon = $_POST['emailcont'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "select ID, FirstName, LastName from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
	$ret = mysqli_fetch_array($query);
	if ($ret > 0) {
		$_SESSION['otmsuid'] = $ret['ID'];
		$_SESSION['firstname'] = $ret['FirstName'];
		$_SESSION['lastname'] = $ret['LastName'];
		header('location:index.php');
	} else {
		echo '<script>alert("Invalid Details.")</script>';
	}
}
?>


<?php include("header.php"); ?>

<body>
	<div class="register">
		<h2>Devotee Registration - SSA Devastanam</h2>
		<div class="container">
			<div class="col-md-6  register-top-grid">
				<h3>Devotee Information</h3>
				<form method="post" name="signup" onsubmit="return checkpass();" action="register.php">
					<div>
						<span>First Name</span>
						<input type="text" placeholder="First Name" name="firstname" required="true">
					</div>
					<div>
						<span>Last Name</span>
						<input type="text" name="lastname" placeholder="Last Name" required="true">
					</div>
					<div>
						<span>Gotram</span>
						<input type="text" name="gotram" placeholder="Gotram" required="true">
					</div>
					<div>
						<span>Email</span>
						<input type="text" name="email" placeholder="Email address" required="true">
					</div>
					<div>
						<span>Mobile No</span>
						<input type="text" name="mobilenumber" required="true" maxlength="10" pattern="[0-9]{10}"
							placeholder="Mobile Number" required="true">
					</div>
					<div>
						<span>Address</span>
						<input type="text" name="address" placeholder="Address" required="true">
					</div>
					<div>
						<span>Password</span>
						<input type="text" name="password" placeholder="Password" required="true">
					</div>
					<div>
						<span>Confirm Password</span>
						<input type="text" name="repeatpassword" class="control-form" placeholder="Confirm password"
							required="true">
					</div>
					<button class="btn btn-info" type="submit" name="submit">REGISTER</button>
				</form>
			</div>
			<div class="col-md-6  register-bottom-grid">
				<h3>Devotee Login</h3>
				<form method="post">
					<div>
						<span>Email / Mobile No</span>
						<input type="text" name="emailcont" required="true"
							placeholder="Registered Email or Contact Number" required="true">
					</div>
					<div>
						<span>Password</span>
						<input type="text" name="password" placeholder="Password" required="true">
					</div>
					<div>
						<span><a class="link--gray" style="color: blue;" href="forgot-password.php">Forgot
								Password</span></a>

					</div>
					<div class="register-but">
						<button class="btn btn-success" type="submit" name="login">LOGIN</button>
					</div>
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	
	<script>
		var navLink = document.getElementsByClassName("nav-link");
		navLink[4].className += " active";
	</script>
	
	<?php include("../temple/footer.php"); ?>
</body>
