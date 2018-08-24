<?php
header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=schqr-code'> $login </a>");
  exit;
  }
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();

$schtype = @$_REQUEST["schtype"];
$txtSearch = trim(@$_REQUEST["txtSearch"]);

?>

<link rel="stylesheet" href="scrUpload/css/jquery.fileupload.css">




<div id="page-wrapper">

<div class="col-sm-12" style=""> <h3>ค้นหา QR-Code ของผู้ลงทะเบียน</h3></div>
<div class="col-sm-12" style=""> <h4>&nbsp;</h4></div>
<div class="container-fluid">

<form class="form-horizontal" enctype="multipart/form-data" method="POST"  action="#">

 <div class="form-group">
    <label class="col-sm-2 control-label">เลือก : </label>
    <div class="col-sm-3">
      <select class="form-control" id="schtype" name="schtype"  onChange="getSchType(this.value);">
        <option value="">เลือก</option>
	    <option value="name" <?php if(@$schtype=="name") echo "selected";?>>ชื่อ</option>
	    <option value="tel" <?php if(@$schtype=="tel") echo "selected";?>>เบอร์โทรศัพท์</option>
      </select>

    </div>
    <label class="col-sm-1 control-label">&nbsp;</label>
    <div class="col-sm-2">&nbsp;</div>
    <label class="col-sm-2 control-label"><p align="left"></p></label>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">ข้อความ : </label>
    <div class="col-sm-6">
    <input type="text" class="form-control" placeholder="" id="txtSearch" name="txtSearch" value="<?php echo @$txtSearch;?>"> 
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2">
      <button type="submit" class="btn btn-primary">ค้นหา</button>
      <button type="reset" class="btn btn-danger">ยกเลิก</button>
    </div>
  </div>


  <hr/>

  <div class="table_show">
<?php if($schtype != "" && $txtSearch != ""){
  if($schtype=="name"){
    $cmd = " Where tbl_employee.fname like '%$txtSearch%'";
  }else{
    $cmd = " Where tbl_employee.tel = '$txtSearch'"; 
  }
  $sql_sch_qr = "SELECT
                  tbl_employee.id,
                  tbl_employee.firstname,
                  tbl_employee.fname as empfname,
                  tbl_employee.sname as empsname,
                  tbl_employee.tel,
                  tbl_employee.qrcode,
                  tbl_employee.register_status,
                  tbl_employee.register_dte_tme,
                  tbl_employee.register_by,
                  tbl_user.fname as userfname,
                  tbl_user.sname as usersname
                FROM
                  tbl_employee
                Left Join tbl_user ON tbl_employee.register_by_user = tbl_user.id
                $cmd ";
$db->sql($sql_sch_qr);
$res = $db->getResult();
foreach($res as $data){
  ?>
  <table class="table table-striped">
     <tr>
       <th colspan="3">รายละเอียด</th>
     </tr>
     <tr valign="middle">
        <td width="20%">ชื่อ : </td>
        <td width="40%"><input type="text"  class="form-control" placeholder="" readonly value="<?php echo $data["empfname"];?>"></td>
        <td rowspan="3" width="40%">
          <?php if($data["register_status"]=="y"){?>
            <img src="../img_qrcode/qrcode-no.png" height="120" width="120" alt="คลิกเพื่อลงทะเบียน"> &nbsp;<br>
            <?php echo "ลงทะเบียนเรียบร้อย" ." ผ่าน ". $data["register_by"] ." โดย " . $data["userfname"] ."".$data["usersname"];?>&nbsp;<br>
            <?php echo "เวลาที่ลงทะเบียน ". $data["register_dte_tme"];?>
          <?php } else if($data["register_status"]=="n") {?>
            <a href="#" onclick="regis('<?php echo $data["id"]?>','<?php echo $schtype;?>','<?php echo $txtSearch;?>')"><img src="../img_qrcode/qrcode-1.png" height="180" width="180" alt="ยังไม่ได้ลงทะเบียน"> </a>&nbsp;
            <?php echo "<font color='red'>ยังไม่ได้ลงทะเบียน</font>";?></td>
          <?php }?>
     </tr>
     <tr  valign="middle">
        <td width="20%">สกุล : </td>
        <td width="40%"><input type="text"  class="form-control" placeholder="" readonly value="<?php echo $data["empsname"];?>"></td>
     </tr>
     <tr  valign="middle">
        <td width="20%">เบอร์โทรศัพท์ : </td>
        <td width="40%"><input type="text"  class="form-control" placeholder="" readonly value="<?php echo $data["tel"];?>"></td>
     </tr> 
  </table>
<?php } }?>
</form>

<br/><br/><br/><br/>

</div>
</div>
</div>
</div>


</div>
<script type="text/javascript">
    function regis (id,txttype,txtsch){
    var r = confirm("คุณต้องการจะลงทะเบียนใช่หรือไม่");
    if (r == true) {
          $.post('executesql.php',{ mode : "schregis", 
            id : id},
          function(data) {
			//  alert(data);
            var link = "schqr-code.php?schtype="+txttype+"&txtSearch="+txtsch+"&id_mat="+Math.random(100*1000,1000/2);
            //alert(link);
              window.parent.location.href = link;
            });
          return false;
        }
      }
        

</script>