<?php
$yearSelected = $_GET['yearSelected'];
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: Attachment; Filename = Thermal Bonding ($yearSelected).xls");
require 'data2.php';
?>