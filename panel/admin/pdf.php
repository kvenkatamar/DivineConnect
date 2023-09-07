<?php



 include '../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>
<form action="app/invoicepdf1.php" method="POST">

	<table class="table table-styled mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Receipt Id</th>
                                                    <th>Date</th>
                                                    <th>Devotees Name</th>
                                                    <th>Donation Type Name</th>
                                                    <th>Donation</th>
                                                     
                                                              
                                                </tr>
                                            </thead>


                                            <?php 

//echo"SELECT * FROM income"; exit;
 $stmt = $conn->prepare("SELECT * FROM income WHERE delete_status='0' ");
       $stmt->execute();
       $result = $stmt->fetchAll();
?>
<?php foreach ($result as $key) {  ?>
                                            <tbody>
                                               
                                                <tr>
                                                   
                                                    <td><?php echo $key['eid'];?></td>
                                                    <td>
                                                       <?php echo $key['date'];?>
                                                   </td>
                                                   <td>
                                                    <?php echo $key['dname'];?>
                                                    </td>
                                                     <td>
                                                       <?php echo $key['donation'];?>
                                                   </td>
                                                    <td>
                                                       <?php echo $key['chargeofseva'];?>
                                                   </td>
                                                   
                                                  
                                                
                                                </tr>
                                             </tbody>
<?php } ?> 
                                        </table>
 <button type="submit" name="submit" class="btn btn-primary btn-sm" style="width:25%;">Submit</button>
</form>