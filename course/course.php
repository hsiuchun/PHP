<?php
session_start();
include("../conn.php");
$sid=$_GET["sid"];
$_SESSION["ID"]=$_GET["sid"];
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
<script type="text/javascript">
<!--
	function show(obj,item){
		document.getElementById(item).style.display = obj.checked?"block":"none";
	}
	function show2(obj,item){
		document.getElementById(item).style.display = obj.checked?"none":"block";
	}
//-->
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
                <form action="search.php?sid=<?php echo $_SESSION["ID"] ?>" method="post" align="center" style="line-height: 10px;">
                <tr>
                <td class="littlegrayline" colspan="2">學年</td>
                <td class="littlegrayline" ><select name="year" required>
                <option value="108">108</option>
                <option value="107">107</option>
                </select></td>
                <!-- semester:上學期1，下學期2，都行0 -->
                <td class="littlegrayline">學期</td>
                <td class="littlegrayline"><select name="semester" id="semester" required>
                <option value="2">2</option>
                <option value="1">1</option>
                </select></td>
                <!-- class:大學部1，碩士班2 -->
                <td class="littlegrayline" style='visibility:hidden;'></td>
                <td class="littlegrayline" colspan="2">部別</td>
                <td class="littlegrayline" colspan="6"><select name="class" required>
                <option value="1">大學部</option>
                <option value="2">碩士班</option>
                </select></td>
                </tr>
                <!-- dep:資管IM，亞太AB，金管FI，核心通識GR，博雅人文LI，博雅自然SC，博雅社會SO -->
                <tr>
                <td class="littlegrayline" colspan="2">科別</td>
                <td class="littlegrayline" colspan="4"><select name="dep" id="dep" required>
                <option value="IM">資管系</option>
                <option value="AB">亞太系</option>
                <option value="FI">金管系</option>
                <option value="GR">核心通識</option>
                </select></td>
                <!-- degree:一年級1，二年級2，三年級3，四年級4，都行0 -->
                <td class="littlegrayline" colspan="2">級別</td>
                <td class="littlegrayline" colspan="6"><select name="degree" id="">
                <option value="1">一年級</option>
                <option value="2">二年級</option>
                <option value="3">三年級</option>
                <option value="4">四年級</option>
                </select></td>
                </tr>

                <tr>
                <td class="littlegrayline" colspan="2">課程關鍵字</td>
                <td class="littlegrayline" colspan="4"><input type="text" name="keyword"></td>
                <td class="littlegrayline" colspan="2">上課時間</td>
                <td class="littlegrayline" colspan="2" width="10%"><select name="week" class="small">
                <option value=""></option>
                <option value="一">一</option>
                <option value="二">二</option>
                <option value="三">三</option>
                <option value="四">四</option>
                <option value="五">五</option>
                <option value="六">六</option>
                <option value="日">日</option>
                </select></td>
                <td class="littlegrayline" width="5%">第</td>
                <td class="littlegrayline" colspan="3" width="10%"><select name="ctime[]" class="small" multiple>
                <option value="X">X</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select></td>
                </tr>

                <tr>
                <td class="littlegrayline" style='visibility:hidden;' colspan="13"></td>
                <td class="littlegrayline"><div id="right"><input  type="submit" value="查詢" id="buttonv2"></div></td>
                </tr>

                <!-- <tr><td class="littlegrayline" style='visibility:hidden;'></td><td class="littlegrayline" style='visibility:hidden;'></td><td class="littlegrayline"><div id="right"><input type="submit" value="查詢" id="buttonv2"></div></td></tr> -->
                </form>
                </table>
                
                
                
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