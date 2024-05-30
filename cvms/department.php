<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
{
$deptname=$_POST['departmentname'];
 $query=mysqli_query($con,"insert into `departments`(departName) value('$deptname')");
if ($query) {
 echo "<script>alert('Department Has been added');</script>"; 
  echo "<script>window.location.href = 'department.php'</script>";  
  }else{
       echo "<script>alert('Something Went Wrong. Please try again');</script>"; 
     echo "<script>window.location.href = 'department.php'</script>"; 
    }

  
}



if(isset($_GET['catid']))
{
$catid=intval($_GET['catid']);
$sql=mysqli_query($con,"delete from departments where id='$catid'");
 echo "<script>alert('Department deleted');</script>"; 
 echo "<script>window.location.href = 'department.php'</script>";    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    
    <title>AVSM | Department</title>

    
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="container">
    <div class="page-wrapper">
    
        <?php include_once('includes/sidebar.php');?>
   
        <div class="page-container">
        
            <?php include_once('includes/header.php');?>
            

            
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add</strong> New Department 
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Department Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                    <input type="text" id="departmentname" name="departmentname" placeholder="Department Name" class="form-control" required="true">
                                                    
                                                </div>
                                            </div>
                                            
                                
                                            
                                          <div class="card-footer">
                                        <p style="text-align: center;"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-sm">Add
                                        </button></p>
                                        
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                             </div>

<div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                         <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                  <th>Department  Name</th>
                 <th>Creation Date</th>
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
<?php
$ret=mysqli_query($con,"select * from departments");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td><?php  echo $row['departName'];?></td>
                  <td><?php  echo $row['creationDate'];?></td>
                  <td><a href="department.php?catid=<?php echo $row['id'];?>" onclick="return confirm('Do you really want to Delete ?');" class="btn btn-danger">Delete</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
                                    </table>
                                </div>


                        
                  </div>
                    </div>
               
 
<?php include_once('includes/footer.php');?>
   </div> </div>
            </div>
        </div>
</div>
    
    <script src="vendor/jquery-3.2.1.min.js"></script>
    
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    
    <script src="js/main.js"></script>

</body>

</html>

<?php }  ?>