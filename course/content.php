<?php
session_start();
include("../conn.php");
// $sid=$_GET["sid"];
// $_SESSION["ID"]=$_GET["sid"];
// $result=mysqli_query($link,$SQL);
// $row = mysqli_fetch_assoc($result);
// ob_start();
// session_start();
// include("../conn.php");
$cid=$_GET["cid"];
// echo $cid;
// header("location:../course/search.php?sid=".$_SESSION["ID"]."&year=".$year."&semester=".$semester."&class=".$class."&dep=".$dep."&degree=".$degree."&keyword=".$keyword."&week=".$week."&ctime=".$ctime."");
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
        <div class="main" style='height:auto;'>
            <div class="cid_content">
                <?php
                    $SQL="SELECT * FROM course C,content C2,teacher T WHERE C.cid='$cid' AND C.cid=C2.cid AND T.tid=C.tid";          
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
                        <td style='width:5%;'>語言</td>
                        <td class='littlegrayline' style='visibility:hidden;'></td>
                        </tr>";

                        if($result=mysqli_query($link,$SQL)){
                            while( $row = mysqli_fetch_assoc($result) ){ 
                                echo "<tr class='color2'>
                                <td>".$row["cid"]."</td>
                                <td>".$row["c_kind"]."</td>
                                <td>".$row["cname"]."</td>
                                <td>".$row["tname"]."</td>
                                <td>".$row["c_fre"]."</td>
                                <td>".$row["credit"]."</td>
                                <td>".$row["c_limit"]."</td>
                                <td>".$row["c_bal"]."</td>
                                <td>".$row["c_room"]."</td>
                                <td>".$row["cday"].$row["ctime"]."</td>
                                <td>".$row["language"]."</td>
                                </tr>";

                                echo "<tr>
                                <td class='color1'>教學目標</td>
                                <td colspan='10' class='color3'>".nl2br($row["target"])."</td>
                                </tr><tr>
                                <td class='color1'>授課形式</td>
                                <td colspan='10' class='color2'>".nl2br($row["style"])."</td>
                                </tr><tr>
                                <td class='color1'>課程內容</td>
                                <td colspan='10' class='color3'>".nl2br($row["description"])."</td>
                                </tr><tr>
                                <td class='color1'>評分標準</td>
                                <td colspan='10' class='color2'>".nl2br($row["standard"])."</td>
                                </tr><tr>
                                <td class='color1'>教科書</td>
                                <td colspan='10' class='color3'>".nl2br($row["textbook"])."</td>
                                </tr>";

                                echo "<tr><td class='littlegrayline' style='visibility:hidden;' colspan='10'></td><td class='littlegrayline'><div id='right'><div class='subject' id='buttonv2' style='height:20px;'><a style='line-height:20px;' href='../course/course.php?sid=".$_SESSION["ID"].'\''.">X返回X</a></div></div></td></tr>"; //無法返回到搜尋結果那頁，先將其跳轉至course.php頁面
                            }
                        }
                    echo "</table>";
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