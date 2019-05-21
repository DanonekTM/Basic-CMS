<?php

	session_start();
	include_once('../include/connection.php');
	include_once('../include/articlecontrol.php');

	$article = new Article;
	$articles = $article->fetch_all();

	if (isset($_SESSION['logged_in']))
	{
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$action = $article->delete_article($id);
			header('Location: index.php');
			exit();
		}
?>

		<html>
			<head>
				<title>Blog :: Control Panel</title>
				<link rel="stylesheet" href="../assets/style.css">
				<link rel="icon" type="image/png" href="../assets/icon.png">				
			</head>
			
			<body>
				<div class="card" id="center">
					<div class="card-body-center">
						<ul id="menu">
							<?php 
								if (mysqli_num_rows($articles) == 0)
								{
									?>
									<li><h4><a href="index.php">No results!</a></h4></li>
									<?php
								}
								else
								{
									foreach ($articles as $article)
									{
										?>
										<li><h5><a href="delete.php?id=<?php echo $article['id'];?>"><?php echo $article['title']; ?></h5></li>
										<?php
									}
								} ?>
						</ul>
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