<?php
include '../connection.php';
$id = $_GET['id'];
$status = $_GET['status'];
$q = "update tblworkrequest set status='$status' where workId='$id'";
$s = mysqli_query($con, $q);
if ($s) {
    $q = "update tblworkallocation set status='$status' where workId='$id'";
    $s = mysqli_query($con, $q);
    if ($s)
        echo '<script>location.href="mechanicworkrequest.php"</script>';
}
