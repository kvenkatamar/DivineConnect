<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		if (isset($_POST['submit'])) 
		{
			 if(isset($_POST['g-recaptcha-response'])){
            //echo print_r($_POST);exit;
            
$secretekey="6LdJC4AeAAAAAMLn9tfGX8_BoZGIwLHgBNiiYgxb";
        $ip=$_SERVER['REMOTE_ADDR'];
        //echo $ip;exit;
        $response=$_POST['g-recaptcha-response'];
        //echo $response;exit;
        //https:www.google.com/recaptcha/api/siteverify METHOD: POST
        $url="https://www.google.com/recaptcha/api/siteverify?secret=$secretekey&response=$response&remoteip=$ip";
    //echo $url;exit;
     $fire=file_get_contents($url);
     //echo $fire;exit;
     // data convert to object 
     $data=json_decode($fire);
     //echo print_r($data);exit;
     if($data->success==true){

     	extract($_POST);

			$pass=hash('sha256', $_POST['password']);
			
			function createSalt()
			{
				return '2123293dsj2hu2nikhiljdsd';
			}
			$salt=createSalt();
			$password=hash('sha256',$salt.$pass);
			if($_POST['adminuser']=='admin')
{
			 

			$stmt = $conn->prepare("SELECT * FROM `signup` WHERE email='".$_POST['email']."' AND password='".$password."' "); 

			$stmt->execute();
			 $record=$stmt->fetchAll();

			 $res = count($record);
			 if($res>0)
			 {
			 	 foreach($record as $key) {
			 	 	if($password == $key['password']){
			 	 $_SESSION['id']=$key['id'];
			 	 $_SESSION['admin']='admin';
			 	 		
			 	 	}
			 	 }
			 	 //echo $_SESSION['id']; exit;
			 	 header("location:../dashboard.php" ); 
			 }
			 elseif($res==0){
			 	echo "<script>alert('Invalid Login');</script>";
			 	
			 }
			}

if($_POST['adminuser']=='user')
{
	//echo "SELECT * FROM `admin` WHERE email='".$_POST['email']."' AND password='".$password."' ";exit;
	$stmt = $conn->prepare("SELECT * FROM `admin` WHERE email='".$_POST['email']."' AND password='".$password."' "); 

			$stmt->execute();
			//print_r($stmt);exit;
			 $record=$stmt->fetchAll();


			 $res = count($record);
			 if($res>0)
			 {
			 	 foreach($record as $key) {
			 	 	if($password == $key['password']){
			 	 $_SESSION['id']=$key['id'];
			 	 $_SESSION['admin']='user';
			 	 		
			 	 	}
			 	 }
			 	 //echo $_SESSION['id']; exit;
			 	 header("location:../dashboard.php" ); 
			 }
			 elseif($res==0){
			 	echo "<script>alert('Invalid Login');</script>";
			 	header("location:../login.php");
			 }


	}
			
		}
		else
                    {
                    echo "<script>alert('please fill the captcha');</script>";
                     }

			

		}

		 else{
            echo "something went Wrong";
        }
	}
	else{
        echo "please fill the captcha";
    }
}
		
		catch(PDOException $e)
		{
		echo "Connection failed: " . $e->getMessage();
		}
?>
