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
<div style="margin: 50px 20px 20px 320px;">
    <h1>Mechanic</h1><br>
    <table border="1" style="margin: 20px ;">
        <tr>
            <th>NAME</th>
            <th>CONTACT</th>
            <th>DISTRICT</th>
            <th>ADDRESS</th>
            <th>EMAIL</th>
            <th>QUALIFICATION</th>
            <th>EXPERIENCE</th>
            <th colspan="3">LOCATION</th>
        </tr>

        <?php
        $qry = "select * from tblmechanic where mEmail in(select username from tbllogin where status='0')";
        $res = mysqli_query($con, $qry);
        while ($r = mysqli_fetch_array($res)) {
            echo '<tr>';

            echo '<td>' . $r['mName'] . '</td>';
            echo '<td>' . $r['mContact'] . '</td>';
            echo '<td>' . $r['mDistrict'] . '</td>';
            echo '<td>' . $r['mAddress'] . '</td>';
            echo '<td>' . $r['mEmail'] . '</td>';
            echo '<td>' . $r['mqual'] . '</td>';
            echo '<td>' . $r['mExp'] . '</td>';
            echo '<td><a href="adminapproveuser.php?id=' . $r['mEmail'] . '&status=1">Approve</a></td>';
            echo '<td><a href="adminapproveuser.php?id=' . $r['mEmail'] . '&status=-1">Reject</a></td>';

            echo '</tr>';
        }
        ?>
    </table>
</div>