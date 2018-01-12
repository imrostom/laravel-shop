<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Mail Template</title>
	<style type="text/css">
		*{margin:0px;padding:0px}
		.main{width:600px;margin:0px auto}
		.header{background:#2478BB;padding:30px 0px}
		.header h2{text-align:center;color:#fff}
		.content{border:1px solid #ddd;padding:10px}
		.footer{background:#2478BB;padding:5px 0px}
		.footer p{text-align:center;color:#fff}
	</style>
</head>
<body>
	<div class="main">
		<div class="header">
			<h2>Welcome To Our Site</h2>
		</div>
		<div class="content">
                    <p><?php echo $data['name']?></p>
                    <p><?php echo $data['email']?></p>
                    <p><?php echo $data['url']?></p>
                    <p><?php echo $data['msg']?></p>
		</div>
		<div class="footer">
			<p>&copy;Right By Rostom Ali</p>
		</div>
	</div>
</body>
</html>