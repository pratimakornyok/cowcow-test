<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Management</title>
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
            color: #d85f1b; /* Updated color */
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
            background-color: #d85f1b; /* Updated color */
            color: #fff;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #a73e06; /* Darker shade for hover */
        }
    </style>
</head>
<body>
<div class="container">
    <h3>เพิ่มรายการขาย</h3>
    <form enctype="multipart/form-data" name="save" method="post" action="billinsert.php">
        <table>
            <tr>
                <th colspan="2">รายละเอียด</th>
            </tr>
            <tr>
                <td>รหัสรายการขาย:</td>
                <td><input type="text" name="bill_id" size="10" maxlength="10"></td>
            </tr>
            <tr>
                <td>รหัสลูกค้า:</td>
                <td><input type="text" name="customer_id" size="10" maxlength="10"></td>
            </tr>
            <tr>
                <td>รหัสพนักงานขาย:</td>
                <td><input type="text" name="employee_id" size="10" maxlength="10"></td>
            </tr>
            <tr>
                <td>รหัสล็อต:</td>
                <td><input type="text" name="lot_num" size="10" maxlength="10"></td>
            </tr>
        </table>
        <br>
        <center><input type="submit" name="submit" value="บันทึกข้อมูล" class="btn">
        <input type="reset" name="reset" value="ยกเลิก" class="btn"></center>
    </form>
    <center><br><br><a href="home.php">กลับหน้าแรก</a></center>
</div>
</body>
</html>
