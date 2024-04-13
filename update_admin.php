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

   $showquery=" select * from admins where id={$ids}";
   $showdata=mysqli_query($conn,$showquery);

   $showresult=mysqli_fetch_array($showdata);


   if(isset($_POST['submit']))
   {
   
    $center = $_POST['center'];
    $division = $_POST['division'];
 

    $sql = "UPDATE admins SET 
    admin_center='".$center."', 
    admin_division='".$division."'
    WHERE id=$showresult[id]";
  
  if(mysqli_query($conn, $sql)){
  header('Location: adminpage.php');
  
  
  }
  
  }




?>



      <div class="mb-3">
        <label class="form-label" for="selecttype">Center :</label>
        <select class="form-select" name="center" value="<?php echo $showresult['vaccine_center']; ?>" id="selecttype" required>
          <option value="" disabled selected>Select center:</option>
          <option value="Shahid Suhrawardy Medical College Hospital">Shahid Suhrawardy Medical College Hospital</option>
          <option value="Dhaka Medical College Hospital">Dhaka Medical College Hospital</option>
          <option value="Chittagong Medical College Hospital">Chittagong Medical College Hospital</option>
          <option value="Rajshahi Medical College Hospital">Rajshahi Medical College Hospital</option>
          <option value="MAG osmani Medical College, Sylhet, Bangladesh">MAG osmani Medical College, Sylhet, Bangladesh</option>
          <option value="Sher-e-Bangla Medical College Hospital (SBMC)">Sher-e-Bangla Medical College Hospital (SBMC)</option>
          <option value="Mymensingh Medical College Hospital">Mymensingh Medical College Hospital</option>
          <option value="Rangpur Medical College Hospital">Rangpur Medical College Hospital</option>
          <option value="Shahid Ziaur Rahman Medical College Hospital">Shahid Ziaur Rahman Medical College Hospital</option>
          <option value="Comilla Medical College Hospital">Comilla Medical College Hospital</option>
          <option value="Khulna Medical College Hospital">Khulna Medical College Hospital</option>
          <option value="Faridpur Medical College Hospital">Faridpur Medical College Hospital</option>
          <option value="Dinajpur Medical College Hospital">Dinajpur Medical College Hospital</option>
          <option value="Noakhali Medical College">Noakhali Medical College</option>
          <option value="Barguna District Hospital">Barguna District Hospital</option>
          <option value="Jhalokathi District Hospital">Jhalokathi District Hospital</option>
          <option value="Bhola District Hospital">Bhola District Hospital</option>
          <option value="Pirojpur District Hospital">Pirojpur District Hospital</option>
          <option value="Patuakhali 250 bed Sadar Hospital">Patuakhali 250 bed Sadar Hospital</option>
          <option value="Cox's Bazar 250 Bed District Sadar Hospital">Cox's Bazar 250 Bed District Sadar Hospital</option>
          <option value="Gopalganj 250 bed General Hospital">Gopalganj 250 bed General Hospital</option>
          <option value="mKishoreganj 250 Bed District Sadar Hospital ">Kishoreganj 250 Bed District Sadar Hospital </option>
          <option value="Narsingdi District Hospital"> Narsingdi District Hospital</option>
          <option value="Jessore 250 bed General Hospital">Jessore 250 bed General Hospital</option>
          <option value="Jhenaidah District Hospital">Jhenaidah District Hospital</option>
          <option value="Nilphamari District Hospital">Nilphamari District Hospital</option>
          <option value="Habiganj District Hospital">Habiganj District Hospital</option>
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
