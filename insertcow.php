<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "cowcow";
    $conn = mysqli_connect($hostname, $username, $password);
    if (!$conn)
        die("ไม่สามารถติดต่อกับ mySQL ได้");
    mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล cowcow ได้");
    mysqli_query($conn, "set character_set_connection=utf8mb4");
    mysqli_query($conn, "set character_set_client=utf8mb4");
    mysqli_query($conn, "set character_set_results=utf8mb4");

    function getQualitySelect($conn)
{
    echo '<option value="">เลือกประเภทลูกค้า</option>';
    echo '<option value="A">A</option>';
    echo '<option value="B">B</option>';
    echo '<option value="C">C</option>';
}


?>
    <form enctype="multipart/form-data" name="save" method="post" action="cowinsert.php">
        <table width="700" border="1" bgcolor="#ffffff">
            <tr>
                <th colspan="2" bgcolor="" height="21">เพิ่มรายการ</th>
            </tr>
            <tr>
                <td width="200">รหัสล็อต : </td>
                <td width="400"><input type="text" name="lot_num" size="10" maxlength="5"></td>
            </tr>
            <tr>
                <td width="200">ปริมาณน้ำนม : </td>
                <td width="400"><input type="text" name="AmountOfMilk" size="10" maxlength="5"></td>
            </tr>
            <tr>
                <td width="200">เกรด : </td>
                <td width="400">
                    <select name="Quality">
                        <?php getQualitySelect($conn); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="200">ราคาสมาชิก : </td>
                <td width="400"><input type="text" name="Price_mem" size="10" maxlength="5"></td>
            </tr>
            <tr>
                <td width="200">ราคาทั่วไป : </td>
                <td width="400"><input type="text" name="Price" size="10" maxlength="5"></td>
            </tr>
        </table>
        <br><input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
        <input type="reset" name="reset" value="ยกเลิก" style="cursor:hand;">
    </form>
    <br><br><a href="bookList1.php">กลับหน้า bookList1.php</a>
</body>
</html>
