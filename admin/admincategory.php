<?php
include 'header.php';
include '../connection.php';
?>
<style>
    td,
    th {
        padding: 10px;
        ;
    }
</style>
<div style="margin: 50px 20px 20px 380px;">
    <h1>Category</h1><br>


    <form method="POST">

        <table>

            <tr>
                <td>Category</td>
                <td><input type="text" class="form-control" name="txtCategory" required /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" class="btn btn-primary" name="btnSubmit" value="Submit"></td>
            </tr>
        </table>

    </form>
    <table border="1" style="margin: 20px;">
        <tr>
            <th>ID</th>
            <th colspan="2">CATEGORY</th>

        </tr>
        <?php
        $qry = "select * from tblcategory where status='1'";
        $res = mysqli_query($con, $qry);
        while ($r = mysqli_fetch_array($res)) {
            echo '<tr>';
            echo '<td>' . $r[0] . '</td>';
            echo '<td>' . $r[1] . '</td>';
            echo '</tr>';
        }
        ?>

    </table>
    <?php
    if (isset($_REQUEST['btnSubmit'])) {
        $name = $_REQUEST['txtCategory'];
        $qry = "select count(*) from tblcategory where lcase(category)='$name' and status='1'";
        $res = mysqli_query($con, $qry);
        $row = mysqli_fetch_array($res);

        if ($row[0] > 0) {
            echo '<script>alert(" Already exist ....");</script>';
        } else {

            $qry1 = "insert into tblcategory(category,status)values('$name','1')";
            $res1 = mysqli_query($con, $qry1);

            if ($res1) {

                echo '<script>alert(" Data added successfull ....");</script>';
                echo '<script>location.href="admincategory.php"</script>';
            } else
                echo '<script>alert(" Sorry some error occured ....");</script>';
            //            echo $qry1;

        }
    }
    ?>