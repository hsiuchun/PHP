<?php
include("../conn.php");
$tid=$_POST["tid"];
$tname=$_POST["tname"];
$tpwd=$_POST["tpwd"];

$SQL="INSERT INTO teacher (tid, tname, tpwd) 
VALUES ('$tid','$tname','$tpwd')";

if ($result=mysqli_query($link, $SQL)){ //這裡是$link，不是$con
	echo "新增成功";
	header("location:../manager/manage.php"); //這邊可以導到退選那頁

}else{
	echo "新增失敗";
	header("location:../manager/m_teacher.php");
}
?>