<!-- 更新密保問題答案 -->

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

            <?php

                ob_start();
				session_start();				

                $sid=$_POST["sid"];
				$pwdpt1=$_POST["pwdpt1"];
				$pwdpt2=$_POST["pwdpt2"];

                $link=mysqli_connect('localhost','root','Rinee252515','phpreportplus'); //可以用include(conn.php)寫

                //為什麼要寫這段?
                // $SQL="SELECT * FROM student WHERE sid='$sid'"
                // if($result=mysqli_query($link, $SQL)){
                //     if($row=mysqli_fetch_assoc($result)) {
                //         $pwdpt1=$row["pwdpt1"];
                //         $pwdpt2=$row["pwdpt2"];
                //     }
                // }                 

                //跟上面重複ㄌ
                // $sid=$_POST["sid"];
				// $pwdpt1=$_POST["pwdpt1"];
                // $pwdpt2=$_POST["pwdpt2"];

                //如果之後的SQL有好幾種，建議命名不同，除非是if-else條件，避免被覆蓋掉
				$SQL="UPDATE student SET pwdpt1='$pwdpt1',pwdpt2='$pwdpt2' WHERE sid='$sid'"; 
				    // $SQL1.=$_SESSION["ID"];
				    // mysqli_query($link,$SQL1);

				if($result=mysqli_query($link,$SQL)){ 
					echo"<br><br><br>";
					echo "<center>更新成功，將在3秒後跳轉回首頁</center>";   
       				echo "<meta http-equiv='refresh' content='3;url=../default.php'/>";

				}else{
					echo"<br><br><br>";
				    echo "<center>更新失敗，將在3秒後跳轉回首頁</center>";
				    header("location:../default.php?sid='".$_SESSION["ID"]."'");

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
            <a style="color:black; text-decoration:solid;" href="../system/change.php?sid=<?php echo $_SESSION["ID"] ?>">更 改 密 碼</a>
        </div>
        <div style="margin-top:30px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="../system/pwdprotect.php?sid=<?php echo $_SESSION["ID"] ?>">密 保 問 題 </a>
        </div>
    </div>
    

</body>
</html>

