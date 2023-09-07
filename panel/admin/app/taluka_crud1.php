
<?php   
 include '../../assets/constant/config.php';
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  ?>
<?php
if(isset($_POST['country']) && !empty($_POST['country'])){

//echo"SELECT * FROM district11 where country_id ='".$_POST['country']."'";exit;
$stmt = $conn->prepare("SELECT * FROM district where state1 ='".$_POST['country']."'");
    $stmt->execute();


            $users = $stmt->fetchAll();
            //print_r($users); exit;
            //return $user;php
            ?>
            <option>select</option>
            <?php foreach ($users as $user) {
            	//echo $user['id']; exit;
            ?>
            <option value="<?php echo $user['id'];?>"><?php echo $user['district'];?></option>
           <?php }

}?>

<?php
if(isset($_POST['state']) && !empty($_POST['state'])){

        echo "SELECT * FROM taluka where id ='".$_POST['state']."'"; exit;    
$stmt = $conn->prepare("SELECT * FROM taluka where id ='".$_POST['state']."'");
    $stmt->execute();
    $users = $stmt->fetchAll();
            //print_r($users); exit;
            //return $user;php
            ?>
            <option>select</option>
            <?php foreach ($users as $user) {
                //print_r($user);exit;
                //echo $user['id']; exit;
                //echo $user['taluka'];exit;
            ?>
            <option value="<?php echo $user['id'];?>"><?php echo $user['taluka'];?></option>
           <?php }

}?>



