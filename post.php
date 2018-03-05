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

	<!-- Google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Nunito|Paprika" rel="stylesheet">
	
	<!-- drawer.css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">

	<!--	CSS  -->
	<link rel="stylesheet" href="css/mypage.css">
    
	<title>Post - <?= h($title) ?> | Elel（エレル）一橋大教授のオススメ図書</title>
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
		
		<div class="formError text-center"><?= h($app->getErrors('formError')); ?></div>
		
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="mypage.php">My Posts</a></li>
				<li class="breadcrumb-item"><a href="search.php">Search Books</a></li>
				<li class="breadcrumb-item active" aria-current="page">New Post</li>
			</ol>
		</nav>
		
		<section>
			<div class="container mt-3" id="detail">
				
				<h1 class="mb-4"><?= h($title) ?></h1>

					<div class="detail-info bg-light rounded">
						<div class="row">
							<div class="col-7 detail-img">
								<img src="<?= h($img) ?>" alt="<?= h($title) ?>" class="rounded w-100">
							</div>
							<div class="col-5 detail-content">
								<p class="detail-author"><span class="detail-minititle">Author</span><br><?= h($author) ?></p>
								<p class="detail-publisher"><span class="detail-minititle">Publisher</span><br><?= h($publisher) ?></p>
								<p class="detail-publishDate"><span class="detail-minititle">Publish Date</span><br><?= h($publishDate) ?></p>
							</div>
						</div>
					</div>

					<form action="" method="post">
					<h2 class="my-2 edit-title mt-4">Category</h2>

					<div class="custom-control custom-radio">
						<input type="radio" id="category1" name="category" class="custom-control-input" value="commerce" checked>
						<label class="custom-control-label" for="category1">Commerce</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="category2" name="category" class="custom-control-input" value="economics">
						<label class="custom-control-label" for="category2">Economics</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="category3" name="category" class="custom-control-input" value="law">
						<label class="custom-control-label" for="category3">Law</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="category4" name="category" class="custom-control-input" value="sociology">
						<label class="custom-control-label" for="category4">Sociology</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="category5" name="category" class="custom-control-input" value="science">
						<label class="custom-control-label" for="category5">Science</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="category6" name="category" class="custom-control-input" value="liberalArts">
						<label class="custom-control-label" for="category6">Liberal Arts</label>
					</div>


					<h2 class="my-2 edit-title mt-4">Difficulty</h2>

					<div class="custom-control custom-radio">
						<input type="radio" id="difficulty1" name="difficulty" class="custom-control-input" value="easy" checked>
						<label class="custom-control-label" for="difficulty1">Easy</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="difficulty2" name="difficulty" class="custom-control-input" value="normal">
						<label class="custom-control-label" for="difficulty2">Normal</label>
					</div>
					<div class="custom-control custom-radio">
						<input type="radio" id="difficulty3" name="difficulty" class="custom-control-input" value="difficult">
						<label class="custom-control-label" for="difficulty3">Difficult</label>
					</div>

					<div class="form-group mt-4">
						<label for="textarea" class="edit-title">Comment</label>
						<textarea name="text" id="textarea" rows="15" class="form-control" placeholder="Enter your comment for the book" required><?= !empty($app->getValues('text')) ? h($app->getValues('text')) : ''; ?></textarea>
					</div>

					<div class="form-group text-center">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#post">Post</button>
					</div>
					
					<p class="my-3 text-center"><a href="<?= $_SERVER['HTTP_REFERER'] ?>">Back</a></p>

					<div class="modal fade" id="post" tabindex="-1" role="dialog" aria-labelledby="profileModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="postModalLongTitle">New Post</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								「<?= $title ?>」を投稿します。
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
								<button type="submit" class="btn btn-primary">OK</button>
							</div>
						</div>
					</div>
				</div>

				<input type="hidden" name="title" value="<?= $title ?>">
				<input type="hidden" name="author" value="<?= $author ?>">
				<input type="hidden" name="publishDate" value="<?=$publishDate ?>">
				<input type="hidden" name="publisher" value="<?= $publisher ?>">
				<input type="hidden" name="url" value="<?= $url ?>">
				<input type="hidden" name="img" value="<?= $img ?>">
			</form>
		</div>
	</section>
</main>

<footer class="text-center text-white py-4">
	<div class="container">
		<p><a href="index.php">Top</a></p>
		<p><a href="mypage.php">My Posts</a></p>
		<p><a href="search.php">New Post</a></p>
		<p><a href="profile.php">Profile</a></p>
		<p><a href="update.php">Update email/password</a></p>
		<p><a href="logout.php">Logout</a></p>
		<p><a href="about.php">About</a></p>
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


