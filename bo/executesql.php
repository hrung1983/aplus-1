<?php
session_start(); 
header("Content-Type: text/html; charset=utf-8"); 
require_once("function.php"); 
@session_start();
if(!checkUser()){    echo Message(35,"red",$titel1,$msg1,"<a href='login.php?link=login'> $login </a>");
  exit;
  }
include('class/mysqli_oop.php');
$db = new Database();
$db->connect();


$mode = $_REQUEST["mode"];
switch ($mode) {
        case "user" : 
        $user_id = $_REQUEST["user_id"];
        $fname = $_REQUEST["fname"];
        $sname = $_REQUEST["sname"];
        $username = $_REQUEST["username"];
        $tpassword = $_REQUEST["tpassword"];
        $tel = $_REQUEST["tel"];
        $status_active = $_REQUEST["status_active"];
        $status_position = $_REQUEST["status_position"];
		$col_var = array('fname'=>$fname,'sname'=>$sname,'username'=>$username,'password'=>$tpassword,'tel'=>$tel,'status_active'=>$status_active,'status_position'=>$status_position);
		$table_name = "tbl_".$mode;
        if($user_id==""){            
			$db->insert('tbl_user',$col_var);	
        } else if($user_id!=""){		
		    $db->update('tbl_user',$col_var,'id = '.$user_id); 	
		}
        $db->disconnect();
    break;

    case "employee" : 
	
          $id_update = $_REQUEST["id_update"];
          $firstname = $_REQUEST["firstname"];
          $fname = $_REQUEST["fname"];
          $sname = $_REQUEST["sname"];
          $tel = trim($_REQUEST["tel"]);
          $qrcode = @$_REQUEST["qrcode"];
          $register_status = $_REQUEST["register_status"];
          $register_dte_tme = getDteTme();
          $register_by = "Web App";
          $register_by_user = $_SESSION["Uid"];
		   $col_var = array('fname'=>$fname,'sname'=>$sname,'tel'=>$tel,'qrcode'=>$qrcode,'register_status'=>$register_status,'register_dte_tme'=>$register_dte_tme,'register_by'=>$register_by,'register_by_user'=>$register_by_user);
		  
		  if($id_update == ""){
			  $sql_check = "Select tel From tbl_employee where tel like '%$tel%'";
			  $db->sql($sql_check);
			  $rows = $db->numRows();
			  if($rows==0){
				$db->insert('tbl_employee',$col_var);
				echo "ลงทะเบียนเบอร์โทรศัพท์เรียบร้อยแล้ว"; 
			  }else{
				echo "เบอร์โทรศัพท์ซ้ำในกับระบบ กรุณาตรวจสอบอีกครั้ง"; 
			  }			  
		  } else {
			  $db->update('tbl_employee',$col_var,'id = '.$id_update); 	
		  }
		  
		  $db->disconnect();
      break;

    case "question" : 
        $question_id = $_REQUEST["question_id"];
        $question_desc = $_REQUEST["question_desc"];
        $ch1 = $_REQUEST["ch1"];
        $sc1 = $_REQUEST["sc1"];
        $ch2 = $_REQUEST["ch2"];
        $sc2 = $_REQUEST["sc2"];
        $ch3 = $_REQUEST["ch3"];
        $sc3 = $_REQUEST["sc3"];
        $ch4 = $_REQUEST["ch4"];
        $sc4 = $_REQUEST["sc4"];
		  $colval = array('question_desc'=>$question_desc,'choice_1'=>$ch1,'score_1'=>$sc1,'choice_2'=>$ch2,'score_2'=>$sc2,'choice_3'=>$ch3,'score_3'=>$sc3,'choice_4'=>$ch4,'score_4'=>$sc4);
        if($question_id==""){            
            echo $db->insert('tbl_question',$colval);
        } else if($question_id!=""){
           echo $db->update('tbl_question',$colval,'id = '.$question_id); 	
		  }
		  
		  $db->disconnect();
    break;


    case "game" : 
        $game_id = $_REQUEST["game_id"];
        $game_desc = $_REQUEST["game_desc"];
        $choice_1 = $_REQUEST["choice_1"];
        $choice_2 = $_REQUEST["choice_2"];
        $choice_3 = $_REQUEST["choice_3"];
        $choice_4 = $_REQUEST["choice_4"];

        $play_time = $_REQUEST["play_time"];
        $peried_dtetme_begin = $_REQUEST["peried_dtetme_begin"];
        $peried_dtetme_end = $_REQUEST["peried_dtetme_end"];

        $score_1 = 0;
        $score_2 = 0;
        $score_3 = 0;
        $score_4 = 0;

        if($_REQUEST["score_1"]=="true") $score_1 = 1;
        if($_REQUEST["score_2"]=="true") $score_2 = 1;
        if($_REQUEST["score_3"]=="true") $score_3 = 1;
        if($_REQUEST["score_4"]=="true") $score_4 = 1;

        $colval = array('game_desc'=>$game_desc,'choice_1'=>$choice_1,'score_1'=>$score_1,
						'choice_2'=>$choice_2,'score_2'=>$score_2,'choice_3'=>$choice_3,'score_3'=>$score_3,
						'choice_4'=>$choice_4,'score_4'=>$score_4,
						'play_time'=>$play_time,'peried_time_begin'=>$peried_dtetme_begin,'peried_time_end'=>$peried_dtetme_end);
				   
		if($game_id==""){            
            echo $db->insert('tbl_game',$colval);
        } else if($game_id!=""){
           echo $db->update('tbl_game',$colval,'id = '.$game_id); 	
		  }
		  
		  $db->disconnect();
    break;


    case "schregis" : 
            $id_update = $_REQUEST["id"];
			$dtetme = getDteTme();
			$regis_user = $_SESSION["Uid"];
			$col_var = array('register_status'=>'y','register_dte_tme'=>$dtetme,'register_by'=>'Web App','register_by_user'=>$regis_user);
            $db->update('tbl_employee',$col_var,'id = '.$id_update); 	
        
        $db->disconnect();
    break;

}

