<?php
require_once "../../config/cnDB.php";

// Kiểm tra xem có dữ liệu POST được gửi lên hay không
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy thông tin từ biểu mẫu POST
    $CusName = $_POST["CusName"];
    $CusAddress = $_POST["customerAddress"];
    $CusPhoneNumber = $_POST["phoneNumber"];
    $ProdName = $_POST["ProdName"];
    $ProdQuantity = $_POST["ProdQuantity"];
    $StatusBroken = $_POST["StatusBroken"];

    // Kiểm tra xem tệp tải lên có thành công hay không
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === 0) {
        // Đường dẫn lưu trữ tệp tải lên (thay đổi đường dẫn này theo nơi bạn muốn lưu trữ tệp)
        $uploadDir = "../../admin/images/";
        $filename = $_FILES["image"]["name"];
        $targetPath = $uploadDir . $filename;

        // Di chuyển tệp tải lên vào thư mục lưu trữ
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath)) {
            // Tạo SQL để chèn dữ liệu vào bảng Maintain
            $sql_add_servicesFix = "INSERT INTO `Maintain` (`CusName`, `CusAddress`, `CusPhoneNumber`, `MaintainQuantity`, `StatusBroken`, `Url_Img`, `Price_Fix`)
            VALUES ('$CusName', '$CusAddress', '$CusPhoneNumber', $ProdQuantity, '$StatusBroken', '$filename', 0);";

            // Thực thi câu lệnh SQL
            if (mysqli_query($connection, $sql_add_servicesFix)) {
                echo "Thêm mới yêu cầu sửa chữa thành công.";
            } else {
                echo "Lỗi khi thêm mới yêu cầu sửa chữa: " . mysqli_error($conn);
            }
        } else {
            echo "Lỗi khi tải lên tệp.";
        }
    } else {
        echo "Không có tệp tải lên hoặc có lỗi trong quá trình tải lên.";
    }
}

?>
