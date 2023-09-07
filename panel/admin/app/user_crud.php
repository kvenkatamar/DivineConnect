
<?php 
session_start();

 include '../../assets/constant/config.php';
 
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if (isset($_POST['submit'])) 
    {
      
      $passw=hash('sha256', $_POST['password']);
    

      function createSalt()
      {
        return '2123293dsj2hu2nikhiljdsd';
      }
      $salt=createSalt();
      $password=hash('sha256',$salt.$passw);
     
      
      
      $stmt = $conn->prepare("INSERT INTO `admin`(`fname`,`lname`,`email`,`password`,`role_id`) VALUES ('".$_POST['fname']."','".$_POST['lname']."','".$_POST['email']."','".$password."','".$_POST['role_id']."')");

      $stmt->execute(); 
      header("location:../view_user.php" ); 

    }
  

    if(isset($_POST['btn_edit']))
    {
      
        $stmt = $conn->prepare("UPDATE `admin` SET `fname`='".$_POST['fname']."',`lname`='".$_POST['lname']."',`email`='".$_POST['email']."',`role_id`='".$_POST['role_id']."' WHERE id='".$_POST['id']."' ");


      $stmt->execute();
      
      header("location:../view_user.php" );
    
  }
  
  
  if(isset($_GET['id']))
{
  //echo "UPDATE groups SET delete_status=1 WHERE id='".$_GET['id']."' ";exit;
  //$stmt = $conn->prepare("DELETE FROM customers WHERE id = :id");
 $stmt = $conn->prepare("UPDATE admin SET delete_status='1' WHERE id='".$_GET['id']."' ");
 
  $stmt->execute();

   $_SESSION['reply'] = "005";
// echo "<script>alert(' Record Successfully Deleted');</script>";

  // $_SESSION['reply'] = "003";
   header("location:../view_user.php" ); 
  
}
 }
    


    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>

