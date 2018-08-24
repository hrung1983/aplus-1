<?php
header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=game.index'> $login </a>");
  exit;
  }
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();

?>


<form id='frm' method='POST' action=''>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row" id="main" >
<div class="col-sm-6" style=""> <h4>เกมส์ถาม-ตอบ</h4>      </div>
<div class="col-sm-6" style="text-align: right; padding-top:30px; padding-bottom:15px;">
<a href="/aplus/mea/mea-game" target="_blank"><button type="button" class="btn btn-success btn-sm" title="Show" ><i class="glyphicon glyphicon-search" ></i> แสดง</button></a>
<a href="game.entry.php"><button type="button" class="btn btn-success btn-sm" title="Add" ><i class="glyphicon glyphicon-plus" ></i> เพิ่ม</button></a>
</div>

<div class="table_show">

  <table class="table table-striped">
  <tr>
      <th width="10%"><center>ลำดับที่</center></th>
      <th width="60%" colspan="2"><center>หัวข้อถาม</center></th>
      <th width="20%"><center>เริ่มเล่น(ต่อเกมส์)</center></th>
      <th width="5%"><center>&nbsp;</center></th>
    </tr>
  <?php
  $row = 1;
    $sql = "select * from tbl_game order by id";
    $db->sql($sql);
	$res = $db->getResult();
	foreach($res as $data){
        @$dtetme_begin = explode(" ",$data["peried_time_begin"]);
        @$dtetme_end = explode(" ",$data["peried_time_end"]);
        $fontcolor = "black";
        $score1 = @$data["score_1"];
        $score2 = @$data["score_2"];
        $score3 = @$data["score_3"];
        $score4 = @$data["score_4"];
  ?>
    
    <tr>
      <th width="5%"><center><?php echo $row++;?></center></th>
      <th width="60%" colspan="2"><?php echo @$data["game_desc"]?></th>
      <th width="20%"> <font color="blue"><?php echo $dtetme_begin["1"]?> - <?php echo $dtetme_end["1"]?> (<?php echo @$data["play_time"]?>s) </font></center></th>
      <th width="5%"><center><a href="game.entry.php?id=<?php echo @$data["id"]?>"><button type="button" class="btn btn-info btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button></a></th>
    </tr>
    <tr>
    <?php if($score1=="1"){ $fontcolor = "red"; }?>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center><font color="<?php echo $fontcolor;?>">1.</font></center></td>
      <td width="60%" colspan="2"><font color="<?php echo $fontcolor;?>"><?php echo @$data["choice_1"]?></font></td>
      <th width="10%"><center><?php if($score1=="1"){?> <span class="glyphicon glyphicon-ok"></span><?php }?></center>
    <?php $fontcolor = "black";?>
    </tr>
    <tr>
    <?php if($score2=="1"){ $fontcolor = "red"; }?>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center><font color="<?php echo $fontcolor;?>">2.</font></center></td>
      <td width="60%" colspan="2"><font color="<?php echo $fontcolor;?>"><?php echo @$data["choice_2"]?></font></td>
      <th width="10%"><center><?php if($score2=="1"){?> <span class="glyphicon glyphicon-ok"></span><?php }?></center>
    <?php $fontcolor = "black";?>
    </tr>
    <tr>
    <?php if($score3=="1"){ $fontcolor = "red"; }?>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center><font color="<?php echo $fontcolor;?>">3.</font></center></td>
      <td width="60%" colspan="2"><font color="<?php echo $fontcolor;?>"><?php echo @$data["choice_3"]?></font></td>
      <th width="10%"><center><?php if(@$data["score_3"]=="1"){?> <span class="glyphicon glyphicon-ok"></span><?php }?></center>
    <?php $fontcolor = "black";?>
    </tr>
    <tr>
    <?php if($score4=="1"){ $fontcolor = "red"; }?>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center><font color="<?php echo $fontcolor;?>">4.</font></center></td>
      <td width="60%" colspan="2"><font color="<?php echo $fontcolor;?>"><?php echo @$data["choice_4"]?></font></td>  
      <th width="10%"><center><?php if(@$data["score_4"]=="1"){?> <span class="glyphicon glyphicon-ok"></span><?php }?></center>  
    <?php $fontcolor = "black";?> 
    </tr>
    <tr>
      <th width="20%"><center>&nbsp;</center></th>
      <th width="80%" colspan="4"><center>&nbsp;</center></th></th>
    </tr>
    <?php }?>
</table>
</div>
</div>
</div>
</div>
</form>

</div>
