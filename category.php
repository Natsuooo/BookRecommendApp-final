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
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115177760-1"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-115177760-1');
		</script>

		<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- drawer.css -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.2/css/drawer.min.css">
   
		<!-- Google fonts -->
		<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Nunito" rel="stylesheet">
   
    <!--  Font Awesome  -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/subpages.css">
    
	<title><?= h($category)=='liberalArts' ? 'Liberal Arts' : h(ucfirst($category)) ?> | Elel（エレル）一橋大教授のオススメ図書</title>
	
	<meta name="description" content="商学・経済学・法学・社会学・理学・教養の6つのカテゴリーから関心の高い良書を見つけることができます。">
	

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
						<ul class="drawer-dropdown-menu">
							<li class="drawer-category"><a class="drawer-dropdown-menu-item" href="category.php?category=commerce&page=1">&nbsp;Commerce</a></li>
							<li class="drawer-category"><a class="drawer-dropdown-menu-item" href="category.php?category=economics&page=1">&nbsp;Economics</a></li>
							<li class="drawer-category"><a class="drawer-dropdown-menu-item" href="category.php?category=law&page=1">&nbsp;Law</a></li>
							<li class="drawer-category"><a class="drawer-dropdown-menu-item" href="category.php?category=sociology&page=1">&nbsp;Sociology</a></li>
							<li class="drawer-category"><a class="drawer-dropdown-menu-item" href="category.php?category=science&page=1">&nbsp;Science</a></li>
							<li class="drawer-category"><a class="drawer-dropdown-menu-item" href="category.php?category=liberalArts&page=1">&nbsp;Liberal Arts</a></li>
						</ul>
					</li>
					
					
					<li><a class="drawer-menu-item" href="https://opac.lib.hit-u.ac.jp/opac/opac_search/?lang=0">HERMES</a></li>
					<li><a class="drawer-menu-item" href="mypage.php">My Page</a></li>
        </ul>
      </nav>
    </div>
	</header>
	
	<main role="main">
	
			<div class="container">
				
				<div class="text-center">
					<h1 class="subpages-title"><?= h($category)=='liberalArts' ? 'Liberal Arts' : h(ucfirst($category)) ?></h1>
				</div>
				
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb category-breadcrumb">
						<li class="breadcrumb-item"><a href="index.php">Top</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?= h($category)=='liberalArts' ? 'Liberal Arts' : h(ucfirst($category)) ?>
						</li>
					</ol>
				</nav>
				
				<div class="row">
				<div class="col-lg-7">
				<div class="categoryPost">
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
							<p><a href="professor.php?id=<?= h($categoryPost->id) ?>"><span class="text-muted post-tag border rounded"><?= h(ucfirst($categoryPost->firstName)) ?>&nbsp;<?= h(ucfirst($categoryPost->lastName)) ?></span></a>
								<a href="category.php?category=<?= h(ucfirst($categoryPost->category)) ?>&page=1"><span class="text-muted post-tag border rounded"><?= h(ucfirst($categoryPost->category)) ?></span></a>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($categoryPost->difficulty)) ?></span></p>
							<p class="post-text"><a href="detail.php?post=<?= h($categoryPost->postId) ?>">
								<?= h(mb_substr($categoryPost->text, 0, 40)) ?>...
								</a></p>
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
						if($maxPage>4&&$page==1){
						echo "<li class='page-item active'><a class='page-link' href='category.php?category=<?= $category ?>&page=1'>1</a></li>";
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=2'>2</a></li>";
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=3'>3</a></li>";
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=4'>4</a></li>";
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=5'>5</a></li>";
					}else if($maxPage>4&&$page==2){
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=1'>1</a></li>";
						echo "<li class='page-item active'><a class='page-link' href='category.php?category=<?= $category ?>&page=2'>2</a></li>";
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=3'>3</a></li>";
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=4'>4</a></li>";
						echo "<li class='page-item'><a class='page-link' href='category.php?category=<?= $category ?>&page=5'>5</a></li>";
					}else if($maxPage>4&&$page<($maxPage-1)){
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
			
		
		<section>
			<div class="container" id="index">
				<h4 class="index-title text-center mt-5 pb-2">BEST BOOKS</h4>
				<ul class="nav nav-tabs nav-justified mt-4 mb-4">
					<li class="nav-item"><a href="#newEntry" class="nav-link active" data-toggle="tab">New Entries</a></li>
					<li class="nav-item"><a href="#professor" class="nav-link" data-toggle="tab">Professors</a></li>
					<li class="nav-item"><a href="#category" class="nav-link" data-toggle="tab">Categories</a></li>
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
										<p><a href="professor.php?id=<?= h($post->id) ?>"><span class="post-tag border rounded"><?= h(ucfirst($post->firstName)) ?>&nbsp;<?= h(ucfirst($post->lastName)) ?></span></a>
											<a href="category.php?category=<?= h($post->category) ?>&page=1"><span class="post-tag border rounded"><?= h(ucfirst($post->category)) ?></span></a>
										<span class="post-tag border rounded"><?= h(ucfirst($post->difficulty)) ?></span></p>
										<p class="post-text"><a href="detail.php?post=<?= h($post->postId) ?>">
											<?= h(mb_substr($post->text, 0, 60)) ?>...
											</a></p>
									</div>
								</div>
							</div>	
							<?php } ?>
							<a href="newEntry.php?page=1"><div class="text-center">
								<button class="btn btn-primary my-3 box-shadow">Read more</button>
						  </div></a>
            </div>
            
            <div id="professor" class="tab-pane">
            	<h4 class="text-center mt-3"><a href="professors.php">Hitotsubashi Professors</a></h4>
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
								<a href="category.php?category=<?= h(ucfirst($recommend->category)) ?>&page=1"><span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->category)) ?></span></a>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->difficulty)) ?></span></p>
							<p class="post-text"><a href="detail.php?post=<?= h($recommend->postId) ?>"><?= h(mb_substr($recommend->text, 0, 60)) ?>...</a></p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		</div>
		
		
			<div class="toTop text-center rounded-circle">
				<a href="#top"><i class="fas fa-angle-up fa-2x"></i></a>
			</div>	
			
			<div class="col-lg-5">

			<div class="list-group categories">
				<h4 class="text-center">Categories</h4>
				<a href="category.php?category=commerce&page=1"><button type="button" class="list-group-item list-group-item-action">Commerce</button></a>
				<a href="category.php?category=economics&page=1"><button type="button" class="list-group-item list-group-item-action">Economics</button></a>
				<a href="category.php?category=law"><button type="button" class="list-group-item list-group-item-action">Law</button></a>
				<a href="category.php?category=sociology&page=1"><button type="button" class="list-group-item list-group-item-action">Sociology</button></a>
				<a href="category.php?category=science&page=1"><button type="button" class="list-group-item list-group-item-action">Science</button></a>
				<a href="category.php?category=liberalArts&page=1"><button type="button" class="list-group-item list-group-item-action">Liberal Arts</button></a>
			</div>

			<div class="professor-wide">
			<h4 class="text-center mt-3"><a href="professors.php">Hitotsubashi Professors</a></h4>
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

		</div>
			
			</div>
		</div>
	</main>
	
	<footer class="text-center text-white py-4">
 		<div class="container">
 			<p><a href="index.php">Top</a></p>
 			<p><a href="newEntry.php?page=1">New Entry</a></p>
 			<p><a href="professors.php">Professor</a></p>
 			
 			<p class="footer-category-title">Categories<i class="fas fa-caret-down" data-fa-transform="right-6 down-1"></i></p>
 			<p class="footer-category"><a href="category.php?category=commerce&page=1">Commerce</a></p>
 			<p class="footer-category"><a href="category.php?category=economics&page=1">Economics</a></p>
 			<p class="footer-category"><a href="category.php?category=law&page=1">Law</a></p>
 			<p class="footer-category"><a href="category.php?category=sociology&page=1">Sociology</a></p>
 			<p class="footer-category"><a href="category.php?category=science&page=1">Science</a></p>
 			<p class="footer-category"><a href="category.php?category=liberalArts&page=1">Liberal Arts</a></p>
 				
 			<p><a href="mypage.php">My Page</a></p>
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
	
	<!--	js  -->
	<script type="text/javascript" src="js/subpages.js"></script>
	
</body>
</html>