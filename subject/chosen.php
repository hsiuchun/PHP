<?php
ob_start();
session_start();

include("../conn.php");   
$time=time();

if(!empty($_POST["course"])){
	$cid=$_POST["course"];  
}else{
	$cid=$_POST["cid"];
}
echo $cid."<br>";

$type=1; //尚未分發的type是1
$sid=$_GET["sid"]; //表單傳送時加入
echo $sid."<br>";
$SQL="SELECT C2.cd_id,C2.sid,C2.del FROM course C1,ch_course C2 WHERE C1.cid=C2.cd_id AND C2.sid='$sid' AND C2.cd_id='$cid' AND C2.del=0";
$i=0;
if ($result=mysqli_query($link, $SQL)){
	while($row=mysqli_fetch_assoc($result)){
		// echo $row["cd_id"].$row["sid"].$row["del"]."<br/>";
		$i++;
	}
}
if ($i>0) //有問題
{ //這裡是$link，不是$con
	// echo $result;
	echo "你已經加選過此課";
	header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");

}
else{
	echo "居然來到這裡了嗎";
	$SQL1="INSERT INTO ch_course (cd_id, sid, ch_type, ch_time, del) VALUES ('$cid','$sid','$type','$time', '0')";
	if ($result=mysqli_query($link, $SQL1)){ //這裡是$link，不是$con
		echo "加選成功";
		header("location:../subject/del.php?sid=".$_SESSION["ID"].""); //這邊可以導到退選那頁

	}else{
		echo "加選失敗";
		header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
	}
}


// $SQL="SELECT C2.cd_id,C2.sid,C2.del FROM student S,course C1,ch_course C2 WHERE C1.cid=C2.cd_id AND S.sid=C2.sid AND S.sid='$sid' AND C2.cd_id='$cid' GROUP BY C2.cd_id,C2.sid,C2.del HAVING C2.del=0";
// echo $SQL."</br>";
// $SQL1="SELECT C2.cd_id,C2.sid,C2.del FROM student S,course C1,ch_course C2 WHERE C1.cid=C2.cd_id AND S.sid=C2.sid AND S.sid='$sid' AND C2.cd_id='$cid' GROUP BY C2.cd_id,C2.sid,C2.del HAVING C2.del=1";
// echo $SQL1."</br>";
// $SQL2="INSERT INTO ch_course (cd_id, sid, ch_type, ch_time, del) 
// VALUES ('$cid','$sid','$type','$time', '0')";
// echo $SQL2."</br>";
// // if ($result=mysqli_query($link, $SQL)){
// // 	// while($row=mysqli_fetch_assoc($result)){
// // 	// 	echo $row["cd_id"].$row["sid"].$row["del"]."<br/>";
// // 	// }
// // 	echo "您已加選此課了";
// // 	// header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
// // }
// // else if(mysqli_query($link, $SQL1)){
// // 			$SQL2="INSERT INTO ch_course (cd_id, sid, ch_type, ch_time, del) 
// // 			VALUES ('$cid','$sid','$type','$time','0')";
// // 			if ($result1=mysqli_query($link, $SQL2)){ //這裡是$link，不是$con
// // 				echo "加選成功1";
// // 				// header("location:../subject/del.php?sid=".$_SESSION["ID"].""); //這邊可以導到退選那頁

// // 			}else{
// // 				echo "加選失敗1";
// // 				// header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
// // 			}
// // }else{
// // 	if ($result2=mysqli_query($link, $SQL2)){ //這裡是$link，不是$con
// // 		echo "加選成功2";
// // 		// header("location:../subject/del.php?sid=".$_SESSION["ID"].""); //這邊可以導到退選那頁
// // 	}else{
// // 		echo "加選失敗2";
// // 		// header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
// // 	}
// // }

// $SQL3="SELECT C2.cd_id,C2.sid,C2.del FROM student S,course C1,ch_course C2 WHERE C1.cid=C2.cd_id AND S.sid=C2.sid AND S.sid='$sid' AND C2.cd_id='$cid' GROUP BY C2.cd_id,C2.sid,C2.del";
// echo $SQL3."<br/>";
// if ($result=mysqli_query($link, $SQL3)){
// 	while($row=mysqli_fetch_assoc($result)){
// 		if($row["del"]==0){
// 			echo "您已加選此課了";
// 		}else if($row["del"]==1){
// 			$SQL2="INSERT INTO ch_course (cd_id, sid, ch_type, ch_time, del) 
// 			VALUES ('$cid','$sid','$type','$time','0')";
// 			if ($result1=mysqli_query($link, $SQL2)){ //這裡是$link，不是$con
// 				echo "加選成功1";
// 				// header("location:../subject/del.php?sid=".$_SESSION["ID"].""); //這邊可以導到退選那頁

// 			}else{
// 				echo "加選失敗1";
// 				// header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
// 			}
// 		}
// 	}	
// 	// header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
// }else{
// 	if ($result2=mysqli_query($link, $SQL2)){ //這裡是$link，不是$con
// 		echo "加選成功2";
// 		// header("location:../subject/del.php?sid=".$_SESSION["ID"].""); //這邊可以導到退選那頁
// 	}else{
// 		echo "加選失敗2";
// 		// header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
// 	}
// }

// $SQL="SELECT * FROM student S, ch_course C1, course C2 WHERE C1.cd_id=C2.cid AND C1.sid=S.sid AND C1.del=0 AND C1.sid='$sid' AND C1.cd_id='$cid' GROUP BY C1.sid,C1.cd_id,C1.del";

// if(mysqli_query($link, $SQL)){
// 	while($row=mysqli_fetch_assoc($result)){
// 		if($row["sid"]!=""){
// 			echo "你已經加選過此課";
// 		}
// 	}
// }else{
// 	$SQL1="INSERT INTO ch_course (cd_id, sid, ch_type, ch_time) 
// 	VALUES ('$cid','$sid','$type','$time')";

//  // echo $SQL1."<br/>";
// 	if ($result1=mysqli_query($link, $SQL1)){ //這裡是$link，不是$con
// 		echo "加選成功";
//   		header("location:../subject/del.php?sid=".$_SESSION["ID"].""); //這邊可以導到退選那頁

//  	}else{
//   		echo "加選失敗";
//   		header("location:../subject/chose.php?sid=".$_SESSION["ID"]."");
//  	}
// }

?>