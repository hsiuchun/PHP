<?php
ob_start();
session_start();
include("../conn.php");

$cd_id=$_GET["cd_id"];
$sid=$_GET["sid"];
$no=$_GET["no"];

echo $cd_id;
echo $sid;
echo $no;
// echo "yeah";
// $SQL = "DELETE FROM ch_course WHERE no='$no' AND cd_id='$cd_id' AND sid='$sid'";
$SQL = "UPDATE ch_course SET del=1 WHERE no='$no' AND cd_id='$cd_id' AND sid='$sid'";

// $SQL = "SELECT * FROM ch_course C,total_select T WHERE S.sid='";
// $SQL = "UPDATE total_select SET del=1 WHERE C.no=T.no AND C.cd_id=T.cid AND C.sid=T.sid";

echo $SQL;
// mysqli_query($link, $SQL);
if($result=mysqli_query($link,$SQL)){
    header('Location: del.php?sid='.$sid);
}
else{
    echo "更新失敗";
}

?>