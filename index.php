<?php

include_once('include/connection.php');
include_once('include/articlecontrol.php');
	
$article = new Article;
$articles = $article->fetch_all();

?>

<html>
	<head>
		<title>Blog :: DEV</title>
		<link rel="stylesheet" href="assets/style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="icon" type="image/png" href="assets/icon.png">
	</head>
	
	<body>
		<div class="container">
			<ol>
				<?php 
				if (mysqli_num_rows($articles) == 0)
				{
					?>
					<li class="card"><div class="card-body"><h4>No results!</div></li>
					<?php
				}
				else
				{
				foreach ($articles as $article) { ?>
				<li class="card">
					<div class="card-body">
						<h4><?php echo $article['title']; ?></h4>
						<small>posted on <?php echo date('jS \of F Y', $article['timestamp']);?></small>
					</div>
					<div class="card-button">
						<a href="article.php?id=<?php echo $article['id'];?>" class="btn btn-primary">Read More</a>
					</div>
				</li>
			<?php
					}
				}
			?>
			</ol>
		</div>
	</body>
</html>
		