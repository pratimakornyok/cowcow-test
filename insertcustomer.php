<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    /*function getTypeSelect()
    {
        global $conn;
        $sql = "SELECT * FROM cow";
        $dbQuery = mysqli_query($conn, $sql);
        if (!$dbQuery)
            die("(functionDB:getTypeSelect) select typebook มีข้อผิดพลาด".mysqli_error());
        echo '<option value="">เลือกประเภทหนังสือ</option>';
        while($result=mysqli_fetch_object($dbQuery))
        {
        echo '<option value='.$result->TypeID.'>'.$result->TypeName.'</option>';
        }
    }
    function getStatusSelect()
    {
       global $conn;
       $sql = "select * from statusbook order by StatusID";
       $dbQuery = mysqli_query($conn, $sql);
       if (!$dbQuery)
        die("(functionDB:getStatusSelect) select statusbook มีข้อผิดพลาด".mysqli_error());
       echo '<option value="">เลือกสถานะ</option>';
       while($result=mysqli_fetch_object($dbQuery))
       {
           echo '<option value='.$result->StatusID.'>'.$result->StatusName.'</option>';
       }
    }*/
    
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
    ?>
    <html>
    <head><title>insertcow.php</title></head>
    <body>
        <center>
        <form enctype="multipart/form-data" name="save" method="post"

        action="customerinsert.php">

        <br><br><table width="700" border="1" bgcolor="#ffffff">
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
            <td width="200">ที่อยู๋ : </td>
            <td width="400"><input type="text" name="customer_address" size="10" maxlength="5"></td>
        </tr>
        <tr>
            <td width="200">เบอร์โทร : </td>
            <td width="400"><input type="text" name="customer_phone" size="10" maxlength="5"></td>
        </tr>
        <tr>
            <td width="200">ประเภท : </td>
            <td width="400"><input type="text" name="customer_type" size="10" maxlength="5"></td>
        </tr>
        </table>
            <br><input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
            <input type="reset" name="reset" value="ยกเลิก" style="cursor:hand;">
        </form>
            <br><br><a href="bookList1.php">กลับหน้า bookList1.php</a>;
        </center>
</body>
</html>