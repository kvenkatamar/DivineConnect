
<?php   
 include '../../assets/constant/config.php';
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  ?>
<?php
if(isset($_POST['country']) && !empty($_POST['country'])){

		//echo "SELECT * FROM cow where stall ='".$_POST['stall']."'"; exit;
//echo "SELECT * FROM states where country_id ='".$_POST['country']."'";exit;	
$stmt = $conn->prepare("SELECT * FROM states where country_id ='".$_POST['country']."'");
    $stmt->execute();


            $users = $stmt->fetchAll();
            //print_r($users); exit;
            //return $user;php
            ?>
            <option>select</option>
            <?php foreach ($users as $user) {
            	//echo $user['id']; exit;
            ?>
            <option value="<?php echo $user['id'];?>"><?php echo $user['name'];?></option>
           <?php }

}?>

<?php
if(isset($_POST['state']) && !empty($_POST['state'])){

        //echo "SELECT * FROM cow where stall ='".$_POST['stall']."'"; exit;    
$stmt = $conn->prepare("SELECT * FROM city where state_id ='".$_POST['state']."'");
    $stmt->execute();


            $users = $stmt->fetchAll();
            //print_r($users); exit;
            //return $user;php
            ?>
            <option>select</option>
            <?php foreach ($users as $user) {
                //echo $user['id']; exit;
            ?>
            <option value="<?php echo $user['id'];?>"><?php echo $user['name'];?></option>
           <?php }

}?>
<?php
if(isset($_POST['id']) && !empty($_POST['id'])){
$result=array();
        //echo "SELECT * FROM tbl_user where department_id ='".$_POST['dept_id']."'"; exit; 


    // $stmt = $db->prepare("SELECT * FROM lqrmaster ");
    // $stmt->execute();
    // $display = $stmt->fetchAll();
     //echo "SELECT * FROM guest WHERE id='".$_POST['dept_id']."'";exit;
    $stmt = $conn->prepare("SELECT * FROM address WHERE id='".$_POST['id']."'");
    $stmt->execute();
    //echo print_r($stmt);exit;
    $display1 = $stmt->fetchAll(); 

     //echo print_r($display1);exit;
    //$result['display']=$display;
    $result['display1']=$display1;
            echo json_encode($result);

}
?>
