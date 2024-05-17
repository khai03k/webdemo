<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Chi tiết hóa đơn</title>
    <link rel="stylesheet" href="../../styles/bootstrap4/bootstrap.min.css">
    <!-- Invoice styling -->
    <style>
        body {
            padding: 20px 0;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align: center;
            color: #777;
        }

        body h1 {
            font-weight: 300;
            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {
            font-weight: 300;
            margin-top: 10px;
            margin-bottom: 20px;
            font-style: italic;
            color: #555;
        }

        body a {
            color: white;
        }

        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        a {
            text-decoration: none;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <?php
    require_once('../../../config/cnDB.php');
    $OrderId = $_REQUEST['OrderId'];
    $sql = "SELECT orders.*, product.* from orders inner join product where orders.ProdId = product.ProdId and Orders.OrderId = '$OrderId'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_fetch_array($result) > 0) {
        foreach ($result as $row) { ?>
            <div class="invoice-box">
                <table>
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img src="../../../client/assets/tieudetrangweb/logothuonghieu.png" alt="Company logo" style="width: 100%; max-width: 300px" />
                                    </td>

                                    <td>
                                        Mã hoá đơn: <?= $row["OrderId"] ?><br />
                                        Ngày tạo: <?= $row["date_order"] ?><br />
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        Tên Shop: DucThiMobile<br />
                                        Địa chỉ: Đại học Mỏ Địa chất - Hà Nội<br />
                                        SĐT: 0123456789
                                    </td>

                                    <td>
                                        Tên khách hàng: <?= $row["CusUserName"]; ?>
                                        <br>
                                        Email: <?= $row["CusEmail"]; ?><br>
                                        SĐT: <?= $row["CusPhone"]; ?><br>
                                        Địa chỉ: <?= $row["CusAddress"]; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr class="heading">
                        <td>Property</td>

                        <td>Detail</td>
                    </tr>

                    <tr class="item">
                        <td>Tên sản phẩm</td>

                        <td><?= $row["ProdName"]; ?></td>
                    </tr>
                    <tr class="item">
                        <td>Giá sản phẩm</td>

                        <td><?= number_format($row['ProdPriceSale'], 0, ',', '.') ?> VNĐ</td>
                    </tr>
                    <tr class="item">
                        <td>Phí ship:</td>

                        <td>50.000 VNĐ</td>
                    </tr>
                    <tr class="item">
                        <td>Số lượng</td>
                        <td><?= $row["OrderQuantity"] ?></td>
                    </tr>
                    <tr class="item">
                        <td>Mô tả</td>
                        <td><?= $row["Prod_Property"] ?></td>
                    </tr>

                    <tr class="total">
                        <td></td>

                        <td>Tổng tiền: <?= number_format($row['Total_Price'], 0, ',', '.') ?> VNĐ</td>
                    </tr>
                </table>
                <br>
                <button onclick="history.back();" class="btn btn-primary">Quay lại</button>

            </div>
    <?php }
    } ?>

</body>

</html>