<?php
include("../conn.php");
$sid=$_POST["sid"];
$name=$_POST["sname"];
$pwd=$_POST["spwd"];
$subject=$_POST["subject"];
$grade=$_POST["grade"];
$SQL="INSERT INTO student (sid, name, pwd, subject, grade) 
VALUES ('$sid','$name','$pwd','$subject','$grade')";

if ($result=mysqli_query($link, $SQL)){ //這裡是$link，不是$con
	echo "新增成功";
	header("location:../manager/manage.php"); //這邊可以導到退選那頁

}else{
	echo "新增失敗";
	header("location:../manager/m_student.php");
}
?>