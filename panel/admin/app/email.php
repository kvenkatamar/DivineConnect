<?php 
session_start();
include '../../assets/constant/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 include  'PHPMailer/src/Exception.php';
 include  'PHPMailer/src/PHPMailer.php';
 include  'PHPMailer/src/SMTP.php';

 
 try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if (isset($_POST['submit'])) 
      {
        $stmt=$conn->prepare("SELECT * FROM `signup` WHERE email='".$_POST['email']."'");
        $stmt->execute();
        $record=$stmt->fetchAll();
        foreach($record as $rec)
        {
          if($rec['email']==$_POST['email'])
          {
            $new=rand();

        $customer_name= $_POST['username'];
        $email=$_POST['email'];

        $msg = "Dear ".$customer_name.", Your new password is '".$new."' sign in using this";

        {
          $stmt = $conn->prepare("SELECT * FROM `tbl_info` ");
         
          $stmt->execute();
          $result=$stmt->fetchAll();
          foreach ($result as $row)
        //print_r($row); exit;

          
           $smtp_server = $row[10];

                $smtp_password = $row[12];
                $smtp_enc = $row[14];
                $smtp_username = $row[11];
                $smtp_port = $row[13];
           //echo $smtp_port; exit;
        }
        $mail = new PHPMailer(true);
        //echo $smtp_port; exit;
         
              $mail->isSMTP();
              $mail->Host       = $smtp_server;
              $mail->SMTPAuth   = true;
              $mail->Username   = $smtp_username;
              $mail->Password   = $smtp_password;
              $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
              $mail->Port       = $smtp_port;

              $mail->setFrom($smtp_username);
              $mail->addAddress($email, $customer_name);
              // $mail->setFrom($_POST['emailenq']);
              // $mail->addAddress($smtp_username);
        //echo $email; exit;
              $mail->isHTML(true);

              $mail->Subject = "Confimation Of Your Appointment";
              $mail->Body    = $msg;
              $mail->AltBody = $msg; 
          
              if($mail->Send())
              {
                $pass=hash('sha256', $new );

              function createSalt(){

                return '2123293dsj2hu2nikhiljdsd';
              }
              $salt = createSalt();
              $password=hash('sha256', $salt .$pass);

              $stmt = $conn->prepare("UPDATE `signup` SET password='".$password."' WHERE email='".$_POST['email']."' ");
              $stmt->execute();
              header("location:../login.php");
        }
        
      }
    }
  }


        }catch(PDOException $e)

        {
        echo "Connection failed: " . $e->getMessage();
        }
?>