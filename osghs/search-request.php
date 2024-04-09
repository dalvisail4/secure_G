<?php
include('admin/includes/dbconnection.php');
session_start();
error_reporting(0);
 
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>SECURE-G |Search Request</title>	
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
	<script src="https://cdn.tailwindcss.com"></script>

	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Navbar Section -->
	<header class="header-section text-black">
    
		<div class="header-bottom">		
			<div class="text-black font-bold text-2xl">
				<ul class="grid grid-cols-5 gap-4">
					<li class='text-blue-600'><a href="index.php" >SECURE-G</a></li>
					<li class='text-blue-600'><a href="home.php" >Home</a></li>
					<li class='text-blue-600'><a href="index.php">Hiring Form</a></li>
					<li class='text-blue-600'><a href="search-request.php">Request Status</a></li>
					<li class='text-blue-600'><a href="admin/login.php">Admin</a></li>
				</ul>
			</div>
		</div>
	</header>
	
	<section class="mx-20">
		<img class='h-[450px] m-20 mx-auto rounded-xl shadow shadow-indigo-400' src="img\harsh.jpg" alt="hero img">

		<div class='text-2xl font-bold text-center'>Search Request</div>
	</section>
	

	<!-- Page top Section end -->

	<!-- Contact Section -->
	<section class="contact-page-section spad overflow-hidden mx-20">
		<div class="container">
			
			<div class="row">
		
				<div class="col-lg-8">
					<form class="singup-form contact-form" method="post">
						<div class="row">
							<div class="col-md-12">
								<label class='mb-2 text-center'>Search Booking</label>
								<input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Enter Your Booking Number">
							</div>
							<br>
							<div class="col-md-12">
								 <button type="submit" class="btn btn-primary text-center border p-4 shadow shadow-xl rounded-xl hover:bg-indigo-600 hover:text-white bg-indigo-200" name="search" id="submit">Search</button>
							</div>
						</div>
					</form>
				</div>
<div class="form-body">
                  <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Booking Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Name of Guard</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php
$sql="SELECT * from tblhiring where BookingNumber like '$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                  <tr>
                    <td><?php echo htmlentities($cnt);?></td>
                    <td><?php  echo htmlentities($row->BookingNumber);?></td>
                    <td><?php  echo htmlentities($row->FirstName);?> <?php  echo htmlentities($row->LastName);?>
                    </td>
                    <td><?php  echo htmlentities($row->Email);?></td>
                    <td> <?php  echo htmlentities($row->MobileNumber);?></td>
                    <?php if($row->Status==""){ ?>

                     <td><?php echo "Not Updated Yet"; ?></td>


<?php } else { ?>
                                        <td>
                                            <span class="badge badge-primary"><?php  echo htmlentities($row->Status);?></span>
                                        </td>
<?php } ?> 
<?php if($row->Status==""){ ?>
 	 <td><?php echo "Not Updated Yet"; ?></td>
 	<?php } ?>
 <?php if($row->Status=="Rejected"){ ?>
 	 <td><?php echo "Rejected"; ?></td>
 	 <?php } else { ?>
                    <td> <?php  echo htmlentities($row->GuardAssign);?></td><?php } ?>
                  </tr>
                  </tbody>

                  <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
  <?php } }?>
                 

                </table>

              </div>

			</div>
		</div>
	</section>
	<!-- Trainers Section end -->

	
	<footer class='text-center'>
		<p>&copy; 2023 SECURE-G</p>
	</footer>

	<!-- Search model -->
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

	</body>
</html>

