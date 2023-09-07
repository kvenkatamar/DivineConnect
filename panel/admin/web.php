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
<?php include("../admin/include/sidebar.php");?>

<div class="content-body">
           
      <div class="container-fluid">
      <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Web Appearance</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
           
               
                                    <form action="app/web_crud.php" method="post" enctype="multipart/form-data" >

                                      <?php

                                    

                                          $stmt=$conn->prepare("SELECT * FROM `web` WHERE delete_status='0' ");
                                         // print_r($stmt); exit;
                                          $stmt->execute();
                                          $record=$stmt->fetchAll();

                                          foreach ($record as $key) { ?>
                                            <input class="form-control" type="hidden" name="id" value="<?php echo $key['id'];?>">
                                      

                                      <div class="mb-6">
                                        <div class="row">
                                        

                                         <div class="col-md-6">
                                          <label>Title</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo $key['title'];?>" pattern="^[a-z A-Z ]+$" /><br>
                                        </div>

                                         <div class="col-md-6">
                                         <label>Fnote</label>
                                            <input type="text" class="form-control" name="fnote" value="<?php echo $key['fnote'];?>" pattern="^[a-z A-Z ]+$" /><br>
                                        </div>

                                    
                                         <div class="col-md-6">
                                          <label>Logo</label>
                                            <input type="hidden"  value="<?php echo $key['favicon.png']?>" name="old_cat_img">
                                            <input type="hidden"  value="<?php echo $key['logo']?>" name="old_cat_img">
                                            <input class="form-control" type="file" name="logo" accept=".jpg,.jpeg">
                                            <img class="img-fluid" src="../assets/images/<?php echo $key['logo']?>" style="width:100px;height:auto;"><br>
                                        </div>



                                          <div class="col-md-6">
                                          <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $key['email'];?>" ><br>
                                        </div>

                                        <div class="col-md-6">
                                          <label>Email2</label>
                                            <input type="email" class="form-control" name="email2" value="<?php echo $key['email2'];?>" ><br>
                                        </div>

                                          


                                          <div class="col-md-6">
                                          <label>Phone</label>
                                            <input type="number" class="form-control" name="phone" value="<?php echo $key['phone'];?>" ><br>
                                        </div>

                                         <div class="col-md-6">
                                          <label>Phone2</label>
                                            <input type="number" class="form-control" name="phone2" value="<?php echo $key['phone2'];?>" ><br>
                                        </div>

                                        <div class="col-md-6">
                                          <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo $key['address'];?>" ><br>
                                        </div>

                                         <div class="col-md-6">
                                          <label>Company Name</label>
                                            <input type="text" class="form-control" name="cname" value="<?php echo $key['cname'];?>" ><br>
                                        </div>

                                        <div class="col-md-6">
                                          <label>Year</label>
                                            <input type="text" class="form-control" name="year" value="<?php echo $key['year'];?>" ><br>
                                        </div>


                                         

                                    
                                        <div class="col-12">
                                         <button style="margin-left: 20px;" class=" btn btn-primary" type="submit" name="update">Update</button>
                                       </div>
                                      


                                          </div>
                                        </div>
                                      <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>
      </div>
  </div>
    <?php include("../admin/include/footer.php"); ?>