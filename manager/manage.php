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
	                <a class="ah-tab-item" data-ah-tab-active="true" href="">教師</a>
	                <a class="ah-tab-item" href="">學生</a>
	            </div>
	        </div>
	        <div class="ah-tab-content-wrapper">
	            <div class="ah-tab-content" data-ah-tab-active="true">
                <?php
                    $SQL1="SELECT * FROM teacher";
                    if($result=mysqli_query($link,$SQL1)){
                        echo "<table cellpadding=5  style='border:1px solid white;border-collapse:collapse; width:90%; height:auto;table-layout:fixed;'>";
                        echo "<tr class='color1'><td colspan=3 >教師一覽</td></tr>";
                        echo "<tr class='color1'><td>教師編號</td><td>教師姓名</td><td>刪除</td></tr>";
                        $line=0;
                        while($row = mysqli_fetch_assoc($result)){
                            if($line%2==0){
                                echo "<tr class='color2'><td>".$row["tid"]."</td><td>".$row["tname"]."</td><td><a id='del' onclick='javascript:return del()' style='color:#17223b;' href='deleted.php?tid=".$row["tid"]."'>刪除</a></td></tr>";
                                $line+=1;
                            }else{
                                echo "<tr class='color3'><td>".$row["tid"]."</td><td>".$row["tname"]."</td><td><a id='del' onclick='javascript:return del()' style='color:#17223b;' href='deleted.php?tid=".$row["tid"]."'>刪除</a></td></tr>";
                                $line+=1;
                            }    
                        }
                        echo "</table>";
                    }else{
                        echo "enter failed";
                        echo $SQL1;
                    }
                ?>
	            </div>
	            <div class="ah-tab-content">
                <?php
                    $SQL1="SELECT * FROM student";
                    if($result=mysqli_query($link,$SQL1)){
                        echo "<table cellpadding=5  style='border:1px solid white;border-collapse:collapse; width:90%; height:auto;table-layout:fixed;'>";
                        echo "<tr class='color1'><td colspan=4 >學生一覽</td></tr>";
                        echo "<tr class='color1'><td>學號</td><td>學生姓名</td><td>科系</td><td>刪除</td></tr>";
                        $line=0;
                        while($row = mysqli_fetch_assoc($result)){
                            if($line%2==0){
                                echo "<tr class='color2'><td>".$row["sid"]."</td><td>".$row["name"]."</td><td>".$row["subject"]."</td><td><a id='del' onclick='javascript:return del()' style='color:#17223b;' href='deleted.php?sid=".$row["sid"]."'>刪除</a></td></tr>";
                                $line+=1;
                            }else{
                                echo "<tr class='color3'><td>".$row["sid"]."</td><td>".$row["name"]."</td><td>".$row["subject"]."</td><td><a id='del' onclick='javascript:return del()' style='color:#17223b;' href='deleted.php?sid=".$row["sid"]."'>刪除</a></td></tr>";
                                $line+=1;
                            }    
                        }
                        echo "</table>";
                    }else{
                        echo "enter failed";
                        echo $SQL1;
                    }
                ?>
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