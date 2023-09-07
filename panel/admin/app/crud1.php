
<?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




       
      //  print_r($_POST['id']);exit;
if(isset($_POST['id']) && !empty($_POST['id'])){
$result=array();
//print_r($result);exit;
        //echo "SELECT * FROM tbl_user where department_id ='".$_POST['dept_id']."'"; exit; 


    // $stmt = $db->prepare("SELECT * FROM lqrmaster ");
    // $stmt->execute();
    // $display = $stmt->fetchAll();
     //echo "SELECT * FROM seva WHERE id='".$_POST['id']."'";exit;
    $stmt = $conn->prepare("SELECT * FROM seva WHERE id='".$_POST['id']."'");
    $stmt->execute();
    //print_r($stmt);exit;
    $display1 = $stmt->fetchAll(); 
 //print_r($display1);exit;
     //echo print_r($display1);exit;
    //$result['display']=$display;
    $result['display1']=$display1;
            echo json_encode($result);
      //print_r($result);exit;


}

        

        }
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>
