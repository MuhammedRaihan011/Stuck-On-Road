<?php
include 'header.php';
include '../connection.php';
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
<div style="margin: 50px 20px 20px 180px;">
    <h1>Work request</h1><br>
    <table border="1" style="margin: 20px ;">
        <tr>
            <th>WORK ID</th>
            <th>CUSTOMER NAME</th>
            <th>CONTACT</th>
            <th>USER EMAIL</th>

            <th>WORK DESCRIPTION</th>
            <th>WORK ADDRESS</th>
            <th>LOCATION</th>


        </tr>
        <?php
        $qry = "select tbluser.*,tblworkrequest.wDesc,tblworkrequest.wAddress,tblworkrequest.workId,tblworkrequest.wDistrict from tbluser,tblworkrequest where tbluser.uEmail=tblworkrequest.uEmail and (tblworkrequest.status='Requested' or tblworkrequest.status='rejected')";
        $res = mysqli_query($con, $qry);
        while ($r = mysqli_fetch_array($res)) {
            echo '<tr>';

            echo '<td>' . $r[5] . '</td>';
            echo '<td>' . $r[0] . '</td>';
            echo '<td>' . $r[1] . '</td>';
            echo '<td>' . $r[2] . '</td>';
            echo '<td>' . $r[3] . '</td>';
            echo '<td>' . $r[4] . '</td>';
            echo '<td>' . $r[6] . '</td>';
            echo '<td><a href="adminviewworker.php?id=' . $r[5] . '">Search worker</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
    <br><br>
</div>