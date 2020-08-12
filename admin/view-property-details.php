<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>

<!doctype html>
<html lang="en">

 
<head>
    
    <title>Real Estate Management System || View Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
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
                            <h2 class="pageheader-title">View Details </h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="add-country.php" class="breadcrumb-link">View Details</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">View Details</li>
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
                                <h5 class="card-header">View Details</h5>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post">
                            <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
  $uid=$_GET['viewid'];

$ret=mysqli_query($con,"select tblproperty.*,tbluser.*,tblcountry.CountryName,tblstate.StateName from tblproperty join tbluser on tbluser.ID=tblproperty.UserID join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.ID='$uid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                
                                <table border="1" class="table table-striped table-bordered first" >
                                <tr>
                                    <th >Full Name </th>
                                    <td style="padding-left: 10px"><?php  echo $row['FullName'];?></td>
                                </tr>
                                <tr>
                                    <th>Mobile Number </th>
                                    <td style="padding-left: 10px"><?php  echo $row['MobileNumber'];?></td>
                                </tr>
                                <tr>
                                    <th>Email </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Email'];?></td>
                                </tr>
                                <tr>
                                    <th>Property Title </th>
                                    <td style="padding-left: 10px"><?php  echo $row['PropertyTitle'];?></td>
                                </tr>
                                <tr>
                                    <th>Property Description </th>
                                    <td style="padding-left: 10px"><?php  echo $row['PropertDescription'];?></td>
                                </tr>
                                <tr>
                                    <th>Type </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Type'];?></td>
                                </tr>
                                <tr>
                                    <th>Status </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Status'];?></td>
                                </tr>
                                <tr>
                                    <th>Property Title </th>
                                    <td style="padding-left: 10px"><?php  echo $row['PropertyTitle'];?></td>
                                </tr>
                                <tr>
                                    <th>Location </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Location'];?></td>
                                </tr>
                                <tr>
                                    <th>Bedrooms </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Bedrooms'];?></td>
                                </tr>
                                <tr>
                                    <th>Bathrooms </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Bathrooms'];?></td>
                                </tr>
                                <tr>
                                    <th>Floors </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Floors'];?></td>
                                </tr>
                                <tr>
                                    <th>Garages </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Garages'];?></td>
                                </tr>
                                <tr>
                                    <th>Area </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Area'];?></td>
                                </tr>
                                <tr>
                                    <th>Rent/salePrice </th>
                                    <td style="padding-left: 10px"><?php  echo $row['RentorsalePrice'];?></td>
                                </tr>
                                <tr>
                                    <th>Before Price label </th>
                                    <td style="padding-left: 10px"><?php  echo $row['BeforePricelabel'];?></td>
                                </tr>
                                <tr>
                                    <th>After Price label </th>
                                    <td style="padding-left: 10px"><?php  echo $row['AfterPricelabel'];?></td>
                                </tr>
                                <tr>
                                    <th>Garages </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Garages'];?></td>
                                </tr>
                                <tr>
                                    <th>PropertyID </th>
                                    <td style="padding-left: 10px"><?php  echo $row['PropertyID'];?></td>
                                </tr>
                                <table border="1" class="table table-striped table-bordered first">
                                    <hr>
                                    <p style="color: red">Property Features</p>
                                <tr>
                                    <th>Center Cooling </th>
                                    <?php  if($row['CenterCooling']=="1"){ ?>

                                   <td > <input type="checkbox" name="centercolling" id="centercolling" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="centercolling" id="centercolling"></td> <?php } ?>

                                </tr>

                                <tr>
                                    <th>Balcony </th>
                                    <?php  if($row['Balcony']=="1"){ ?>

                                   <td > <input type="checkbox" name="balcony" id="balcony" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="balcony" id="balcony"></td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Pet Friendly </th>
                                    <?php  if($row['PetFriendly']=="1"){ ?>
                                    <td > <input type="checkbox" name="petfrndly" id="petfrndly" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="petfrndly" id="petfrndly"></td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Barbeque </th>
                                    <?php  if($row['Barbeque']=="1"){ ?>
                                    <td > <input type="checkbox" name="barbeque" id="barbeque" value="1"checked='true'></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="barbeque" id="barbeque"></td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Fire Alarm </th>
                                    <?php  if($row['FireAlarm']=="1"){ ?>
                                    <td > <input type="checkbox" name="firealarm" id="firealarm" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="firealarm" id="firealarm"></td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Storage </th>
                                    <?php  if($row['Storage']=="1"){ ?>
                                    <td > <input type="checkbox" name="storage" id="storage" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="storage" id="storage"></td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Dryer </th>
                                     <?php  if($row['Dryer']=="1"){ ?>
                                    <td > <input type="checkbox" name="dryer" id="dryer" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="dryer" id="dryer">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Heating </th>
                                    <?php  if($row['Heating']=="1"){ ?>
                                    <td > <input type="checkbox" name="heating" id="heating" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="heating" id="heating">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Pool </th>
                                    <?php  if($row['Pool']=="1"){ ?>
                                    <td > <input type="checkbox" name="pool" id="pool" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="Pool" id="Pool">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Laundry </th>
                                    <?php  if($row['Laundry']=="1"){ ?>
                                    <td > <input type="checkbox" name="laundry" id="laundry" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="Laundry" id="Laundry">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Sauna </th>
                                    <?php  if($row['Sauna']=="1"){ ?>
                                    <td > <input type="checkbox" name="sauna" id="sauna" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="sauna" id="sauna">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Gym </th>
                                    <?php  if($row['Gym']=="1"){ ?>
                                    <td >  <input type="checkbox" name="gym" id="gym" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="gym" id="gym">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Elevator </th>
                                    <?php  if($row['Elevator']=="1"){ ?>
                                    <td >  <input type="checkbox" name="elevator" id="elevator" value="1"checked='true'></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="elevator" id="elevator">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Dish Washer </th>
                                    <?php  if($row['DishWasher']=="1"){ ?>
                                    <td >  <input type="checkbox" name="dishwasher" id="dishwasher" value="1" checked="true"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="dishwasher" id="dishwasher">
                                            </td> <?php } ?>
                                </tr>
                                <tr>
                                    <th>Emergency Exit </th>
                                     <?php  if($row['EmergencyExit']=="1"){ ?>
                                   <td >  <input type="checkbox" name="eexit" id="eexit" value="1"></td>
                                   <?php } else { ?>
                                    <td> <input type="checkbox" name="eexit" id="eexit">
                                            </td> <?php } ?>
                                </tr>
                                </table>
                                <table border="1" class="table table-striped table-bordered first">
                                    <hr>
                                    <p style="color: red">Property Images</p>
                                <tr>
                                    <th>Featured Image </th>
                                    <td style="padding-left: 10px"><img src="../propertyimages/<?php echo $row['FeaturedImage'];?>" width="200" height="150" value="<?php  echo $row['FeaturedImage'];?>"></td>
                                </tr>
                                <tr>
                                    <th>Gallery Image1 </th>
                                    <td style="padding-left: 10px"><img src="../propertyimages/<?php echo $row['GalleryImage1'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage1'];?>"></td>
                                </tr>
                                <tr>
                                    <th>Gallery Image2 </th>
                                    <td style="padding-left: 10px"><img src="../propertyimages/<?php echo $row['GalleryImage2'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage2'];?>"></td>
                                </tr>
                                <tr>
                                    <th>Gallery Image3 </th>
                                    <td style="padding-left: 10px"><img src="../propertyimages/<?php echo $row['GalleryImage3'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage3'];?>"></td>
                                </tr>
                                <tr>
                                    <th>Gallery Image4 </th>
                                    <td style="padding-left: 10px"><img src="../propertyimages/<?php echo $row['GalleryImage4'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage4'];?>"></td>
                                </tr>
                                <tr>
                                    <th>Gallery Image5 </th>
                                    <td style="padding-left: 10px"><img src="../propertyimages/<?php echo $row['GalleryImage5'];?>" width="200" height="150" value="<?php  echo $row['GalleryImage5'];?>"></td>
                                </tr>
                            </table>
                            <table border="1" class="table table-striped table-bordered first"> <hr>
                                    <p style="color: red">Property Address</p>
                                <tr>
                                    <th>Address </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Address'];?></td>
                                </tr>
<tr>
<th>Country </th>
<td style="padding-left: 10px"><?php  echo $row['CountryName'];?></td>
</tr>

  <tr>
<th>State </th>
<td style="padding-left: 10px"><?php  echo $row['StateName'];?></td>
</tr>


<tr>
<th>City </th>
<td style="padding-left: 10px"><?php  echo $row['City'];?></td>
</tr>
                              
                               
                                <tr>
                                    <th>Zip Code </th>
                                    <td style="padding-left: 10px"><?php  echo $row['ZipCode'];?></td>
                                </tr>
                                <tr>
                                    <th>Neighborhood </th>
                                    <td style="padding-left: 10px"><?php  echo $row['Neighborhood'];?></td>
                                </tr>
                                <tr>
                                    <th>Listing Date </th>
                                    <td style="padding-left: 10px"><?php  echo $row['ListingDate'];?></td>
                                </tr>
                                
                                
                                </table>
                                
                            
                        
                        </div>
                    </div>
 <?php } ?>
    
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