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
    <link rel="stylesheet" href="./homeLayout.css">
    <link rel="stylesheet" href="../GlobalStyle.css">


</head>

<body>
    <div id="home">
        <?php require_once "../Header/header.php" ?>
        <script>
            document.querySelectorAll('.header-list--bottom.pc a')[0].classList.add('active');
        </script>
        <!-- CONTENT  -->
        <div class="container" id="content">

            <!-- Carousel -->
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../assets/slidegioithieu/15silde.jpg" alt="Anhr trang Slider" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/slidegioithieu/slide15.jpg" alt="Anhr trang Slider" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/slidegioithieu/14promax.jpg" alt="Anhr trang Slider" class="d-block w-100">
                    </div>
                    <div class="carousel-item">
                        <img src="../assets/slidegioithieu/ipay.jpg" alt="Anhr trang Slider" class="d-block w-100">
                    </div>

                    <div class="carousel-item">
                        <img src="../assets/slidegioithieu/ipadslide.jpg" alt="Anhr trang Slider" class="d-block w-100">
                    </div>


                    <!-- Left and right controls/icons -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>


            <!-- LIST PRODUCT  -->
            <ul class="list-product">
                <h1 class="title" style="font-size:3vw;">Ưu Đãi Đặc Biệt Khi Mua Hàng</h1>
                <a href="">
                    <li>
                        <img src="../assets/slidegioithieu/gioithieu2.png" alt="anh">
                        <h1 style="font-size: 2vw; padding-left: 30px; text-align: end;" class="descr">Thu Cũ Đổi Mới
                            Giữ
                            Nguyên Giá Trị Máy Từ Iphone 7 Trở
                            Lên
                        </h1>
                    </li>
                </a>
                <a href="">
                    <li>
                        <h1 style="font-size: 2vw;" class="descr">Trả Góp Với Lãi Suất Thấp <br>Thời Hạn Lên Đến 24
                            Tháng
                        </h1>
                        <img src="../assets/slidegioithieu/gioithieu1.png" alt="">

                    </li>
                </a>
                <a href="">
                    <li>
                        <img src="../assets/slidegioithieu/gioithieu3.png" alt="">
                        <h1 style="font-size: 2vw;" class="descr">Tặng Đầy Đủ Phụ Kiện
                            <br>Tặng Gói Bảo Hành 1 Năm Khi Mua Hàng
                        </h1>
                    </li>
                </a>

                <a href="">
                    <li>
                        <img src="../assets/slidegioithieu/gioithieuip15.png" alt="">
                        <h1 style="font-size: 2vw; padding-left: 30px; text-align: end;" class="descr">Đặt Trước Iphone
                            Mới
                            Nhất Để Trải Nghệm Sớm Nhất Công
                            Nghệ
                        </h1>
                    </li>
                </a>
            </ul>
        </div>

        <!-- CHÂN TRANG WEB-->
        <?php require_once "../Footer/footer.html" ?>



    </div>
</body>

</html>