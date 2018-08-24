<?php

header("Content-Type: text/html; charset=utf-8");
require_once("function.php");  
include "header.php";
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=register.entry'> $login </a>");
  exit;
  }
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();

$id = @$_REQUEST["id"];
if($id!=""){
 $sql="SELECT
        tbl_employee.id,
        tbl_employee.firstname,
        tbl_employee.fname,
        tbl_employee.sname,
        tbl_employee.tel,
        tbl_employee.register_status
        FROM
        tbl_employee
        Where tbl_employee.id = $id";
$db->sql($sql);
$result = $db->getResult();
	foreach($result as $data){
		$firstname = @$data["firstname"];
		$fname = @$data["fname"];
		$sname = @$data["sname"];
		$tel = @$data["tel"];
		$register_status = @$data["register_status"];
	}
}

?>
<script language=Javascript>
        function Inint_AJAX() {
           try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
           try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
           try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
           alert("XMLHttpRequest not supported");
           return null;
        };

        function dochange(src, val) {           
            
             var req = Inint_AJAX();
             req.onreadystatechange = function () {
                  if (req.readyState==4) {
                       if (req.status==200) {
                            document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                       }
                  }
             };
             req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า

        }

        window.onLoad=dochange('position_dep', -1);
</script>


<form id='frm' method='POST' action="" class="form-horizontal">
<input type="hidden" name="id_update" id="id_update" value="<?php echo $id?>">
<div id="page-wrapper">
<div class="container-fluid">
<div class="row" id="main" >
<div class="row">
<div class="col-sm-12" style=""> <h4>ลงทะเบียน</h4>      </div>
</div>
<div class="row">
<div class="col-sm-6" style="text-align: left; padding-top:30px; padding-bottom:15px;">
  <a href="register.index.php"><button type="button" class="btn btn-warning btn-sm" title="กลับ"><i class="glyphicon glyphicon-circle-arrow-left"></i> กลับ</button></a>
  </div>
<div class="col-sm-6" style="text-align: right; padding-top:30px; padding-bottom:15px;">
<button type="button" id="Save" class="btn btn-success btn-sm" title="บันทึก"><i class="glyphicon glyphicon-floppy-save"></i> บันทึก</button>
</div>
</div>
<div class="col-sm-12 col-md-12 well" id="content">
<div class="form-group row">
    <div class="col-md-offset-1 col-md-5">
        <div class="form-group">
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">คำนำหน้า : </label>
          <div class="col-sm-10">
            <select id="firstname" name="firstname" class="form-control">
              <option value="mr" <?php if(@$firstname=="mr") echo "selected";?>>นาย</option>
              <option value="ms" <?php if(@$firstname=="ms") echo "selected";?>>นาง</option>
              <option value="mss" <?php if(@$firstname=="mss") echo "selected";?>>นางสาว</option>
            </select>
        </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">ชื่อ : </label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="fname" name="fname" value="<?php echo @$fname;?>" placeholder="กรุณากรอกชื่อ">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">นามสกุล : </label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="sname" name="sname" value="<?php echo @$sname;?>" placeholder="กรุณากรอกสกุล">
          </div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-2 control-label">Tel. : </label>
          <div class="col-sm-10">
          <input type="text" class="form-control" id="tel" name="tel" value="<?php echo @$tel;?>" placeholder="กรุณากรอกเบอร์โทรศัพท์"  maxlength="10">
        </div>
        </div>


        <div class="form-group">
          <label class="col-sm-2 control-label">หน่วยงาน  : </label>
          <div class="col-sm-10">
          <span id="category">
                  <select name ="category" class="form-control">
                      <?php
                      $db->sql("SELECT id,department_name FROM tbl_department Where active_status = 'y' order by department_name");
                      $result_dep = $db->getResult();
                    foreach($result_dep as $data_dep){
                                echo "<option value='$data_dep[id]' >$data_dep[department_name]</option>";
                           }
                      ?>
                  </select>
                  
              </span>
        </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">ตำแหน่ง  : </label>
          <div class="col-sm-10">
            <select id="register_status" name="register_status" class="form-control">
                <option value="y" <?php if(@$register_status=="y") echo "selected";?>>ลงทะเบียนทันที</option>
                <option value="n" <?php if(@$register_status=="n") echo "selected";?>>ยังไม่ลงทะเบียนตอนนี้</option>
              </select>
        </div>
        </div>

        <div class="form-group">
          <label class="col-sm-2 control-label">ลงทะเบียน  : </label>
          <div class="col-sm-10">
            <select id="register_status" name="register_status" class="form-control">
                <option value="y" <?php if(@$register_status=="y") echo "selected";?>>ลงทะเบียนทันที</option>
                <option value="n" <?php if(@$register_status=="n") echo "selected";?>>ยังไม่ลงทะเบียนตอนนี้</option>
              </select>
        </div>
        </div>

    </div>
    
</div>


</div>
</div>
</form>

</div>


<script type="text/javascript">
$(document).ready(function(){
    $("#Save").click(function(){
		
          var id_update = document.getElementById("id_update").value;
          var firstname = document.getElementById("firstname").value;
          var fname = document.getElementById("fname").value;
          var sname = document.getElementById("sname").value;
          var tel = document.getElementById("tel").value;
          var register_status = document.getElementById("register_status").value;
          
      if (fname.length==0){
           alert("กรุณากรอกชื่อก่อนครับ");
           document.getElementById("fname").focus();        
           return false;
      }else if (sname.length==0){
           alert("กรุณากรอกสกุลก่อนครับ") ;
           document.getElementById("sname").focus();           
           return false;
      }else if (tel.length==0){
           alert("กรุณากรอกเบอร์โทรศัพท์ก่อนครับ") ;
           document.getElementById("tel").focus();              
           return false;
      }

        $.post('executesql.php',{ mode : "employee", 
		  id_update : id_update ,
          firstname : firstname,
          fname : fname,
          sname : sname,
          tel : tel,
          register_status : register_status},
        function(data) {			
			alert(data);
            window.parent.location.href ="register.index.php?id="+Math.random(100*1000,1000/2);
          });
        return false;
      });
      
});
</script>