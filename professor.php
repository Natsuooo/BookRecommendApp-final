<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Professor();

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
    
    <!-- drawer.css -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
   
    <!-- Google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Nunito|Playfair+Display:400i" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/subpages.css">
    
	<title>Hitotsubashi Professors | ELEL（エレル）一橋大教授のオススメ図書</title>
	

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
        <ul class="drawer-menu ">
          <li><a class="drawer-menu-item" href="index.php">Top</a></li>
          <li><a class="drawer-menu-item" href="newEntry.php?page=1">New Entries</a></li>
					<li><a class="drawer-menu-item" href="professors.php">Professors</a></li>
					
					<li class="drawer-dropdown">
					<a class="drawer-menu-item" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
						Categories&nbsp;<span class="drawer-caret"></span>
					</a>
					</li>
					<li class="drawer-category"><a class="drawer-menu-item" href="category.php?category=commerce&page=1">&nbsp;&nbsp;Commerce</a></li>
					<li class="drawer-category"><a class="drawer-menu-item" href="category.php?category=economics&page=1">&nbsp;&nbsp;Economics</a></li>
					<li class="drawer-category"><a class="drawer-menu-item" href="category.php?category=law&page=1">&nbsp;&nbsp;Law</a></li>
					<li class="drawer-category"><a class="drawer-menu-item" href="category.php?category=sociology&page=1">&nbsp;&nbsp;Sociology</a></li>
					<li class="drawer-category"><a class="drawer-menu-item" href="category.php?category=science&page=1">&nbsp;&nbsp;Science</a></li>
					<li class="drawer-category"><a class="drawer-menu-item" href="category.php?category=liberalArts&page=1">&nbsp;&nbsp;Liberal Arts</a></li>
					
					
					<li><a class="drawer-menu-item" href="https://opac.lib.hit-u.ac.jp/opac/opac_search/?lang=0">HERMES</a></li>
					<li><a class="drawer-menu-item" href="mypage.php">My Page</a></li>
        </ul>
      </nav>
    </div>
	</header>
	
	<main role="main">
		<section>
			<div class="container" id="each-professor">
				<?php
				foreach($app->getValues('profile') as $profile){
				?>
				<div class="profile">
					<h1><?= h(ucfirst($profile->firstName)) ?>&nbsp;<?= h(ucfirst($profile->lastName)) ?></h1>
					<p class="profile-capital"><?= h(ucfirst($profile->sei)) ?>&nbsp;<?= h(ucfirst($profile->mei)) ?></p>
					<p class="profile-department">Department&nbsp;&nbsp;<?= h($profile->department) ?></p>
					<p class="profile-professional">Professional&nbsp;&nbsp;<?= h($profile->professional) ?></p>
					<p class="profile-message"><?= h($profile->message) ?></p>
				</div>
				<?php } ?>
			</div>
		</section>
		
		<section>
			<div class="container">
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
							<p><a href="professor.php?id=<?= h($mypost->id) ?>"><span class="text-muted post-tag border rounded"><?= h(ucfirst($mypost->firstName)) ?>&nbsp;<?= h(ucfirst($mypost->lastName)) ?></span></a>
								<a href="category.php?category=<?= h(ucfirst($mypost->category)) ?>&page=1"><span class="text-muted post-tag border rounded"><?= h(ucfirst($mypost->category)) ?></span></a>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($mypost->difficulty)) ?></span></p>
							<p class="post-text"><a href="detail.php?post=<?= h($mypost->postId) ?>"><?= h(mb_substr($mypost->text, 0, 60)) ?>...</a></p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		
		<section>
			<div class="container" id="recommend">
			<h3 class="recommend-title text-center">RECOMMEND</h3>
				<?php
				foreach($app->getValues('recommends') as $recommend){
				?>
				<div class="post">
					<div class="row mt-4">
						<div class="col-5">
							<a href="detail.php?post=<?= h($recommend->postId) ?>"><img src="<?= h($recommend->img) ?>" alt="<?= h($recommend->title) ?>" class="post-img rounded mt-1"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="detail.php?post=<?= h($recommend->postId) ?>"><?= h($recommend->title) ?></a></h4>
							<p><a href="professor.php?id=<?= $recommend->id ?>"><span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->firstName)) ?>&nbsp;<?= h(ucfirst($recommend->lastName)) ?></span></a>
								<a href="category.php?category=<?= h($post->category) ?>&page=1"><span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->category)) ?></span></a>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->difficulty)) ?></span></p>
							<p class="post-text"><a href="detail.php?post=<?= h($recommend->postId) ?>"><?= h(mb_substr($recommend->text, 0, 60)) ?>...</a></p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		
	</main>
	
	<footer class="text-center text-white py-4">
 		<div class="container">
 			<p><a href="index.php">Top</a></p>
 			<p><a href="newEntry.php?page=1">New Entry</a></p>
 			<p><a href="professors.php">Professor</a></p>
 			
 			<div class="dropdown show mb-3">
				<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Categories
				</a>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item" href="category.php?category=commerce&page=1">Commerce</a>
					<a class="dropdown-item" href="category.php?category=economics&page=1">Economics</a>
					<a class="dropdown-item" href="category.php?category=law&page=1">Law</a>
					<a class="dropdown-item" href="category.php?category=sociology&page=1">Sociology</a>
					<a class="dropdown-item" href="category.php?category=science&page=1">Science</a>
					<a class="dropdown-item" href="category.php?category=liberalArts&page=1">Liberal Arts</a>
				</div>
			</div>
 				
 			<p><a href="mypage.php">My Page</a></p>
 			<p><a href="about.php">About</a></p>
 			<p><a href="contact.php">Contact</a></p>
 		</div>
		<div class="container pt-5">
			<p>Copyright &copy; All Rights Reserved by Natsuo Yamashita</p>
		</div>
  </footer>
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<!-- iScroll -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
	
	<!-- drawer.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
	
	<script>
		$(function(){
			$('.drawer').drawer();
		});
	</script>
</body>
</html>