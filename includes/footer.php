 <?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
 <footer id="footer" class="footer footer-1 bg-white">
            <!-- Widget Section
    ============================================= -->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 widget--about">
                            <div class="widget--content">
                                <?php

                    
$ret=mysqli_query($con,"select * from tblpage where PageType='contactus'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <div class="footer--logo">
                                    <img src="assets/images/logo/logo-dark3.png" alt="logo">
                                </div>
                                <p><?php  echo $row['PageDescription'];?></p>
                                <div class="footer--contact">
                                    <ul class="list-unstyled mb-0">
                                        <li>+<?php  echo $row['MobileNumber'];?></li>
                                        <li> <p><?php  echo $row['Email'];?></p></li>
                                    </ul>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 col-md-offset-1 widget--links">
                            <div class="widget--title">
                                <h5>Company</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="about.php">About us</a></li>
                                    <li><a href="contact.php">Contact us</a></li>
                                   <li><a href="properties-grid.php">Properties</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 widget--links">
                            <div class="widget--title">
                                <h5>More Links</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="admin/login.php">Admin</a></li>
                                    <li><a href="index.php">Home</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget--newsletter">
                            <img src="assets/images/about/download.jpg" width="500" height="300" alt="logo">
                        </div>
                        <!-- .col-md-4 end -->

                    </div>
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-widget end -->

            <!-- Copyrights
    ============================================= -->
            <div class="footer--copyright text-center">
                <div class="container">
                    <div class="row footer--bar">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <span>© 2019 , Real Estate Management System.</span>
                        </div>

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-copyright end -->
        </footer>