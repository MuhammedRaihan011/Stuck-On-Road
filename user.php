<?php

include 'header.php';
include 'connection.php';
?>
<style>
    td,
    th {
        padding: 10px;
        ;
    }
</style>
<div style="margin: 50px 20px 20px 150px;">
    <h1>User registration</h1><br>
    <form method="POST">

        <table>

            <tr>
                <td>Name</td>
                <td><input type="text" name="txtName" class="form-control" required pattern="[a-zA-Z ]+" /></td>
            </tr>

            <tr>
                <td>Contact</td>
                <td><input type="text" name="txtContact" class="form-control" required pattern="[6789][0-9]{9}" /></td>
            </tr>


            <tr>
                <td>Email</td>
                <td><input type="email" name="txtEmail" class="form-control" required /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txtPassword" class="form-control" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$" title="MUST BE 8 CHAR A DIGIT & CONTAIN A SPECIALCHAR "/></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" name="btnSubmit" class="btn btn-primary" value="REGISTER"></td>
            </tr>

        </table>

    </form>
    <?php
    if (isset($_REQUEST['btnSubmit'])) {

        $name = $_REQUEST['txtName'];

        $contact = $_REQUEST['txtContact'];
        $email = $_REQUEST['txtEmail'];
        $pwd = $_REQUEST['txtPassword'];

        $qry = "select count(*) from tbllogin where lcase(username)='$email'";
        $res = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($res);

        if ($row[0] > 0) {
            echo '<script>alert(" Already registered ....");</script>';
        } else {

            $qry1 = "insert into tbluser(uName,uContact,uEmail) values('$name','$contact','$email')";
            $res1 = mysqli_query($con, $qry1);

            if ($res1) {
                $qry1 = "insert into tbllogin(username,password,utype,status)values('$email','$pwd','user','1')";
                $res1 = mysqli_query($con, $qry1);
                echo '<script>alert(" Registration successfull ....");</script>';
                echo '<script>location.href="user.php"</script>';
            } else
                echo '<script>alert(" Registration failed ....");</script>';
            //            echo $qry1;

        }
    }
    ?>