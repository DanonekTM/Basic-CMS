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
			$editcontent = array_values($article->fetch_data($id))[0];
					
			if ($editcontent == 0)
			{
				header('Location: index.php');
			}
			
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
					$update = $article->update_article($title, $content, time(), $id);
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
							<form action="edit.php?id=<?php echo $id?>" method="post" autocomplete="off">
								<input class="form-control-n" type="text" name="title" placeholder="Title" value="<?php echo $editcontent['title']; ?>"></input>
								<br>
								<br>
								<textarea class="form-control-n" rows="15" cols="100" name="content" placeholder="Content"><?php echo $editcontent['content']; ?></textarea>
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
		
		if(!isset($_GET['id']))
		{
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
										<li><h5><a href="edit.php?id=<?php echo $article['id'];?>"><?php echo $article['title']; ?></h5></li>
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