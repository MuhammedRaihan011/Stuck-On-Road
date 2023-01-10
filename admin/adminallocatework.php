<?php
session_start();
include '../connection.php';
$wemail=$_GET['id'];
$wid=$_SESSION['wid'];
$q="insert into tblworkallocation (workId,wEmail,status) values('$wid','$wemail','allocated')";
$s=mysqli_query($con,$q);
if($s)
{
    $q="update tblworkrequest set status='allocated' where workId='$wid'";
    $s=mysqli_query($con,$q);
    
}
echo '<script>location.href="adminviewwork.php"</script>';
