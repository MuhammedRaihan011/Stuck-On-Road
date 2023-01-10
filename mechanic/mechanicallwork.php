<?php
session_start();
include 'header.php';
include '../connection.php';
$email = $_SESSION['email'];
?>
<style>
    td {
        padding: 10px;
        ;
    }

    th {
        background-color: lightcoral;
        padding: 7px;
    }
</style>
<div style="margin: 50px 20px 20px 150px;">
    <h1>Work Details</h1><br>
    <form method="POST">

        <table border="1">
            <tr>
                <th>CUSTOMER MAIL</th>
                <th>DISTRICT</th>
                <th>WORK DESCRIPTION</th>
                <th>WORK ADDRESS</th>

            </tr>
            <?php
            $qry = "select tblworkrequest.*,tbluser.* from tblworkrequest,tbluser,tblworkallocation where tblworkallocation.wEmail='$email' and tblworkrequest.uEmail=tbluser.uEmail  and tblworkrequest.workId=tblworkallocation.workId";
            $res = mysqli_query($con, $qry);
            while ($r = mysqli_fetch_array($res)) {
                echo '<tr>';
                echo '<td>' . $r[1] . '</td>';
                echo '<td>' . $r[4] . '</td>';
                echo '<td>' . $r[2] . '</td>';
                echo '<td>' . $r[3] . '</td>';
                echo '<td>' . $r[6] . '</td>';
                echo '<td>' . $r[7] . '</td>';


                echo '</tr>';
            }
            ?>

        </table>
    </form>
</div>