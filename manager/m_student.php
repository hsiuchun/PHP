<?php
// session_start();
include("../conn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選課系統plus版</title>
    <link rel="stylesheet" href="../all.css">
    <script src="../button.js"></script>
    <script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="../js/jquery.horizontalmenu.js"></script>
	<script>
        $(function () {
            $('.ah-tab-wrapper').horizontalmenu({
                itemClick : function(item) {
                    $('.ah-tab-content-wrapper .ah-tab-content').removeAttr('data-ah-tab-active');
                    $('.ah-tab-content-wrapper .ah-tab-content:eq(' + $(item).index() + ')').attr('data-ah-tab-active', 'true');
                    return false; //if this finction return true then will be executed http request
                }
            });
        });
    </script>
</head>
<body>
    <div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統 </div>
        <div class="line"></div>
        <div class="func">
        <div id="left">
                <div class="subject"><a href="../manager/m_teacher.php">新增教師</a></div>
                <div class="subject"><a href="../manager/m_student.php">新增學生</a></div>
                <div class="subject"><a href="../manager/result.php">統計資料</a></div>
                
            </div>
            <div id="right">
                <div class="subject"><a href="../manager/manage.php">管理員</a></div>
                <div class="subject"><a href="../system/logout.php">登出</a></div>
            </div>
        </div>    
    </div>
    <!-- <div class="htmleaf-container"> -->
    <div class="content">
        <div class="main" style="height:auto;">
            <div class="pform" style="height:100%; margin-bottom:100px">
                <h1>新增學生</h1>
                <table style="width:70%; line-height: 10px;" cellpadding=5 align="center">
                    <form action="addstudent.php" method="post" align="center">
                        <tr>
                            <td class="littlegrayline">學號</td>
                            <td class="littlegrayline"><input type="text" name="sid"></td>
                        </tr>
                        <tr>
                            <td class="littlegrayline">學生姓名</td>
                            <td class="littlegrayline"><input type="text" name="sname"></td>
                        </tr>
                        <tr>
                            <td class="littlegrayline">科系</td>
                            <td class="littlegrayline"><input type="text" name="subject"></td>
                        </tr>
                        <tr>
                            <td class="littlegrayline">年級</td>
                            <td class="littlegrayline"><input type="text" name="grade"></td>
                        </tr>
                        <tr>
                            <td class="littlegrayline">預設密碼</td>
                            <td class="littlegrayline"><input type="password" name="spwd"></td>
                        </tr>
                        <tr>
                            <td class="littlegrayline" style='visibility:hidden;' colspan="13"></td>
                            <td class="littlegrayline"><div id="right"><input  type="submit" value="新增" id="buttonv2"></div></td>
                        </tr>
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
            <a style="color:black; text-decoration:solid;" href="../system/change.php?tid=<?php echo $tid ?>">更 改 密 碼</a>
        </div>
        <div style="margin-top:30px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="../system/pwdprotect.php?tid=<?php echo $tid ?>">密 保 問 題 </a>
        </div>
    </div>

</body>
</html>