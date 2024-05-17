<?php
session_start();
include('../../../config/cnDB.php');
include('../includes/header.php');
// $total_revenue  = 0;
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
                    <h4>Danh sách yêu cầu sửa chữa</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Mã yêu cầu</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Số lượng yêu cầu</th>
                                <th scope="col">Tình trạng hỏng</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tình trạng sửa chữa</th>
                                <th scope="col">Giá sửa chữa(VNĐ)</th>
                                <th scope="col">Ngày nhận sửa chữa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM Maintain ORDER BY MaintainId DESC";
                            $result = mysqli_query($connection, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                    <tr class="text-center">
                                        <th scope="row"><?= $row['MaintainId']; ?></th>
                                        <td><?= $row['CusName']; ?></td>
                                        <td><?= $row['CusAddress']; ?></td>
                                        <td><?= $row['CusPhoneNumber']; ?></td>
                                        <td><?= $row['MaintainQuantity']; ?></td>
                                        <td><?= $row['StatusBroken']; ?></td>
                                        <td>
                                            <img style="width:100px; height:60px;object-fit:contain;" src="../../images/<?=$row['Url_Img']; ?>" alt="Hình ảnh" width="100">
                                        </td>
                                        <td><button onclick="updateStatus(<?=$row['MaintainId'];?>)" class="btn btn-danger btn-<?=$row['MaintainId'];?>"><?= $row['StatusFix']; ?></button></td>
                                        <td><input type="text" class="form-control maintain-<?=$row['MaintainId'];?>" value="<?= number_format($row['Price_Fix'], 0, ',', '.'); ?>"></td>
                                        <td><?=$row['date_receive_fix'];?></td>
                                    </tr>
                            <?php
                                }
                            }
                            $connection->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        function updateStatus(MaintainId) {
            const valueMaintainPrice =  document.querySelector(`input.maintain-${MaintainId}`).value;
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.querySelector(`button.btn-${MaintainId}`).innerHTML = this.responseText;
            }
            xhttp.open("GET", `./maintain_active.php?MaintainId=${MaintainId}&valueMaintainPrice=${valueMaintainPrice}`, true);
            xhttp.send();
        }
    </script>
    <?php include('../includes/footer.php');
    ?>