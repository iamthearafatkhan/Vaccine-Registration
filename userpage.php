<?php

session_start();
if (!isset($_SESSION['nid'])) {
    header("Location: login.php");
    exit;
}
include 'connection.php';
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      *{margin: 0; padding: 0; box-sizing: border-box;
    font-family: sans-serif;}
    .main-div{
        width: 100%;
    height: 100vh;
    display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
    }
    .center-div{
        position: relative;
    width: 90%;
    height: 80vh;
    background: -webkit-linear-gradient(left, #5DADE2, #00c6ff);
    padding: 20px 0 0 0;
    box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
    border-radius: 10px;
    }
    h1{
        font-size: 18px;
        color: #000;
        text-align: center;
        margin-top: -20px;
        margin-bottom: 20px;
    }
    table{
        border-collapse: collapse;
        background-color: #fff;
        box-shadow: 0 10px 20px 0 rgba(0,0,0,.03);
        border-radius: 10px;
        margin: auto;
    }
    th,td{
        border: 1px solid #f2f2f2;
        padding: 8px 30px;
        text-align: center;
        color: gray;
    }
    th{
        text-transform: uppercase;
        font-weight: 500;
    }
    td{
        font-size: 13px;
    }
    .fa{
        font-size: 18px;
    }
    .fa-edit{
        color: #63c76a;
    }
    .fa-edit{
        color: #ff0000;
    }
    a{
        text-decoration: none; display: flex;
        justify-content: center;
        text-align: center;
    }

    </style>
</head>
<body>

<header>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-4">
                <a href="super.php" class="btn btn-secondary">Back</a>
            </div>
            <div class="col-md-4">
                <form method="GET" action="">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search Applicant">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>





<div class="main-div">
    <h1>Vaccine Applicants</h1>
    <div class="center-div">
        <div class="table-responsive">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>NID</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Division</th>
                    <th>Center</th>
                    <th>Vaccine Name</th>
                    <th>Vaccine Date</th>
                    <th>Card</th>
                    <th>Certificate</th>
                    <th colspan="2">Operation</th>
                </tr>
                </thead>
                <tbody>

                <?php
                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT a.id, a.full_name, a.nid, a.phone, c.category_name, d.division_name, ce.center_name, a.vaccine_name, a.vaccine_date, a.card, a.certificate
                            FROM applicant a
                            JOIN category_table c ON a.category = c.id
                            JOIN division_table d ON a.division = d.id
                            JOIN center_table ce ON a.center = ce.id
                            WHERE a.id LIKE '%$search%'
                            OR a.full_name LIKE '%$search%'
                            OR a.nid LIKE '%$search%'
                            OR a.phone LIKE '%$search%'
                            OR c.category_name LIKE '%$search%'
                            OR d.division_name LIKE '%$search%'
                            OR ce.center_name LIKE '%$search%'
                            OR a.vaccine_name LIKE '%$search%'
                            OR a.vaccine_date LIKE '%$search%'
                            OR a.card LIKE '%$search%'
                            OR a.certificate LIKE '%$search%'";
                } else {
                    $sql = "SELECT a.id, a.full_name, a.nid, a.phone, c.category_name, d.division_name, ce.center_name, a.vaccine_name, a.vaccine_date, a.card, a.certificate
                            FROM applicant a
                            JOIN category_table c ON a.category = c.id
                            JOIN division_table d ON a.division = d.id
                            JOIN center_table ce ON a.center = ce.id";
                }

                $query = mysqli_query($conn, $sql);
                $nums = mysqli_num_rows($query);

                while ($result = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                        <td><?php echo $result['id']; ?></td>
                        <td><?php echo $result['full_name']; ?></td>
                        <td><?php echo $result['nid']; ?></td>
                        <td><?php echo $result['phone']; ?></td>
                        <td><?php echo $result['category_name']; ?></td>
                        <td><?php echo $result['division_name']; ?></td>
                        <td><?php echo $result['center_name']; ?></td>
                        <td><?php echo $result['vaccine_name']; ?></td>
                        <td><?php echo $result['vaccine_date']; ?></td>
                        <td><?php echo $result['card']; ?></td>
                        <td><?php echo $result['certificate']; ?></td>
                        <td> <a href="updatepage.php?id=<?php echo $result['id']; ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update"> <i class="fa fa-edit" aria-hidden="true"></i> </a></td>
                        <td> <a href="delete.php?id=<?php echo $result['id'];  ?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Update"> <i class="fa fa-trash" aria-hidden="true"></i> </a></td>
    
</tr>
                    <?php
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>