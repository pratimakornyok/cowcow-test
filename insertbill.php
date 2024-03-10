<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Mali:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap');
        
        body {
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            font-family: "Mali", cursive;
            font-weight: 700;
            font-style: normal;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
</style>
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
    ?>
    <html>
    <head><title>insertbill.php</title></head>
    <body>
        <center>
        <form enctype="multipart/form-data" name="save" method="post"

        action="billinsert.php">

        <br><br><table width="700" border="1" bgcolor="#ffffff">
        <tr>
            <th colspan="2" bgcolor="" height="21">เพิ่มรายการ</th>
        </tr>
        <tr>
            <td width="200">รหัสรายการขาย : </td>
            <td width="400"><input type="text" name="bill_id" size="10" maxlength="5"></td>
        </tr>
        <tr>
            <td width="200">รหัสลูกค้า : </td>
            <td width="400"><input type="text" name="customer_id" size="10" maxlength="5"></td>
        </tr>
        <tr>
            <td width="200">รหัสพนักงานขาย : </td>
            <td width="400"><input type="text" name="employee_id" size="10" maxlength="5"></td>
        </tr>
        <tr>
            <td width="200">รหัสล็อต : </td>
            <td width="400"><input type="text" name="lot_num" size="10" maxlength="5"></td>
        </tr>
        </table>
            <br><input type="submit" name="submit" value="บันทึกข้อมูล"style="cursor:hand;">
            <input type="reset" name="reset" value="ยกเลิก" style="cursor:hand;">
        </form>
            <br><br><a href="home.php">กลับหน้าแรก</a>
        </center>
</body>
</html>