<?php require 'config2.php'; ?>
<table border=1>
    <tr>
        <td>#</td>
        <td>Handle Part Number</td>
        <td>Work Order</td>
        <td>Date</td>
        <td>Machine Number</td>
        <td>Quality By</td>
        <td>Pull Testing</td>
    </tr>

    <?php
    $yearSelected = $_GET['yearSelected'];
    $i = 1;
    $rows = mysqli_query($conn2, "SELECT * FROM tbl_swabassembly WHERE YEAR(STR_TO_DATE(date, '%M %d, %Y')) = $yearSelected AND (status != '0' OR status IS NULL)");
    foreach ($rows as $row):
    ?>
        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $row["handle"]; ?> </td>
            <td> <?php echo $row["workorder"]; ?> </td>
            <td> <?php echo $row["date"]; ?> </td>
            <td> <?php echo $row["machineNo"]; ?> </td>
            <td> <?php echo $row["InspectedBY"]; ?> </td>
            <td> <?php echo $row["pulltestingMin"]; ?> (<?php echo $row["pulltestingSample"]; ?>) <?php echo $row["remarksPullTesting"]; ?> </td>
        </tr>
    <?php endforeach; ?>
</table>