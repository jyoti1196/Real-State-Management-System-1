<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsaid']==0)) {
  header('location:logout.php');
  } else{

//code for uprove the review
 if(isset($_GET['rid']))
 {   
$rvid=intval($_GET['rid']);
$query=mysqli_query($con,"update tblfeedback set Is_Publish='0' where id='$rvid'");
 echo '<script>alert("Review unapproved.")</script>';
echo "<script>window.location.href='unapproved-reviews.php'</script>";
}

//Delete the review
if (isset($_GET['delrid'])) {
$rid=intval($_GET['delrid']);
$query=mysqli_query($con,"delete from tblfeedback where id='$rvid'");
 echo '<script>alert("Review deleted.")</script>';
echo "<script>window.location.href='new-reviews.php'</script>";
}
 ?>
<!doctype html>
<html lang="en">
 
<head>
   
    <title>Real Estate Managment System || Manage Reviews</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
         <?php include_once('includes/header.php');?>
        
        <?php include_once('includes/sidebar.php');?>
       
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Reviews</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="manage-city.php" class="breadcrumb-link"> Reviews</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Approved Reviews</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Approved Reviews</h5>
                            <div class="card-body">
                                <div class="table-responsive">
<table class="table table-striped table-bordered first">
                                        <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
            
                  <th>User name</th>
                    <th>Property </th> 
                    <th>Review</th>    
                     <th>Review Date</th>   
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    
<?php $pid=intval($_GET['proid']);
$qry=mysqli_query($con,"select tblfeedback.id as rid,tblfeedback.UserRemark,tblfeedback.PostingDate,tbluser.FullName,tblproperty.PropertyTitle,tblproperty.ID as pid,tbluser.ID as uid from tblfeedback join tbluser on tbluser.ID=tblfeedback.UserId join tblproperty on tblproperty.ID=tblfeedback.PropertyId where tblfeedback.Is_Publish='1'"); 
$cnt=1;
while ($row=mysqli_fetch_array($qry)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                  <td>
<a href="view-users-details.php?viewid=<?php  echo $row['uid'];?>"><?php  echo $row['FullName'];?></a></td>
<td><a href="view-property-details.php?viewid=<?php  echo $row['pid'];?>"><?php  echo $row['PropertyTitle'];?></a></td>
                   <td><?php  echo $row['UserRemark'];?></td>
                   <td><?php  echo $row['PostingDate'];?></td>
<td><a href="approved-review.php?rid=<?php echo $row['rid'];?>" onclick="return confirm('Do you really want to Unapprove this review ?')">Unapprove</a> | 
    <a href="approved-review.phpdelrid=<?php echo $row['rid'];?>" onclick="return confirm('Do you really want to delete ?')>">Delete</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
                                        </tbody>
                                     
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
               
               
                
                
            </div>
            <!-- ============================================================== -->
            <?php include_once('includes/footer.php');?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="../../../../../cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
     <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="../../../../../cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="../../../../../cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="../../../../../cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html>
<?php }  ?>