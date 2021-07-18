<!-- 管理員default -->
<?php
// session_start();
include("../conn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>選課系統plus版</title>
    <link rel="stylesheet" href="../all.css">
    <script src="../button.js"></script>
    <script src="../js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="../js/jquery.horizontalmenu.js"></script>
	<script>
        $(function () {
            $('.ah-tab-wrapper').horizontalmenu({
                itemClick : function(item) {
                    $('.ah-tab-content-wrapper .ah-tab-content').removeAttr('data-ah-tab-active');
                    $('.ah-tab-content-wrapper .ah-tab-content:eq(' + $(item).index() + ')').attr('data-ah-tab-active', 'true');
                    return false; //if this finction return true then will be executed http request
                }
            });
        });
    </script>

<script LANGUAGE=javascript> 
    function del() { 
        var msg = "您確定要刪除嗎？"; 
        if (confirm(msg)==true){ 
            return true; 
        }else{ 
            return false; 
        } 
    }    
</script> 

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work',11],
            ['Eat',2],
            ['Commute',2],
            ['Watch TV',2],
            ['Sleep',7]
        ]);

        var options = {
        title: 'My Daily Activities'
        };
        var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        var chart2 = new google.visualization.PieChart(document.getElementById('piechart2'));
        var chart3 = new google.visualization.PieChart(document.getElementById('piechart3'));
        var chart4 = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart1.draw(data, options);
        chart2.draw(data, options);
        chart3.draw(data, options);
        chart4.draw(data, options);
    }
</script>
</head>
<body>
    <div class="header">
        <div id="name">&nbsp;高 大 選 課 系 統 </div>
        <div class="line"></div>
        <div class="func">
        <div id="left">
                <div class="subject"><a href="../manager/m_teacher.php">新增教師</a></div>
                <div class="subject"><a href="../manager/m_student.php">新增學生</a></div>
                <div class="subject"><a href="../manager/result.php">統計資料</a></div>
                
            </div>
            <div id="right">
                <div class="subject"><a href="../manager/manage.php">管理員</a></div>
                <div class="subject"><a href="../system/logout.php">登出</a></div>
            </div>
        </div>    
    </div>
    <!-- <div class="htmleaf-container"> -->
    <div class="content">
        <div class="main" style="height:auto;">
            
            <div class="ah-tab-wrapper">
	            <div class="ah-tab">
	                <a class="ah-tab-item" data-ah-tab-active="true" href="">A統計資料</a>
                    <a class="ah-tab-item" href="">B統計資料</a>
                    <a class="ah-tab-item" href="">C統計資料</a>
                    <a class="ah-tab-item" href="">D統計資料</a>
	            </div>
	        </div>
	        <div class="ah-tab-content-wrapper">
	            <div class="ah-tab-content" data-ah-tab-active="true">    
                    <div id="piechart1" style="width: 900px; height: 500px;"></div>
	            </div>
	            <div class="ah-tab-content">
                    <div id="piechart2" style="width: 900px; height: 500px;"></div>
                </div>
                <div class="ah-tab-content">
                    <div id="piechart3" style="width: 900px; height: 500px;"></div>
                </div>
                <div class="ah-tab-content">
                    <div id="piechart4" style="width: 900px; height: 500px;"></div>
	            </div>

	        </div>

        </div>
        <div class="adition" align="center">
            <div class="icon">
                <img margin-left="30px" src="https://cdn2.iconfinder.com/data/icons/people-80/96/Picture1-512.png" alt="" height="200px">
            </div>
        </div>
        <div style="margin-top:50px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="../system/change.php?tid=<?php echo $tid ?>">更 改 密 碼</a>
        </div>
        <div style="margin-top:30px; float:left; width:18%; height:auto; text-align: justify; text-justify: inter-ideograph;-ms-text-justify: inter-ideograph; text-align-last: justify;">
            <a style="color:black; text-decoration:solid;" href="../system/pwdprotect.php?tid=<?php echo $tid ?>">密 保 問 題 </a>
        </div>
    </div>

</body>
</html>