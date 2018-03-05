<?php

require_once(__DIR__.'/config/config.php');

$_SESSION['post']=$_GET['post'];

$app=new lib\Controller\Detail();

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
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Nunito|Paprika" rel="stylesheet">
	
	<!--  Font Awesome  -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="css/subpages.css">
   
	<!--  Facebook API -->
  <meta property="og:url" content="<?= (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" />
  <meta property="og:type" content="website" />
  <?php
	foreach($app->getValues('details') as $detail){
	?>
  <meta property="og:title" content="<?= h($detail->title) ?> | Elel（エレル）一橋大教授のオススメ図書" />
  <meta property="og:description" content="<?= h(ucfirst($detail->firstName)) ?>&nbsp;<?= h(ucfirst($detail->lastName)) ?>&nbsp;|&nbsp;<?= h($detail->text) ?>" />
  <meta property="og:image" content="<?= h($detail->img) ?>" /> 
  <?php
	}
	?>
    
	<title>
		<?php
		foreach($app->getValues('details') as $detail){
			echo h($detail->title)." | ELEL（エレル）一橋大教授のオススメ図書";
		}
		?>
	</title>
</head>
<body class="drawer drawer--left drawer--navbarTopGutter">

	<!--	facebook API  -->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = 'https://connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.12';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	
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
	
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb professor-breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Top</a></li>
				
					<?php
					$preLink=$_SERVER['HTTP_REFERER'];
					if(mb_strpos($preLink, 'professor.php?id')){
						echo '<li class="breadcrumb-item"><a href="professors.php">Professors</a></li><li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Professor</a></li>';
					}else if(mb_strpos($preLink, 'professors.php')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Professors</a></li>';
					}else if(mb_strpos($preLink, 'category.php?category=commerce')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Commerce</a></li>';
					}else if(mb_strpos($preLink, 'category.php?category=economics')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Economics</a></li>';
					}else if(mb_strpos($preLink, 'category.php?category=law')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Law</a></li>';
					}else if(mb_strpos($preLink, 'category.php?category=sociology')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Sociology</a></li>';
					}else if(mb_strpos($preLink, 'category.php?category=science')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Science</a></li>';
					}else if(mb_strpos($preLink, 'category.php?category=liberalArts')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">Liberal Arts</a></li>';
					}else if(mb_strpos($preLink, 'newEntry.php')){
						echo '<li class="breadcrumb-item"><a href="'.$_SERVER['HTTP_REFERER'].'">New Entries</a></li>';
					}else{
						echo '';
					}
					?>
				
				<li class="breadcrumb-item active" aria-current="page">Detail
				</li>
			</ol>
		</nav>
	
		<section>
			<div class="container" id="detail">
				<?php
				foreach($app->getValues('details') as $detail){
				?>
				
				<h1><a href="<?= h($detail->url) ?>" target="_blank"><?= h($detail->title) ?></a></h1>
					
					<div class="detail-tags">
						<p><a href="professor.php?id=<?= $detail->id ?>"><span class="text-muted detail-tag border rounded"><?= h(ucfirst($detail->firstName)) ?>&nbsp;<?= h(ucfirst($detail->lastName)) ?></span></a>
							<a href="category.php?category=<?= h($detail->category) ?>&page=1"><span class="text-muted detail-tag border rounded"><?= h(ucfirst($detail->category)) ?></span></a>
						<span class="text-muted detail-tag border rounded"><?= h(ucfirst($detail->difficulty)) ?></span></p>
					</div>
					
					
						
					<div class="sns">
						<!--	Twitter API  -->
						<?php
						foreach($app->getValues('details') as $detail){
						?>
						<p class="twitter">
							<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" 
						data-text="<?= h($detail->title) ?>&nbsp;|&nbsp;<?= h(ucfirst($detail->firstName)) ?>&nbsp;<?= h(ucfirst($detail->lastName)) ?>&nbsp;|&nbsp;<?= h(mb_substr($detail->text, 0, 60)) ?>...#一橋大教授のオススメ図書" 
						data-url="<?= (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" 
						data-lang="en" data-show-count="false" class="twitter">Tweet</a>
						</p>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						<?php
						}
						?>


						<!--	Facebook API  -->
						<span class="fb-share-button facebook" data-href="<?= (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">share</a></span>
					</div>
					
					
					<div class="detail-info bg-light rounded">
						<div class="row">
							<div class="col-7 detail-img">
								<a href="<?= h($detail->url) ?>" target="_blank"><img src="<?= h($detail->img) ?>" alt="<?= h($detail->title) ?>" class="rounded w-100"></a>
							</div>
							<div class="col-5 detail-content">
								<p class="detail-author"><span class="detail-minititle">Author</span><br><?= h($detail->author) ?></p>
								<p class="detail-publisher"><span class="detail-minititle">Publisher</span><br><?= h($detail->publisher) ?></p>
								<p class="detail-publishDate"><span class="detail-minititle">Publish Date</span><br><?= h($detail->publishDate) ?></p>
								<p><a href="<?= h($detail->url) ?>"><img src="img/amazon.svg" alt="amazon" class="rounded" target="_blank"></a></p>
							</div>
						</div>
					</div>
					
					<div class="detail-text">
						<p class="my-4">
							<?= h($detail->text) ?>
						</p>
					</div>
					
				<?php
				}
				?>
			</div>
		</section>
		
		<section>
			<div class="container comment-container">
			<h2 class="recommend-title text-center comment-title">Comment</h2>
				<?php
				echo "<br>";
				foreach($app->getValues('comments') as $comment){
					echo "<p class='comment-content'>".h($comment->comment)."</p>";
					echo "<p class='comment-name'>".h($comment->name)."<span class='comment-date'>(".h(substr($comment->created, 0, 10)).")</span></p>";
				}
				?>
				<p class="comments"></p>
				
				<form action="" method="post" id="comment">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
					</div>
					<div class="form-group">
						<label for="textarea">Comment</label>
						<textarea name="comment" id="textarea" rows="5" class="form-control" placeholder="Enter your comment" required></textarea>
					</div>
					<span class="commentError"></span>

					<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary box-shadow" data-toggle="modal" data-target="#comment-btn" data-toggle="tooltip" data-placement="right" title="Let's comment about the book!">
						Comment
					</button>

					<!-- Modal -->
					<div class="modal fade" id="comment-btn" tabindex="-1" role="dialog" aria-labelledby="comment-btn" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Comment</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									コメントします。
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
									<button type="button" class="btn btn-primary" data-dismiss="modal" id="send">OK</button>
								</div>
							</div>
						</div>
					</div>
				</form>	
			</div>
		</section>
		
		<section>
			<div class="container" id="recommend">
			<h2 class="recommend-title text-center">RELATED</h2>
				<?php
				foreach($app->getValues('related') as $related){
				?>
				<div class="post">
					<div class="row mt-4">
						<div class="col-5">
							<a href="detail.php?post=<?= h($related->postId) ?>"><img src="<?= h($related->img) ?>" alt="<?= h($related->title) ?>" class="post-img rounded mt-1"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="detail.php?post=<?= h($related->postId) ?>"><?= h($related->title) ?></a></h4>
							<p><a href="professor.php?id=<?= $related->id ?>"><span class="text-muted post-tag border rounded"><?= h(ucfirst($related->firstName)) ?>&nbsp;<?= h(ucfirst($related->lastName)) ?></span></a>
								<a href="category.php?category=<?= h($related->category) ?>&page=1"><span class="text-muted post-tag border rounded"><?= h(ucfirst($related->category)) ?></span></a>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($related->difficulty)) ?></span></p>
							<p class="post-text"><a href="detail.php?post=<?= h($related->postId) ?>"><?= h(mb_substr($related->text, 0, 60)) ?>...</a></p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		
		<section>
			<div class="container" id="recommend">
			<h2 class="recommend-title text-center">RECOMMEND</h2>
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
								<a href="category.php?category=<?= h($recommend->category) ?>&page=1"><span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->category)) ?></span></a>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($recommend->difficulty)) ?></span></p>
							<p class="post-text"><a href="detail.php?post=<?= h($recommend->postId) ?>"><?= h(mb_substr($recommend->text, 0, 60)) ?>...</a></p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		
		<div class="backToTop rounded-circle">
			<a href="#top"><i class="fas fa-arrow-alt-circle-up fa-3x"></i></a>
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
	
	<!--	js  -->
	<script type="text/javascript" src="js/subpages.js"></script>
	<script type="text/javascript" src="js/comment.js"></script>

	

</body>
</html>