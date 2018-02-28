<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Search();

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

	<link rel="stylesheet" href="css/styles.css">
    
	<title>Search | ELEL（エレル）一橋大教授のオススメ図書</title>
</head>
<body>
	<header></header>
	<main>
		<section>
			<div class="container">
				<form action="" method="post">
					<div class="row">
						<div class="col-8">
							<input type="text" class="form-control my-3" name="search" placeholder="Enter keywords" value="<?= h($app->getValues('search')); ?>" required autofocus>
							<span class="err"><?= h($app->getErrors('search')); ?></span>
						</div>
						<div class="col-4">
							<button class="btn btn-outline-primary my-3" type="submit">Seach</button>
						</div>
					</div>
				</form>
			</div>
		</section>
		<section>
			<div class="container">
				<?php
				if(!empty($app->getValues('items'))){
				foreach($app->getValues('items') as $item){
					$item_id = $item->ASIN; //ASIN
					$item_title = $item->ItemAttributes->Title; // 商品名
					if(mb_strpos($item_title, '(')===false){
						$title=$item_title;
					}else{
						$title=mb_substr($item_title, 0, mb_strpos($item_title, '('));
					}
					$item_author = $item->ItemAttributes->Author; // 著者
					$item_publicationdate = $item->ItemAttributes->PublicationDate; // 発売日
					$item_publisher = $item->ItemAttributes->Publisher; // 出版社
					$item_url = $item->DetailPageURL; // 商品のURL
					$item_image  = $item->LargeImage->URL; // 商品の画像
				?>
				<div class="post">
					<div class="row my-3">
						<div class="col-5">
							<a href="post.php?title=<?= $title  ?>&author=<?= $item_author  ?>&date=<?= $item_publicationdate  ?>&publisher=<?= $item_publisher  ?>&img=<?= $item_image  ?>&url=<?= $item_url  ?>"><img src="<?= h($item_image) ?>" alt="<?= h($title) ?>" class="post-img"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="post.php?title=<?= $title  ?>&author=<?= $item_author  ?>&date=<?= $item_publicationdate  ?>&publisher=<?= $item_publisher  ?>&img=<?= $item_image  ?>&url=<?= $item_url  ?>"><?= h($title) ?></a></h4>
							<p><span class="text-muted post-tag border rounded"><?= h($item_author) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($item_publicationdate) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($item_publisher) ?></span></p>
						</div>
					</div>
				</div>	
				<?php } }?>
			</div>
		</section>
	</main>
	
	<footer class="text-center text-dark bg-light py-4 mt-5">
 		<div class="container">
 			<p>Home</p>
			<p>About</p>
			<p>Contact</p>
 		</div>
		<div class="container">
			<p>Copyright &copy; All Rights Reserved by Natsuo Yamashita</p>
		</div>
  </footer>
	
</body>
</html>


