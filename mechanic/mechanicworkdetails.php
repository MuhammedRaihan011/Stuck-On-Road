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
                <th>DATE </th>
                <th>CUSTOMER </th>
                <th>CUSTOMER CONTACT</th>
                <th>CUSTOMER MAIL</th>
                <th>DISTRICT</th>
                <th>WORK DESCRIPTION</th>
                <th>Other Requirements</th>

            </tr>
            <?php
            $qry = "select tblworkrequest.*,tbluser.* from tblworkrequest,tbluser,tblworkallocation where tblworkallocation.wEmail='$email' and tblworkrequest.uEmail=tbluser.uEmail and tblworkrequest.status='accepted' and tblworkrequest.workId=tblworkallocation.workId";
            $res = mysqli_query($con, $qry);
            while ($r = mysqli_fetch_array($res)) {
                echo '<tr>';
                echo '<td>' . $r['tdate'] . '</td>';
                echo '<td>' . $r['uName'] . '</td>';
                echo '<td>' . $r['uContact'] . '</td>';
                echo '<td>' . $r['uEmail'] . '</td>';
                echo '<td>' . $r['wDistrict'] . '</td>';
                echo '<td>' . $r['wDesc'] . '</td>';
                echo '<td>' . $r['wAddress'] . '</td>';
                echo '<td><a href="mechanicapprovework.php?id=' . $r[0] . '&status=completed">Completed</a></td>';
                echo '</tr>';
            }
            ?>

        </table>
    </form>
</div>