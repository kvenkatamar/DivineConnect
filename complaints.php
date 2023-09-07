<?php
session_start(); 
 include 'panel/assets/constant/config.php';
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>
<?php include("../temple/header.php");?>
<!doctype html>
<html lang="en">
   <head>
     <?php 


        $stmt=$conn->prepare("SELECT * FROM `web` ");
        $stmt->execute();
        $record=$stmt->fetchAll();?>
        <?php foreach($record as $key) {?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
       <title><?php echo $key['title']; ?></title>
<?php } ?>
      <link rel="icon" type="image/png" sizes="16x16" href="../temple/img/favicon.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
       <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
      <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
</head>
<style type="text/css">
    #list{
        margin-top: 10px;
        margin-left: 150px;
        margin-right: 150px;
    }
</style>
<body>
 <section id="list">
    
    <div class="card-body">
      <div class="basic-form">
   <form action="panel/admin/app/complaint_crud.php" method="POST" enctype="multipart/form-data">
     <div class="row">
    
   
    

      <!--  <div class="form-group col-md-6">
         <label>Complaint Id</label>
         <input class="form-control" type="text" name="cid" value="<?php echo $cid; ?>"  placeholder="" readonly="">
        </div> -->

        <div class="form-group col-md-6">
          <label>Full Name</label>
          <input class="form-control" type="text" name="name"  placeholder="" pattern="^[a-z A-Z ]+$"  required>
      </div>

        <div class="form-group col-md-6">
        <label >Email</label>
         <input class="form-control" type="email" name="email"  value="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
        </div>

        <div class="form-group col-md-6">
            <label >Complaint Subject</label>
            <input class="form-control" type="text" name="csubject"  value=""  pattern="^[a-z A-Z ]+$"  required>
        </div>

    

        <div class="form-group col-md-6">
           <label >Date</label>
           <input class="form-control" type="date" name="date"  value="<?php echo date('Y-m-d');?>" required>
       </div>

       <div class="form-group col-md-6">
           <label>Mobile No</label>
           <input class="form-control" type="text" name="mobileno"  value=" " required pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$">
       </div>

       <div class="form-group col-md-6">
           <label >Document</label>
           <input class="form-control" type="file"  name= "document" accept=".jpg,.jpeg,.png" required>
       </div>

          <div class="form-group col-md-6">
        <label >Status</label>
       <select class="form-control" name="status">
       <option value="pending">Pending</option>
                                        <option value="closed">Closed</option>
     </select><br><br>
     </div>
                                        
       <div class="row second">                        
        <div class="">

           <button style="margin-right:1000px;" class=" btn btn-primary" type="submit" name="submit">Submit</button><br><br>
           
       </div>
    </div>

    </div>
</div>
  
</form>
</div>
</div>
</div>
</section>


    <?php include("../temple/footer.php");?>
