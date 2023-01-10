<?php
session_start();
include 'header.php';
include '../connection.php';
$email = $_SESSION['email'];
$qry = "select * from tbluser where uEmail ='$email'";
$res = mysqli_query($con, $qry);
$r = mysqli_fetch_array($res);
?>
<style>
    td,
    th {
        padding: 10px;
        ;
    }
</style>
<div style="margin: 50px 20px 20px 150px;">
    <h1 align="center">Profile</h1><br>
    <form method="POST">

        <table align="center">

            <tr>
                <td>Name</td>
                <td><input type="text" value="<?php echo $r[0]; ?>" name="txtName" class="form-control" readonly required pattern="[a-zA-Z ]+" /></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" value="<?php echo $r[1]; ?>" name="txtContact" readonly class="form-control" required pattern="[6789][0-9]{9}" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" value="<?php echo $r[2]; ?>" readonly name="txtEmail" class="form-control" readonly required /></td>
            </tr>


        </table>
    </form>
</div>