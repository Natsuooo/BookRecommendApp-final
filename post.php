<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Post();

$app->run();

$title=$_GET['title'];
$author=$_GET['author'];
$publishDate=$_GET['date'];
$publisher=$_GET['publisher'];
$url=$_GET['url'];
$img=$_GET['img'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" href="css/detail.css">
    
	<title>Post - <?= h($title) ?> | ELEL（エレル）一橋大教授のオススメ図書</title>
</head>
<body>
	<header></header>
	<main>
		<div class="container">
				
			<h1 class="detail-title mt-4"><?= h($title) ?></h1>

			<div class="detail-info bg-light">
				<div class="row">
					<div class="col-7 detail-img">
						<img src="<?= h($img) ?>" alt="<?= h($title) ?>" class="w-100">
					</div>
					<div class="col-5 detail-content">
						<p class="mb-2">著者<br><?= h($author) ?></p>
						<p class="my-2">出版社<br><?= h($publisher) ?></p>
						<p class="mt-2">出版日<br><?= h($publishDate) ?></p>
					</div>
				</div>
			</div>
			
			<div class="detail-text">
				<p class="my-4">
				
				</p>
			</div>

			<div class="detail-text">
				<p class="my-4">
				
				</p>
			</div>
	
		</div>
	</main>
	<footer></footer>
	<div id="container">
	<h1>Post</h1>
		<form action="" method="post" id="post">
			<p><a href="<?= $url ?>"><?= $title ?></a></p>
			<p><?= $author ?></p>
			<p><?= $publishDate ?></p>
			<p><?= $publisher ?></p>
			<p><a href="<?= $url ?>"><img src="<?= $img ?>"></a></p>
			<p>
			<input type="radio" name="category" value="商学">商学
			<input type="radio" name="category" value="経済学">経済学
			<input type="radio" name="category" value="法学">法学
			<input type="radio" name="category" value="社会学">社会学
			<input type="radio" name="category" value="理学">理学
			<input type="radio" name="category" value="教養">教養
			</p>
			<p>
				<textarea name="text" cols="30" rows="10" placeholder="text"><?= !empty($app->getValues('text')) ? h($app->getValues('text')) : ''; ?></textarea>
			</p>
			<p class="err"><?= h($app->getErrors('post')); ?></p>
			<div class="btn" onclick="document.getElementById('post').submit();">Post</div>
			<p><span class="fs12"><a href="search.php">Back</a></span></p>
			<input type="hidden" name="title" value="<?= $title ?>">
			<input type="hidden" name="author" value="<?= $author ?>">
			<input type="hidden" name="publishDate" value="<?=$publishDate ?>">
			<input type="hidden" name="publisher" value="<?= $publisher ?>">
			<input type="hidden" name="url" value="<?= $url ?>">
			<input type="hidden" name="img" value="<?= $img ?>">
		</form>
		
	</div>
</body>
</html>


