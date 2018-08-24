<?php
include('class/mysqli_oop.php');
 $db = new Database();
 $db->connect();

 $txtresult = $_REQUEST["result"];
 $user_id = $_REQUEST["user_id"];
$sql = "SELECT
            tbl_employee.id,
            tbl_employee.firstname,
            tbl_employee.fname,
            tbl_employee.sname,
            tbl_employee.tel,
            tbl_employee.qrcode,
            tbl_employee.register_status,
            tbl_employee.register_dte_tme,
            tbl_employee.register_by,
            tbl_employee.register_by_user,
		tbl_department.department_name
		FROM
		tbl_employee
		Left Join tbl_department ON tbl_employee.department = tbl_department.id
        Where tbl_employee.qrcode = '$txtresult'
        And tbl_employee.register_status = 'n'";
 $db->sql($sql);
 $res = $db->getResult();
 $rows = $db->numRows();
 $response = array();
 if($rows==1){
	 foreach($res as $output){
		$today = getdate();
		$dte = $today["year"] ."-".$today["mon"]."-".$today["mday"]." ".($today["hours"]-1).":".$today["minutes"].":".$today["seconds"];            
		 //   $val = "register_status='y',register_by='Mobile App',register_by_user=''";
			$where = " qrcode = '$txtresult'";

			$db->update('tbl_employee',array('register_status'=>"y",'register_by'=>"Mobile App",'register_by_user'=>"$user_id"),$where);
			
				$response['status'] = "yes";
				$response['fname'] = $output["fname"];//iconv( 'TIS-620', 'UTF-8',$output["fname"]);
				$response['sname'] = $output["sname"];//iconv( 'TIS-620', 'UTF-8',$output["sname"]);
				$response['department_name'] = $output["department_name"];
				$response['position_dep'] = "";
				$response['tel'] = $output["tel"];
				$response['register_status'] = 'Mobile App';
				$response['register_dte_tme'] = $output["register_dte_tme"];
				//$response['register_by'] = $output["register_by"];
				//$response['register_by_user'] = getUser2Regist($db,$user_id);     
	 }
 } else {
	$response['status'] = "no";
	$response['tel'] = $txtresult;
 }
 
 print_r(str_replace("\/","/",json_encode($response)));



?>