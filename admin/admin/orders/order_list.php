<?php
session_start();
include('../../../config/cnDB.php');
include('../includes/header.php');
$total_revenue  = 0;
?>
    <div class="container-fluid px-4">
        <ol class="breadcrumb mt-5">
            <li class="breadcrumb-item active">Đơn hàng</li>
            <li class="breadcrumb-item active">Danh sách đơn hàng</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh sách đơn hàng</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Tên khách hàng</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng mua</th>
                                    <th scope="col">Tổng tiền</th>
                                    <!-- <th scope="col">Phương thức thanh toán</th> -->
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Thông tin</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT orders.*, product.* from orders inner join product on orders.ProdId = product.ProdId ORDER BY orders.date_order DESC";
                                $result = mysqli_query($connection, $sql);
                                if (mysqli_fetch_array($result) > 0) {
                                    foreach ($result as $row) {
                                        $total_revenue += $row['Total_Price'];

                                ?>
                                        <tr class="text-center">
                                            <th scope="row"><?= $row['OrderId']; ?></th>
                                            <td><?= $row['CusUserName']; ?></td>
                                            <td><?= $row['CusPhone']; ?></td>
                                            <td><?= $row['ProdName']; ?></td>
                                            <td><?= $row['OrderQuantity']; ?></td>
                                            <td><?= number_format($row['Total_Price'], 0, ',', '.'); ?></td>
                                            <td><button class="btn btn-success status-<?= $row['OrderId']; ?>" onclick="updateStatus(<?= $row['OrderId']; ?>)"><?= $row['OrderStatus']; ?></button></td>
                                            <td>
                                                <a href="./order_detail.php?OrderId=<?php echo $row['OrderId'] ?>" class="btn btn-sm btn-primary">Chi tiết Hóa đơn
                                                </a>
                                            </td>
                                        <?php } ?>
                                        </tr>
                                    <?php
                                }
                                $connection->close();

                                    ?>
                            </tbody>
                        </table>
                        <h4>Tổng doanh thu: <b> <?= number_format($total_revenue, 0, ',', '.') ?> VNĐ</b></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateStatus(OrderId) {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.querySelector(`button.status-${OrderId}`).innerHTML = this.responseText;
            }
            xhttp.open("GET", `./order_active.php?OrderId=${OrderId}`, true);
            xhttp.send();
        }
    </script>
<?php include('../includes/footer.php');
?>