<!--DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> New Document </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<meta charset="tis-620">
</HEAD>
<BODY>
<form action="http://www.deesms.com/api1/tosend9.php" method="post">
 <input type="hidden" name="username" value="aplus"/><br />
 <input type="hidden" name="password1" value="aplusbooth"/><br />
 <input type="hidden" name="password2" value="bfijknou78"/><br />

 <input type="hidden" name="number_phone" value="0890332906"/><br />
 <input type="hidden" name="text_msg" value="ทดสอบ13246579"/><br />
 <input type="hidden" name="your_number" value="0860132059"/><br />

 <input type="submit" name="submit" value="Submit me!" />
</form>

</BODY>
</HTML-->



<head>
				<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
	</head>
<?php
//header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=sms'> $login </a>");
  exit;
  }
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();
$schtypex = @$_REQUEST["schtype"];
$schtype_cmd = @"";
if($schtypex==""){
  $schtype_cmd = @"n";
}
?>
<form id='frm' method='POST' action=''>
<div id="page-wrapper">
<div class="container-fluid">
<div class="row" id="main" >
<div class="col-sm-6" style=""> <h4>ส่ง SMS</h4>      </div>
<div class="col-sm-6" style="text-align: left; padding-top:30px; padding-bottom:15px;">
  <select name="schtype" id="schtype"  class="form-control" onchange="schstatus(schtype.value);">
    <option value="n" <?php if(@$schtypex=="n") echo "selected";?>>ยังไม่ได้ส่ง</option>
    <option value="y" <?php if(@$schtypex=="y") echo "selected";?>>ส่งแล้ว</option>
  </select>
</div>
<div class="table_show">
  <table class="table table-striped">
  <tr>
      <th width="10%"><center>ลำดับที่</center></th>
      <th width="50%"><center>ชื่อ-สกุล</center></th>
      <th width="10%"><center>เบอร์โทรศัพท์</center></th>
      <th width="10%"><center>สถานะการส่ง SMS</center></th>
      <th width="10%"><center>หน่วยงานxx</center></th>
      <th width="10%"><center>#</center></th>
    </tr>
  <?php
  @$row = 1;
      $sql = "SELECT
			tbl_employee.id,
			tbl_employee.fname,
			tbl_employee.sname,
			tbl_employee.tel,
			tbl_employee.sms,
			tbl_employee.department,
			tbl_department.department_name,
			tbl_department.active_status
			FROM
			tbl_employee
			Left Join tbl_department ON tbl_employee.department = tbl_department.id
      Where tbl_department.active_status = '$schtypex'
      order by fname";
      $result=$db->sql($sql);
	  $res = $db->getResult();	
	foreach($res as $data){
  ?>
    <tr>
      <th width="10%"><center><?php echo @$row++;?></center></th>
      <th width="50%"><?php echo @$data["fname"]." ".@$data["sname"]?></th>
      <td width="10%"><center><?php echo @$data["tel"]?></center></td>
      <td width="10%"><center><?php if(@$data["active_status"]=="y") echo "ส่งแล้ว"; else echo "ยังไม่ได้ส่ง";?></center></td>
      <td width="10%"><center><?php echo @$data["department_name"]?></center></td>
	  <th width="10%"><center><button type="button" onclick="sendsmstophone<?php echo @$data["id"]?>(<?php echo @$data["id"];?>,<?php echo @$data["tel"];?>,'Test');" class="btn btn-info btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button></center>
      </th>
    </tr>
<script type="text/javascript">

function sendsmstophone<?php echo @$data["id"];?>(id_emo,tel,msg) {
 // alert(msg);
  $.post('http://www.deesms.com/api1/tosend9.php',{ username : "aplus", 
    password1 : "aplusbooth",
    password2 : "bfijknou78",
    number_phone: "0890332906",
    your_number : "0872303232",
    text_msg : msg},
        function(data) {
            alert(data);
          });
        return false;
      
}


/*

<form action="http://www.deesms.com/api1/tosend9.php" method="post">
 <input type="hidden" name="username" value="aplus"/><br />
 <input type="hidden" name="password1" value="aplusbooth"/><br />
 <input type="hidden" name="password2" value="bfijknou78"/><br />

 <input type="hidden" name="number_phone" value="0890332906"/><br />
 <input type="hidden" name="text_msg" value="ทดสอบ13246579"/><br />
 <input type="hidden" name="your_number" value="0860132059"/><br />
$("#sendsms"+<?//php echo @$data["id"];?>).click(function(){
        
*/
</script>


    <?php }?>
</table>
</div>
</div>
</div>
</div>
</form>

</div>

<script type="text/javascript">

function schstatus(val){
      var link = "sms.php?schtype="+val+"&id_mat="+Math.random(100*1000,1000/2);
      window.parent.location.href = link;
}

$(document).ready(function(){
    
      
});
</script>