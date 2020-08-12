<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//code for state
 if(isset($_POST['$countryid'])){
 $cid=$_POST['$countryid'];

  $query=mysqli_query($con,"select * from tblstate where CountryID='$cid'");
    while($rw=mysqli_fetch_array($query))
    {
     ?>      
 <option value="<?php echo $rw['ID'];?>"><?php echo $rw['StateName'];?></option>
                  

<?php }}
?>
