<?php
header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=question.entry'> $login </a>");
  exit;
  }
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();


$id = @$_REQUEST["id"];
if($id!=""){
  $sql = "select * from tbl_question where id = $id";
  $db->sql($sql);
  $res = $db->getResult();
  foreach($res as $data){
	  $question_desc = @$data["question_desc"];
	  $choice_1 = @$data["choice_1"];
	  $score_1 = @$data["score_1"];
	  $choice_2 = @$data["choice_2"];
	  $score_2 = @$data["score_2"];
	  $choice_3 = @$data["choice_3"];
	  $score_3 = @$data["score_3"];
	  $choice_4 = @$data["choice_4"];
	  $score_4 = @$data["score_4"];
	  
	  
  }
}
?>



<form id='frm' method='POST' action="" class="form-horizontal">
<input type="hidden" name="id_update" id="id_update" value="<?php echo $id?>">


<div id="page-wrapper">
<div class="container-fluid">
<div class="row" id="main" >
<div class="row">
<div class="col-sm-12" style=""> <h4>แบบสอบถาม</h4>      </div>
</div>
<div class="row">
<div class="col-sm-6" style="text-align: left; padding-top:30px; padding-bottom:15px;">
  <a href="question.index.php"><button type="button" class="btn btn-warning btn-sm" title="กลับ"><i class="glyphicon glyphicon-circle-arrow-left"></i> กลับ</button></a>
  </div>
<div class="col-sm-6" style="text-align: right; padding-top:30px; padding-bottom:15px;">
<button type="button" id="Save" class="btn btn-success btn-sm" title="บันทึก"><i class="glyphicon glyphicon-floppy-save"></i> บันทึก</button>
</div>
</div>
<div class="col-sm-14 col-md-14 well" id="content">

<!--<div class="form-group">-->
 <form> 
    <!--div class="form-group">
      <label class="col-sm-2 control-label">ข้อที่ : </label>
        <div class="col-sm-6">
          
        </div>
    </div-->
    <input type="hidden" class="form-control" placeholder="" id="question_id" name="question_id" value="<?php echo $id;?>" readonly>
    <div class="form-group">
      <label class="col-sm-2 control-label">หัวข้อ : </label>
        <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="" id="question_desc" name="question_desc" value="<?php echo $question_desc;?>" >
      </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 1. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="ch1" name="ch1" value="<?php echo $choice_1;?>">
      </div>
      <label class="col-sm-1 control-label">คะแนน : </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" placeholder="" id="sc1" name="sc1" value="<?php echo $score_1;?>">
      </div>
      <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 2. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="ch2" name="ch2" value="<?php echo $choice_2;?>">
      </div>
        <label class="col-sm-1 control-label">คะแนน : </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" placeholder="" id="sc2" name="sc2" value="<?php echo $score_2;?>">
      </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 3. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="ch3" name="ch3" value="<?php echo $choice_3;?>">
      </div>
        <label class="col-sm-1 control-label">คะแนน : </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" placeholder="" id="sc3" name="sc3" value="<?php echo $score_3;?>">
      </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>

  
    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 4. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="ch4" name="ch4" value="<?php echo $choice_4;?>">
      </div>
        <label class="col-sm-1 control-label">คะแนน : </label>
      <div class="col-sm-2">
        <input type="text" class="form-control" placeholder="" id="sc4" name="sc4" value="<?php echo $score_4;?>">
      </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>

</form>

</div>


<script type="text/javascript">
$(document).ready(function(){
    $("#Save").click(function(){
          var question_id = document.getElementById("question_id").value;
          var question_desc = document.getElementById("question_desc").value;
          var ch1 = document.getElementById("ch1").value;
          var sc1 = document.getElementById("sc1").value;
          var ch2 = document.getElementById("ch2").value;
          var sc2 = document.getElementById("sc2").value;
          var ch3 = document.getElementById("ch3").value;
          var sc3 = document.getElementById("sc3").value;
          var ch4 = document.getElementById("ch4").value;
          var sc4 = document.getElementById("sc4").value;
        $.post('executesql.php',{ mode : "question", 
          question_id : question_id,
          question_desc : question_desc,
          ch1 : ch1,
          sc1 : sc1,
          ch2 : ch2,
          sc2 : sc2,
          ch3 : ch3,
          sc3 : sc3,
          ch4 : ch4,
          sc4 : sc4},
            function(data) { 
				//alert(data);
				window.parent.location.href ="question.index.php?id="+Math.random(100*1000,1000/2);
          });
        return false;
      });
      
});
</script>