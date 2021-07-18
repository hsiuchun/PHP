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

<?php
//按照當時情形修改學期 c_cemester
$local_semester=2;
//IM

$SQL="SELECT * FROM course WHERE c_semester=$local_semester AND c_dep like 'IM'";
if($result=mysqli_query($link,$SQL)){
	$i=0;
	//建立系所名稱陣列
	echo "<script LANGUAGE='javascript'> var B=[];</script>";
	//建立系所編號陣列
	echo "<script LANGUAGE='javascript'> var BC=[];</script>";
	while($row=mysqli_fetch_assoc($result)){
	//加入所有系所名稱值
	    echo "<script LANGUAGE='javascript'>B.push('".$row["cname"]."');</script>";
	    echo "<script LANGUAGE='javascript'>BC.push('".$row["cid"]."');</script>";
		$i++;
	}
}
//IM grade 1
$SQL="SELECT * FROM course WHERE c_semester=$local_semester AND c_dep like 'IM' AND c_degree=1";
if($result=mysqli_query($link,$SQL)){
	$i=0;
	//建立系所名稱陣列
	echo "<script LANGUAGE='javascript'> var B1=[];</script>";
	//建立系所編號陣列
	echo "<script LANGUAGE='javascript'> var BC1=[];</script>";
	while($row=mysqli_fetch_assoc($result)){
	//加入所有系所名稱值
	    echo "<script LANGUAGE='javascript'>B1.push('".$row["cname"]."');</script>";
	    echo "<script LANGUAGE='javascript'>BC1.push('".$row["cid"]."');</script>";
		$i++;
	}
}
//IM grade 2
$SQL="SELECT * FROM course WHERE c_semester=$local_semester AND c_dep like 'IM' AND c_degree=2";
if($result=mysqli_query($link,$SQL)){
	$i=0;
	//建立系所名稱陣列
	echo "<script LANGUAGE='javascript'> var B2=[];</script>";
	//建立系所編號陣列
	echo "<script LANGUAGE='javascript'> var BC2=[];</script>";
	while($row=mysqli_fetch_assoc($result)){
	//加入所有系所名稱值
	echo "<script LANGUAGE='javascript'>B2.push('".$row["cname"]."');</script>";
	echo "<script LANGUAGE='javascript'>BC2.push('".$row["cid"]."');</script>";
		$i++;
	}
}
//IM grade 3
$SQL="SELECT * FROM course WHERE c_semester=$local_semester AND c_dep like 'IM' AND c_degree=3";
if($result=mysqli_query($link,$SQL)){
	$i=0;
	//建立系所名稱陣列
	echo "<script LANGUAGE='javascript'> var B3=[];</script>";
	//建立系所編號陣列
	echo "<script LANGUAGE='javascript'> var BC3=[];</script>";
	while($row=mysqli_fetch_assoc($result)){
	//加入所有系所名稱值
	echo "<script LANGUAGE='javascript'>B3.push('".$row["cname"]."');</script>";
	echo "<script LANGUAGE='javascript'>BC3.push('".$row["cid"]."');</script>";
		$i++;
	}
}
//IM grade 4
$SQL="SELECT * FROM course WHERE c_semester=$local_semester AND c_dep like 'IM' AND c_degree=4";
if($result=mysqli_query($link,$SQL)){
	$i=0;
	//建立系所名稱陣列
	echo "<script LANGUAGE='javascript'> var B4=[];</script>";
	//建立系所編號陣列
	echo "<script LANGUAGE='javascript'> var BC4=[];</script>";
	while($row=mysqli_fetch_assoc($result)){
	//加入所有系所名稱值
	echo "<script LANGUAGE='javascript'>B4.push('".$row["cname"]."');</script>";
	echo "<script LANGUAGE='javascript'>BC4.push('".$row["cid"]."');</script>";
		$i++;
	}
}
$SQL="SELECT * FROM course WHERE c_semester=0 AND c_dep like 'GR'";
if($result=mysqli_query($link,$SQL)){
	$j=0;
	echo "<script LANGUAGE='javascript'> var M=[];</script>";
	echo "<script LANGUAGE='javascript'> var MC=[];</script>";
	while($row=mysqli_fetch_assoc($result)){
	echo "<script LANGUAGE='javascript'>M.push('".$row["cname"]."');</script>";
	echo "<script LANGUAGE='javascript'>MC.push('".$row["cid"]."');</script>";
		$j++;
	}
}
?>

<!-- 課程選單JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script> 
$(document).ready(function () {
	$("#dep").change(function () {
		var val = $(this).val();
		if (val == "IM") {
			$("#S_course").html("");
			var x;
			for(x=0;x<B.length;x++){
				$("#S_course").append("<option value="+BC[x]+">"+B[x]+"</option>");
			}
            $("#degree").change(function () {
		        var val = $(this).val();
		        if (val == 1) {
			        $("#S_course").html("");
			        var x;
			        for(x=0;x<B1.length;x++){
				        $("#S_course").append("<option value="+BC1[x]+">"+B1[x]+"</option>");
			        }

                }else if (val == 2) {
			        $("#S_course").html("");
			        var x;
			        for(x=0;x<B2.length;x++){
				        $("#S_course").append("<option value="+BC2[x]+">"+B2[x]+"</option>");
			        }
                }else if (val == 3) {
			        $("#S_course").html("");
			        var x;
			        for(x=0;x<B3.length;x++){
				        $("#S_course").append("<option value="+BC3[x]+">"+B3[x]+"</option>");
			        }
                }else if (val == 4) {
			        $("#S_course").html("");
			        var x;
			        for(x=0;x<B4.length;x++){
				        $("#S_course").append("<option value="+BC4[x]+">"+B4[x]+"</option>");
			        }
                }
            });
        } else if (val == "GR") {
			$("#S_course").html("");
			var x;
			for(x=0;x<M.length;x++){
				$("#S_course").append("<option value="+MC[x]+">"+M[x]+"</option>");
			}
            $("#degree").change(function () {
		        var val = $(this).val();
		        if (val == 1 || val == 2 || val == 3 || val == 4) {
			        $("#S_course").html("");
			        var x;
			        for(x=0;x<M.length;x++){
				        $("#S_course").append("<option value="+MC[x]+">"+M[x]+"</option>");
			        }

                }
            });
        }
    });
    
});
</script>
</head>
<body>
    <div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統 </div>
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
                <form action="chosen.php?sid=<?php echo $_SESSION["ID"]?>" method="post" align="center" style="line-height: 10px;">
                <tr><td class="littlegrayline">部別</td><td class="littlegrayline"><select name="c_class" id="c_class">
                <option value="1">大學部</option>
                <!-- <option value="2">碩士班</option> -->
                </select></td></tr>
                <tr><td class="littlegrayline">科別</td><td class="littlegrayline"><select name="dep" id="dep" required="required">
                <option value="IM">資管系</option>
                <!-- <option value="AB">亞太系</option>
                <option value="FI">金管系</option> -->
                <option value="GR">核心通識</option>
                </select></td></tr>
                <tr><td class="littlegrayline">級別</td><td class="littlegrayline"><select name="degree" id="degree">
                <option value="1">一年級</option>
                <option value="2">二年級</option>
                <option value="3">三年級</option>
                <option value="4">四年級</option>
                </select></td></tr>
                <tr><td class="littlegrayline">課程名稱</td><td class="littlegrayline"><select name="course" id="S_course">
                <option value=""><!-- -- Course Name / Course ID --  --></option> 

                </select></td></tr>
                <tr><td class="littlegrayline" style="visibility:hidden;" colspan="2"></td><td class="littlegrayline"><div id="right"><input style='visibility:hidden;' type="submit" value="加選" id="buttonv2"></div></td></tr>
                </table>
                <div class="line" style="width:80%;"></div>
                <table>
                <tr><td class="littlegrayline">課程代碼</td><td class="littlegrayline"><input type="text" name="cid"></td></tr>
                <tr><td class="littlegrayline" style='visibility:hidden;'></td><td colspan="2" class="littlegrayline" style='visibility:hidden;'></td><td class="littlegrayline"><div id="right"><input type="submit" value="加選" id="buttonv2"></div></td></tr>
                </form>
                <table>
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