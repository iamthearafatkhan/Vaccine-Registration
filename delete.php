<?php include 'connection.php'; ?>
<?php 

    $id=$_GET['id'];
    $delsql = "DELETE from applicant WHERE id=$id";
    if(mysqli_query($conn, $delsql)){
        header('Location: admin_dash.php');
    }
?>