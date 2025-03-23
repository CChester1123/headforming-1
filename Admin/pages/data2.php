<?php require 'config2.php'; ?>
<table border=1>
    <tr>
        <td>#</td>
        <td>Product</td>
        <td>Product Description</td>
        <td>Handle</td>
    </tr>

    <?php
    $i = 1;
    $rows = mysqli_query($conn2, "SELECT * FROM tbl_checklist"); //table name
    foreach ($rows as $row):
    ?>
        <tr>
            <td> <?php echo $row["id"]; ?> </td>
            <td> <?php echo $row["product"]; ?> </td>
            <td> <?php echo $row["productDesc"]; ?> </td>
            <td> <?php echo $row["handle"]; ?> </td>
        </tr>
    <?php endforeach; ?>
</table>