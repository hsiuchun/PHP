<!-- 驗證密保問題答案 -->

<?php
ob_start();
session_start();

include("../conn.php");

$sid=$_POST["sid"];;
$pwdpt1=$_POST["pwdpt1"];
$pwdpt2=$_POST["pwdpt2"];

$SQL="SELECT * FROM student where sid='$sid' AND pwdpt1='$pwdpt1' AND pwdpt2='$pwdpt2'";

if($result=mysqli_query($link,$SQL)){

    if($row = mysqli_fetch_assoc($result)){
        // echo"驗證成功<br>";
        echo "<html><head><meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>login</title>
        <link rel='stylesheet' href='../system/login.css'>
        <script src='../button.js'></script>
    </head><div class='header'>
    <div id='name'>&nbsp;高 大 選 課 系 統</div>
    <div class='line'></div>
    <div class='func'>
        <div id='right'>
        <input type='button' value='登入' id='button'>
        <input type='button' value='登出' id='button'>
        </div>
    </div>    
</div>

<div class='content'><div class='header' id='subheader'>
</div><table cellpadding='5'><tr>";
        echo "<td>帳號</td><td>".$row["sid"]."</td></tr><tr><td>密碼</td><td>".$row["pwd"]."</td></tr>";
        // echo $sid."-".$pwd;

        echo "<tr><td colspan='2'><a href='../system/login.php'>回首頁登入</a></td></table></div>";
    }
    else{
        echo "驗證失敗，將在3秒後跳轉回登入頁面";
        echo "<meta http-equiv='refresh' content='3;url=../system/checkform.php'/>";
    }
     
}
?>