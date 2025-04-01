<?php require 'config2.php'; ?>
<table border=1>
    <tr>
        <td>#</td>
        <td>Handle Part Number</td>
        <td>Work Order</td>
        <td>Date</td>
        <td>Machine Number</td>
        <td>Quality By</td>
        <td>Heater Temperature Upper And Lower</td>
        <td>Heating Time</td>
        <td>Heater Open And Swab Handle Fixture Closing</td>
        <td>Fixture Closing Time</td>
    </tr>

    <?php
    $yearSelected = $_GET['yearSelected'];
    $i = 1;
    $rows = mysqli_query($conn2, "SELECT * FROM tbl_thermalbonding WHERE YEAR(STR_TO_DATE(date, '%M %d, %Y')) = $yearSelected AND (status != '0' OR status IS NULL)");
    foreach ($rows as $row):
    ?>
        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $row["handle"]; ?> </td>
            <td> <?php echo $row["workorder"]; ?> </td>
            <td> <?php echo $row["date"]; ?> </td>
            <td> <?php echo $row["machineNo"]; ?> </td>
            <td> <?php echo $row["InspectedBY"]; ?> </td>
            <td> <?php echo $row["TempUpnLowRange"]; ?> (<?php echo $row["actTempUpnLow"]; ?>) <?php echo $row["TempUpnLow"]; ?> </td>
            <td> <?php echo $row["HeatingTimeRange"]; ?> (<?php echo $row["actHeatingTime"]; ?>) <?php echo $row["HeatingTime"]; ?> </td>
            <td> <?php echo $row["SwabHandleFixtureRange"]; ?> (<?php echo $row["actSwabHandleFixture"]; ?>) <?php echo $row["SwabHandleFixture"]; ?> </td>
            <td> <?php echo $row["FixtureClosingTimeRange"]; ?> (<?php echo $row["actFixtureClosingTime"]; ?>) <?php echo $row["FixtureClosingTime"]; ?> </td>
        </tr>
    <?php endforeach; ?>
</table>