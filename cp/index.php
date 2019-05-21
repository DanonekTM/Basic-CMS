<?php

	session_start();
	include_once('../include/connection.php');
	include_once('../include/articlecontrol.php');

	$article = new Article;
	
	if(isset($_SESSION['logged_in']))
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
							<li><a href="add.php">Add Article</a></li>
							<li><a href="edit.php">Edit Article</a></li>
							<li><a href="delete.php">Remove Article</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
			</body>
		</html>
<?php
	}
	else
	{
		if(isset($_POST['username'], $_POST['password'], $_POST['captcha']))
		{
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$captcha = $_POST['captcha'];
					
			if (empty($username) or empty($password))
			{
				$error = 'All fields are required!';
			}
			if($captcha != $_SESSION['digit'])
			{
				$error = 'Captcha is incorrect!';
			}
			else
			{
				$credentials = $article->fetch_credentials($username, $password);

				if ($credentials == true)
				{
					$_SESSION['logged_in'] = true;
					header('Location: index.php');
					exit();
				}
				else 
				{
					$error = 'Invalid Credentials!';
				}
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
				<form class="form-card" action="index.php" method="post" id="center" autocomplete="off">
					<div class="form-wrap">
						<div class="card-title">
							<h2 style="margin: 5px;">Admin Login</h2>	
						</div>
						<p><input class="form-control" name="username" placeholder="Login" type="text" required></p>
						<p><input class="form-control" name="password"  placeholder="Password" type="password" required></p>
						<p><img src="captcha.php" width="120" height="30" border="1"></p>
						<p><input class="form-control" type="text" size="6" maxlength="5" name="captcha" placeholder="Captcha" required><br>
						<p><input type="submit" name="submit" class="login-btn"></p>
						<p style="color:#aa0000; font-size: 16px;">
						<?php 
							if(isset($error))
							{ 
								echo $error;
							}
						?>
						</p>
					</div>
				</form>
			</body>
		</html>
<?php
	}
?>