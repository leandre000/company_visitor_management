<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['cvmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
 
$remark=$_POST['remark'];
 $query=mysqli_query($con,"update tblvisitor set remark='$remark' where  ID='$eid'");
 

    if ($query) {
    $msg="Visitors Remark has been Updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
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

    
    <title>CVSM Visitors Forms</title>

    
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

<body class="animsition">
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
                                        <strong>Visitor</strong>  Details
                                    </div>
                                    <div class="card-body card-block">
                                        
                                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblvisitor where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?><table border="1" class="table table-bordered mg-b-0">
                                            <tr>
    <th>Full Name</th>
    <td><?php  echo $row['FullName'];?></td>
    <th>Email</th>
    <td><?php  echo $row['Email'];?></td>
  </tr>

  <tr>
    <th>Mobile Number</th>
    <td><?php  echo $row['MobileNumber'];?></td>
    <th>Address</th>
    <td><?php  echo $row['Address'];?></td>
  </tr>
  <tr>
    <th>Whom to Meet</th>
    <td><?php  echo $row['WhomtoMeet'];?></td>
    <th>Deptartment</th>
    <td><?php  echo $row['Deptartment'];?></td>
  </tr>
  <tr>
    <th>Reason to Meet</th>
    <td><?php  echo $row['ReasontoMeet'];?></td>
    <th>Vistor Entring Time</th>
    <td><?php  echo $row['EnterDate'];?></td>
  </tr>


<?php if($row['remark']==""){ ?>
    <form method="post">
         <tr>
    <th>Outing Remark :</th>
    <td colspan="4">
    <textarea name="remark" placeholder="" rows="5" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>                               
 <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button></td>
  </tr>
                                        </form>
               <?php } else { ?>

<tr>
    <th>Outing Remark </th>
    <td><?php echo $row['remark']; ?></td>

<th>Out Time</th>
<td><?php echo $row['outtime']; ?>  </td> 
<?php } ?>
</tr>
</table>                        
                                    </div>
                                   
                                </div>
                       
                        </div>
                            </div>
    
<?php include_once('includes/footer.php');?>
                </div>
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
<?php }  ?>