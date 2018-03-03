<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Index();

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
    
		<!--  CSS  -->
    <link rel="stylesheet" href="css/styles.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!--  Font Awesome  -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    
    

		<script type="text/javascript" src="js/modernizr.custom.53451.js"></script>
    
	<title>ELEL（エレル） | 一橋大教授のオススメ図書</title>
	

</head>
<body class="drawer drawer--left">

	<header role="banner">
 
		<button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav" role="navigation">
      <ul class="drawer-menu">
        <li><a class="drawer-brand" href="index.php">ELEL</a></li>
        <li><a class="drawer-menu-item" href="newEntry.php?page=1">New Entry</a></li>
        <li><a class="drawer-menu-item" href="professors.php">Professor</a></li>
        <li><a class="drawer-menu-item btn disabled text-left nav-category" href="category.php?category=commerce&page=1">Category</a></li>
        <li><a class="drawer-menu-item" href="category.php?category=commerce&page=1">&nbsp;&nbsp;Commerce</a></li>
        <li><a class="drawer-menu-item" href="category.php?category=economics&page=1">&nbsp;&nbsp;Economics</a></li>
        <li><a class="drawer-menu-item" href="category.php?category=law&page=1">&nbsp;&nbsp;Law</a></li>
        <li><a class="drawer-menu-item" href="category.php?category=sociology&page=1">&nbsp;&nbsp;Sociology</a></li>
        <li><a class="drawer-menu-item" href="category.php?category=science&page=1">&nbsp;&nbsp;Science</a></li>
        <li><a class="drawer-menu-item" href="category.php?category=liberalArts&page=1">&nbsp;&nbsp;Liberal Arts</a></li>
        <li><a class="drawer-menu-item" href="mypage.php">My Page</a></li>
      </ul>
    </nav>
<!--
		<div class="container">
			<nav class="navbar navbar-expand-sm navbar-dark">
				<button class="navbar-toggler" data-toggle="collapse" data-target="#menu">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div id="menu" class="collapse navbar-collapse">
					<ul class="navbar-nav">
						<li class="nav-item toggle"><a href="index.php" class="nav-link toggle">Top</a></li>
						<li class="nav-item toggle"><a href="newEntry.php?page=1" class="nav-link toggle">New Entry</a></li>
						<li class="nav-item toggle"><a href="professors.php" class="nav-link toggle">Professor</a></li>
						<li class="nav-item toggle"><a href="category.php?category=commerce&page=1" class="nav-link toggle">Commerce</a></li>
						<li class="nav-item toggle"><a href="category.php?category=economics&page=1" class="nav-link toggle">Economics</a></li>
						<li class="nav-item toggle"><a href="category.php?category=law&page=1" class="nav-link toggle">Law</a></li>
						<li class="nav-item toggle"><a href="category.php?category=sociology&page=1" class="nav-link toggle">Sociology</a></li>
						<li class="nav-item toggle"><a href="category.php?category=science&page=1" class="nav-link toggle">Science</a></li>
						<li class="nav-item toggle"><a href="category.php?category=liberalArts&page=1" class="nav-link toggle">Liberal Arts</a></li>
						<li class="nav-item toggle"><a href="mypage.php" class="nav-link toggle">My Page</a></li>
					</ul>
				</div>
			</nav>
     </div>
-->
		
		
	</header>
	
	<main>
		<div class="cover text-white text-center">
			<h1 class="mb-3 mx-1 top-title">Love books? We do too.</h1>
			<h2 class="mt-3 mb-4 px-3 top-subtitle">Book Recommendations by Hitotsubashi Professors</h2>
			<a href="#index" class="btn btn-primary btn-md px-3 mt-4 find">Let's find best books!</a>
		</div>
	
		<div class="container words-cover pb-1">
			<h4 class="text-secondary text-center words"><i class="fas fa-quote-left fa-lg"></i>Be hungry, be crazy.<i class="fas fa-quote-right fa-lg"></i></h4>
			<p class="text-center text-secondary pr-2 words-by">- Steve Jobs</p>
		</div>
		<div id="slider" class="bg-light">
			
			<div id="dg-container" class="dg-container">
				<div class="dg-wrapper">
					<?php
					foreach($app->getValues('slides') as $slide){
					?>
						<a href="detail.php?post=<?= h($slide->postId) ?>"><img src="<?= h($slide->img) ?>" alt="<?= h($slide->title) ?>" class="rounded"><div class="text-secondary"><?= h($slide->title) ?></div></a>
					<?php } ?>	
				</div>
			</div>
		</div>
		
<!--
		<section>
			<div class="container">
			<h3 class="text-center" id="recommend">Recommend</h3>
				<div id="slides" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators indicators-position">
						<li data-target="#slides" data-slide-to="0" class="active"></li>
						<li data-target="#slides" data-slide-to="1"></li>
						<li data-target="#slides" data-slide-to="2"></li>
						<li data-target="#slides" data-slide-to="3s"></li>
					</ol>
					
  				<div class="carousel-inner">
  				
  				<?php
					foreach($app->getValues('firstSlide') as $firstSlide){
					?>
						<div class="carousel-item text-center active">
							<img class="w-50" src="<?= h($firstSlide->img) ?>" alt="<?= h($firstSlide->title) ?>">
						<div class="carousel-caption  py-0">
							<h4 class="slide-title"><?= h($firstSlide->title) ?></h4>
						</div>
						</div>
					<?php } ?>
  				
  				<?php
					foreach($app->getValues('slides') as $slide){
					?>
						<div class="carousel-item text-center">
							<img class="w-50" src="<?= h($slide->img) ?>" alt="<?= h($slide->title) ?>">
						<div class="carousel-caption py-0">
							<h4 class="slide-title"><?= h($slide->title) ?></h4>
						</div>
						</div>
					<?php } ?>
  				</div>
					<a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#slides" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</section>
-->
		
		<section>
			<div class="container" id="index">
				<h4 class="index-title text-center mt-5 pb-2">BEST BOOKS</h4>
				<ul class="nav nav-tabs nav-justified mt-5 mb-5">
					<li class="nav-item"><a href="#newEntry" class="nav-link active" data-toggle="tab">New Entry</a></li>
					<li class="nav-item"><a href="#professor" class="nav-link" data-toggle="tab">Professor</a></li>
					<li class="nav-item"><a href="#category" class="nav-link" data-toggle="tab">Category</a></li>
         </ul>
          
          <div class="tab-content">
            <div id="newEntry" class="tab-pane active">
							<?php
							foreach($app->getValues('posts') as $post){
							?>
							<div class="post">
								<div class="row mt-4">
									<div class="col-5">
										<a href="detail.php?post=<?= h($post->postId) ?>"><img src="<?= h($post->img) ?>" alt="<?= h($post->title) ?>" class="post-img rounded mt-1"></a>
									</div>
									<div class="col-7 post-content">
										<h4 class="post-title"><a href="detail.php?post=<?= h($post->postId) ?>"><?= h($post->title) ?></a></h4>
										<p><a href="professor.php?id=<?= h(ucfirst($post->id)) ?>"><span class="post-tag border rounded"><?= h(ucfirst($post->firstName)) ?>&nbsp;<?= h(ucfirst($post->lastName)) ?></span></a>
											<a href="category.php?category=<?= h(ucfirst($post->category)) ?>&page=1"><span class="post-tag border rounded"><?= h(ucfirst($post->category)) ?></span></a>
										<span class="post-tag border rounded"><?= h(ucfirst($post->difficulty)) ?></span></p>
										<p class="post-text">
											<?= h(mb_substr($post->text, 0, 40)) ?>...
										</p>
									</div>
								</div>
							</div>	
							<?php } ?>
							<a href="newEntry.php?page=1"><div class="text-center">
								<button class="btn btn-primary my-3 box-shadow">Read more</button>
						  </div></a>
            </div>
            
            <div id="professor" class="tab-pane">
            	<h4 class="text-center"><a href="professors.php">Hitotsubashi Professors</a></h4>
            	<h5>Commerce</h5>
            	<ul class="list-group list-group-flush">
            	<?php
							foreach($app->getValues('commerceProfessors') as $commerceProfessor){
							?>
            		<li class="list-group-item"><a href="professor.php?id=<?= $commerceProfessor->id ?>"><?= h(ucfirst($commerceProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($commerceProfessor->lastName)) ?></a></li>
              <?php } ?>	
              </ul>
              
              <h5>Economics</h5>
            	<ul class="list-group list-group-flush">
            	<?php
							foreach($app->getValues('economicsProfessors') as $economicsProfessor){
							?>
            		<li class="list-group-item"><a href="professor.php?id=<?= $economicsProfessor->id ?>"><?= h(ucfirst($economicsProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($economicsProfessor->lastName)) ?></a></li>
              <?php } ?>	
              </ul>
              
              <h5>Law</h5>
            	<ul class="list-group list-group-flush">
            	<?php
							foreach($app->getValues('lawProfessors') as $lawProfessor){
							?>
            		<li class="list-group-item"><a href="professor.php?id=<?= $lawProfessor->id ?>"><?= h(ucfirst($lawProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($lawProfessor->lastName)) ?></a></li>
              <?php } ?>	
              </ul>
              
              <h5>Sociology</h5>
            	<ul class="list-group list-group-flush">
            	<?php
							foreach($app->getValues('sociologyProfessors') as $sociologyProfessor){
							?>
            		<li class="list-group-item"><a href="professor.php?id=<?= $sociologyProfessor->id ?>"><?= h(ucfirst($sociologyProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($sociologyProfessor->lastName)) ?></a></li>
              <?php } ?>	
              </ul>
            </div>
            
            <div id="category" class="tab-pane">
             	<div class="list-group">
								<a href="category.php?category=commerce&page=1"><button type="button" class="list-group-item list-group-item-action">Commerce</button></a>
								<a href="category.php?category=economics&page=1"><button type="button" class="list-group-item list-group-item-action">Economics</button></a>
								<a href="category.php?category=law"><button type="button" class="list-group-item list-group-item-action">Law</button></a>
								<a href="category.php?category=sociology&page=1"><button type="button" class="list-group-item list-group-item-action">Sociology</button></a>
								<a href="category.php?category=science&page=1"><button type="button" class="list-group-item list-group-item-action">Science</button></a>
								<a href="category.php?category=liberalArts&page=1"><button type="button" class="list-group-item list-group-item-action">Liberal Arts</button></a>
							</div>
            </div>
          </div>
			</div>
		</section>
		
		<section>
		<h3 class="recommend-title text-center mt-5">RECOMMEND</h3>
			<div class="container mt-4" id="recommend">
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
							<p><a href="professor.php?post=<?= h($recommend->postId) ?>"><span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->firstName)) ?>&nbsp;<?= h(ucfirst($recommend->lastName)) ?></span></a>
								<a href="category.php?category=<?= h(ucfirst($post->category)) ?>&page=1"><span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->category)) ?></span></a>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->difficulty)) ?></span></p>
							<p class="post-text"><?= h(mb_substr($recommend->text, 0, 40)) ?>...</p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		
	</main>
	
	<footer class="text-center text-white py-4 mt-5">
 		<div class="container">
 			<p><a href="index.php">Top</a></p>
 			<p><a href="newEntry.php?page=1">New Entry</a></p>
 			<p><a href="professors.php">Professor</a></p>
 			
 			<div class="dropdown show mb-3">
				<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Category
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
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<!-- iScroll -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>
	
	<!-- drawer.js -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/js/drawer.min.js"></script>
	
	<!--	slide  -->
	<script type="text/javascript" src="js/jquery.gallery.js"></script>
	
	<script type="text/javascript">
		$(function() {
			$('.drawer').drawer();
			
			$('#dg-container').gallery({
				autoplay	:	true
			});
			
			$('.cover a[href^="#"]').click(function() {
          var speed = 400; 
          var href= $(this).attr("href");
          var target = $(href == "#" || href == "" ? 'html' : href);
          var position = target.offset().top;
          $('body,html').animate({scrollTop:position}, speed, 'swing');
          return false;
        });
			
		});
	</script>
</body>
</html>