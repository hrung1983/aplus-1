<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
        	$(function(){
        		$.ajax({
        			url:"ajax/select.php",
        			dataType:"json",
        			success:function(data){
        				$.each(data, function(index){
        					$("#names").append("<li>"+data[index].name+"</li>")
        				});
        			}
        		});
        	});
        </script>
    </head>
    <body>
        <ul id="names"></ul>
    </body>
</html>
