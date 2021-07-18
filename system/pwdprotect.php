<!-- 填寫更新密保問題 -->

<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選課系統plus版</title>
    <link rel="stylesheet" href="../all.css">
    <script src="../button.js"></script>
</head>
<body>
    <div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統 </div>
        <div class="line"></div>
        <div class="func">
            <div id="left">
                <div class="subject" onmouseover="switchMenu( this, 'subch', 'MouseOver' )" onmouseout="hideMenu()">選課系統
                <ul id="subch" class="submenu" style="display:none;" type="none">
                    <li><a href="../subject/chose.php?sid=<?php echo $_SESSION["ID"] ?>">加選</a></li>
                    <li><a href="../subject/del.php?sid=<?php echo $_SESSION["ID"] ?>">退選</a></li>
                    <li><a href="../subject/select.php?sid=<?php echo $_SESSION["ID"] ?>">查詢</a></li>
                </ul>
                
                </div>
                <div class="subject"><a href="../course/course.php?sid=<?php echo $_SESSION["ID"] ?>">課程查詢</a></div>
                <div class="subject"><a href="../default.php?sid=<?php echo $_SESSION["ID"] ?>">個人檔案</a></div>
                <div class="subject"><a href="../student/history.php?sid=<?php echo $_SESSION["ID"] ?>">修課歷史</a></div>
                
                


                <!-- </div> -->
            </div>
            <div id="right">
                <div class="subject"><a href="../default.php?sid=<?php echo $_SESSION["ID"] ?>"></a></div>
                <div class="subject"><a href="../system/logout.php">登出</a></div>
            </div>
        </div>    
    </div>

    <div class="content">
        <div class="main">
            <div class="course">
            <table style="width:75%; margin-left:20%;">
            <form action="addptpwd.php" method="post" align="center" style="line-height:10px; " enctype='multipart/form-data'>
                <tr><td><h1>密保問題</h1></td><td style='visibility:hidden; display:none;'><input type='hidden' name='sid' value='<?php echo $_SESSION["ID"]; ?>'></td></tr>
                <tr>
                    <td class="littlegrayline" colspan="3">最喜歡的顏色</td>
                    <td class="littlegrayline"><input type="text" name="pwdpt1" required></td>
                </tr><br/><br/>
                <tr>
                    <td class="littlegrayline" colspan="3">大學最要好的朋友暱稱</td>
                    <td class="littlegrayline"><input type="text" name="pwdpt2" id="" required></td>
                </tr><br/><br/>

                <tr><td class="littlegrayline" style='visibility:hidden;' colspan="13"></td><td class="littlegrayline"><div id="right"><input  type="submit" value="確認" id="buttonv2"></div></td></tr>
            </form>
            </table>
            </div>
        </div>  
        <div class="adition" align="center">
            <div class="icon">
                <img margin-left="30px" src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" alt="" height="200px">
            </div>
        </div>
        <div style="margin-top:50px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="../system/change.php?sid=<?php echo $_SESSION["ID"] ?>">更 改 密 碼</a>
        </div>
        <div style="margin-top:30px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="../system/pwdprotect.php?sid=<?php echo $_SESSION["ID"] ?>">密 保 問 題 </a>
        </div>
    </div>
    

</body>
</html>

