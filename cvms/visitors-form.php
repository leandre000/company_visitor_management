<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (strlen($_SESSION['cvmsaid']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $cvmsaid = $_SESSION['cvmsaid'];
        $fullname = $_POST['fullname'];
        $mobnumber = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $add = $_POST['address'];
        $whomtomeet = $_POST['whomtomeet'];
        $department = $_POST['department'];
        $reasontomeet = $_POST['reasontomeet'];

        $query = mysqli_query($con, "INSERT INTO tblvisitor (FullName, Email, MobileNumber, Address, WhomtoMeet, Deptartment, ReasontoMeet) VALUES ('$fullname','$email','$mobnumber','$add','$whomtomeet','$department','$reasontomeet')");

        if ($query) {
            echo "<script>alert('Visitor Details added successfully');</script>";
            echo "<script>window.location.href = 'visitors-form.php'</script>";
        } else {
            echo "<script>alert('Something Went wrong. Please Try again');</script>";
            echo "<script>window.location.href = 'visitors-form.php'</script>";
        }
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
                                        <strong>Add</strong> New Visitors
                                    </div>
                                    <div class="card-body card-block">
    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Full Name</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="form-control" required="">
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="email-input" class=" form-control-label">Email Input</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" required="">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="password-input" class=" form-control-label">Phone Number</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="mobilenumber" name="mobilenumber" placeholder="Mobile Number" class="form-control" maxlength="10" required="">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="textarea-input" class=" form-control-label">Address</label>
            </div>
            <div class="col-12 col-md-9">
                <textarea name="address" id="address" rows="5" placeholder="Enter Visitor Address..." class="form-control" required=""></textarea>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="password-input" class=" form-control-label">Whom to Meet</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="whomtomeet" name="whomtomeet" placeholder="Whom to Meet" class="form-control" required="">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="text-input" class=" form-control-label">Department</label>
            </div>
            <div class="col-12 col-md-9">
                <select name="department" class="form-control" required>
                    <option value="">Select</option>
                    <option value="account">Account</option>
                    <option value="it">IT</option>
                    <option value="food">Food</option>
                    
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label for="password-input" class=" form-control-label">Reason To Meet</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="reasontomeet" name="reasontomeet" placeholder="Reason To Meet" class="form-control" required="">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

                                        </form>
                                    </div>
                                </div>
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

<script src="vendor/slick/slick.min.js"></script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js"></script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
