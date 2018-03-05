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

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Nunito|Paprika" rel="stylesheet">
	
	<!-- drawer.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">

	<!--	CSS  -->
	<link rel="stylesheet" href="css/mypage.css">
    
	<title>Search | Elel（エレル）一橋大教授のオススメ図書</title>
</head>
<body class="drawer drawer--left drawer--navbarTopGutter">
	<header class="drawer-navbar drawer-navbar--fixed" role="banner">
    <div class="drawer-container">
      <div class="drawer-navbar-header">
        <a class="drawer-brand" href="index.php">Elel</a>
        <button type="button" class="drawer-toggle drawer-hamburger">
          <span class="sr-only">toggle navigation</span>
          <span class="drawer-hamburger-icon"></span>
        </button>
      </div>
      <nav class="drawer-nav" role="navigation">
        <ul class="drawer-menu">
          <li><a class="drawer-menu-item" href="index.php">Top</a></li>
          <li><a class="drawer-menu-item" href="mypage.php">My Posts</a></li>
          <li><a class="drawer-menu-item" href="search.php">New Post</a></li>
					<li><a class="drawer-menu-item" href="profile.php">Profile</a></li>
					<li><a class="drawer-menu-item" href="update.php">Update email/password</a></li>
					<li><a class="drawer-menu-item" href="#" data-toggle="modal" data-target="#logout">Logout</a></li>
        </ul>
      </nav>
    </div>

	</header>
	<main>
		
		<form action="" method="post">
			<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="logoutModalLongTitle">Logout</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								ログアウトします。
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
								<button type="submit" class="btn btn-primary">OK</button>
							</div>
						</div>
					</div>
				</div>
			<input type="hidden" name="logout">
		</form>
	
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="mypage.php">My Posts</a></li>
				<li class="breadcrumb-item active" aria-current="page">Search Books</li>
			</ol>
		</nav>
	
		<section>
			<div class="container">
			<h1 class="subpages-title text-center mb-4 mt-4">Search Books</h1>
				<form action="" method="post">
					<div class="row">
						<div class="col-8">
							<input type="text" class="form-control my-3 search-box" name="search" placeholder="Enter keywords" value="<?= h($app->getValues('search')); ?>" required autofocus>
							<span class="searchError"><?= h($app->getErrors('search')); ?></span>
						</div>
						<div class="col-4 search-btn">
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

	<footer class="text-center text-white py-4 search-footer">
 		<div class="container">
 			<p><a href="index.php">Top</a></p>
 			<p><a href="mypage.php">My Posts</a></p>
 			<p><a href="search.php">New Post</a></p>
 			<p><a href="profile.php">Profile</a></p>
 			<p><a href="update.php">Update email/password</a></p>
 			<p><a href="logout.php">Logout</a></p>
 			<p><a href="contact.php">Contact</a></p>
 			
 		</div>
		<div class="container pt-5">
			<p>Copyright &copy; All Rights Reserved by Natsuo Yamashita</p>
		</div>
  </footer>
  
  <!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	
	<!-- iScroll -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
	
	<!-- drawer.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
	
	<!--	js  -->
	<script type="text/javascript" src="js/mypage.js"></script>
	
</body>
</html>


