<?php
header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=game.entry'> $login </a>");
  exit;
  }
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();

$id = @$_REQUEST["id"];
if($id!=""){
  $sql = "select * from tbl_game where id = $id"; 
  $db->sql($sql);
  $res = $db->getResult();
  foreach($res as $data){
	  $game_desc = @$data["game_desc"];
	  $choice_1 = @$data["choice_1"];
	  $score_1 = @$data["score_1"];
	  $choice_2 = @$data["choice_2"];
	  $score_2 = @$data["score_2"];
	  $choice_3 = @$data["choice_3"];
	  $score_3 = @$data["score_3"];
	  $choice_4 = @$data["choice_4"];
	  $score_4 = @$data["score_4"];
	  $play_time = @$data["play_time"];
	  $dtetme_begin = explode(" ",@$data["peried_time_begin"]);
	  $dte_begin = @$dtetme_begin[0]; 
	  $tme_begin = @$dtetme_begin[1];
	  
	  
	  @$dtetme_end = explode(" ",$data["peried_time_end"]); 
	  $dte_end = @$dtetme_end[0]; 
	  $tme_end = @$dtetme_end[1];
  }
}
?>
<form id='frm' method='POST' action="" class="form-horizontal">
<input type="hidden" name="id_update" id="id_update" value="<?php echo $id?>">
<div id="page-wrapper">
<div class="container-fluid">
<div class="row" id="main" >
<div class="row">
<div class="col-sm-12" style=""> <h4>เกมส์</h4>      </div>
</div>
<div class="row">
<div class="col-sm-6" style="text-align: left; padding-top:30px; padding-bottom:15px;">
  <a href="game.index.php"><button type="button" class="btn btn-warning btn-sm" title="กลับ"><i class="glyphicon glyphicon-circle-arrow-left"></i> กลับ</button></a>
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
    <input type="hidden" class="form-control" placeholder="" id="game_id" name="game_id" value="<?php echo $id;?>" readonly>
    <div class="form-group">
      <label class="col-sm-2 control-label">หัวข้อ : </label>
        <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="" id="game_desc" name="game_desc" value="<?php echo $game_desc;?>" >
      </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 1. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="choice_1" name="choice_1" value="<?php echo $choice_1;?>">
      </div>
      <label class="col-sm-1 control-label">ถูก : </label>
      <div class="col-sm-2">
              <input type="radio" id="score_1" name="score" value="1" class="form-control" <?php if($score_1=="1") echo "checked";?>>     
      </div>
      <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 2. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="choice_2" name="choice_2" value="<?php echo $choice_2;?>">
      </div>
      <label class="col-sm-1 control-label">ถูก : </label>
      <div class="col-sm-2">
              <input type="radio" id="score_2" name="score" value="1" class="form-control" <?php if($score_2=="1") echo "checked";?>>      
      </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 3. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="choice_3" name="choice_3" value="<?php echo $choice_3;?>">
      </div>
        <label class="col-sm-1 control-label">ถูก : </label>
        <div class="col-sm-2">
                <input type="radio" id="score_3" name="score" value="1" class="form-control" <?php if($score_3=="1") echo "checked";?>>       
        </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>

  
    <div class="form-group">
        <label class="col-sm-2 control-label">ตัวเลือก 4. : </label>
      <div class="col-sm-5">
        <input type="text" class="form-control" placeholder="" id="choice_4" name="choice_4" value="<?php echo $choice_4;?>">
      </div>
        <label class="col-sm-1 control-label">ถูก : </label>
        <div class="col-sm-2">
                <input type="radio" id="score_4" name="score" value="1" class="form-control" <?php if($score_4=="1") echo "checked";?>>    
        </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">เวลาในการเล่นเกมส์ : </label>
      <div class="col-sm-5">
        <select id="play_time" name="play_time" class="form-control">
          <option value="15" <?php if($play_time=="15") echo "selected";?>>15 วินาที</option>
          <option value="30" <?php if($play_time=="30") echo "selected";?>>30 วินาที</option>
          <option value="45" <?php if($play_time=="45") echo "selected";?>>45 วินาที</option>
          <option value="60" <?php if($play_time=="60") echo "selected";?>>60 วินาที</option>
        </select>
      </div>       
    </div>
	
    <div class="form-group">
    <label class="col-sm-2 control-label">เวลาเริ่ม : </label>
      <div class="col-sm-3">
        <input type="date" class="form-control" placeholder="" id="peried_dte_begin" name="peried_dte_begin" value="<?php echo $dte_begin;?>">
      </div>
      <div class="col-sm-2">
          <label class="col-sm-2 control-label">MM/DD/YYYY</label>
      </div>
        <label class="col-sm-1 control-label">Time : </label>
        <div class="col-sm-2">
          <input type="time" id="peried_tme_begin" name="peried_tme_begin" class="form-control" value="<?php echo $tme_begin;?>"> 
        </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label">เวลาสิ้นสุด : </label>
      <div class="col-sm-3">
        <input type="date" class="form-control" placeholder="" id="peried_dte_end" name="peried_dte_end" value="<?php echo $dte_end;?>">
      </div>
      <div class="col-sm-2">
          <label class="col-sm-2 control-label">MM/DD/YYYY</label>
      </div>
        <label class="col-sm-1 control-label">Time : </label>
        <div class="col-sm-2">
            <input type="time" id="peried_tme_end" name="peried_tme_end" class="form-control" value="<?php echo $tme_end;?>">  
        </div>
        <label class="col-sm-2 control-label"><p align="left"></p></label>
    </div>

</form>

</div>


<script type="text/javascript">
$(document).ready(function(){
    $("#Save").click(function(){
          var game_id = document.getElementById("game_id").value;
          var game_desc = document.getElementById("game_desc").value;
          var choice_1 = document.getElementById("choice_1").value;
          var choice_2 = document.getElementById("choice_2").value;
          var choice_3 = document.getElementById("choice_3").value;
          var choice_4 = document.getElementById("choice_4").value;

          var score_1 = document.getElementById("score_1").checked;
          var score_2 = document.getElementById("score_2").checked;
          var score_3 = document.getElementById("score_3").checked;
          var score_4 = document.getElementById("score_4").checked;

        var play_time = document.getElementById("play_time").value;
        var peried_dte_begin = document.getElementById("peried_dte_begin").value;
        var peried_tme_begin = document.getElementById("peried_tme_begin").value;
        var peried_dte_end = document.getElementById("peried_dte_end").value;
        var peried_tme_end = document.getElementById("peried_tme_end").value;

        var peried_dtetme_begin = peried_dte_begin + " " +peried_tme_begin;
        var peried_dtetme_end = peried_dte_end + " " + peried_tme_end;
        $.post('executesql.php',{ mode : "game", 
          game_id : game_id,
          game_desc : game_desc,
          choice_1 : choice_1,
          choice_2 : choice_2,
          choice_3 : choice_3,
          choice_4 : choice_4,
          score_1 : score_1,
          score_2 : score_2,
          score_3 : score_3,
          score_4 : score_4,
          play_time : play_time,
          peried_dtetme_begin : peried_dtetme_begin, 
          peried_dtetme_end : peried_dtetme_end
          },
            function(data) { 
              window.parent.location.href ="game.index.php?id="+Math.random(100*1000,1000/2);
          });
        return false;
      });
      
});
</script>