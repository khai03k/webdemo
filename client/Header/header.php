<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width , initial-scale=1.0">
    <!-- link css, js bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- file style css  -->
    <link rel="stylesheet" href="../../../ducthimobile/client/Header/header.css">
    <link rel="stylesheet" href="../GlobalStyle.css">
    <link rel="shortcut icon" href="../assets/tieudetrangweb/logothuonghieu.png" type="image/x-icon">
    <title>Đức Thi Mobile</title>
</head>

<body>
    <!-- NAVBAR TOP - Phần thông tin về logo, tìm kiếm,... -->
    <div class="header-navbar--top container">
        <!--chia thành 3 hàng-->
        <ul class="list-navbar">
            <li class="item-navbar logo">
                <a href="../../../ducthimobile/client/Home/homeLayout.php">
                    <img src="../assets/tieudetrangweb/logothuonghieu.png" alt="">
                </a>
            </li>
            <!-- search  -->
            <li class="item-navbar search-container">
                <form action="../Product/product.php" method="GET"><input type="text" id="search" name="keyword" class="form-control" placeholder="Tìm kiếm..." /></form>
                <!-- icon dạng svg  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </li>
            <li class="item-navbar banner">
                <img src="../assets/tieudetrangweb/uytintaoniemtin.png" alt="" />
            </li>

            <li class="item-navbar icon-menu-mobile">
                <i class="fa-solid fa-bars"></i>
            </li>

            <!-- menu dành cho mobile  -->
            <li class="item-navbar menu-mobile">
                <ul class="header-list--bottom">
                    <!-- input search  -->
                    <form action="../Product/product.php" method="GET"><input type="text" id="search" name="keyword" class="form-control" placeholder="Tìm kiếm..." /></form>
                    <!-- list navigate  -->
                    <a href="../../../ducthimobile/client/Home/homeLayout.php">
                        <li>Giới Thiệu</li>
                    </a>
                    <a href="../../../ducthimobile/client/Product/product.php?keyword=iphone">
                        <li>IPhone</li>
                    </a>
                    <a href="../../../ducthimobile/client/Product/product.php?keyword=ipad">
                        <li>Ipad</li>
                    </a>
                    <a href="../../../ducthimobile/client/Product/product.php?keyword=phụ kiện">
                        <li>Phụ Kiện</li>
                    </a>
                    <a href="../../../ducthimobile/client/Product/product.php?keyword=airpod">
                        <li>Airpod</li>
                    </a>
                    <a href="../../../ducthimobile/client/Product/product.php?keyword=macbook">
                        <li>Macbook</li>
                    </a>
                    <a href="../../../ducthimobile/client/Product/product.php?keyword=thiết bị gia dụng">
                        <li>Thiết bị gia dụng</li>
                    </a>
                    <a href="../../../ducthimobile/client/ServicesFix/servicesFix.php">
                        <li>Dịch Vụ Sửa Chữa</li>
                    </a>
 
                    <button class="btn btn-danger"><i class="fa-solid fa-xmark"></i> Đóng</button>
                </ul>
            </li>

            <!-- bắt sự kiện đóng mở menu mobile  -->
            <script>
                // tạo biến btnClose trỏ đến nút đóng
                const btnClose = document.querySelector("button.btn.btn-danger");
                // tạo biến btnOpen trỏ đến nút icon menu mobile
                const btnOpen = document.querySelector("li.item-navbar.icon-menu-mobile");

                // tạo biến menu mobile là box menu
                const menuMobile = document.querySelector("li.menu-mobile");

                // bắt sựu kiện click chuột vào nút close để dịch chuyển box menu sang X 100%  (ẩn hoàn toàn)
                btnClose.addEventListener("click", function() {
                    menuMobile.style.transform = 'translateX(100%)';
                })

                // bắt sựu kiện click chuột vào nút close để dịch chuyển box menu sang X 100%  (ẩn hoàn toàn)
                btnOpen.addEventListener("click", function() {
                    menuMobile.style.transform = 'translateX(0%)';
                })
            </script>
        </ul>
    </div>


    <!-- NAVBAR BOTTOM Bao gồm các thẻ chuyển hướng sang các loại sản phẩm -->
    <div class="header-navbar--bottom container">
        <ul class="header-list--bottom pc">
            <!-- list navigate  -->
            <a href="../../../ducthimobile/client/Home/homeLayout.php">
                <li>Giới Thiệu</li>
            </a>
            <a href="../../../ducthimobile/client/Product/product.php?keyword=iphone">
                <li>IPhone</li>
            </a>
            <a href="../../../ducthimobile/client/Product/product.php?keyword=ipad">
                <li>Ipad</li>
            </a>
            <a href="../../../ducthimobile/client/Product/product.php?keyword=phụ kiện">
                <li>Phụ Kiện</li>
            </a>
            <a href="../../../ducthimobile/client/Product/product.php?keyword=airpod">
                <li>Airpod</li>
            </a>
            <a href="../../../ducthimobile/client/Product/product.php?keyword=macbook">
                <li>Macbook</li>
            </a>
            <a href="../../../ducthimobile/client/Product/product.php?keyword=thiết bị gia dụng">
                <li>Thiết bị gia dụng</li>
            </a>
            <a href="../../../ducthimobile/client/ServicesFix/servicesFix.php">
                <li>Dịch Vụ Sửa Chữa</li>
            </a>
        </ul>
    </div>
    <script>
        // Đầu tiên, lấy tất cả các thẻ <li> bên trong thẻ <ul>
        const listItems = document.querySelectorAll('.header-list--bottom.pc a li');
    
        // Lấy giá trị keyword từ URL
        const currentCategory = '<?php echo $_REQUEST["keyword"]; ?>';
        // Kiểm tra từng thẻ <li>
        listItems.forEach(function(item) {
            const text = item.textContent;
            if (text.toLowerCase() === currentCategory.toLowerCase()) {
                // Tìm thẻ <a> tương ứng và thêm lớp 'active'
                const link = item.parentElement;
                link.classList.add('active');
            }
        });
    </script>
</body>


</html>