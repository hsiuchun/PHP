<?php
session_start();
include("../conn.php");
$sid=$_GET["sid"];
// $result=mysqli_query($link,$SQL);
// $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選課系統plus版</title>
    <link rel="stylesheet" href="../all.css">
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
<script LANGUAGE=javascript> 
    function del() { 
        var msg = "您確定要退選嗎？"; 
        if (confirm(msg)==true){ 
            return true; 
        }else{ 
            return false; 
        } 
    }    
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
            <div class="pform">
                <?php
                    $SQL="SELECT * FROM student S,ch_course C,course C1 WHERE S.sid='";
                    $SQL.=$_SESSION["ID"].'\'';
                    $SQL.="AND S.sid=C.sid AND C.cd_id=C1.cid";
                    echo "<table cellpadding=5  style='border-collapse:collapse; width:90%; height:auto;table-layout:fixed;'>";

                    
                    echo "<tr class='color1'>
                    
                    <td style='width:10%;'>課程代碼</td>
                    <td style='width:10%;'>類別</td>
                    <td style='width:20%;'>課程名稱</td>
                    <td style='width:20%;'>加選時間</td>
                    <td style='width:10%;'>狀態</td>
                    <td style='width:5%;'>退選</td>
                    </tr>";
                    if($result=mysqli_query($link,$SQL)){
                        $line=0;
                        while($row = mysqli_fetch_assoc($result)){
                            if($row["del"]==0){
                                if($line%2==0){
                                    echo "<tr class='color2'>
                                    <td>".$row["cd_id"]."</td>
                                    <td>".$row["c_kind"]."</td>
                                    <td>".$row["cname"]."</td>
                                    <td>".date('Y-m-d H:i:s',$row["ch_time"])."</td><td>";
                                    if($row["ch_type"]=='2'){
                                        echo "已選上";
                                    }else if($row["ch_type"]=='1'){
                                        echo "尚未分發";
                                    }
                                    echo "<td><a id='del' style='color:#17223b;' href=delete.php?cd_id=".$row["cid"]."&sid=".$_SESSION["ID"]."&no=".$row["no"]." onclick='javascript:return del()'>退選</a></td></tr>";
                                    $line+=1;
                                }else{
                                    echo "<tr class='color3'>
                                    <td>".$row["cd_id"]."</td>
                                    <td>".$row["c_kind"]."</td>
                                    <td>".$row["cname"]."</td>
                                    <td>".date('Y-m-d H:i:s',$row["ch_time"])."</td><td>";
                                    if($row["ch_type"]=='2'){
                                        echo "已選上";
                                    }else if($row["ch_type"]=='1'){
                                        echo "尚未分發";
                                    }
                                    echo "<td><a style='color:#17223b;' href=delete.php?cd_id=".$row["cid"]."&sid=".$_SESSION["ID"]."&no=".$row["no"]." onclick='javascript:return del()'>退選</a></td></tr>";
                                    $line+=1;
                                }
                            }
                        }
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