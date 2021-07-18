<?php
// ob_start();
session_start();
include("../conn.php");
// $sid=$_GET["sid"];
// $_SESSION["ID"]=$_GET["sid"];
// $result=mysqli_query($link,$SQL);
// $row = mysqli_fetch_assoc($result);
// ob_start();
// session_start();
// include("../conn.php");
$year=$_POST["year"];
$semester=$_POST["semester"];
$class=$_POST["class"];
$dep=$_POST["dep"];

if(isset($_POST["degree"])){
    $degree=$_POST["degree"];
    // echo "yes1";
}
if(isset($_POST["keyword"])){
    $keyword=$_POST["keyword"];
    // echo "yes2";
}
if(isset($_POST["week"])){
    $week=$_POST["week"];
    // echo "yes3";
}
$ct="";
if(isset($_POST["ctime"])){
    $ctime=$_POST["ctime"];
    // echo "yes4";
    $timecount=count($ctime);
    for($i=0;$i<$timecount;$i++){
        $ct.=$ctime[$i];
    }
}
$_SESSION["CID"]="";
// header("location:../course/search.php?sid=".$_SESSION["ID"]."&year=".$year."&semester=".$semester."&class=".$class."&dep=".$dep."&degree=".$degree."&keyword=".$keyword."&week=".$week."&ct=".$ct);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選課系統plus版</title>
    <link rel="stylesheet" href="../all.css">
    <!-- <link rel="stylesheet" href="../system/login.css"> -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="../button.js"></script>

    <script>
    $(function(){
    var w = $("#mwt_slider_content").width();
    // $('#mwt_slider_content').css('height', ($(window).height() - 50) + 'px' ); //將區塊自動撐滿畫面高度

    $("#mwt_fb_tab").mouseover(function(){ //滑鼠滑入時
        if ($("#mwt_mwt_slider_scroll").css('right') == '-'+w+'px')
        {
            $("#mwt_mwt_slider_scroll").animate({ right:'0px' }, 400 ,'swing');
        }
    });


    $("#mwt_slider_content").mouseleave(function(){　//滑鼠離開後
        $("#mwt_mwt_slider_scroll").animate( { right:'-'+w+'px' }, 400 ,'swing');    
    }); 
});

$(function(){
    var w = $("#mwt_slider_content2").width();
    // $('#mwt_slider_content2').css('height', ($(window).height() - 50) + 'px' ); //將區塊自動撐滿畫面高度

    $("#mwt_fb_tab2").mouseover(function(){ //滑鼠滑入時
        if ($("#mwt_mwt_slider_scroll2").css('right') == '-'+w+'px')
        {
            $("#mwt_mwt_slider_scroll2").animate({ right:'0px' }, 400 ,'swing');
        }
    });


    $("#mwt_slider_content2").mouseleave(function(){　//滑鼠離開後
        $("#mwt_mwt_slider_scroll2").animate( { right:'-'+w+'px' }, 400 ,'swing');    
    }); 
});

$(function(){
    var w = $("#mwt_slider_content3").width();
    // $('#mwt_slider_content3').css('height', ($(window).height() - 50) + 'px' ); //將區塊自動撐滿畫面高度

    $("#mwt_fb_tab3").mouseover(function(){ //滑鼠滑入時
        if ($("#mwt_mwt_slider_scroll3").css('right') == '-'+w+'px')
        {
            $("#mwt_mwt_slider_scroll3").animate({ right:'0px' }, 400 ,'swing');
        }
    });


    $("#mwt_slider_content3").mouseleave(function(){　//滑鼠離開後
        $("#mwt_mwt_slider_scroll3").animate( { right:'-'+w+'px' }, 400 ,'swing');    
    }); 
});
</script>

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
            <div class="course">
                <table>
                    <!-- <form action="search.php?sid=<?php echo $_SESSION["ID"] ?>" method="post" align="center" style="line-height: 10px;"> -->
                    <tr><td class="littlegrayline" colspan="2">學年</td><td class="littlegrayline" ><?php echo $year ?>
                    <!-- <input type="text" value=""> -->
                    </td>
                    <td class="littlegrayline">學期</td><td class="littlegrayline">
                    <?php 
                        if ($semester=="1"){
                            echo "上";
                        }else if($class=="2"){
                            echo "下";
                        }
                    ?>
                    </td><td class="littlegrayline" style='visibility:hidden;'></td>
                    <td class="littlegrayline" colspan="2">部別</td><td class="littlegrayline" colspan="6">
                    <?php 
                        if ($class=="1"){
                            echo "大學部";
                        }else if($class=="2"){
                            echo "碩士班";
                        }
                    ?></td></tr>

                    <tr><td class="littlegrayline" colspan="2">科別</td><td class="littlegrayline" colspan="4">
                    <?php 
                        if ($dep=="IM"){
                            echo "資管系";
                        }else if($dep=="AB"){
                            echo "亞太系";
                        }else if($dep=="FI"){
                            echo "金管系";
                        }else if($dep=="GR"){
                            echo "核心通識";
                        }
                     
                    ?></td>
                    <td class="littlegrayline" colspan="2">級別</td><td class="littlegrayline" colspan="6">
                    <?php 
                        if ($degree=="1"){
                            echo "一年級";
                        }else if($degree=="2"){
                            echo "二年級";
                        }else if($degree=="3"){
                            echo "三年級";
                        }else if($degree=="4"){
                            echo "四年級";
                        }
                    ?></td></tr>

                    <tr><td class="littlegrayline" colspan="2">課程關鍵字</td><td class="littlegrayline" colspan="4"><?php echo $keyword ?></td>
                    <td class="littlegrayline" colspan="2">上課時間</td><td class="littlegrayline" colspan="2" width="10%">
                    <?php 
                        if ($week=="一"){
                            echo "星期一";
                        }else if($week=="二"){
                            echo "星期二";
                        }else if($week=="三"){
                            echo "星期三";
                        }else if($week=="四"){
                            echo "星期四";
                        }else if($week=="五"){
                            echo "星期五";
                        }else if($week=="六"){
                            echo "星期六";
                        }else if($week=="日"){
                            echo "星期日";
                        }
                    ?></td>
                    <td class="littlegrayline" width="5%">第</td>
                    <td class="littlegrayline" colspan="2" width="10%"><?php echo $ct ?></td><td class="littlegrayline" width="5%">節</td></tr>

                    <!-- <tr><td class="littlegrayline" style='visibility:hidden;' colspan="13"></td><td class="littlegrayline"><div id="right"><input  type="submit" value="查詢" id="buttonv2"></div></td></tr> -->
                    <!-- <tr><td class="littlegrayline" style='visibility:hidden;' colspan="13"></td><td class="littlegrayline"><div id="right"><input  type="button" value="返回" id="buttonv2" onclick="location.href:'../course/course.php?sid=<?php echo $_SESSION['ID'] ?>'"></div></td></tr> -->
                    <tr><td class="littlegrayline" style='visibility:hidden;' colspan="13"></td><td class="littlegrayline"><div id="right"><div class="subject" id="buttonv2" style="height:20px;"><a style="line-height:20px;" href="../course/course.php?sid=<?php echo $_SESSION["ID"] ?>">返回</a></div></div></td></tr>
                    <!-- </form> -->
                    </table>
                </div>
            <div class="line" style="width:80%;"></div>
            <div class="pform">
                <?php
                    $SQL="SELECT * FROM course C,teacher T WHERE C.tid=T.tid AND C.c_class = '$class' AND C.c_dep = '$dep'";
                    // echo $SQL."<br/>";
                    if($dep=="GR" && isset($degree)){
                        $degree=0;
                        $SQL.=" AND C.c_degree=$degree";
                        // echo $SQL."是"."<br/>";
                    }else{
                        $SQL.=" AND C.c_degree=$degree";
                        // echo $SQL."不是"."<br/>";
                    }
                    if($dep=="GR" && isset($semester)){
                        $semester=0;
                        $SQL.=" AND C.c_semester=$semester";
                        // echo $SQL."是"."<br/>";
                    }else{
                        $SQL.=" AND C.c_semester=$semester";
                        // echo $SQL."不是"."<br/>";
                    }
                    if(!isset($keyword)){
                        $SQL.=" AND C.cname like '%$keyword%'";
                        // echo $SQL."<br/>";
                    }
                    if(!isset($week)){
                        $SQL.=" AND C.cday = '$week'";
                        // echo $SQL."<br/>";
                    }
                    if(!isset($ctime)){
                        $SQL.=" AND C.ctime like '%$ct%'";
                        // echo $SQL."<br/>";
                    }
                    // echo $SQL."<br/>";
                    
                        
                    echo "<table cellpadding=5  style='border-collapse:collapse; width:auto; height:auto;table-layout:fixed;'>";
                            
                        echo "<tr class='color1'>
                        <td style='width:10%;'>課程代碼</td>
                        <td style='width:10%;'>類別</td>
                        <td style='width:15%;'>課程名稱</td>
                        <td style='width:10%;'>授課老師</td>
                        <td style='width:5%;'>點閱次數</td>
                        <td style='width:5%;'>學分</td>
                        <td style='width:5%;'>限修人數</td>
                        <td style='width:5%;'>餘額</td>
                        <td style='width:10%;'>上課教室</td>
                        <td style='width:10%;'>授課時間</td>
                        <td style='width:5%;'>加選</td>
                        <td class='littlegrayline' style='visibility:hidden;'></td>
                        </tr>";

                        if($result=mysqli_query($link,$SQL)){
                        $line=0;
                        while( $row = mysqli_fetch_assoc($result) ){ 
                            if($line%2==0){
                                echo "<form action='../course/content,php' method='get'><input type='hidden' value='".$row["cid"]."'></form>";
                                // $_SESSION["CID"]=$row["cid"];
                                echo "<tr class='color2'>
                                <td>".$row["cid"]."</td>
                                <td>".$row["c_kind"]."</td>
                                <td><a style='color:#17223b;' href='../course/content.php?cid=".$row["cid"].'\''.">".$row["cname"]."</a>"."</td>
                                <td>".$row["tname"]."</td>
                                <td>".$row["c_fre"]."</td>
                                <td>".$row["credit"]."</td>
                                <td>".$row["c_limit"]."</td>
                                <td>".$row["c_bal"]."</td>
                                <td>".$row["c_room"]."</td>
                                <td>".$row["cday"].$row["ctime"]."</td>
                                <td><a style='color:black;' href=''>加選</a></td>
                                </tr>";
                                $line+=1;
                            }
                            else{
                                $_SESSION["CID"]=$row["cid"];
                                echo "<tr class='color3'>
                                <td>".$row["cid"]."</td>
                                <td>".$row["c_kind"]."</td>
                                <td><a style='color:#263859;' href='../course/content.php?cid=".$row["cid"].'\''.">".$row["cname"]."</a>"."</td>
                                <td>".$row["tname"]."</td>
                                <td>".$row["c_fre"]."</td>
                                <td>".$row["credit"]."</td>
                                <td>".$row["c_limit"]."</td>
                                <td>".$row["c_bal"]."</td>
                                <td>".$row["c_room"]."</td>
                                <td>".$row["cday"].$row["ctime"]."</td>
                                <td><a style='color:black;' href=''>加選</a></td>
                                </tr>";
                                $line+=1;
                            }
                        }

                    echo "</table>";
                    }
                ?>
                
                
            </div>
        </div>
        <div class="adition" id="mwt_mwt_slider_scroll" style="background-color:white;">
            <div id="mwt_fb_tab">
                <span>課</span>
                <span>表</span>
            </div>
            <div id="mwt_slider_content">
                <!-- <iframe src="../圖片2.png" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:350px;" allowTransparency="true"></iframe> -->
                <img src="../圖片2.png" alt="" style="border:none; overflow:hidden; width:250px;">
            </div>
        </div>

        <div class="adition" id="mwt_mwt_slider_scroll2" style="background-color:white;">
            <div id="mwt_fb_tab2">
                <span>排</span>
                <span>名</span>
            </div>
            <div id="mwt_slider_content2">
            <iframe src="../course/rating.php" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:350px;" allowTransparency="true">
            </iframe>
                
            </div>
        </div>

        <div class="adition" id="mwt_mwt_slider_scroll3" style="background-color:white;">
            <div id="mwt_fb_tab3">
                <span>學</span>
                <span>分</span>
            </div>
            <div id="mwt_slider_content3">
                <iframe src="../student/credit.php" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:450px;" allowTransparency="true"></iframe>
            </div>
        </div>
    </div>

</body>
</html>