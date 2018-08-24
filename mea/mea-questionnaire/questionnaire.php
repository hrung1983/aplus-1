<!doctype html>
<html>
<head>
<title>Questionnaire-MEA</title>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<link href="css/bootstap/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/responsive.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php

	include('class/mysqli_oop.php');
	$db = new Database();
	$db->connect();
	$db->sql('SELECT * FROM tbl_question');
	$res = $db->getResult();
	
	$maxquestion=0;
	$goquestion=0;
	$noquestion=0;
	$reqgoquestion="";
	//
	$reqgoquestion=@$_REQUEST["goquestion"];
	if($reqgoquestion > 0 && $reqgoquestion!="" ){
		$goquestion=$reqgoquestion;
		$noquestion=$reqgoquestion;
	}
	
	foreach($res as $output){
		$maxquestion+=1;
	}
?>


	<div >
	<div style="background-color:#404041;"><center><font color="#ffffff"> แบบประเมินผลความพึ่งพอใจ</font></center></div>
    		<img src="images/banner.jpg" alt="Banner" class="img-responsive" />
    </div> <!-- End banner -->
	<div><label></label></div>
	<div class="content bg-question">
		<div class="container wrapper">
			<div class="question-wrap">
			<form enctype="multipart/form-data" id="questionnaireForm" action="" method="POST">
			<?php if($goquestion<$maxquestion){   $noquestion+=1;  ?>
				<div class="playquestion">
					<!--<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<center><h2>แบบประเมินผลการจัดงานวันวิชาการเพิ่มผลผลิต และคุณภาพ การไฟฟ้านครหลวง<br/><br/>ครั้งที่ 13 ประจำปี 2561 วันอังคารที่ 11 กันยายน 2561</h2></center>
						
						</div>
					</div>-->
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<span class="title-sup"><?php echo $res[$goquestion]["question_desc"]; ?><span class="red">*</span></span>
						</div><!-- End col -->
					</div><!-- End row -->
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="input m-none">
							  <input type="radio" id="radchoice" name="radchoice">
							  <label for="choice1" class="chk-term"><label><?php echo $res[$goquestion]["choice_1"]; ?></label></label>
							</div><!-- End input -->
						</div><!-- End col -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="input m-none">
							  <input type="radio" id="radchoice" name="radchoice">
							  <label for="choice2" class="chk-term"><label><?php echo $res[$goquestion]["choice_2"]; ?></label></label>
							</div><!-- End input -->
						</div><!-- End col -->
					</div><!-- End row -->
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="input m-none">
							  <input type="radio" id="radchoice" name="radchoice">
							  <label for="choice3" class="chk-term"><label><?php echo $res[$goquestion]["choice_3"]; ?></label></label>
							</div><!-- End input -->
						</div><!-- End col -->
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="input m-none">
							  <input type="radio" id="radchoice" name="radchoice">
							  <label for="choice4" class="chk-term"><label><?php echo $res[$goquestion]["choice_4"]; ?></label></label>
							</div><!-- End input -->
						</div><!-- End col -->
					</div><!-- End row -->
					

					
				</div><!-- End resgister -->
				
				<?php $goquestion+=1; } ?>
				<input type="hidden" name="txtgoquestion" id="txtgoquestion" autocomplete="off" value="<?php echo $goquestion;?>" />
				
			</form>
			</div><!-- End question wrap -->
			
				<div class="main-btn">
					<a href="#" class="myschdata"><input type="button" name="btnsave" class="btn default" value="Next"></a>
				</div><!-- End main btn -->
			
		</div><!-- End container -->
	</div><!-- End content -->
</body>

<script src="js/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="//jqueryvalidation.org/files/lib/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript">

      $('a.myschdata').click(function() {
          var txtgoquestion = $("#txtgoquestion").attr('value');
          document.location.href ="questionnaire.php?goquestion="+txtgoquestion;
        });
		
</script>

</html>
