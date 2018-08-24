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
            tbl_employee.register_by_user
        FROM
            tbl_employee
        Where tbl_employee.qrcode = '$txtresult'
        And tbl_employee.register_status = 'n'";
 $db->sql($sql);
 $res = $db->getResult();
 $response = array();
 $response['status'] = "no";
 $response['tel'] = $txtresult;
 
 foreach($res as $output){
    $today = getdate();
    $dte = $today["year"] ."-".$today["mon"]."-".$today["mday"]." ".($today["hours"]-1).":".$today["minutes"].":".$today["seconds"];            
     //   $val = "register_status='y',register_by='Mobile App',register_by_user=''";
        $where = " qrcode = '$txtresult'";

        $db->update('tbl_employee',array('register_status'=>"y",'register_by'=>"Mobile App",'register_by_user'=>"$user_id"),$where);
        
            $response['status'] = "yes";
            $response['fname'] = iconv( 'TIS-620', 'UTF-8',$output["fname"]);
            $response['sname'] = iconv( 'TIS-620', 'UTF-8',$output["sname"]);
            $response['tel'] = $output["tel"];
            $response['register_status'] = 'Mobile App';
            $response['register_dte_tme'] = $output;
            $response['register_by'] = $output["register_by"];
            //$response['register_by_user'] = getUser2Regist($db,$user_id);     
 }

 print_r(str_replace("\/","/",json_encode($response)));



?>