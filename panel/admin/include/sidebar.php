
<?php 
session_start();

 include '../assets/constant/config.php';

  // include '../assets/constant/checklogin.php'; 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }

        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

 ?>
 <?php
 //echo $_SESSION['id'];exit;
//echo "SELECT * FROM admin WHERE id='".$_SESSION['id']."'";exit;
$stmt = $conn->prepare("SELECT * FROM admin WHERE id='".$_SESSION['id']."'");
//print_r($stmt);exit;
$stmt->execute();
//print_r($stmt);exit;
$admin1 = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r($admin);exit;
//echo "SELECT * FROM `permission_role` WHERE group_id='".$admin['role_id']."'";exit;
$stmt = $conn->prepare("SELECT * FROM `permission_role` WHERE group_id='".$admin1['role_id']."'");
$stmt->execute();
//print_r($stmt);exit;
$roles = $stmt->fetchAll(); 
//print_r($roles);
$setroles=array();
//print_r($setroles);exit;
foreach ($roles as $role) {
  
     $stmt = $conn->prepare("SELECT * FROM `permissions` WHERE id='".$role['permission_id']."'");
 $stmt->execute();
 $per = $stmt->fetchAll();
 //print_r($per);exit;
 array_push($setroles, $per[0]['name']);
}
 //print_r($setroles); exit;

$_SESSION['userroles']=$setroles;
$userroles=$_SESSION['userroles'];
//print_r($userroles); exit;
//print_r($_SESSION['user']);exit;
        ?>
        <?php //if ($_SESSION['admin']=='admin'){ ?>


        
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="dashboard.php" aria-expanded="false">
                            <i class="fa fa-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>

                     


                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-landmark-dome"></i>
                            <span>Devotees</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="devotees.php">Add</a></li>
                            <li><a href="devoteestable.php">Manage</a></li>
                        </ul>
                     
                    </li>



                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-praying-hands"></i>
                            <span>Seva</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="seva.php">Add</a></li>
                            <li><a href="scheduletable.php">Schedule</a></li>
                            <li><a href="sevatable.php">Manage</a></li>
                        </ul>
                     
                    </li>
                   

                   <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-hand-holding-dollar"></i>
                            <span>Income</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="income.php">Add</a></li>
                            <li><a href="incometable.php">Manage</a></li>
                        </ul>
                     
                    </li>

                     <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fa fa-database"></i>
                            <span>Manage Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="manageincometable.php">Income Type</a></li>
                            <li><a href="expensestable.php">Expenses</a></li>
                            <li><a href="stafftable.php">Details of Staff</a></li>
                            <li><a href="salarytable.php">Salary</a></li>
                            <li><a href="festivetable.php">Festival Schedule</a></li>
                            <li><a href="statetable.php">States</a></li>
                            <li><a href="districttable.php">District</a></li>
                            <li><a href="talukatable.php">Taluka</a></li>
                           

                        </ul>
                        
                      </li>

                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-file-contract"></i>
                            <span>Pass</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                           
                            <li><a href="passtable.php">Manage</a></li>
                        </ul>
                     
                    </li>

                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-warning"></i>
                            <span>Complaints</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                           
                            <li><a href="complainttable.php">Manage</a></li>
                        </ul>
                     
                    </li>

                    <li><a href="web.php" class="has-arrow waves-effect">
                        <i class="fa fa-gear"></i>
                            <span>Web Appearance</span>
                        </a>
                     
                    </li>

                     <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-clipboard"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="devoteesreports.php">Devotees</a></li>
                            <li><a href="incomereports.php">Income</a></li>
                            <li><a href="expensesreports.php">Expenses</a></li>
                            <li><a href="incomeexpensereports.php">Profit</a></li>

                        </ul>
                     
                    </li>

                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-user"></i>
                            <span>User Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="view_role.php">View Role</a></li>
                            <li><a href="view_user.php">View User</a></li>
                            
                        </ul>
                     
                    </li>

                
            
            </div>
        </div> 
    <?php // }  ?>

     <?php if ($_SESSION['admin']=='user'){ ?>


        
        <div class="deznav">
            <div class="deznav-scroll">
                <ul class="metismenu" id="menu">
                      <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('dashboard',$userroles)) 
                        { ?> 
                    <li><a href="dashboard.php" aria-expanded="false">
                            <i class="fa fa-dashboard"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        
                    </li>
                     <?php } } ?> 



                     


                      <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('devotees',$userroles)) 
                        { ?>  
                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="fa fa-landmark-dome"></i>
                            <span>Devotees</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (in_array('add_devotees',$userroles)) 
                        { ?> 
                            <li><a href="devotees.php">Add</a></li>
                             <?php } ?>

                            <?php if (in_array('manage_devotees',$userroles)) 
                        { ?> 
                            <li><a href="devoteestable.php">Manage</a></li>
                             <?php } ?>
                        </ul>
                     
                    </li>
                <?php } } ?> 
                   


                     <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('seva',$userroles)) 
                        { ?> 
                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-praying-hands"></i>
                            <span>Seva</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (in_array('add_seva',$userroles)) 
                        { ?> 
                            <li><a href="seva.php">Add</a></li>
                             <?php } ?>

                            <?php if (in_array('schedule',$userroles)) 
                        { ?> 
                            <li><a href="schedule.php">Schedule</a></li>
                             <?php } ?>

                            <?php if (in_array('manage_seva',$userroles)) 
                        { ?> 
                            <li><a href="sevatable.php">Manage</a></li>
                             <?php } ?>
                        </ul>
                     
                    </li>
                     <?php } } ?> 


                   
                     <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('income',$userroles)) 
                        { ?> 
                   <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-hand-holding-dollar"></i>
                            <span>Income</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (in_array('add_income',$userroles)) 
                        { ?> 
                            <li><a href="income.php">Add</a></li>
                             <?php } ?>

                            <?php if (in_array('manage_income',$userroles)) 
                        { ?> 
                            <li><a href="incometable.php">Manage</a></li>
                             <?php } ?>
                        </ul>
                     
                    </li>
                     <?php } } ?> 



                     <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('mng_master',$userroles)) 
                        { ?> 
                     <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                         <i class="fa fa-database"></i>
                            <span>Manage Master</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (in_array('add_mangincome',$userroles)) 
                        { ?> 
                            <li><a href="manageincometable.php">Income</a></li>
                             <?php } ?>

                            <?php if (in_array('expenses',$userroles)) 
                        { ?> 
                            <li><a href="expensestable.php">Expenses</a></li>
                             <?php } ?>

                            <?php if (in_array('staff',$userroles)) 
                        { ?> 
                            <li><a href="stafftable.php">Details of Staff</a></li>
                             <?php } ?>

                            <?php if (in_array('salary',$userroles)) 
                        { ?> 
                            <li><a href="salarytable.php">Salary</a></li>
                             <?php } ?>

                             <?php if (in_array('festive',$userroles)) 
                        { ?> 
                             <li><a href="festivetable.php">Festival Schedule</a></li>
                             <?php } ?>

                            <?php if (in_array('details',$userroles)) 
                        { ?> 
                            <li><a href="detailstable.php">Details of Devotees  </a></li> <?php } ?>

                             <?php if (in_array('states',$userroles)) 
                        { ?> 
                            <li><a href="statetable.php">States</a></li>
                            <?php } ?>
                            
                             <?php if (in_array('district',$userroles)) 
                        { ?> 
                            <li><a href="districttable.php">District</a></li>
                            <?php } ?>

                             <?php if (in_array('taluka',$userroles)) 
                        { ?> 
                            <li><a href="talukatable.php">Taluka</a></li>
                            <?php } ?>

                        </ul>
                        
                      </li>
                       <?php } } ?> 


                         <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('pass',$userroles)) 
                        { ?> 
                       <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-file-contract"></i>
                            <span>Pass</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">

                              <?php if (in_array('passmng',$userroles)) 
                        { ?> 
                           <li><a href="passtable.php">Manage</a></li>
                        </ul><?php } ?>
                     
                    </li>
                    <?php } } ?> 



                       <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('complaints',$userroles)) 
                        { ?> 
                    <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-warning"></i>
                            <span>Complaints</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                           <?php if (in_array('mng_complaints',$userroles)) 
                        { ?> 
                            <li><a href="complainttable.php">Manage</a></li>
                             <?php } ?>
                        </ul>
                     
                    </li>
                     <?php } } ?> 


                     <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('webappearance',$userroles)) 
                        { ?> 
                    <li><a href="web.php" class="has-arrow waves-effect">
                        <i class="fa fa-gear"></i>

                            <span>Web Appearance</span>
                        </a>
                     
                    </li>
                     <?php } } ?> 



                     <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('reports',$userroles)) 
                        { ?> 
                     <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-clipboard"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <?php if (in_array('devotees_reports',$userroles)) 
                        { ?> 
                            <li><a href="devoteesreports.php">Devotees</a></li>
                             <?php } ?>

                            <?php if (in_array('income_reports',$userroles)) 
                        { ?> 
                            <li><a href="incomereports.php">Income</a></li>
                             <?php } ?>

                            <?php if (in_array('expense_reports',$userroles)) 
                        { ?> 
                            <li><a href="expensesreports.php">Expenses</a></li>
                             <?php } ?>

                            <?php if (in_array('profit_reports',$userroles)) 
                        { ?> 
                            <li><a href="incomeexpensereports.php">Profit</a></li>
                             <?php } ?>

                        </ul>
                     
                    </li>

                     <?php } } ?>

                     <?php if(isset($userroles))
                          { //print_r($userroles); exit;
                             if (in_array('usermngmnt',$userroles)) 
                        { ?> 
                     <li><a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fa fa-user"></i>
                        <?php if (in_array('usermngmnt',$userroles)) 
                        { ?> 
                            <span>User Management</span>
                        </a>
                    <?php } ?>
                        <ul class="sub-menu" aria-expanded="false">
                             <?php if (in_array('viewuser',$userroles)) 
                        { ?> 
                            <li><a href="view_user.php">View User</a></li>
                            <?php } ?>
                             <?php if (in_array('viewrole',$userroles)) 
                        { ?> 
                            <li><a href="view_role.php">View Role</a></li>
                            <?php } ?>
                        </ul>
                     </li>
                     <?php } } ?>  

                
            
            </div>
        </div> 
    <?php }  ?>

    

    