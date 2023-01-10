<?php
session_start();
include 'header.php';
include '../connection.php';
$email = $_SESSION['email'];
?>
<style>
    td {
        padding: 10px;

    }

    th {
        background-color: lightcoral;
        padding: 10px;
    }
</style>
<div style="margin: 50px 20px 20px 150px;">
    <h1>Work requests</h1><br><br>
    <form method="POST">

        <table class="table-bordered" border="1">
            <tr>
                <th>WORK ID</th>
                <th>WORK DESCRIPTION</th>
                <th>ADDRESS</th>
                <th>DISTRICT</th>
                <th>DATE</th>

                <th colspan="2">STATUS</th>
            </tr>
            <?php
            $qry = "select tblworkrequest.* from tblworkrequest where tblworkrequest.uEmail='$email'";
            $res = mysqli_query($con, $qry);
            while ($r = mysqli_fetch_array($res)) {
                if ($r['status'] == "completed") {
                    $qryCo = "SELECT COUNT(*) FROM `feedback` WHERE `workid`='$r[workId]'";
                    $resCo = mysqli_query($con, $qryCo);
                    $rowCo = mysqli_fetch_array($resCo);
                    $count = $rowCo[0];
                    if ($count > 0) {
                        $feedback = "";
                    } else {
                        $feedback = "<td><a href='userAddFeedback.php?wid=$r[workId]'>Add Feedback</a></td>";
                    }
                } else {
                    $feedback = "";
                }
                echo    '<tr>';
                echo '<td>' . $r[0] . '</td>';

                echo '<td>' . $r[2] . '</td>';
                echo '<td>' . $r[3] . '</td>';
                echo '<td>' . $r[4] . '</td>';
                echo '<td>' . $r[5] . '</td>';
                echo '<td>' . $r[8] . '</td>';
                echo $feedback;
                echo '</tr>';
            }
            ?>
        </table>
    </form>
</div>