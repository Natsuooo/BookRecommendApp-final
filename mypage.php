<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Mypage();

$app->run();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<title>Mypage | ELEL（エレル）一橋大教授のオススメ図書</title>
	
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<header>
		<h1>Mypage</h1>
		<ul>
			<li><a href="update.php">Update Emial/Password</a></li>
			<li><a href="logout.php">Log Out</a></li>
			<li><a href="search.php">Post</a></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="profile.php">My Profile</a></li>
		</ul>
	</header>
	<main>
		<section>
			<div class="container">
				<div id="newEntry" class="tab-pane active">
							<?php
							foreach($app->getValues('myposts') as $mypost){
							?>
							<div class="post">
								<div class="row my-3">
									<div class="col-5">
										<a href="detail.php?post=<?= h($mypost->postId) ?>"><img src="<?= h($mypost->img) ?>" alt="<?= h($mypost->title) ?>" class="post-img"></a>
									</div>
									<div class="col-7 post-content">
										<h4 class="post-title"><a href="detail.php?post=<?= h($mypost->postId) ?>"><?= h($mypost->title) ?></a></h4>
										<p><span class="text-muted post-tag border rounded"><?= h($mypost->name) ?></span>
										<span class="text-muted post-tag border rounded"><?= h($mypost->category) ?></span></p>
										<p class="post-text"><?= h($mypost->text) ?></p>
										<p><a href="edit.php?post=<?= h($mypost->postId) ?>">Edit</a>
										<a href="delete.php?post=<?= h($mypost->postId) ?>">Delete</a></p>
									</div>
								</div>
							</div>	
							<?php } ?>
							
            </div>
			</div>
		</section>
	</main>
	<footer></footer>
	
	
</body>
</html>