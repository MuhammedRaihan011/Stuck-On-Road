<?php
session_start();
include 'header.php';
include '../connection.php';
$email = $_SESSION['email'];
?>
<style>
    td,
    th {
        padding: 10px;
        ;
    }


    td,
    th {
        padding: 10px;
        ;
    }

    /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
    #map {
        height: 430px;
        width: 650px;
        border-style: groove;
        border-width: thick;
        /*margin-left:300px;
          margin-top:30px;
          margin-bottom:30px;*/
    }

    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

    .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
    }

    #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
    }

    .pac-controls {
        display: inline-block;
        padding: 5px 11px;
    }

    .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
    }

    #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
    }

    #pac-input:focus {
        border-color: #4d90fe;
    }

    #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
    }

    #target {
        width: 345px;
    }
</style>
<div style="margin: 50px 20px 20px 150px;">
    <h1>Work Feedback</h1><br>
    <form method="POST">


        <div>
            <table>
                <tr>
                    <td>Feedback</td>
                    <td><textarea class="form-control" name="txtFeedback"></textarea></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" name="btnSubmit" class="btn btn-primary" value="Submit"></td>
                </tr>
            </table>

    </form>
</div>

<?php
if (isset($_POST['btnSubmit'])) {
    $fbck = $_POST['txtFeedback'];
    $wkid = $_GET['wid'];
    $qry1 = "INSERT INTO `feedback`(`workid`,`feedback`,`date`)VALUES('$wkid','$fbck',(SELECT SYSDATE()))";
    $res1 = mysqli_query($con, $qry1);

    if ($res1) {

        echo '<script>alert(" Feedback Updated ....");</script>';
        echo '<script>location.href="userwork.php"</script>';
    } else
        echo '<script>alert(" Request failed ....");</script>';
    //            echo $qry1;


}
?>