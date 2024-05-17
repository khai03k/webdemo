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
    <link rel="stylesheet" href="./servicesFix.css">


</head>

<body>
    <div class="container-fluid">
        <?php require_once "../Header/header.php" ?>
        <script>
            document.querySelectorAll('.header-list--bottom.pc a')[7].classList.add('active');
        </script>
        <div class="container">
            <div class="servicesFix">
                <div class="title_fix" style="text-align: center; font-size: 4vw;"><i class="fa-solid fa-wrench"></i> Sửa Chữa Tận Nhà</div>
                <form action="./servicesFixAction.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="CusName" class="form-label"><b>Tên Khách Hàng : </b></label>
                        <input class="form-control" type="text" name="CusName" placeholder="Họ và tên khách hàng" id="CusName">
                    </div>

                    <div class="mb-3">
                        <label for="customerAddress" class="form-label"><b>Nhập Vào Địa Chỉ Khách Hàng :</b></label>
                        <input class="form-control" type="text" name="customerAddress" placeholder="Địa chỉ (xã/phường - quận/huyện - tỉnh/thành phố)" id="customerAddress">
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label"><b>Số điện thoại :</b></label>
                        <input class="form-control" type="text" name="phoneNumber" placeholder="SĐT liên hệ" id="customerAddress">
                    </div>

                    <div class="mb-3">
                        <label for="cate_id" class="form-label"><b>Nhập tên thiết bị: </b></label>
                        <input type="text" name="ProdName" placeholder="Tên thiết bị cần sửa chữa iPhone X, iPad Pro 11,... (nếu có nhiều hơn 1 sản phẩm thì đính kèm tên + số lượng từng máy)" class="form-control">
                    </div>


                    <div class="mb-3">
                        <label for="cate_id" class="form-label"><b>Số lượng nhận: </b></label>
                        <input type="number" name="ProdQuantity" placeholder="Nhập tổng số lượng thiết bị" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="StatusBroken" class="form-label"><b>Tình trạng máy :</b></label>
                        <input class="form-control" type="text" name="StatusBroken" placeholder="Ghi rõ chi tiết tình trạng để shop liên hệ báo giá" id="StatusBroken">
                    </div>


                    <div class="mb-3">
                        <label for="image" class="form-label"><b>Tải Lên Hình Ảnh Chi Tiết Lỗi Của Máy :</b></label>
                        <input class="form-control" type="file" name="image" id="image">
                        <label for="image">
                            <img style="width: 130px; margin: 20px; border: 1px dotted" src="https://icons-for-free.com/iconfiles/png/512/upload+export+upload+upload+to+cloud+icon-1320165659391053645.png" alt="" class="preview">
                        </label>
                        <script>
                            const inputImg = document.querySelector("input#image");
                            inputImg.addEventListener("change", function(e) {
                                const file = e.target.files[0];

                                if (file) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        document.querySelector("img.preview").src = e.target.result;
                                    };

                                    reader.readAsDataURL(file);
                                } else {
                                    document.querySelector("img.preview").src = "https://icons-for-free.com/iconfiles/png/512/upload+export+upload+upload+to+cloud+icon-1320165659391053645.png"; // Xóa hình ảnh xem trước nếu không có tệp được chọn
                                }
                            });
                        </script>
                    </div>

                    <div class="mb-3">
                        <input name="btn_insert" class="btn btn-primary" type="submit" value="Thêm Mới Yêu Cầu Sửa Chữa">
                    </div>
                </form>


            </div>
        </div>
    </div>



    <!-- CHÂN TRANG WEB-->


    <?php require_once "../Footer/footer.html" ?>




</body>

</html>