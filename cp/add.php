<?php

	session_start();
	include_once('../include/connection.php');
	include_once('../include/articlecontrol.php');

	$article = new Article;

	if (isset($_SESSION['logged_in']))
	{
		if (isset($_POST['title'], $_POST['content']))
		{
			$title = $_POST['title'];
			$content = $_POST['content'];
			
			if (empty($title) or empty($content))
			{
				$error = "All fields are required!";
			}
			else
			{
				$insert = $article->add_article($title, $content, time());
				header('Location: index.php');
				exit();
			}
		}
		
		
?>

		<html>
			<head>
				<title>Blog :: Control Panel</title>
				<link rel="stylesheet" href="../assets/style.css">
				<link rel="icon" type="image/png" href="../assets/icon.png">
			</head>
			
			<body>
				<div class="container">
					<div class="card">
						<div class="card-title">
							<h4>Add Article</h4>
							<p style="color:#aa0000; font-size: 16px;">
							<?php 
								if(isset($error))
								{ 
									echo $error;
								}
							?>
							</p>
						</div>
						<div class="card-body">
							<form action="add.php" method="post" autocomplete="off">
								<input class="form-control-n" type="text" name="title" placeholder="Title"></input>
								<br>
								<br>
								<textarea class="form-control-n" rows="15" cols="100" name="content" placeholder="Content"></textarea>
								<br>
								<br>
								<input type="submit" name="submit" class="btn"></p>
							</form>
						</div>
					</div>
				</div>
			</body>
		</html>
		
<?php	
	}
	else
	{
?>
	<html>
	<head><title>404 Not Found</title></head>
	<body bgcolor="white">
	<center><h1>404 Not Found</h1></center>
	<hr><center>nginx/1.10.3 (Ubuntu)</center>
	</body>
	</html>
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
	<!-- a padding to disable MSIE and Chrome friendly error page -->
<?php
	}
?>