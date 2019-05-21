<?php

	include_once('include/connection.php');
	include_once('include/articlecontrol.php');

	$article = new Article;
		
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$content = array_values($article->fetch_data($id))[0];
		
		if ($content == 0)
		{
			header('Location: index.php');
		}
?>

<html>
	<head>
		<title>Blog :: DEV</title>
		<link rel="stylesheet" href="assets/style.css">
		<link rel="icon" type="image/png" href="assets/icon.png">	
	</head>
	
	<body>
		<div class="container">
			<ol>
				<div class="card">
					<div class="card-title">
						<h4><?php echo $content['title']; ?></h4>
						<small>posted on <?php echo date('jS \of F Y', $content['timestamp']);?></small>
					</div>
					<div class="card-body">
						<?php echo $content['content']; ?>
					</div>
					<div class="card-button">
						<a href="index.php" class="btn">Go Back</a>
					</div>
				<div>
			</ol>
		</div>
	</body>
</html>
		
<?php

	}
	else
	{
		header('Location: index.php');
		exit();
	}
	
?>