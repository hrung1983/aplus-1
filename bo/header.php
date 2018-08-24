<?php
//session_start();

//if($_SESSION["username"] == ''){
  //header('Location: login.php');
 // exit();
//}

  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ระบบจัดการโปรแกรม QR-Code (Register)</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/css_menu.css" rel="stylesheet">
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>


        
        <script>
        tinymce.init({
            selector: "textarea",theme: "modern",width: 680,height: 100,
            plugins: [
                 "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                 "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                 "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
           ],
           toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
           toolbar2: "| link unlink  | forecolor backcolor  ",
           image_advtab: false ,

           external_filemanager_path:"./filemanager/",
           filemanager_title:"Responsive Filemanager" ,
           external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
           ,relative_urls:false,
           remove_script_host:false,
           document_base_url:"http://localhost/",
           statusbar: false
         });
        </script>

<style>
.ui-datepicker-trigger{cursor:pointer}

.modal-body {
	left:10pt;
    position: relative;
    overflow-y: auto;
    max-height: 700pt;
	max-width:auto;
	height:auto;
	padding: 15px;
	margin-left:10pt;
	margin-right:10pt;
}

</style>

</head>
<body>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
        <ul class="nav navbar-right top-nav">
          <li style="font-size:24px;">
              <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">ระบบจัดการโปรแกรม QR-Code (Register)</b></a>

          </li>
        </ul>
        </div>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="index.php"><i class="glyphicon glyphicon-folder-open" style="padding-right:10px;"></i> <b>หน้าหลัก</b></a>
                </li>
                <li><a href="index.php"><i class="glyphicon glyphicon-globe"  style="padding-right:10px;"></i> ข้อมูลหลัก</a></li>
                    <li class="submenu"><a href="employee.index.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i> ข้อมูลพนักงาน</a></li>
                    <li class="submenu"><a href="register.index.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i> ลงทะเบียน</a></li>
                    <li class="submenu"><a href="schqr-code.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i> ค้นหา QR-Code</a></li>
                    <li class="submenu"><a href="question.index.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i> แบบสอบถาม</a></li>
                    <li class="submenu"><a href="game.index.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i> เกมส์</a></li>
                    <li class="submenu"><a href="../loadteldata.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i>สถานะ QR-Code</a></li>
                    <li class="submenu"><a href="sms.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i>สถานะ SMS</a></li>
                                       
                <li><a href="#"><i class="glyphicon glyphicon-leaf"  style="padding-right:10px;"></i> รายงาน </a></li>
                    <li class="submenu"><a href="rpt.media.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i>รายงานจำนวนผู้เข้าร่วม </a></li>
                    <li class="submenu"><a href="rpt.qty.media.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i>การทำแบบสอบถาม </a></li>
                    <li class="submenu"><a href="rpt.mediaprice.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i>การร่วมเล่นเกมส์ </a></li>
                    <li class="submenu"><a href="rpt.mediaprice.php"><i style="padding-right:30px;"></i><i class="glyphicon glyphicon-option-vertical" style="padding-right:10px;"></i>รายงานสุ่มผู้โชคดี</a></li>
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out" style="padding-right:10px;"></i>Logout</a></li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

<?php
date_default_timezone_set('asia/bangkok');
 ?>
