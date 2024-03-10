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
        form {
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"],
        input[type="reset"] {
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 8px 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #a73e06; /* Darker shade for hover */
        }
        a {
            text-decoration: none;
            color: #d85f1b; /* Updated color */
        }
        a:hover {
            text-decoration: underline;
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

    function getQualitySelect($conn)
{
    echo '<option value="">เลือกคุณภาพนม</option>';
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
                <td width="400"><input type="text" name="lot_num" size="10" maxlength="10"></td>
            </tr>
            <tr>
                <td width="200">ปริมาณน้ำนม : </td>
                <td width="400"><input type="text" name="AmountOfMilk" size="10" maxlength="10"></td>
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
                <td width="400"><input type="text" name="Price_mem" size="10" maxlength="10"></td>
            </tr>
            <tr>
                <td width="200">ราคาทั่วไป : </td>
                <td width="400"><input type="text" name="Price" size="10" maxlength="10"></td>
            </tr>
        </table>
        <center><br><input type="submit" name="submit" value="บันทึกข้อมูล" style="cursor:pointer;"> <!-- Removed inline styles -->
        <input type="reset" name="reset" value="ยกเลิก" style="cursor:pointer;"> <!-- Removed inline styles -->
    </form>
    <br><br><a href="home.php">home</a>
</body>
</html>
