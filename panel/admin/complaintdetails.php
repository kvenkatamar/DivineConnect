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
        $stmt=$conn->prepare("SELECT * FROM `complaints` WHERE id = '".$_GET['id']."' ");
        $stmt->execute();
        $record=$stmt->fetchAll();
        $n=$_GET['id'];
        foreach($record as $key) {

        

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
    <table id="datatables">
        <td style="border: 0; ">
               
                <img class="brand-title" class="center" src="../assets/images/logo.png" alt="" width="200">
            </td>
     <tbody>
                    
                                        <tr>
                                            <th>Complaint Id</th>
                                            <th class="right">Full Name</th>
                                            <th>Complaint Subject</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                        </tr>
                                       

                                <tr>
                                    <td style="padding: 15px;"><?php echo $key['cid']; ?></td>
                                    <td><?php echo $key['name']; ?></td>
                                    <td><?php echo $key['csubject']; ?></td>
                                    <td><?php echo $key['email']; ?></td>
                                    <td><?php echo $key['date']; ?></td>
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
    
 