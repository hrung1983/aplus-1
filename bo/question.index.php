<?php
header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=question.index'> $login </a>");
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
<div class="col-sm-6" style=""> <h4>แบบสอบถาม</h4>      </div>
<div class="col-sm-6" style="text-align: right; padding-top:30px; padding-bottom:15px;">
<a href="/aplus/mea/mea-questionnaire" target="_blank"><button type="button" class="btn btn-success btn-sm" title="Show" ><i class="glyphicon glyphicon-search" ></i> แสดง</button></a>
<a href="question.entry.php"><button type="button" class="btn btn-success btn-sm" title="Add" ><i class="glyphicon glyphicon-plus" ></i> เพิ่ม</button></a>
</div>





<div class="table_show">

  <table class="table table-striped">
  <tr>
      <th width="20%"><center>ลำดับที่</center></th>
      <th width="70%" colspan="3"><center>หัวข้อแบบสอบถาม</center></th>
      <th width="10%"><center>น้ำหนัก</center></th>
    </tr>
  <?php
  $row = 1;
      $sql = "select * from tbl_question order by id";
      $db->sql($sql);
	  $res = $db->getResult();
	  foreach($res as $data){
  ?>
    
    <tr>
      <th width="20%"><center><?php echo $row++;?></center></th>
      <th width="70%" colspan="3"><?php echo @$data["question_desc"]?></th>
      <th width="10%"><center><a href="question.entry.php?id=<?php echo @$data["id"]?>"><button type="button" class="btn btn-info btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button></a></center>
      </th>
    </tr>
    <tr>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center>1.</center></td>
      <td width="60%" colspan="2"><?php echo @$data["choice_1"]?></td>
      <td width="10%"><center><?php echo @$data["score_1"];?></center></td>
    </tr>
    <tr>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center>2.</center></td>
      <td width="60%" colspan="2"><?php echo @$data["choice_2"]?></td>
      <td width="10%"><center><?php echo @$data["score_2"];?></center></td>
    </tr>
    <tr>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center>3.</center></td>
      <td width="60%" colspan="2"><?php echo @$data["choice_3"]?></td>
      <td width="10%"><center><?php echo @$data["score_3"];?></center></td>
    </tr>
    <tr>
      <td width="20%">&nbsp;&nbsp;&nbsp;</td>
      <td width="10%"><center>4.</center></td>
      <td width="60%" colspan="2"><?php echo @$data["choice_4"]?></td>   
      <td width="10%"><center><?php echo @$data["score_4"];?></center></td>  
    </tr>
    <tr>
      <th width="20%"><center>&nbsp;</center></th>
      <th width="80%" colspan="43"><center>&nbsp;</center></th></th>
    </tr>
    <?php }?>
</table>
</div>
</div>
</div>
</div>
</form>

</div>
