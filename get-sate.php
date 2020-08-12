<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');


 if(isset($_POST['$countryid'])){
 $cid=$_POST['$countryid'];

  $query=mysqli_query($con,"select * from tblstate where CountryID='$cid'"); ?>
<option value="">Select State</option>
  <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['ID'];?>"><?php echo $rw['StateName'];?></option>
                  

<?php }} 

//code for city
 if(isset($_POST['$stateid'])){
 $sid=$_POST['$stateid'];

 $query=mysqli_query($con,"select * from tblcity where StateID='$sid'"); ?>
<option value="">Select City</option>
 <?php
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['CityName'];?>"><?php echo $rw['CityName'];?></option>
                  

<?php }} ?>