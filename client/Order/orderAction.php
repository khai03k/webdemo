<?php
require_once('../../config/cnDB.php');

$customerName = $_POST['customerName'];
$customerEmail = $_POST['customerEmail'];
$customerPhone = $_POST['customerPhone'];
$customerAddress = $_POST['customerAddress'];
$ProdId = $_REQUEST['ProdId'];
$ProdProperty = $_POST["ProdProperty"];
$ProdTotalPrice = $_POST["ProdTotalPrice"];
$QuantitySold = $_POST["ProdQuantity"];
// Truy vấn để lấy số lượng hiện tại và tồn kho của sản phẩm
$sqlProd = "SELECT ProdQuantity, ProdQuantityRemain FROM Product WHERE ProdId = $ProdId";
$result = $connection->query($sqlProd);
$Prod = $result->fetch_assoc();
$ProdQuantity = $Prod['ProdQuantity'];
$ProdQuantityRemain = $Prod['ProdQuantityRemain'];
// Kiểm tra xem còn đủ sản phẩm để đặt hàng
if ($ProdQuantityRemain < $ProdQuantity) {
  // Thực hiện câu lệnh INSERT để thêm đơn hàng
  $sqlOrder = "INSERT INTO Orders (CusUserName, CusEmail, CusPhone, CusAddress, ProdId, Prod_Property, OrderQuantity, Total_Price)
VALUES ('$customerName', '$customerEmail', '$customerPhone', '$customerAddress', '$ProdId', '$ProdProperty', '$QuantitySold', '$ProdTotalPrice');";

  if ($connection->query($sqlOrder) === TRUE) {
    // Lấy ID mới nhất (ID của bản ghi vừa thêm vào bảng Orders)
    $orderId = $connection->insert_id;

    // Cập nhật số lượng sản phẩm và tồn kho sau khi thêm đơn hàng
    $updateSql = "UPDATE Product SET ProdQuantity = $ProdQuantity - $QuantitySold, ProdQuantityRemain = $ProdQuantityRemain + $QuantitySold WHERE ProdId = $ProdId";
    $connection->query($updateSql);

    echo "Đã thêm đơn hàng thành công!";

    // Redirect to the order detail page with the OrderId
    header("Location: ../../admin/admin/orders/order_detail.php?OrderId=$orderId");
  } else {
    echo "Lỗi khi thêm đơn hàng: " . $sqlOrder . "<br>" . $connection->error;
  }
} else {
  echo "Sản phẩm đã hết hàng!";
}

$connection->close();
