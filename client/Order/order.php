<html lang=en>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <!-- link css, js bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <!-- file style css  -->
  <link rel="stylesheet" href="../GlobalStyle.css">
  <link rel="stylesheet" href="./order.css">

  <?php
  require_once('../../config/cnDB.php');
  $prodProperty = $_REQUEST["value_product_property"];
  $prodId =  $_REQUEST["id_product"];


  $sqlProd = "select * from product where ProdId = $prodId";
  $result = mysqli_query($connection, $sqlProd);
  $Prod = $result->fetch_assoc();
  ?>


</head>

<body>
  <div class="container-fluid">
    <?php require_once "../Header/header.php" ?>


    <form method="post" action="./orderAction.php?ProdId=<?= $Prod["ProdId"]; ?>" enctype="multipart/form-data" class="container form-order">
      <h1 class="text-center display-4 title-order"><i class="fa-solid fa-truck-fast"></i> Dịch Vụ Giao Hàng Tận Nơi</h1>

      <div class="mb-3">
        <label for="customerName" class="form-label"><b>Nhập Vào Tên của bạn :</b></label>
        <input type="text" name="customerName" class="form-control" required id="customerName">
      </div>

      <div class="mb-3">
        <label for="customerAddress" class="form-label"><b>Nhập Vào Địa Chỉ Cụ Thể :</b></label>
        <input type="text" name="customerAddress" class="form-control" required id="customerAddress">
      </div>


      <div class="mb-3">
        <label for="emailAddress" class="form-label"><b>Nhập Email của bạn :</b></label>
        <input type="email" name="customerEmail" class="form-control" required id="emailAddress">
      </div>

      <div class="mb-3">
        <label for="customerPhone" class="form-label"><b>Nhập Vào Số Điện Thoại Của Bạn :</b></label>
        <input type="text" name="customerPhone" class="form-control" required id="customerPhone">
      </div>

      <br>
      <br>
      <h3>Thông tin đơn hàng</h3>
      <div class="table-responsive">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th scope="row">Dòng thiết bị</th>
              <td><input type="text" class="form-control" value=<?= $Prod["ProdCategoryName"]; ?> name="ProdCategoryName" required readonly></td>
            </tr>
            <tr>
              <th scope="row">Tên thiết bị</th>
              <td><input type="text" class="form-control" value="<?= $Prod["ProdName"]; ?>" name="ProdName" required readonly></td>
            </tr>
            <tr>
              <th scope="row">Đặc điểm</th>
              <td><input type="text" class="form-control" value="<?= $prodProperty ?>" name="ProdProperty" required readonly></td>
            </tr>
            <tr>
              <th scope="row">Giá bán</th>
              <td><input type="number" class="form-control priceProd" value="<?= $Prod["ProdPrice"]; ?>" name="ProdPrice" required readonly></td>
            </tr>
            <tr>
              <th scope="row">Số lượng</th>
              <td><input type="number" class="form-control quantity" min=1 value="1" name="ProdQuantity" required></td>
            </tr>
            <tr>
              <th scope="row">Phí ship</th>
              <td><input type="number" class="form-control ship" value="50000" name="ProdPriceShip" required readonly></td>
            </tr>
            <tr>
              <th scope="row">Voucher</th>
              <td><input type="number" class="form-control" value="<?= $Prod["ProdPrice"] - $Prod["ProdPriceSale"]; ?>" name="ProdVoucherPrice" required readonly></td>
            </tr>
            <tr>
              <th scope="row">Thành tiền</th>
              <td><input type="number" class="form-control totalPrice" name="ProdTotalPrice" required readonly></td>
            </tr>
          </tbody>
        </table>
<p class="ds"></p>


        <button class="btn btn-primary orders_submit" type="submit"><b>Xác nhận mua hàng</b></button>
      </div>
    </form>
  </div>



  <script>
    const quantityProd = document.querySelector(".quantity");
    const totalPrice = document.querySelector(".totalPrice");
    const ship = parseInt(document.querySelector(".ship").value);
    const priceSale = parseInt(<?= $Prod["ProdPriceSale"]; ?>)
    totalPrice.value = quantityProd.value * priceSale + ship;
    quantityProd.addEventListener("change", () => {
      totalPrice.value = quantityProd.value * priceSale + ship;
    })

  </script>



  <!-- CHÂN TRANG WEB-->
  <?php require_once "../Footer/footer.html" ?>




</body>

</html>