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
    <h1>All works</h1>
    <table border="1" style="margin: 20px;">
        <tr>
            <th>CUSTOMER NAME</th>
            <th>CONTACT</th>
            <th>WORK DESCRIPTION</th>
            <th>WORK ADDRESS</th>
            <th>STATUS</th>
            <th>WORKER</th>
        </tr>

        <?php
        $qry = "select tbluser.*,tblworkrequest.wDesc,tblworkrequest.wAddress,tblworkrequest.status,tblmechanic.mName from tbluser,tblworkrequest,tblmechanic,tblworkallocation where tbluser.uEmail=tblworkrequest.uEmail and tblworkrequest.workId=tblworkallocation.workId and tblworkallocation.wEmail=tblmechanic.mEmail";
        $res = mysqli_query($con, $qry);
        while ($r = mysqli_fetch_array($res)) {
            echo '<tr>';

            echo '<td>' . $r[0] . '</td>';
            echo '<td>' . $r[1] . '</td>';
            echo '<td>' . $r[3] . '</td>';
            echo '<td>' . $r[4] . '</td>';
            echo '<td>' . $r[5] . '</td>';
            echo '<td>' . $r[6] . '</td>';
            echo '</tr>';
        }
        ?>

    </table>
</div>