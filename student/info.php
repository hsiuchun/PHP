<?php
ob_start();
session_start();
include("../conn.php");

$sid=$_POST["id"];
$spwd=$_POST["pwd"];

// $tid=$_POST["id"];
// $tpwd=$_POST["pwd"];

$SQL="SELECT * FROM student WHERE sid='$sid' AND pwd='$spwd'";
// echo $sid;
$SQL1="SELECT * FROM teacher WHERE tid='$sid' AND tpwd='$spwd'";

if($result=mysqli_query($link,$SQL)){
    if($row = mysqli_fetch_assoc($result)){
        // $row = mysqli_fetch_assoc($result);
        $_SESSION["Name"]=$row["name"];
        $_SESSION["ID"]=$sid;
        echo"登入成功";
        header("location:../default.php?sid='$sid'");
    }else{
        echo "登入失敗，將在3秒後跳轉回登入頁面";
        echo "<meta http-equiv='refresh' content='3;url=../system/login.php'/>";
    }
}
if($result1=mysqli_query($link,$SQL1)){
    if($row1 = mysqli_fetch_assoc($result1)){
        $_SESSION["TName"]=$row1["tname"];
        $_SESSION["TID"]=$sid;
        // $tid=$_SESSION["TID"];
        echo"登入成功";
        header("location:../teacher/default.php?tid='$sid'");
    }else{
        echo "登入失敗，將在3秒後跳轉回登入頁面";
        echo "<meta http-equiv='refresh' content='3;url=../system/login.php'/>";
    }

    
}


?>