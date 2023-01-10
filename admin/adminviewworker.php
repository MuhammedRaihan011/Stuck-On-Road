<?php
session_start();
include 'header.php';
include '../connection.php';
$wid = $_GET['id'];
$_SESSION['wid'] = $wid;
$qry = "select * from tblworkrequest where workId='$wid'";
$res = mysqli_query($con, $qry);
$r = mysqli_fetch_array($res);
$dist = $r[0];
//$wfrom=$r[1];
//$wto=$r[2];
$lat = $r["lat"];
$lon = $r["lon"];
$l11 = floatval($lat) + 0.00005;
$l12 = floatval($lat) - 0.00005;
$l21 = floatval($lon) + 0.00005;
$l22 = floatval($lon) - 0.00005;
?>
<style>
    td,
    th {
        padding: 10px;
        ;
    }
</style>
<div style="margin: 50px 20px 20px 380px;">
    <h1>Mechanic</h1><br>
    <table border="1" style="margin: 20px ;">
        <tr>
            <th>NAME</th>
            <th>CONTACT</th>
            <th>EMAIL</th>
            <th colspan="3">LOCATION</th>
        </tr>

        <?php
        $qry = "select * from tblmechanic where (lat between $l12 and $l11) and (lon between $l22 and $l21) and mEmail not in(select wEmail from tblworkallocation where status='Allocated' and workId not in(select workId from tblworkrequest where workId<>'$wid'))";
        $res = mysqli_query($con, $qry);
        while ($r = mysqli_fetch_array($res)) {
            echo '<tr>';

            echo '<td>' . $r[0] . '</td>';
            echo '<td>' . $r[2] . '</td>';
            echo '<td>' . $r[4] . '</td>';
            echo '<td>' . $r[3] . '</td>';
            echo '<td><a href="adminallocatework.php?id=' . $r[4] . '">Allocate</a></td>';

            echo '</tr>';
        }
        ?>
    </table>

</div>