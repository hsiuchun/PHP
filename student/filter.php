<!-- 歷史修課篩選結果 -->
<?php
session_start();
include("../conn.php");

if(isset($_POST["year"])){
    $year=$_POST["year"];
    // echo $year;
}
if(isset($_POST["semester"])){
    $semester=$_POST["semester"];
    // echo "$semester";
}
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
        <div id="name">&nbsp;高 大 選 課 系 統</div>
        <div class="line"></div>
        <div class="func">
            <div id="left">
                <div class="subject" onmouseover="switchMenu( this, 'subch', 'MouseOver' )" onmouseout="hideMenu()">選課系統
                <ul id="subch" class="submenu" style="display:none;" type="none">
                    <li><a href="../subject/chose.php?sid=<?php echo $_SESSION["ID"]; ?>">加選</a></li>
                    <li><a href="../subject/del.php?sid=<?php echo $_SESSION["ID"] ?>">退選</a></li>
                    <li><a href="../subject/select.php?sid=<?php echo $_SESSION["ID"] ?>">查詢</a></li>
                </ul>
                
                </div>
                <div class="subject"><a href="../course/course.php?sid=<?php echo $_SESSION["ID"] ?>">課程查詢</a></div>
                <div class="subject"><a href="../default.php?sid=<?php echo $_SESSION["ID"] ?>">個人檔案</a></div>
                <div class="subject"><a href="../student/history.php?sid=<?php echo $_SESSION["ID"] ?>">修課歷史</a></div>
                
            </div>
            <div id="right">
            <div class="subject"><a href="../default.php?sid=<?php echo $_SESSION["ID"] ?>"><?php echo $_SESSION["Name"]; ?></a></div>
            <div class="subject"><a href="../system/logout.php">登出</a></div>
            </div>
        </div>    
    </div>

    <div class="content">
        <div class="main">
            <div class="pform">
            <table cellpadding=5  style="border-collapse:collapse; width:90%; height:auto;table-layout:fixed;">
                <!-- <form action="" method="post" align="center" style="line-height: 10px;"> -->
                    <tr><td class="littlegrayline">學年</td><td colspan="2" class="littlegrayline"><?php echo $year ?></td>
                    <td class="littlegrayline">學期</td><td colspan="2" class="littlegrayline"><?php echo $semester ?></td>
                    <td class="littlegrayline" style='visibility:hidden;' colspan="2"></td><td class="littlegrayline"><div id="right"><div class="subject" id="buttonv2" style="height:20px;"><a style="line-height:20px;" href="../student/history.php?sid=<?php echo $_SESSION["ID"] ?>">返回</a></div></div></td></tr>
                    <!-- <tr><td class="littlegrayline" style='visibility:hidden;' colspan="2"></td></tr> -->
                </form>
                </table><br/><br/>
                <?php


                    $SQL="SELECT * FROM history H,score S WHERE H.sid='";
                    $SQL.=$_SESSION["ID"].'\'';
                    $SQL.=" AND H.sid=S.sid AND H.cid=S.soid";
                    if(isset($year)){
                        $SQL.=" AND H.year = '$year'";
                        // echo $SQL."<br/>";
                    }
                    if(isset($semester)){
                        $SQL.=" AND H.semester = '$semester'";
                        // echo $SQL."<br/>";
                    }
                    
                    echo "<table cellpadding=5  style='border-collapse:collapse; width:90%; height:auto;table-layout:fixed;'>";
                    
                    echo "<tr class='color1'>
                    <td style='width:10%;'>課程代碼</td>
                    <td style='width:15%;'>類別</td>
                    <td style='width:25%;'>課程名稱</td>
                    <td style='width:25%;'>修課時間</td>
                    <td style='width:15%;'>狀態</td>
                    <td style='width:10%;'>學分</td>
                    </tr>";
                    
                    if($result=mysqli_query($link,$SQL)){
                        $line=0;
                        while($row = mysqli_fetch_assoc($result)){
                            if($line%2==0){
                                echo "<tr class='color2'>
                                <td>".$row["cid"]."</td>
                                <td>".$row["kind"]."</td>
                                <td>".$row["cname"]."</td>
                                <td>".date('Y-m-d H:i:s',$row["time"])."</td><td>";
                                if($row["type"]=='2' && $row["point"]>59){
                                    echo "已通過";
                                }else if($row["type"]=='2' && $row["point"]<60){
                                    echo "未通過";
                                }else if($row["type"]=='4'){
                                    echo "棄選";
                                }
                                echo "</td><td>".$row["credit"]."</td></tr>";
                                $line+=1;
                            }else{
                                echo "<tr class='color3'>
                                <td>".$row["cid"]."</td>
                                <td>".$row["kind"]."</td>
                                <td>".$row["cname"]."</td>
                                <td>".date('Y-m-d H:i:s',$row["time"])."</td><td>";
                                if($row["type"]=='2' && $row["point"]>59){
                                    echo "已通過";
                                }else if($row["type"]=='2' && $row["point"]<60){
                                    echo "未通過";
                                }else if($row["type"]=='4'){
                                    echo "棄選";
                                }
                                echo "</td><td>".$row["credit"]."</td></tr>";
                                $line+=1;
                            }
                        }
                    }
                    echo "</table>";
                ?>
            </div>  
        </div>
        <div class="adition" style="background-color:white;">
    
        </div>
    </div>

</body>
</html>