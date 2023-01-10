<?php
include '../connection.php';
$id=$_GET['id'];
$status=$_GET['status'];
$q="update  tbllogin set status='$status' where username='$id'";
$s=mysqli_query($con,$q);
echo '<script>location.href="adminmechanic.php"</script>';
