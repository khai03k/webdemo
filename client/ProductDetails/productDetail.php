<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../GlobalStyle.css">
    <link rel="stylesheet" href="./productDetail.css">
</head>

<body>
    <?php require_once "../Header/header.php" ?>
    <main class="container">
        <?php require_once "../../config/cnDB.php";
        $id_product = $_REQUEST["id_product"];
        $sql_product_detail = "SELECT * FROM product where ProdId = '$id_product'";
        $result = $connection->query($sql_product_detail);
        $Prod = $result->fetch_assoc();
        ?>
        <div class="container-fluid">
            <div class="direct">
                Trang chủ <span>></span> <?= $Prod["ProdCategoryName"] ?> <span>></span> <?= $Prod["ProdName"] ?>
            </div>
            <section class="product-detail">
                <div class="img-product">
                    <img src="../../admin/images/<?= $Prod["ProdImage"] ?>" alt="iPhone 15 128GB">
                </div>
                <div class="detail">
                    <h2><?= $Prod["ProdName"] ?></h2><br>
                    <div class="price">
                        <div class="price-sale">
                            <?= number_format($Prod["ProdPriceSale"], 0, ',', '.') ?><small>₫</small>
                        </div>
                        <div class="price-pre--sale">
                            <?= number_format($Prod["ProdPriceSale"], 0, ',', '.') ?><small>₫</small>
                        </div>
                    </div>


                    <div style="margin-left: 10px;">Màu sắc:</div>
                    <?php
                    $sql_property_color = "SELECT prp.ProdPropertyName
                        FROM product AS pr
                        INNER JOIN productproperty AS prp ON pr.ProdCategoryName = prp.ProdCategoryName
                        WHERE pr.ProdId = " . $Prod['ProdId'] . " AND prp.ProdTitle = 'Màu sắc'
                        GROUP BY prp.ProdTitle, prp.ProdPropertyName;";
                    $excute_color = $connection->query($sql_property_color);
                    $ProdPropertyColor = $excute_color->fetch_all();



                    $sql_property_capacity = "SELECT prp.ProdPropertyName
                        FROM product AS pr
                        INNER JOIN productproperty AS prp ON pr.ProdCategoryName = prp.ProdCategoryName
                        WHERE pr.ProdId = " . $Prod['ProdId'] . " AND prp.ProdTitle = 'Dung lượng'
                        GROUP BY prp.ProdTitle, prp.ProdPropertyName;";
                    $excute_capacity = $connection->query($sql_property_capacity);
                    $ProdPropertyCapacity = $excute_capacity->fetch_all();

                    
                    if (count($ProdPropertyColor) > 0) { ?>
                        <ul class="product-options">
                            <?php foreach ($ProdPropertyColor as $item_color) { ?>
                                <li class="variant color_property">
                                    <button value="<?= $item_color[0] ?>"><?= $item_color[0] ?></button>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>


                    <div style="margin-left: 10px;"> 
                        Dung lượng:
                    </div>
                    <?php if (count($ProdPropertyCapacity) > 0) { ?>
                        <ul class="product-options">
                            <?php foreach ($ProdPropertyCapacity as $item_capacity) { ?>
                                <li class="variant capacity_property">
                                    <button value="<?= $item_capacity[0] ?>"><?= $item_capacity[0] ?></button>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>









                    </ul>
                    <section class="product-promotion">
                        <b class="title-promotion">Ưu đãi</b>
                        <ul>
                            <li>
                                <b>I. Ưu đãi thanh toán: </b>
                                <br>
                                <ul>
                                    <li><i class="fa-solid fa-circle-check" style="color: #80D150; margin-right:4px;"></i>Giảm 500.000₫ qua cổng thanh toán toàn cầu</li>
                                    <li><i class="fa-solid fa-circle-check" style="color: #80D150; margin-right:4px;"></i>Giảm tới 2.000.000đ khi thanh toán qua thẻ tín dụng</li>
                                </ul>
                            </li>
                            <li>
                                <b>II. Ưu đãi trả góp: </b>
                                <br>
                                <ul>
                                    <li><i class="fa-solid fa-circle-check" style="color: #80D150; margin-right:4px;"></i>Trả góp 0% lãi suất</li>
                                    <li><i class="fa-solid fa-circle-check" style="color: #80D150; margin-right:4px;"></i>Thủ tục đơn giản, duyệt nhanh</li>
                                </ul>
                            </li>
                        </ul>
                    </section>
                    <div class="store_available">Xem cửa hàng có sẵn sản phẩm</div>
                    <form action="../Order/order.php?id_product=<?= $id_product ?>" class="product-button" method="post">
                        <input type="text" class="input_product_property" name="value_product_property" hidden>
                        <button type="submit">Mua ngay</button>
                    </form>
                    <ul class="product-features">
                        <?= $Prod["ProdDescription"] ?>
                    </ul>

                </div>
            </section>
    </main>
    </div>



    <?php require_once "../Footer/footer.html" ?>
</body>
<script>
    document.title = '<?= $Prod["ProdName"] ?>';
    // <!-- sự kiện chọn đặc điểm sản phẩm  -->

    const listCapacity = document.querySelectorAll("li.capacity_property button")
    const listColor = document.querySelectorAll("li.color_property button")


    listCapacity && listCapacity.forEach((item, index) => {
        listCapacity[0].classList.add("active");
        item.addEventListener("click", () => {
            if (document.querySelector("li.capacity_property button.active")) {
                document.querySelector("li.capacity_property button.active").classList.remove('active');
            }
            item.classList.add('active');
        })
    })

    listColor && listColor.forEach((item, index) => {
        listColor[0].classList.add("active");
        item.addEventListener("click", () => {
            if (document.querySelector("li.color_property button.active")) {
                document.querySelector("li.color_property button.active").classList.remove('active');
            }
            item.classList.add('active');
        })
    })

    const btnSubmit = document.querySelector(".product-button");
    const inputSendProperty = document.querySelector("input.input_product_property") ;
    btnSubmit.addEventListener("submit", () => {
        inputSendProperty.value = 
     `${document.querySelector("li.color_property button.active").value}  ${document.querySelector("li.capacity_property button.active") ? '/ ' + document.querySelector("li.capacity_property button.active").value : ''}` ;
    })
</script>

</html>