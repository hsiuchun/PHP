<?php
session_start();
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
</head>
<body>
    <div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統 </div>
        <div class="line"></div>
        <div class="func">
            <div id="left">
                <div class="subject"><a href="../teacher/t_course.php?sid=<?php echo $_SESSION["TID"] ?>">新增課程</a></div>
                <div class="subject"><a href="../teacher/default.php?sid=<?php echo $_SESSION["TID"] ?>">個人檔案</a></div>
                <div class="subject"><a href="../teacher/selectlist.php?sid=<?php echo $_SESSION["TID"] ?>">選課名單</a></div>
                
            </div>
            <div id="right">
                <div class="subject"><a href="../teacher/default.php?tid=<?php echo $_SESSION["TID"] ?>"><?php echo $_SESSION["TName"]; ?></a></div>
                <div class="subject"><a href="../system/logout.php">登出</a></div>
            </div>
        </div>    
    </div>

    <div class="content">
        <div class="main">
            <!-- 要改，用switch case寫  -->
            <div class="pform">
                <?php
                    $SQL1="SELECT * FROM teacher T,course C WHERE T.tid=";
                    $SQL1.='\''.$_SESSION["TID"].'\'';
                    $SQL1.=" AND T.cid=C.cid";

                    if($result=mysqli_query($link,$SQL1)){
                        echo "<table cellpadding=5  style='border:1px solid white;border-collapse:collapse; width:90%; height:auto;table-layout:fixed;'>";
                        
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr class='color1'><td colspan=7 >個人資訊</td></tr>";
                            echo "<tr class='color2'><td style='width:20%;'>教師編號</td><td colspan=6>".$row["tid"]."</td></tr>";
                            echo "<tr class='color3'><td>教師姓名</td><td colspan=6>".$row["tname"]."</td></tr>";
                            echo "<tr class='color2'><td>課程代碼</td><td colspan=6>".$row["cid"]."</td></tr>";
                            echo "<tr class='color3'><td>課程名稱</td><td colspan=6>".$row["cname"]."</td></tr>";
                            echo "<tr class='color2'><td>上課教室</td><td colspan=6>".$row["c_room"]."</td></tr>";
                            echo "<tr class='color3'><td>上課時間</td><td colspan=6>".$row["ctime"]."</td></tr></table>";    
                        }
                    }else{
                        echo "enter failed";
                        echo $SQL1;
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
            <a style="color:black; text-decoration:solid;" href="../system/change.php?sid=<?php echo $_SESSION["TID"] ?>">更 改 密 碼</a>
        </div>
        <div style="margin-top:30px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="../system/pwdprotect.php?sid=<?php echo $_SESSION["TID"] ?>">密 保 問 題 </a>
        </div>
    </div>

</body>
</html>