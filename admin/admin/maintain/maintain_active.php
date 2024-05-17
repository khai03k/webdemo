<?php
require_once "../../../config/cnDB.php";
$MaintainId = $_GET['MaintainId'];
$valueMaintainPrice = $_GET['valueMaintainPrice'];
$sql_active_status = "UPDATE Maintain Set StatusFix = 'Đã sửa chữa' , Price_Fix = '$valueMaintainPrice'  WHERE MaintainId = '$MaintainId'";
$connection->query($sql_active_status);
echo "Đã sửa chữa";
