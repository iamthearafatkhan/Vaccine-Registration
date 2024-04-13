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
  <!-- Link to Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
 
</head>
<body>
         <header>
         <header>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                <a href="admin_dash.php" class="btn btn-secondary">Back</a>
            </div></div></div>
         </header>

  <div class="container">
    <h1 class="mt-5">Registration Form</h1>
    <form action="" method="post" enctype="multipart/form-data">

    <?php
    include 'connection.php';

    $ids = $_GET['id'];

    $showquery = "SELECT * FROM applicant WHERE id={$ids}";
    $showdata = mysqli_query($conn, $showquery);
    $showresult = mysqli_fetch_assoc($showdata);

   
if(isset($_POST['submit'])) {
  $vac_name = $_POST['vaccine_name'];
  $vac_date = $_POST['vaccine_date'];

  $card_filename = $_FILES['card']['name'];
  $card_temp = $_FILES['card']['tmp_name'];
  $card_folder = "card/" . $card_filename;
  move_uploaded_file($card_temp, $card_folder);
  $card_folder = mysqli_real_escape_string($conn, $card_folder);

  
  $certificate_filename = $_FILES['certificate']['name'];
  $certificate_temp = $_FILES['certificate']['tmp_name'];
  $certificate_folder = "certificate/" . $certificate_filename;
  move_uploaded_file($certificate_temp, $certificate_folder);
  $certificate_folder = mysqli_real_escape_string($conn, $certificate_folder);

  $sql = "UPDATE applicant SET vaccine_name='$vac_name', 
    vaccine_date='$vac_date', 
    card='$card_folder', 
    certificate='$certificate_folder' 
    WHERE id=$ids";

  if(mysqli_query($conn, $sql)) {
    header('Location: admin_dash.php');
    exit();
  } else {
    echo "Error updating data: " . mysqli_error($conn);
  }
}
    ?>

      <div class="mb-3">
        <label for="fullName" class="form-label">Vaccine Name:</label>
        <input type="text" name="vaccine_name" class="form-control" id="fullName" value="<?php echo $showresult['vaccine_name']; ?>" required/>
      </div>
      <div class="mb-3">
        <label for="dateOfBirth" class="form-label">Vaccine Date:</label>
        <input type="date" name="vaccine_date" class="form-control" id="dateOfBirth" value="<?php echo $showresult['vaccine_date']; ?>" required/>
      </div>
      <div class="mb-3">
        <label class="form-label">Card (PDF):</label>
        <input type="file" name="card" accept=".pdf" class="form-control" required/>
      </div>
      <div class="mb-3">
        <label class="form-label">Certificate (PDF):</label>
        <input type="file" name="certificate" accept=".pdf" class="form-control" required/>
      </div>
      
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
  </div>

  
</body>
</html>
