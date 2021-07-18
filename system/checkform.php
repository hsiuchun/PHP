<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../all.css">
    <script src="../button.js"></script>
</head>
<body>
<div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統 </div>
        <div class="line"></div> 
</div>

    <div class="content">
        <div class="header" id="subheader">
        </div>
        <div class="main">
            <div class="course">
            <table style="width:75%; margin-left:20%;">
            <form action="check.php" method="post" align="center" style="line-height:10px; ">
                <tr><td><h1>驗證密碼</h1></td><td style='visibility:hidden; display:none;'><input type='hidden' name='sid' value='<?php echo $_SESSION["ID"]; ?>'></td></tr>
                <tr>
                    <td class="littlegrayline" colspan="3">帳號</td>
                    <td class="littlegrayline"><input type="text" name="sid" required></td>
                </tr><br/><br/>
                <tr>
                    <td class="littlegrayline" colspan="3">最喜歡的顏色</td>
                    <td class="littlegrayline"><input type="text" name="pwdpt1" required></td>
                </tr><br/><br/>
                <tr>
                    <td class="littlegrayline" colspan="3">大學最要好的朋友暱稱</td>
                    <td class="littlegrayline"><input type="text" name="pwdpt2" required></td>
                </tr><br/><br/>

                <tr><td class="littlegrayline" style='visibility:hidden;' colspan="13"></td><td class="littlegrayline"><div id="right"><input  type="submit" value="確認" id="buttonv2"></div></td></tr>
            </form>
            </table>
            </div>
        </div>  
    </div>
</body>
</html>