<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['nid'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>সুরক্ষা : কোভিড-১৯ ভ্যাকসিনের জন্য নিবন্ধন করুন</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <style>
    .navbar{
    overflow: hidden;
    background: #fff;
    margin-top: -10px;
}


header .container label img {
    width: 220px; 
    height: 80px; 
    margin-bottom: 2px; 
    padding: 15px 10% 5px;
}
nav{
    
    width: 100%;
    background: #ffffff;
    position: top;
    left:0;
    right:0;
    top:0;
}
nav .logo{
    width: 20px;
    cursor: pointer;
}

nav ul{
    float: right;
    margin-right: 40px;
    align-items: center;
}
nav ul li{
    display: inline-block;
    margin: 5px 0px;
    line-height: 70px;
}
nav ul li a{
    color: #000000;
    font-size: 18px;
    border: 1px solid transparent;
    padding: 8px 22px;
    border-radius: 3px;
    transition: ease .40s;
    
}
nav ul li a.active ,a:hover{
border: 1px solid rgb(12, 19, 114);
background-color: rgb(199, 230, 219);
transition: .4s;
}
  </style>
</head>
<body>
  <header>
    <div class="container">
      <!-- Navigation bar -->
      <nav class="navbar">
        <label>
        <img src="image/logo.png" class="logo">
      </label>
        <ul>
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="#">Registration</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="#">Certificate</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="container">
    <h1 class="mt-5">Registration Form</h1>
    <form action="" method="post">
    <?php include 'connection.php'; 

    

   $ids=$_GET['id'];

   $showquery=" select * from applicant where id={$ids}";
   $showdata=mysqli_query($conn,$showquery);

   $showresult=mysqli_fetch_array($showdata);


   if(isset($_POST['submit']))
   {
    $category = $_POST['category'];
    $center = $_POST['center'];
    $division = $_POST['division'];
 

    $sql = "UPDATE applicant SET category='".$category."', 
    center='".$center."', 
    division='".$division."'
    WHERE id=$showresult[id]";
  
  if(mysqli_query($conn, $sql)){
  header('Location: userpage.php');
  
  
  }
  
  }




?>
<div class="mb-3">
        <label class="form-label" for="selecttype">Select type:</label>
        <select class="form-select" name="category" value="<?php echo $showresult['category']; ?>" id="selecttype" required>
          <option value="" disabled selected>Select type:</option>
          <option value="Citizen Registration (18 years & above)">Citizen Registration (18 years & above)</option>
          <option value="Foreign nationals">Foreign nationals</option>
          <option value="All officers and employees of the government health and family planning department">All officers and employees of the government health and family planning department </option>
          <option value="Approved private health and family planning officers-employees">Approved private health and family planning officers-employees</option>
          <option value="Bangladeshi Students">Bangladeshi Students</option>
          <option value="Bangladeshi workers">Bangladeshi workers</option>
          <option value="Military and paramilitary defense forces">Military and paramilitary defense forces</option>
          <option value="Civilian Aircraft">Civilian Aircraft</option>
          <option value="Essential Offices for governance the state">Essential Offices for governance the state</option>
          <option value="Bar Council Register Attorney">Bar Council Register Attorney</option>
          <option value="Educational Institutions">Educational Institutions</option>
          <option value="Front-line media workers">Front-line media workers</option>
          <option value="Elected Public representative">Elected Public representative</option>
          <option value="Front-line officers and employees of City Corporation and the municipality">Front-line officers and employees of City Corporation and the municipality</option>
          <option value="Religious Representative (of all religions)">Religious Representative (of all religions)</option>
          <option value="Engaged in burial">Engaged in burial</option>
          <option value="Government officials and employees at the forefront of emergency">Government officials and employees at the forefront of emergency </option>
          <option value="Electricity,water,gas,sewerage and fire services">Electricity,water,gas,sewerage and fire services</option>
          <option value="Government officials and employees of railway stations,airports,land ports and seaports">Government officials and employees of railway stations,airports,land ports and seaports</option>
          <option value="Government officials and employees Involved in emergency public service in districts and upazilas">Government officials and employees Involved in emergency public service in districts and upazilas</option>
          <option value="Bank officer-employee">Bank officer-employee</option>
          <option value="Farmer">Farmer</option>
          <option value="Workers">Workers </option>
          <option value="cat24">National players</option>
          <option value="Students in medical education related subjects">Students in medical education related subjects</option>
          <option value="Student 18 years and above">Student 18 years and above </option>
          <option value="Person with disability">Person with disability</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label" for="selecttype">Center :</label>
        <select class="form-select" name="center" value="<?php echo $showresult['vaccine_center']; ?>" id="selecttype" required>
          <option value="" disabled selected>Select center:</option>
          <option value="med1">Shahid Suhrawardy Medical College Hospital</option>
          <option value="Dhaka Medical College Hospital">Dhaka Medical College Hospital</option>
          <option value="Chittagong Medical College Hospital">Chittagong Medical College Hospital</option>
          <option value="med4">Rajshahi Medical College Hospital</option>
          <option value="med5">MAG osmani Medical College, Sylhet, Bangladesh</option>
          <option value="med6">Sher-e-Bangla Medical College Hospital (SBMC)</option>
          <option value="med7">Mymensingh Medical College Hospital</option>
          <option value="med8">Rangpur Medical College Hospital</option>
          <option value="med9">Shahid Ziaur Rahman Medical College Hospital</option>
          <option value="med10">Comilla Medical College Hospital</option>
          <option value="med11">Khulna Medical College Hospital</option>
          <option value="med12">Faridpur Medical College Hospital</option>
          <option value="med13">Dinajpur Medical College Hospital</option>
          <option value="med14">Noakhali Medical College</option>
          <option value="med15">Barguna District Hospital</option>
          <option value="med16">Jhalokathi District Hospital</option>
          <option value="med17">Bhola District Hospital</option>
          <option value="med18">Pirojpur District Hospital</option>
          <option value="med19">Patuakhali 250 bed Sadar Hospital</option>
          <option value="med20">Cox's Bazar 250 Bed District Sadar Hospital</option>
          <option value="med21">Gopalganj 250 bed General Hospital</option>
          <option value="med22">Kishoreganj 250 Bed District Sadar Hospital </option>
          <option value="med23"> Narsingdi District Hospital</option>
          <option value="med24">Jessore 250 bed General Hospital</option>
          <option value="med25">Jhenaidah District Hospital</option>
          <option value="med26">Nilphamari District Hospital</option>
          <option value="med27">Habiganj District Hospita</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label" for="selecttype">Division :</label>
        <select class="form-select" name="division" value="<?php echo $showresult['division']; ?>" id="selecttype" required>
          <option value="" disabled selected>Select division:</option>
          <option value="Chittagong">Chittagong</option>
          <option value="Dhaka">Dhaka</option>
          <option value="Sylhet">Sylhet</option>
          <option value="Mymensingh">Mymensingh</option>
          <option value="Khulna">Khulna</option>
          <option value="Rajshahi">Rajshahi</option>
          <option value="Rangpur">Rangpur</option>
          <option value="Barishal">Barishal</option>
        </select>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

  
</body>
</html>
