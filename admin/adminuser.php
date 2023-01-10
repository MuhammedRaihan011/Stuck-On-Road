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
    <h1>Users</h1><br>
    <table border="1" style="margin: 20px ;">
        <tr>
            <th>NAME</th>
            <th>CONTACT</th>
            <th>EMAIL</th>


        </tr>

        <?php
        $qry = "select * from tbluser where uEmail in(select username from tbllogin where status='1')";
        $res = mysqli_query($con, $qry);
        while ($r = mysqli_fetch_array($res)) {
            echo '<tr>';

            echo '<td>' . $r[0] . '</td>';
            echo '<td>' . $r[1] . '</td>';
            echo '<td>' . $r[2] . '</td>';


            echo '</tr>';
        }
        ?>
    </table>
</div>