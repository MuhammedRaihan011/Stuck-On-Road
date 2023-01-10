<?php
session_start();
include 'header.php';
include '../connection.php';
$email = $_SESSION['email'];
$qry = "select * from tblmechanic where mEmail ='$email'";
$res = mysqli_query($con, $qry);
$r = mysqli_fetch_array($res);

?>
<div style="margin: 50px">
    <h1 style="color: #00598E; font-family: sans-serif; text-shadow: 2px 2px #e398e2;">Welcome</h1>
</div>
<style>
    td,
    th {
        padding: 10px;
        ;
    }
</style>
<div style="margin: 50px 20px 20px 150px;">
    <h1>Profile</h1><br>
    <form method="POST">

        <table>

            <tr>
                <td>Name</td>
                <td><input type="text" value="<?php echo $r[0]; ?>" name="txtName" class="form-control" readonly="" required pattern="[a-zA-Z ]+" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="txtAddress" class="form-control" readonly=""><?php echo $r[1]; ?></textarea></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" value="<?php echo $r[2]; ?>" name="txtContact" class="form-control" readonly="" required pattern="[6789][0-9]{9}" /></td>
            </tr>
            <tr>
                <td>District</td>
                <td><input type="text" value="<?php echo $r[3]; ?>" name="txtDistrict" class="form-control" readonly="" required pattern="[a-zA-Z ]+" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" value="<?php echo $r[4]; ?>" readonly name="txtEmail" class="form-control" readonly="" required /></td>
            </tr>

            <!-- <tr><td colspan="2"><input type="submit" value="UPDATE" ></td></tr> -->
        </table>
    </form>
</div>