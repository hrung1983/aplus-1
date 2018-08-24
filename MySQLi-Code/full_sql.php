<!DOCTYPE html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
	</head>
	<body>
		<?php
			include('class/mysqli_oop.php');
			$db = new Database();
			$db->connect();
			$db->sql('SELECT * FROM tbshow');
			$res = $db->getResult();
			foreach($res as $output){
			echo $output["name"]."<br />";
			}
		?>
	</body>
</html>
