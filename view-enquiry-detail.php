<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    
    $cid=$_GET['viewid'];
      $remark=$_POST['remark'];
      $status='Answer';
   $query=mysqli_query($con, "update  tblenquiry set Remark='$remark',Status='$status' where ID='$cid'");
    if ($query) {
    $msg="All remarks has been updated.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
} 

?>

 <!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
 
    <!-- Fonts
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
   
    <title>Real Estate Managment System|| Enquiry</title>
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <?php include_once('includes/header.php');?>
        
        <!-- Page Title #1
============================================ -->
        <section id="page-title" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/page-titles/1.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>Enquiry</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Home</a></li>
                                    <li class="active">Enquiry</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- .title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #page-title end -->

        <!-- #Add Property
============================================= -->
        <section id="add-property" class="add-property">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                 <?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select tblproperty.PropertyTitle,tblenquiry.* from tblenquiry join tblproperty on tblproperty.ID=tblenquiry.PropertyID where tblenquiry.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>        <div class="form-box">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <h4 class="form--title">Enquiry Detail</h4>
                                    </div>
                                    <!-- .col-md-12 end -->
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>Full Name</th>
                                   <td><?php  echo $row['FullName'];?></td>
                                   </tr>  
                                   <tr>
                                <th>Property Title</th>
                                   <td><?php  echo $row['PropertyTitle'];?></td>
                                   </tr>                           
<tr>
                                <th>Email</th>
                                   <td><?php  echo $row['Email'];?></td>
                                   </tr>
                                 
                                <tr>
                                <th>MobileNumber</th>
                                   <td><?php  echo $row['MobileNumber'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Message</th>
                                      <td><?php  echo $row['Message'];?></td>
                                  </tr>
                                      <tr>  
                                       <th>Enquiry Date</th>
                                        <td><?php  echo $row['EnquiryDate'];?></td>
                                    </tr>


<tr>
    <tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Unanswer Enquiry";
}
if($row['Status']=="Answer")
{
  echo "Answered Enquiry";
}

     ;?></td>
  </tr>
</table>

                                    </div>
   
                                </div>
               <table class="table mb-0">

<?php if(($row['Status']=="") and ($_SESSION['ut']=='1' || $_SESSION['ut']=="2")){ ?>


<form class="mb-0" method="post"  enctype="multipart/form-data" name="submit">
<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn--primary"></i> Update</button></td>
  </tr>
  </form>
<?php } else { ?>
<tr>
  <td colspan="2" style="text-align: center; color:blue"><strong>Broker / Owner Remark</strong></td>

</tr>
  <tr>
    <th>Remark</th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>


<tr>
<th>Remark date</th>
<td><?php echo $row['RemarkDate']; ?>  </td></tr>
<?php } ?>
</table>


  

  

<?php } ?>

                           
                           
                       
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
        </section>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>
        
        

        <!-- Footer #1
============================================= -->
        <?php include_once('includes/footer.php');?>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>
 <?php } ?>