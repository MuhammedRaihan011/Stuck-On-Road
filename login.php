<?php
session_start();
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
<div style="margin: 50px 20px 20px 380px;">
    <h1>Login</h1><br>
    <form method="POST">

        <table>
            <tr>
                <td>Email</td>
                <td><input type="email" class="form-control" name="txtEmail" required /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" class="form-control" name="txtPassword" required /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="btnSubmit" class="btn btn-primary" value="LOGIN"></td>
            </tr>
        </table>
    </form>
</div>
<?php
if (isset($_REQUEST['btnSubmit'])) {

    $email = $_REQUEST['txtEmail'];
    $pwd = $_REQUEST['txtPassword'];
    $qry = "select count(*) from tbllogin where lcase(username)='$email'";
    $res = mysqli_query($con, $qry);
    $row = mysqli_fetch_array($res);

    if ($row[0] == 0) {
        echo '<script>alert(" User doesnt exist ....");</script>';
    } else {

        $_SESSION['email'] = $email;    //creating a session variable
        $q = "select * from tbllogin where username='$email'";
        $s = mysqli_query($con, $q);
        $r = mysqli_fetch_array($s);
        if ($r[1] == $pwd)  //to check the password entered by user with the password in database
        {
            if ($r[3] == "1")  //to check the status of user
            {
                if ($r[2] == "admin")  //to check the usertye/role of the user
                {
                    echo '<script>location.href="admin/adminhome.php"</script>';
                } else if ($r[2] == "mechanic") {
                    echo '<script>location.href="mechanic/mechanichome.php"</script>';
                } else if ($r[2] == "user") {
                    echo '<script>location.href="user/userhome.php"</script>';
                }
            } else {
                echo '<script>alert("Your account is not valid")</script>';
            }
        } else {
            echo '<script>alert("Incorrect password")</script>';
        }
    }
}
?>