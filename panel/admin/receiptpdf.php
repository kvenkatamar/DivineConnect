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
        $stmt=$conn->prepare("SELECT * FROM `income` WHERE id = '".$_GET['id']."' ");
        $stmt->execute();
        $record=$stmt->fetchAll();
        $n=$_GET['id'];
        foreach($record as $key) {

         $stmt1=$conn->prepare("SELECT * FROM `seva` WHERE id = '".$key['sevaname']."' ");
        $stmt1->execute();
      //  print_r($stmt1);exit;
        $record1=$stmt1->fetch(PDO::FETCH_ASSOC);

         $stmt2 = $conn->prepare("SELECT * FROM `devotees` WHERE id='".$key['dname']."' ");
    $stmt2->execute();
                                                
    $s2 = $stmt2->fetch(PDO::FETCH_ASSOC);


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
              <td style="border: 0;"><h2 style="margin-right:200px;">Receipt</h2></td>
             
        
          
        
                    

                        <tbody>
                        <tr>
  <td colspan="3" style="border: 0">                          


                           
                              <?php echo $key['eid'];?>
                              <br>

                            

                              Date:
                               <?php echo $key['date'];?>
                               <br>


                                     </td>

                                     

                                        <tr>
                                            <th>Name</th>
                                            <th class="right">Seva Name</th>
                                            <th>Transaction Type</th>
                                            <th>Rs</th>
                                        </tr>
                                       

                                <tr>
                                    <td style="padding: 15px;"><?php echo $s2['dname']; ?></td>
                                    <td><?php echo $record1['sevaname']; ?></td>
                                    <td><?php echo $key['transaction']; ?></td>
                                    <td><?php echo $key['totalamount']; ?></td>
                                </tr>
                                          


                                        

                                            <tr>  
                                                <td colspan="3">
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
    
 