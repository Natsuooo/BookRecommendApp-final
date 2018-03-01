<?php

require_once(__DIR__.'/config/config.php');

$page=$_GET['page'];
$category=$_GET['category'];

$app=new lib\Controller\Category();

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
			<h5 class="text-center my-4"><?= ucfirst($_GET['category']) ?></h5>
		</div>

		
	</header>
	
	<main>
		<section>
			<div class="container">
				<?php
				foreach($app->getValues('categoryPosts') as $categoryPost){
				?>
				<div class="post">
					<div class="row my-3">
						<div class="col-5">
							<a href="detail.php?post=<?= h($categoryPost->postId) ?>"><img src="<?= h($categoryPost->img) ?>" alt="<?= h($categoryPost->title) ?>" class="post-img"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="detail.php?post=<?= h($categoryPost->postId) ?>"><?= h($categoryPost->title) ?></a></h4>
							<p><span class="text-muted post-tag border rounded"><?= h(ucfirst($categoryPost->firstName)) ?>&nbsp;<?= h(ucfirst($categoryPost->lastName)) ?></span>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($categoryPost->category)) ?></span>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($categoryPost->difficulty)) ?></span></p>
							<p class="post-text">
								<?= h(mb_substr($categoryPost->text, 0, 40)) ?>...
							</p>
						</div>
					</div>
				</div>	
				<?php } ?>
				
				<?php
				$maxPages=count($app->getValues('maxPages'));
				$maxPage=ceil($maxPages/2);
				?>
				<nav aria-label="Page navigation">
					<ul class="pagination justify-content-center pagination-sm mt-3">
						<li class="page-item <?= $page==1 ? 'disabled' : '' ?>">
							<a class="page-link" href="category.php?category=<?= $category ?>&page=<?= ($page-1) ?>" tabindex="-1">Prev</a>
						</li>
						<?php
						if($maxPage>4&&$page<($maxPage-1)){
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page-2)."'>".($page-2)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&category=<?= $category ?>&page=".($page-1)."'>".($page-1)."</a></li>";
							echo "<li class='page-item active'><a class='page-link' href='category.php?category=<?= $category ?>&page=".$page."'>".$page."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page+1)."'>".($page+1)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page+2)."'>".($page+2)."</a></li>";
						}else if($maxPage<=4){
							for($i=1;$i<=$maxPage;$i++){
								echo "<li class='page-item".($page==$i ? ' active' : '')."'><a class='page-link' href='category.php?category=<?= $category ?>&page=".$i."'>".$i."</a></li>";
							}
						}else if($page==($maxPage-1)&&$maxPage>4){
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page-3)."'>".($page-3)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page-2)."'>".($page-2)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page-1)."'>".($page-1)."</a></li>";
							echo "<li class='page-item active'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page)."'>".($page)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page+1)."'>".($page+1)."</a></li>";
						}else if($page==$maxPage&&$maxPage>4){
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page-4)."'>".($page-4)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&category=<?= $category ?>&page=".($page-3)."'>".($page-3)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page-2)."'>".($page-2)."</a></li>";
							echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page-1)."'>".($page-1)."</a></li>";
							echo "<li class='page-item active'><a class='page-link' href='category.php?category=<?= $category ?>&page=".($page)."'>".($page)."</a></li>";
						}


						?>


						<li class="page-item <?= $page==$maxPage ? 'disabled' : '' ?>">
							<a class="page-link" href="category.php?category=<?= $category ?>&page=<?= ($page+1) ?>">Next</a>
						</li>
					</ul>
				</nav>
				
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
										<p><span class="text-muted post-tag border rounded"><?= h(ucfirst($post->firstName)) ?>&nbsp;<?= h(ucfirst($post->lastName)) ?></span>
										<span class="text-muted post-tag border rounded"><?= h(ucfirst($post->category)) ?></span>
										<span class="text-muted post-tag border rounded"><?= h(ucfirst($post->difficulty)) ?></span></p>
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
              	<li><a href="category.php?category=commerce">Commerce</a></li>
              	<li><a href="category.php?category=economics">Economics</a></li>
              	<li><a href="category.php?category=law">Law</a></li>
              	<li><a href="category.php?category=sociology">Sociology</a></li>
              	<li><a href="category.php?category=science">Science</a></li>
              	<li><a href="category.php?category=liberalArts">Liberal Arts</a></li>
              </ul>
            </div>
            
            <div id="professor" class="tab-pane">
            	<p><a href="professors.php">Hitotsubashi professors</a></p>
            	<p>Commerce</p>
            	<ul>
            	<?php
							foreach($app->getValues('commerceProfessors') as $commerceProfessor){
							?>
            		<li><a href="professor.php?id=<?= $commerceProfessor->id ?>"><?= h(ucfirst($commerceProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($commerceProfessor->lastName)) ?></a></li>
              <?php } ?>	
              </ul>
              
              <p>economics</p>
            	<ul>
            	<?php
							foreach($app->getValues('economicsProfessors') as $economicsProfessor){
							?>
            		<li><a href="professor.php?id=<?= $economicsProfessor->id ?>"><?= h(ucfirst($economicsProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($economicsProfessor->lastName)) ?></a></li>
              <?php } ?>	
              </ul>
              
              <p>law</p>
            	<ul>
            	<?php
							foreach($app->getValues('lawProfessors') as $lawProfessor){
							?>
            		<li><a href="professor.php?id=<?= $lawProfessor->id ?>"><?= h(ucfirst($lawProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($lawProfessor->lastName)) ?></a></li>
              <?php } ?>	
              </ul>
              
              <p>sociology</p>
            	<ul>
            	<?php
							foreach($app->getValues('sociologyProfessors') as $sociologyProfessor){
							?>
            		<li><a href="professor.php?id=<?= $sociologyProfessor->id ?>"><?= h(ucfirst($sociologyProfessor->firstName)) ?>&nbsp;<?= h(ucfirst($sociologyProfessor->lastName)) ?></a></li>
              <?php } ?>	
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
							<p><span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->firstName)) ?>&nbsp;<?= h(ucfirst($recommend->lastName)) ?></span>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->category)) ?></span>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->difficulty)) ?></span></p>
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