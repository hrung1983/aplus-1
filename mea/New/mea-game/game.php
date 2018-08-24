<!doctype html>
<html>
<head>
<title>Game-MEA</title>
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
	$db->sql('SELECT * FROM tbl_game');
	$res = $db->getResult();
	
	$maxgame=0;
	$gogame=0;
	$nogame=0;
	$reqgogame="";
	//
	$reqgogame=@$_REQUEST["gogame"];
	if($reqgogame > 0 && $reqgogame!="" ){
		$gogame=$reqgogame;
		$nogame=$reqgogame;
	}
	
	foreach($res as $output){
		$maxgame+=1;
	}
?>
	
	<div class="">
			<div style="background-color:#404041;"><center><font color="#ffffff"> แข่งขันเกมส์ผูกพัน(ธุ์)แท้(ช่วงที่1)</font></center></div>
    		<img src="images/banner.jpg" alt="Banner" class="img-responsive" />
    </div> <!-- End banner -->
	<div><label></label></div>
	<div class="content bg-game">
		<div class="container wrapper">
			<div class="game-wrap">
			<form enctype="multipart/form-data" id="gameForm" action="" method="POST">
			
			<?php if($gogame<$maxgame){   $nogame+=1;  ?>
				
				<div class="playgame">
					<div class="row">
						<div class="col-xs-12">
							<h2>เกม<?php echo "  คำถามข้อที่  ".$nogame; ?></h2>
						</div><!-- End col -->
					</div><!-- End row -->
					<div class="row">
						<div class="col-xs-12">
							<span class="title-sup"><?php echo $res[$gogame]["game_desc"]; ?><span class="red">*</span></span>
						</div><!-- End col -->
					</div><!-- End row -->
					<div><label></label></div>
					<div class="row">
						<div class="col-xs-12" >
							<center>
							  <button type="button" class="btn btn-default" style="width:100%;"><label><?php echo $res[$gogame]["choice_1"];?></label></button>
							</center>
						</div><!-- End col -->
					</div>
					<div><label></label></div>
					<div class="row">
						<div class="col-xs-12">
							<center>
							  <button type="button" class="btn btn-default" style="width:100%;"><label><?php echo $res[$gogame]["choice_2"];?></label></button>
							</center>
						</div><!-- End col -->
					</div><!-- End row -->
					<div><label></label></div>
					<div class="row">
						<div class="col-xs-12">
							<center>
							  <button type="button" class="btn btn-default" style="width:100%;"><label><?php echo $res[$gogame]["choice_3"];?></label></button>
							</center>
						</div><!-- End col -->
					</div>
					<div><label></label></div>
					<div class="row">
						<div class="col-xs-12">
							<center>
							  <button type="button" class="btn btn-default" style="width:100%;"><label><?php echo $res[$gogame]["choice_4"];?></label></button>
							</center>
						</div><!-- End col -->
					</div><!-- End row -->
					<div><label></label></div>
				</div><!-- End playgame -->
				
				<?php $gogame+=1; } ?>
				<input type="hidden" name="txtgogame" id="txtgogame" autocomplete="off" value="<?php echo $gogame;?>" />
			
			</form>
			
			</div><!-- End game wrap -->
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
          var txtgogame = $("#txtgogame").attr('value');
          document.location.href ="game.php?gogame="+txtgogame;
        });
		
</script>

</html>
