<?php
require_once "../../../config/cnDB.php";
$OrderId = $_GET['OrderId'];
$sql_active_status = "UPDATE Orders Set OrderStatus = 'Đang giao' WHERE OrderId = '$OrderId'";
$connection->query($sql_active_status);
echo "Đang giao";
