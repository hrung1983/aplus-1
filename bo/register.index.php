<?php
header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=login'> $login </a>");
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
<div class="col-sm-6" style=""> <h4>รายชื่อผู้มาลงทะเบียน</h4>      </div>
<div class="col-sm-6" style="text-align: right; padding-top:30px; padding-bottom:15px;">
<a href="register.entry.php"><button type="button" class="btn btn-success btn-sm" title="Add" ><i class="glyphicon glyphicon-plus" ></i> เพิ่มชื่อ(Guest)</button></a>
</div>

<div class="table_show">

  <table class="table table-striped">
    <tr>
      <th>ลำดับที่</th>
      <th>ชื่อ</th>
      <th>นามสกุล</th>
      <th>เบอร์โทรศํพท์</th>
      <th>สถานะการลงทะเบียน</th>
      <th>เวลา</th>
      <th>&nbsp;</th>
    </tr>
<?php
        $sql="SELECT
        tbl_employee.id,
        tbl_employee.firstname,
        tbl_employee.fname,
        tbl_employee.sname,
        tbl_employee.tel,
        tbl_employee.qrcode,
        tbl_employee.register_status,
        tbl_employee.register_dte_tme
        FROM
        tbl_employee
        Order by tbl_employee.fname";
$db->sql($sql);
$result = $db->getResult();
	foreach($result as $data){
	$fontcolor = "black";
    if($data["register_status"]=="n"){
      $fontcolor = "blue";
    }
    @$i++;
?>
  <tr>
    <td><font color="<?php echo $fontcolor;?>"><?php echo @$i;?></font></td>
    <td><font color="<?php echo $fontcolor;?>"><?php echo @$data["fname"]?></font></td>
    <td><font color="<?php echo $fontcolor;?>"><?php echo @@$data["sname"]?></font></td>
    <td><font color="<?php echo $fontcolor;?>"><?php echo $data["tel"]?></font></td>
    <td><font color="<?php echo $fontcolor;?>"><?php if(@$data["register_status"]=="y") echo "ลงทะเบียนเรียบร้อย"; else echo "ยังไม่ได้ลงทะเบียน";?></font></td>
    <td><font color="<?php echo $fontcolor;?>"><?php echo @$data["register_dte_tme"]?></font></td>
    <td>
      <a href="register.entry.php?id=<?php echo @$data["id"]?>"><button type="button" class="btn btn-info btn-xs" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button></a>
    </td>
  </tr>
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</form>

</div>
