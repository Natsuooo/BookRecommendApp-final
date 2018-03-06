<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Contact();

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
	<link href="https://fonts.googleapis.com/css?family=Dancing+Script:700|Nunito|Paprika" rel="stylesheet">
	
	<!--  Font Awesome  -->
	<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="css/subpages.css">
  
	<title>Contact | Elel（エレル）一橋大教授のオススメ図書</title>
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
	
	<main>
		
		<div class="successSend text-center" style="color:#0f009b;background:#00bdf2;margin-top:-12px;margin-bottom:30px;"><?= h($app->getErrors('successSend')); ?></div>
		
		<div class="failSend text-center"style="color:#c40300;background:#ffaaaa;margin-top:-12px;margin-bottom:30px;"><?= h($app->getErrors('failSend')); ?></div>
	
	
		<div class="container">
			<h1 class="subpages-title text-center mb-4">Contact</h1>
			<form action="" method="post">
				<div class="form-row">
					<div class="col-6">
						<label for="firstName" class="contact-label">First name</label>
						<input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name" value="<?= !empty($app->getValues('firstName')) ? h($app->getValues('firstName')) : ''; ?>" required autofocus>
					</div>
					<div class="col-6">
						<label for="lastName" class="contact-label">Last name</label>
						<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" value="<?= !empty($app->getValues('lastName')) ? h($app->getValues('lastName')) :''; ?>" required>
					</div>
				</div>
			
				<div class="form-group">
					<label for="email" class="contact-label">Email address</label>
					<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?= !empty($app->getValues('email')) ? h($app->getValues('email')) : '' ?>" required>
				</div>
				
				<div class="form-group">
					<label for="textarea" class="contact-label">Message</label>
					<textarea name="message" id="message" rows="10" class="form-control" placeholder="Enter your message" required><?= !empty($app->getValues('message')) ? h($app->getValues('message')) : ''; ?></textarea>
				</div>
				
				<div class="form-group text-center">
					<button type="button" class="btn btn-primary box-shadow" data-toggle="modal" data-target="#send">Send</button>
					<p class="my-3 ml-1"><a href="<?= !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php' ?>">Back</a></p>
				</div>
			
				<div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="profileModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="profileModalLongTitle">Contact</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								送信します。
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
								<button type="submit" class="btn btn-primary">OK</button>
							</div>
						</div>
					</div>
				</div>
				
			</form>	
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

	<script>
			$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').trigger('focus')
			});
		</script>

</body>
</html>