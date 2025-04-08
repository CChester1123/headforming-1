<?php
$yearSelected = $_GET['yearSelected'];
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: Attachment; Filename = Swab Assembly ($yearSelected).xls");
require 'data3.php';
?>