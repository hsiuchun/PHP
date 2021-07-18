<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../system/login.css">
    <script src="../button.js"></script>
</head>
<body>
<div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統</div>
        <div class="line"></div>
        <div class="func">
            <!-- <div id="right">
            <input type="button" value="登入" id="button">
            <input type="button" value="登出" id="button">
            </div> -->
        </div>    
    </div>

    <div class="content">
        <div class="header" id="subheader">
        </div>
        <form action="../student/info.php" method="post" align="center" style="margin-top:30px">
            <tr>
                <td>帳號</td>
                <td><input type="text" name="id" required></td>
            </tr><br/><br/><br/>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pwd" id="" required></td>
            </tr><br/><br/><br/>
            <div id="left">
                <input type="button" value="忘記密碼" id="button" onclick="location.href='../system/checkform.php'">
            </div>
            <div id="right">
                <input type="submit" value="登入" id="button">
            </div>
        </form>

    </div>
</body>
</html>