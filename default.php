<?php
session_start();
include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選課系統plus版</title>
    <link rel="stylesheet" href="all.css">
    <script src="button.js"></script>
</head>
<body>
    <div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統 </div>
        <div class="line"></div>
        <div class="func">
            <div id="left">
                <div class="subject" onmouseover="switchMenu( this, 'subch', 'MouseOver' )" onmouseout="hideMenu()">選課系統
                <ul id="subch" class="submenu" style="display:none;" type="none">
                    <li><a href="./subject/chose.php?sid=<?php echo $_SESSION["ID"] ?>">加選</a></li>
                    <li><a href="./subject/del.php?sid=<?php echo $_SESSION["ID"] ?>">退選</a></li>
                    <li><a href="./subject/select.php?sid=<?php echo $_SESSION["ID"] ?>">查詢</a></li>
                </ul>
                
                </div>
                <div class="subject"><a href="./course/course.php?sid=<?php echo $_SESSION["ID"] ?>">課程查詢</a></div>
                <div class="subject"><a href="./default.php?sid=<?php echo $_SESSION["ID"] ?>">個人檔案</a></div>
                <div class="subject"><a href="./student/history.php?sid=<?php echo $_SESSION["ID"] ?>">修課歷史</a></div>
                
                <!-- </div> -->
            </div>
            <div id="right">
                <div class="subject"><a href="./default.php?sid=<?php echo $_SESSION["ID"] ?>"><?php echo $_SESSION["Name"]; ?></a></div>
                <div class="subject"><a href="./system/logout.php">登出</a></div>
            </div>
        </div>    
    </div>

    <div class="content">
        <div class="main">
            <!-- 要改，用switch case寫  -->
            <div class="pform">
                <?php
                    $SQL="SELECT * FROM student WHERE sid=";
                    $SQL.='\''.$_SESSION["ID"].'\'';

                    if($result=mysqli_query($link,$SQL)){
                        echo "<table cellpadding=5  style='border:1px solid white;border-collapse:collapse; width:90%; height:auto;table-layout:fixed;'>";

                        $row = mysqli_fetch_assoc($result);
                        echo "<tr class='color1'><td colspan=7 >個人資訊</td></tr>";
                        echo "<tr class='color2'><td style='width:20%;'>學號</td><td colspan=6>".$row["sid"]."</td></tr>";
                        echo "<tr class='color3'><td>姓名</td><td colspan=6>".$row["name"]."</td></tr>";
                        echo "<tr class='color2'><td>科系</td><td colspan=6>".$row["subject"]."</td></tr>";
                        echo "<tr class='color3'><td>年級</td><td colspan=6>".$row["grade"]."</td></tr>";
                        echo "<tr class='color2'><td>英文畢業門檻</td><td colspan=6>".$row["engrad"]."</td></tr>";
                        echo "<tr class='color3'><td>資訊畢業門檻</td><td colspan=6>".$row["ingrad"]."</td></tr>";
                        echo "<tr class='color2'><td>通識學分</td><td>20/24</td>
                        <td colspan=3>
                        <table cellpadding=5 class='grayline' style='border-collapse:collapse; width:100%; height:40%;table-layout:fixed;'> 
                        <tr><td colspan=3 class='grayline'>核心12</td></tr>
                        <tr><td rowspan=2 class='grayline'>自然科學</td><td colspan=2 class='grayline'>科學素養</td></tr>
                        <tr><td colspan=2 class='grayline'>倫理素養</td></tr>
                        <tr><td class='grayline' rowspan=2>人文科學</td><td class='grayline'>思維方法<font color=#ff502f>3</font></td></tr>
                        <tr><td class='grayline'>美學素養<font color=#ff502f>3</font></td></tr>
                        <tr><td class='grayline' rowspan=2>社會科學</td><td class='grayline'>公民素養<font color=#ff502f>3</font></td></tr>
                        <tr><td class='grayline'>文化素養<font color=#ff502f>3</font></td></tr>
                        </table>
                        </td>

                        <td colspan=2>
                        
                        <table cellpadding=5 class='grayline' style='border-collapse:collapse; width:100%; height:100%;table-layout:fixed;'> 
                        <tr><td colspan=2 class='grayline'>博雅8</td></tr>
                        <tr><td class='grayline'>自然科學<font color=#ff502f>2</font></td></tr>
                        <tr><td class='grayline'>人文科學<font color=#ff502f>2</font></td></tr>
                        <tr><td class='grayline'>社會科學<font color=#ff502f>4</font></td></tr>
                        <tr style='visibility:hidden;'><td>社會科學</td></tr>
                        <tr style='visibility:hidden;'><td>社會科學</td></tr>
                        <tr style='visibility:hidden;'><td>社會科學</td></tr>
                        </table>
                        </td>
                        </tr>";
                        echo "</table>";
                    }else{
                        echo "enter failed";
                    }



                ?>
            </div>  
        </div>
        <div class="adition" align="center">
            <div class="icon">
                <img margin-left="30px" src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" alt="" height="200px">
            </div>
        </div>
        <div style="margin-top:50px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="./system/change.php?sid=<?php echo $_SESSION["ID"] ?>">更 改 密 碼</a>
        </div>
        <div style="margin-top:30px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="./system/pwdprotect.php?sid=<?php echo $_SESSION["ID"] ?>">密 保 問 題 </a>
        </div>
    </div>

</body>
</html>