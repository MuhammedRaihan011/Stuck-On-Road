<?php
session_start();
include 'header.php';
include '../connection.php';

$qry = "SELECT * FROM `feedback`f, `tblworkrequest`wr, `tblworkallocation`wa, `tblmechanic`m, `tbluser`u WHERE f.`workid`=wr.`workId` AND wr.`workId`=wa.`workId` AND wa.`wEmail`=m.`mEmail` AND wr.`uEmail`=u.`uEmail`";
$res = mysqli_query($con, $qry);
?>
<style>
    td,
    th {
        padding: 10px;
        ;
    }
</style>
<div style="margin: 50px 20px 20px 380px;">
    <h1>Feedback</h1><br>
    <table border="1" style="margin: 20px ;">
        <tr>
            <th>Work Id</th>
            <th>Work</th>
            <th>Customer</th>
            <th>Email</th>
            <th>Mechanic</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Date</th>
        </tr>

        <?php
       
        while ($r = mysqli_fetch_array($res)) {
            echo '<tr>';

            echo '<td>' . $r['workId'] . '</td>';
            echo '<td>' . $r['wDesc'] . '</td>';
            echo '<td>' . $r['uName'] . '</td>';
            echo '<td>' . $r['uEmail'] . '</td>';
            echo '<td>' . $r['mName'] . '</td>';
            echo '<td>' . $r['mEmail'] . '</td>';
            echo '<td>' . $r['feedback'] . '</td>';
            echo '<td>' . $r['date'] . '</td>';

            echo '</tr>';
        }
        ?>
    </table>

</div>