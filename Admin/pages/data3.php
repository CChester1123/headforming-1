<?php require 'config2.php'; ?>
<table border=1>
    <tr>
        <td>#</td>
        <td>Handle Part Number</td>
        <td>Work Order</td>
        <td>Date</td>
        <td>Machine Number</td>
        <td>Quality By</td>
        <td>Pull Testing (Min)</td>
        <td>Sample 1</td>
        <td>Sample 2</td>
        <td>Sample 3</td>
        <td>Sample 4</td>
        <td>Sample 5</td>
        <td>Passed/Failed</td>
    </tr>

    <?php
    $yearSelected = $_GET['yearSelected'];
    $i = 1;
    $rows = mysqli_query($conn2, "SELECT * FROM tbl_swabassembly WHERE YEAR(STR_TO_DATE(date, '%M %d, %Y')) = $yearSelected AND (status != '0' OR status IS NULL)");
    foreach ($rows as $row):

        $pullTestingSamples = explode(',', $row['pulltestingSample']);
    ?>
        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $row["handle"]; ?> </td>
            <td> <?php echo $row["workorder"]; ?> </td>
            <td> <?php echo $row["date"]; ?> </td>
            <td> <?php echo $row["machineNo"]; ?> </td>
            <td> <?php echo $row["InspectedBY"]; ?> </td>
            <td> <?php echo $row["pulltestingMin"]; ?> </td>
            <td> <?php echo $pullTestingSamples[0]; ?> </td>
            <td> <?php echo $pullTestingSamples[1]; ?> </td>
            <td> <?php echo $pullTestingSamples[2]; ?> </td>
            <td> <?php echo $pullTestingSamples[3]; ?> </td>
            <td> <?php echo $pullTestingSamples[4]; ?> </td>
            <td> <?php echo $row["remarksPullTesting"]; ?> </td>
        </tr>
    <?php endforeach; ?>
</table>