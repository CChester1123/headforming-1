<?php require 'config2.php'; ?>
<table border=1>
    <tr>
        <td>#</td>
        <td>Product</td>
        <td>Product Description</td>
        <td>Handle</td>
    </tr>

    <?php
    $yearSelected = $_GET['yearSelected'];
    // $yearSelected = base64_decode($_GET['yearSelected']);
    $i = 1;
    $rows = mysqli_query($conn2, "SELECT * FROM tbl_thermalbonding WHERE YEAR(STR_TO_DATE(date, '%M %d, %Y')) = $yearSelected");
    foreach ($rows as $row):
    ?>
        <tr>
            <td> <?php echo $row["id"]; ?> </td>
            <td> <?php echo $row["workorder"]; ?> </td>
            <td> <?php echo $row["product"]; ?> </td>
            <td> <?php echo $row["status"]; ?> </td>

            <td> <?php echo $yearSelected; ?> </td>
        </tr>
    <?php endforeach; ?>
</table>