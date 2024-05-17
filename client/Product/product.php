<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width , initial-scale=1.0">
  <!-- link css, js bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <!-- file style css  -->
  <link rel="stylesheet" href="./product.css">
  <link rel="stylesheet" href="../GlobalStyle.css">



</head>

<body>
  <div class="container-fluid">
    <?php require_once "../Header/header.php" ?>
    <div class="container">
      <?php require_once "../../config/cnDB.php";


      $keyword = $_GET['keyword'];

      $sql_list_product = "Select * from product where ProdCategoryName = '$keyword' OR ProdName like '%$keyword%'";
      $result = $connection->query($sql_list_product);

      ?>
      <div class="title_product" style="text-transform:uppercase;"><?= $keyword ?></div>
      <ul class="row-products row">
        <?php
        if ($result->num_rows > 0) {
          while ($Prod = $result->fetch_assoc()) {
        ?>
            <a href="../../../ducthimobile/client/ProductDetails/productDetail.php?id_product=<?= $Prod["ProdId"] ?>" class="col-lg-3 col-md-4 col-sm-6 col-6">
              <li title="<?= $Prod["ProdName"] ?>">
                <img src="../assets/anhsanpham/lovepik-sales-label-png-image_401430380_wh1200.png" alt="" class="icon-sale">
                <div class="img_thumbnail">
                  <img src="../../admin/images/<?= $Prod['ProdImage'] ?>" alt="sản phẩm 1" class="img-circle img-thumbnai">
                </div>
                <h3 class="name_product"><?= $Prod["ProdName"] ?></h3>

                <span>
                  <p class="price_sale">
                    <?= number_format($Prod["ProdPriceSale"], 0, ',', '.') ?><small>₫</small>
                  </p>
                  <p class="price_old">
                    <?= number_format($Prod["ProdPrice"], 0, ',', '.') ?><small>₫</small>
                  </p>
                </span>
                <div class="footer-item">
                  <div class="sale-bg">Giảm <?= ceil(($Prod["ProdPrice"] - $Prod["ProdPriceSale"]) * 100 / $Prod["ProdPrice"])  ?>%</div>
                  <img src="../assets/anhsanpham/freeship.png" alt="" class="free-ship-icon">
                </div>
              </li>
            </a>
        <?php }
        } ?>
      </ul>


    </div>
  </div>
  <!-- CHÂN TRANG WEB-->
  <?php require_once "../Footer/footer.html" ?>

</body>




</html>