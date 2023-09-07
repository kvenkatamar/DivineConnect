  <?php 
session_start();
 include '../../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
           


//print_r($_POST);
if(isset($_POST['id']) && !empty($_POST['id'])){
$result=array();
    // echo"SELECT * FROM `devotees` WHERE phone='".$_POST['id']."' AND status = '".active."' AND delete_status='0'";exit;  
    $stmt = $conn->prepare("SELECT * FROM `devotees` WHERE phone='".$_POST['id']."' AND status = '".active."' AND delete_status='0' ");
    $stmt->execute();
    // print_r($stmt);exit;
    $display1 = $stmt->fetchAll(); 

  //echo print_r($display1);exit;
    //$result['display']=$display;
    $result['display1']=$display1;
            echo json_encode($result);

}





if (isset($_POST['submit'])) 
        {
            $stmt = $conn->prepare("INSERT INTO `pass1`(`eid`,`sevaname`,`cseva`,`mobile_no`, `dname`,`donation`,`raddress`,`transaction`,`tperson`,`totalamount`,`date`,`agee`,`genderr`,`ptypee`,`pnoo`) VALUES ('".$_POST['sevaname']."','".$_POST['sevaname']."','".$_POST['cseva']."','".$_POST['mobile_no']."','".$_POST['dname']."','".$_POST['donation']."','".$_POST['raddress']."','".$_POST['transaction']."','".$_POST['tperson']."','".$_POST['totalamount']."','".$_POST['date']."','".$_POST['agee']."','".$_POST['genderr']."','".$_POST['ptypee']."','".$_POST['pnoo']."')");

         

            $stmt->execute();
             $last_id = $conn->lastInsertId();
         

             //print_r($last_inserted_id);exit;
             echo $service = count($_POST['name1']);
             //print_r($service);exit;
                 extract($_POST); 
                for($i=0;$i<$service;$i++){
                 //print_r($i);exit; 
                 
                $l_id= $last_id;
                //print_r($l_id);exit; 
               

               $sql="insert into pass2(name1,age,gender,ptype,pno,l_id)values('$name1[$i]','$age[$i]','$gender[$i]','$ptype[$i]','$pno[$i]','$l_id')";
                //print_r($sql);exit;

                $execute = $conn->query($sql);
                
            }
       

           

            header("location:../../../panel/payment1/pay.php" ); 

        
  }

    
    
    

        if (isset($_GET['id'])) 
        {
            

 //echo "UPDATE `signup` SET `username`='".$_POST['username']."',`email`='".$_POST['email']."',`mobileno`='".$_POST['mobileno']."' WHERE id='".$_SESSION['id']."' ";exit;

            $stmt = $conn->prepare("UPDATE `pass1` SET delete_status='1' where id='".$_GET['id']."' ");

            $stmt->execute();
            

            $_SESSION['delete']="delete";

            header("location:../passtable.php" ); 

        }


   
    


        }
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>

