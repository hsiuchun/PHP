<?php
ob_start();
include("../conn.php");
if(!empty($_GET["tid"])){
    $tid=$_GET["tid"];
}
if(!empty($_GET["sid"])){
    $sid=$_GET["sid"];
}

$SQL = "DELETE FROM teacher WHERE tid='$tid'";
$SQL1 = "DELETE FROM student WHERE sid='$sid'";
if($result=mysqli_query($link,$SQL)){
    header("location:../manager/manage.php");
}else{
    echo "更新失敗";
}

if($result=mysqli_query($link,$SQL1)){
    header("location:../manager/manage.php");
}else{
    echo "更新失敗";
}

?>