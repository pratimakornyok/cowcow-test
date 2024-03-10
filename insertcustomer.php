<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbName = "cowcow";
$conn = mysqli_connect($hostname, $username, $password, $dbName);
if (!$conn)
    die("ไม่สามารถติดต่อกับ mySQL ได้");

mysqli_set_charset($conn, "utf8mb4");

function getTypeSelect($conn)
{
    echo '<option value="">เลือกประเภทลูกค้า</option>';
    echo '<option value="ทั่วไป">ทั่วไป</option>';
    echo '<option value="สมาชิก">สมาชิก</option>';
}

?>
    <form enctype="multipart/form-data" name="save" method="post" action="customerinsert.php">
        <table width="700" border="1" bgcolor="#ffffff">
            <tr>
                <th colspan="2" bgcolor="" height="21">เพิ่มรายการ</th>
            </tr>
            <tr>
                <td width="200">รหัสลูกค้า : </td>
                <td width="400"><input type="text" name="customer_id" size="10" maxlength="5"></td>
            </tr>
            <tr>
                <td width="200">ชื่อ : </td>
                <td width="400"><input type="text" name="customer_name" size="10" maxlength="5"></td>
            </tr>
            <tr>
                <td width="200">ที่อยู่ : </td>
                <td width="400"><input type="text" name="customer_address" size="10" maxlength="5"></td>
            </tr>
            <tr>
                <td width="200">เบอร์โทร : </td>
                <td width="400"><input type="text" name="customer_phone" size="10" maxlength="5"></td>
            </tr>
            <tr>
                <td width="200">ประเภทลูกค้า : </td>
                <td width="400">
                    <select name="customer_type">
                        <?php getTypeSelect($conn); ?>
                    </select>
                </td>
            </tr>
        </table>
        <br><input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
        <input type="reset" name="reset" value="ยกเลิก" style="cursor:hand;">
    </form>
    <br><br><a href="bookList1.php">กลับหน้า bookList1.php</a>
