<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Mypage();

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

	<!--  CSS  -->
	<link rel="stylesheet" href="css/mypage.css">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito|Dancing+Script|Dancing+Script:700" rel="stylesheet">

	<!--  Font Awesome  -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	
	<title>
		<?php
		foreach($app->getValues('myposts') as $mypost){
			echo "My Page - ".h(ucfirst($mypost->firstName))."&nbsp;".h(ucfirst($mypost->lastName))." | Elel（エレル）一橋大教授のオススメ図書";
		}
		?>
	</title>
	
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
	
		<p class="text-left myposts-nav"><a href="search.php">New Post</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="profile.php">Profile</a></p>
	
		<section>
			<div class="container myPosts">
			<h1 class="subpages-title text-center">My Posts</h1>
			<h4 class="text-center noposts"><?= $app->getValues('empty') ?></h4>
				<?php
				foreach($app->getValues('myposts') as $mypost){
				?>
				<div class="post">
					<div class="row my-3">
						<div class="col-5">
							<a href="edit.php?post=<?= h($mypost->postId) ?>"><img src="<?= h($mypost->img) ?>" alt="<?= h($mypost->title) ?>" class="post-img rounded"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="edit.php?post=<?= h($mypost->postId) ?>"><?= h($mypost->title) ?></a></h4>
							<p><span class="text-muted post-tag border rounded"><?= h(ucfirst($mypost->firstName)) ?>&nbsp;<?= h(ucfirst($mypost->lastName)) ?></span>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($mypost->category)) ?></span>
							<span class="text-muted post-tag border rounded"><?= h(ucfirst($mypost->difficulty)) ?></span></p>
							<p class="post-text"><a href="edit.php?post=<?= h($mypost->postId) ?>"><?= h(mb_substr($mypost->text, 0, 40)) ?>...</a></p>

							<form action="" method="post">
								<button type="button" class="btn btn-primary btn-sm box-shadow delete" data-toggle="modal" data-target="#delete">
									Delete
								</button>
								<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="deleteModalLongTitle">Delete Post</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body">
												「<?= h($mypost->title) ?>」の投稿の削除します。
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
												<button type="submit" class="btn btn-primary">OK</button>
											</div>
										</div>
									</div>
								</div>
							<input type="hidden" name="deletePostId" value="<?= h($mypost->postId) ?>">
							</form>


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