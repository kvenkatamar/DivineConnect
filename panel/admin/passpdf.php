<!DOCTYPE html>
<html>

<?php
session_start(); 
 include '../assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();

        }
        $stmt=$conn->prepare("SELECT * FROM `pass1` WHERE id = '".$_GET['id']."' ");
        $stmt->execute();
        $record=$stmt->fetchAll();
        $n=$_GET['id'];
        foreach($record as $key) {

        

         $stmt3 = $conn->prepare("SELECT * FROM `seva` WHERE id='".$key['sevaname']."' ");
    $stmt3->execute();
                                                
    $seva1 = $stmt3->fetch(PDO::FETCH_ASSOC);


        ?>

<head>
    <style type="text/css">

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
  
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
   
}




  
</style>
</head>
<body>
    <div id='printMe'>
            <table>
                 <td style="border: 0; ">
               
                <img class="brand-title" class="center" src="../assets/images/logo.png" alt="" width="200">
            </td>
              <td style="border: 0; "><h2>Darshan Pass</h2></td>
             
        
          
            
                    

                        <tbody>
                        <tr>
  <td colspan="3" style="border: 0">                          
<?php

  

    $payment=$key['payment'];
    $sevaname=$key['sevaname'];
    $date=$key['date'];
    $dname=$key['dname'];
    $ptypee=$key['ptypee'];
    $pnoo=$key['pnoo'];
  
 $qrcodetxt='date : '.$date.',sevaname:'.$sevaname.',dname:'.$dname.', pnoo:'.$pnoo.'  ';   


?>

<img src="../qrcode/qr_img.php?id=<?php echo $qrcodetxt; ?>" style="width: 100px;height: 100px;"><br>
                    <br>

                     Transaction Id : 
                                            <?php echo $key['payment'];?>
                                          
                                     <br>
                                      Seva Name :
                                         <?php echo $seva1['sevaname'];?> <br>
                                             Date : 
                                         <?php echo $key['date'];?> 
                                       
                                      <br> 
                                      Devotees Name :
                                            <?php echo $key['dname']; ?>
                                                <br>
                                            Proof Type : 
                                           
                                            <?php echo $key['ptypee']; ?>
                                    
                                     <br>
                                        
                                         Proof NO. :
                                            <?php echo $key['pnoo']; ?>
                                        </td>
                                           
                                            
                           
                            

                            

                             


                                     </td>

                                     <th colspan="2" style="border: 0">
                                       

                                   
                                         <?php 
        //echo "SELECT * FROM `web` ";exit;
        $stmt1=$conn->prepare("SELECT * FROM `web` ");
        $stmt1->execute();
        //print_r($stmt);exit;
        $record2=$stmt1->fetchAll();?>
        <?php foreach($record2 as $key1)
        //print_r($key);exit;
         {?>
            <?php echo $key1['title']; ?>
                                    <br>
                                        <?php echo $key1['address']; ?>
                                        <br><?php echo $key1['email']; ?><br> 
                                        <?php echo $key1['phone']; ?>
                                              <?php } ?>
                                   
                                        
                                        </th>

                                       <tr>
                                                
                                                
                                             
                                               <th>Name</th>
                                                <th class="right">Age</th>
                                                <th class="center">ID Type</th>
                                                <th>ID No</th>
                                                <th>Amount</th>
                                                <!-- <th class="right">Total Amount</th> -->
                                            </tr>
                                        
                                         <?php 
      // echo "SELECT * FROM `pass2` WHERE l_id = '".$n."'  ";exit;
        $stmt1=$conn->prepare("SELECT * FROM `pass2` WHERE l_id = '".$n."' ");
        $stmt1->execute();
        $record1=$stmt1->fetchAll();
         foreach($record1 as $key1) {?>   
                                            <tr>
                                          

                                            
                                          
                                            <td><?php echo $key1['name1']; ?></td>
                                            <td><?php echo $key1['age']; ?></td>
                                            <td><?php echo $key1['ptype']; ?></td>
                                            <td><?php echo $key1['pno']; ?></td>
                                            <td><?php echo $key['cseva']; ?></td>
                                      </tr>
                                           <?php } ?>

                                        

                                            <tr>  
                                                <td colspan="4">
                                                    <b>Total:</b>
                                                </td>
                                                <td >
                                                    <?php echo $key['totalamount']; ?>/-
                                                </td>
                                                <br>
                                        </tr>







                                     </tr>
                                 </tbody>
                                          <?php } ?>

                                 </table>

                                    
 </div>


<button style="margin-top:15px;" onclick="printDiv('printMe')">Print</button>
<script>
    function printDiv(divName){
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;

    }
</script>

 
</body>
</html>
    
 