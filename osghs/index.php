<?php
include('admin/includes/dbconnection.php');
session_start();
error_reporting(0);
 if(isset($_POST['submit']))
  {

$booknum=mt_rand(100000000, 999999999);
     $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mobnum=$_POST['mobnum'];
    $add=$_POST['add'];
   $reqnum=$_POST['reqnum'];
   $shift=$_POST['shift'];
   $gender=$_POST['gender'];
 
$sql="insert into tblhiring(BookingNumber,FirstName,LastName,Email,MobileNumber,Address,RequirementNumber,Shift,Gender)values(:booknum,:fname,:lname,:email,:mobnum,:add,:reqnum,:shift,:gender)";
$query=$dbh->prepare($sql);
$query->bindParam(':booknum',$booknum,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
$query->bindParam(':add',$add,PDO::PARAM_STR);
$query->bindParam(':reqnum',$reqnum,PDO::PARAM_STR);
$query->bindParam(':shift',$shift,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
 $query->execute();
   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo '<script>alert("Hiring request has been book successfully. Booking Number is "+"'.$booknum.'")</script>';
echo "<script>window.location.href ='index.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>SECURE-G</title>	
	<script src="https://cdn.tailwindcss.com"></script>

	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/nice-select.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/> -->
	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style.css"/>
</head>
<body class='bg-white'>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<!-- Navbar Section -->
	<header class="header-section text-black">
    
		<div class="header-bottom">		
			<div class="text-black font-bold text-2xl">
				<ul class="grid grid-cols-5 gap-4">
					<li class='text-black'><a href="index.php" >SECURE-G</a></li>
					<li class='text-black'><a href="home.php" >Home</a></li>
					<li class='text-black'><a href="index.php">Hiring Form</a></li>
					<li class='text-black'><a href="search-request.php">Request Status</a></li>
					<li class='text-black'><a href="admin/login.php">Admin</a></li>
				</ul>
			</div>
		</div>
	</header>

	<section class="mx-20">
		<img class='h-[450px] m-20 mx-auto rounded-xl shadow shadow-indigo-400' src="img\secure-g.jpeg" alt="hero img">

		<div class='text-2xl font-bold text-center text-black'>Hiring Form</div>
	</section>

<form method="post" value="" class='text-black'>
    <div>
        <label for="name">First Name:</label>
		<span class="error">  *  </span>
        <input type="text"  placeholder="First Name" id="name" name="fname" class="form-control w-full" required pattern="[A-Za-z]+" title="Only alphabets are allowed">
        <span class="error"></span>
    </div>							

    <div>
        <label for="name">Last Name:</label>
		<span class="error">  *  </span>
        <input type="text" placeholder="Last Name" id="name" name="lname" class="form-control w-full" required pattern="[A-Za-z]+" title="Only alphabets are allowed">
        <span class="error"></span>
    </div>
	<div>
		<label for="email">Email:</label>
		<span class="error">  *  </span>
		<input type="email" placeholder="Email"  class="form-control w-full" id="email" name="email" required>
		<span style="color: red;"></span>
	</div>
    <div>
        <label for="phone">Mobile Number:</label>
		<span class="error">  *  </span>
        <input type="phone"  placeholder="Phone Number" class="form-control w-full" id="phone" name="mobnum" value=""  required='true' required pattern="[0-9]{10}" title="Please enter exactly 10 digits">
    </div>
						
	<div class="col-md-12">
		<label style="padding-bottom: 10px;">Shift Requirement: *</label>
	
		<select name="shift" required="true" class="form-control w-full">
			<option value="">Choose Shift</option>
			<option value="Day">Day</option>
			<option value="Night">Night</option>
			<option value="24hrs">24hrs</option>
		</select>
	</div>
	<div class="col-md-12">
		<label style="padding-top: 10px;">Gender: *</label>
		<select name="gender" required="true" class="form-control w-full">
			<option value="">Choose Gender</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
	</div>
	<br>
	<div class="col-md-12">
		<label for="pdfFile">Select Addhar Card PDF file: *</label><br>
		<input type="file" id="pdfFile" name="addharpdfFile" class='w-full' required><br><br>	
	</div>
	<br>
	<div class="col-md-12">
		<label for="pdfFile">Select PAN Card PDF file: *</label><br>
		<input type="file" id="pdfFile" name="panpdfFile" class='w-full' required><br><br>	
	</div>
	<br>
	<div class="col-md-12">
		<label style="padding-top: 10px;">Address: *</label>
		<textarea placeholder="Enter Address" name="add" required="true"></textarea>
			<input type="submit" class="btn btn-primary w-full" value="send" name="submit" required>
	</div>
</form>
  
    
	
	<!--====== Javascripts & Jquery ======-->
	<script src="js/vendor/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">    
  
	<footer class='text-center'>
		<p>&copy; 2023 SECURE-G</p>
	</footer>

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