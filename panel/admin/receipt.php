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
?>
<?php include("../admin/include/header.php");?>
<?php include("../admin/include/sidebar.php");


       //echo "SELECT * FROM `pass1` WHERE id = '".$_GET['id']."' ";exit;
        $stmt=$conn->prepare("SELECT * FROM `pass1` WHERE id = '".$_GET['id']."' ");
        $stmt->execute();
        $record=$stmt->fetchAll();
        $n=$_GET['id'];
        foreach($record as $key) {



//echo "SELECT * FROM `seva` WHERE id = '".$key['sevaname']."' ";exit;
 $stmt1=$conn->prepare("SELECT * FROM `seva` WHERE id = '".$key['sevaname']."' ");
        $stmt1->execute();
      //  print_r($stmt1);exit;
        $record1=$stmt1->fetch(PDO::FETCH_ASSOC);



        

       
?>



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

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
        <div class="card">
          <div class="card-header">
          
              <h4 class="card-title">Darshan Pass/Receipt</h4>
              <a >
               
                <img class="brand-title" class="center" src="../assets/images/logo.png" alt="" width="200">
            </a>
          </div>
          
              <div class="card-body">
                <div class="basic-form">
                    <table>
                        <tr>
  <td colspan="3" style="border: 0">                          
<?php
    $payment=$key['payment'];
    $sevaname=$key['sevaname'];
    $date=$key['date'];
    $devoteesname=$key['devoteesname'];
    $ptypee=$key['ptypee'];
    $pnoo=$key['pnoo'];
  
 $qrcodetxt='payment : '.$payment.',sevaname : '.$sevaname.',date : '.$date.',devoteesname : '.$devoteesname.',ptypee : '.$ptypee.',pnoo : '.$pnoo.' ';   


?>

<img src="../qrcode/qr_img.php?d=<?php echo $qrcodetxt; ?>" style="width: 100px;height: 100px;"><br>
                              Transaction Id : 
                                            <?php echo $key['payment'];?>
                                          
                                     <br>
                                      Seva Name :
                                         <?php echo $record1['sevaname'];?> <br>
                                             Date : 
                                         <?php echo $key['date'];?> 
                                       
                                      <br> 
                                      Devotees Name :
                                            <?php echo $key['devoteesname']; ?>
                                                <br>
                                            Proof Type : 
                                           
                                            <?php echo $key['ptypee']; ?>
                                    
                                     <br>
                                        
                                         Proof NO. :
                                            <?php echo $key['pnoo']; ?>
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
                                          <tr>  <label ></label>
                                            <td colspan="5" style="text-align: right;">Total Amount :<?php echo $key['totalamount']; ?>/-</td>
                            </tr>  
                                            
                                        </tr>
                                       
                                           
                                            
                                           
                                        
                                    </table>
                               
                              

                 <div class="card-body">
                                <a href="receiptpdf.php" class="btn btn-primary mb-3">Print</a>
                              
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

   


            <?php } ?>
       
               <?php include("../admin/include/footer.php"); ?>