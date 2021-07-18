<?php
ob_start();
session_start();
include("../conn.php");
// $sid=$_POST["sid"];
$spwd=$_POST["spwd"];
$spwd1=$_POST["spwd1"];
$spwd2=$_POST["spwd2"];
// $_SESSION["ID"]=$_POST"sid"];
// echo $sid;

$SQL="SELECT * FROM student WHERE sid=";
$SQL.=$_SESSION["ID"];
// echo $SQL."<br/>";
if($result=mysqli_query($link,$SQL)){
    $row = mysqli_fetch_assoc($result);
    $opwd=$row["pwd"];
    // echo $row["pwd"]."原本密碼<br/>";
    // echo $opwd."原本密碼";
    if($spwd1!=$spwd2 or $opwd!=$spwd){
        header("location:../system/change.php?sid='".$_SESSION["ID"]."'");
        echo "資料填寫有誤";
    }else{
        $SQL1="UPDATE student SET pwd='$spwd1' WHERE sid=";
        $SQL1.=$_SESSION["ID"];
        // echo $SQL1."<br/>";
        // if($result1=mysqli_query($link,$SQL1)){
        //     echo "密碼更新成功<br/>";
        // }
        $result1=mysqli_query($link,$SQL1);
        
        header("location:../system/logout.php");
    }
}else{
    echo "拿資料失敗";
}

// echo $spwd;
// echo $spwd1;
// echo $spwd2;

?>
