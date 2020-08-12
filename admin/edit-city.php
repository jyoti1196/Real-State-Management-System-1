<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$cid=intval($_GET['ctyid']);
$cmsaid=$_SESSION['remsaid'];
$countryid=$_POST['country'];
$stateid=$_POST['state'];
$cityname=$_POST['cityname'];


 $query=mysqli_query($con,"update tblcity set CountryID='$countryid',StateID='$stateid',CityName='$cityname' where ID='$cid'");

    if ($query) {
    echo '<script>alert("City has been Updated.")</script>';
echo "<script>window.location.href ='manage-city.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}

?>

<!doctype html>
<html lang="en">

 
<head>
    
    <title>Real Estate Management System || Add City</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <script>
function getsate(val) {
  $.ajax({

type:"POST",
url:"get-sate.php",
data:'$countryid='+val,
success:function(data){
$("#state").html(data);
}

  });
}
</script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       
         <?php include_once('includes/header.php');?>
       
       <?php include_once('includes/sidebar.php');?>
       
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Add City </h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page">Add City</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add City</h5>
                                <div class="card-body">
                                    <form  method="post">
              
                                           <?php
$cid=intval($_GET['ctyid']);
$ret=mysqli_query($con,"select tblcountry.CountryName as ctryname,tblcountry.ID as ctryid,tblstate.StateName as stname,tblstate.ID as stid,tblcity.ID as cityid,tblcity.CityName from  tblcity inner join tblcountry on tblcountry.ID=tblcity.CountryID join tblstate on tblstate.ID=tblcity.StateID where tblcity.ID='$cid' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                                       <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Country Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
<select type="text" name="country" id="country" required="true" onChange="getsate(this.value)" class="form-control">
<option value="<?php echo $row['ctryid'];?>"><?php echo $row['ctryname'];?></option>
 <?php $query=mysqli_query($con,"select * from tblcountry");
while($rw=mysqli_fetch_array($query))
{
?>      
<option value="<?php echo $rw['ID'];?>"><?php echo $rw['CountryName'];?></option>
<?php } ?>
</select>
</select>

</div>
</div>

<div class="form-group row">
 <label class="col-12 col-sm-3 col-form-label text-sm-right">State Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<select type="text" name="state" id="state" required="true" class="form-control">
<option value="<?php echo $row['stid'];?>"><?php echo $row['stname'];?></option>
        
</select>
</div>
</div>

<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">City Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" name="cityname" id="cityname" required="true" value="<?php echo $row['CityName'];?>"  class="form-control">
</div>
</div>
          <?php } ?>                          
<div class="form-group row text-right">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<p style="text-align: center;"> <button type="submit" class="btn btn-space btn-primary" name="submit">Submit</button></p>
</div>
</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
           
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
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
    <script src="assets/vendor/parsley/parsley.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>
 
</html>
<?php }  ?>