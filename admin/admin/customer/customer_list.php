<?php
session_start();
include('../../../config/cnDB.php');
include('../includes/header.php');
include_once('../includes/navbar_top.php');
include_once('../includes/sidebar.php');
?>
<!-- container-product -->
<div class="container-fluid px-4">
    <ol class="breadcrumb mt-5">
        <li class="breadcrumb-item active">Khách hàng</li>
        <li class="breadcrumb-item active">Danh sách Khách hàng</li>
    </ol>
    <div class="Prod">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Danh sách khách hàng</h4>
                   
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT distinct CusUserName,CusPhone,CusAddress FROM ducthimobile.orders;";
                            $result = $connection->query($sql);
                            if ($result->num_rows > 0) {
                                while ($Prod = $result->fetch_assoc()) {
                             ?>
                                    <tr>
                                        <td><?= $Prod['CusUserName']; ?></td>
                                        <td><?= $Prod['CusPhone']; ?></td>
                                        <td><?= $Prod['CusAddress']; ?></td>
                                    <?php } ?>
                                    </tr>
                                <?php
                            }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../includes/footer.php')
?>
</body>

</html>