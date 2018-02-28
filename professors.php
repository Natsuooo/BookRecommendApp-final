<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Professors();

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
    
	<title>Hitotsubashi Professors | ELEL（エレル）一橋大教授のオススメ図書</title>
	

</head>
<body>

	<header>

		<div class="container">
			<h5 class="text-center my-4">Hitotsubashi Professors</h5>
		</div>

		
	</header>
	
	<main>
		<section>
			<div class="container" id="start">
				<ul class="nav nav-tabs nav-justified my-5">
					<li class="nav-item"><a href="#commerce" class="nav-link active" data-toggle="tab">商学</a></li>
					<li class="nav-item"><a href="#economics" class="nav-link" data-toggle="tab">経済学</a></li>
					<li class="nav-item"><a href="#law" class="nav-link" data-toggle="tab">法学</a></li>
					<li class="nav-item"><a href="#sociology" class="nav-link" data-toggle="tab">社会学</a></li>
         </ul>
          
          <div class="tab-content">
            <div id="commerce" class="tab-pane active">
							<?php
							foreach($app->getValues('profile') as $profile){
							?>
          		<div class="profile bg-secondary">
          			<h6><?= h($profile->name) ?></h6>
          		</div>
           		<?php } ?>
            </div>
            
            <div id="economics" class="tab-pane">
              
            </div>
            
            <div id="law" class="tab-pane">
              
            </div>
            
            <div id="sociology" class="tab-pane">
              
            </div>
            
          </div>
			</div>
		</section>
		
		<section>
			<div class="container" id="start">
				<ul class="nav nav-tabs nav-justified my-5">
					<li class="nav-item"><a href="#newEntry" class="nav-link active" data-toggle="tab">New Entry</a></li>
					<li class="nav-item"><a href="#category" class="nav-link" data-toggle="tab">Category</a></li>
					<li class="nav-item"><a href="#professor" class="nav-link" data-toggle="tab">Professor</a></li>
         </ul>
          
          <div class="tab-content">
            <div id="newEntry" class="tab-pane active">
							<?php
							foreach($app->getValues('posts') as $post){
							?>
							<div class="post">
								<div class="row my-3">
									<div class="col-5">
										<a href="detail.php?post=<?= h($post->postId) ?>"><img src="<?= h($post->img) ?>" alt="<?= h($post->title) ?>" class="post-img"></a>
									</div>
									<div class="col-7 post-content">
										<h4 class="post-title"><a href="detail.php?post=<?= h($post->postId) ?>"><?= h($post->title) ?></a></h4>
										<p><span class="text-muted post-tag border rounded"><?= h($post->name) ?></span>
										<span class="text-muted post-tag border rounded"><?= h($post->category) ?></span>
										<span class="text-muted post-tag border rounded"><?= h($post->difficulty) ?></span></p>
										<p class="post-text">
											<?= h(mb_substr($post->text, 0, 40)) ?>...
										</p>
									</div>
								</div>
							</div>	
							<?php } ?>
							
            </div>
            
            <div id="category" class="tab-pane">
              <ul>
              	<li><a href="">商学</a></li>
              	<li><a href="">経済学</a></li>
              	<li><a href="">法学</a></li>
              	<li><a href="">社会学</a></li>
              	<li><a href="">理学</a></li>
              	<li><a href="">教養</a></li>
              </ul>
            </div>
            
            <div id="professor" class="tab-pane">
              <ul>
              	<li><a href="professors.php">Hitotsubashi Professors</a></li>
              	<li><a href="">井伊雅子</a></li>
              	<li><a href="">井伊雅子</a></li>
              	<li><a href="">井伊雅子</a></li>
              	<li><a href="">井伊雅子</a></li>
              	<li><a href="">井伊雅子</a></li>
              </ul>
            </div>
          </div>
			</div>
		</section>
		
		<section>
			<div class="container">
				<h3 class="recommend-title">Recommend</h3>
				<?php
				foreach($app->getValues('recommends') as $recommend){
				?>
				<div class="post">
					<div class="row my-3">
						<div class="col-5">
							<a href="detail.php?post=<?= h($recommend->postId) ?>"><img src="<?= h($recommend->img) ?>" alt="<?= h($recommend->title) ?>" class="post-img"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="detail.php?post=<?= h($recommend->postId) ?>"><?= h($recommend->title) ?></a></h4>
							<p><span class="text-muted post-tag border rounded"><?= h($recommend->name) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($recommend->category) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($recommend->difficulty) ?></span></p>
							<p class="post-text"><?= h(mb_substr($recommend->text, 0, 40)) ?>...</p>
						</div>
					</div>
				</div>	
				<?php } ?>
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
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
</body>
</html>