<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Profile();

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

	<title>
		<?php foreach($app->getValues('profile') as $profile){ ?>
		Profile - <?= h($profile->firstName) ?> <?= h($profile->lastName) ?> | Elel（エレル）一橋大教授のオススメ図書
		<?php } ?>
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
		
		<div class="formError text-center"><?= h($app->getErrors('formError')); ?></div>
	
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="mypage.php">My Posts</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
			</ol>
		</nav>
	
		<div class="container">
			<h1 class="subpages-title text-center mb-4">Profile</h1>
			<form action="" method="post">
			<?php foreach($app->getValues('profile') as $profile){ ?>
				<div class="form-row">
					<div class="col-6">
						<label for="firstName" class="profile-label">First name</label>
						<input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name" value="<?= !empty($app->getValues('firstName')) ? h($app->getValues('firstName')) : h($profile->firstName); ?>" required autofocus>
					</div>
					<div class="col-6">
						<label for="lastName" class="profile-label">Last name</label>
						<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" value="<?= !empty($app->getValues('lastName')) ? h($app->getValues('lastName')) : h($profile->lastName); ?>" required>
					</div>
				</div>
				<div class="form-row">
					<div class="col-6">
						<label for="sei" class="profile-label">姓</label>
						<input type="text" name="sei" id="sei" class="form-control" placeholder="姓" value="<?= !empty($app->getValues('sei')) ? h($app->getValues('sei')) : h($profile->sei); ?>" required>
					</div>
					<div class="col-6">
						<label for="mei" class="profile-label">名</label>
						<input type="text" name="mei" id="mei" class="form-control" placeholder="名" value="<?= !empty($app->getValues('mei')) ? h($app->getValues('mei')) : h($profile->mei); ?>" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<label for="professionalCategory" class="profile-label">Professional category</label>
     			<select name="professionalCategory" class="custom-select mr-sm-2" id="professionalCategory" required>
						<option value="commerce" <?= h($profile->professionalCategory)==='commerce' ? 'selected' : '' ?>>commerce</option>
						<option value="economics" <?= h($profile->professionalCategory)==='economics' ? 'selected' : '' ?>>economics</option>
						<option value="law" <?= h($profile->professionalCategory)==='law' ? 'selected' : '' ?>>law</option>
						<option value="sociology" <?= h($profile->professionalCategory)==='sociology' ? 'selected' : '' ?>>sociology</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="department" class="profile-label">Department</label>
					<input type="text" class="form-control" id="department" name="department" placeholder="Enter your department" value="<?= !empty($app->getValues('department')) ? h($app->getValues('department')) : h($profile->department); ?>">
				</div>
				
				<div class="form-group">
					<label for="professional" class="profile-label">Professional</label>
					<input type="text" class="form-control" id="professional" name="professional" placeholder="Enter your professional" value="<?= !empty($app->getValues('professional')) ? h($app->getValues('professional')) : h($profile->professional); ?>">
				</div>
				
				<div class="form-group">
					<label for="textarea" class="profile-label">Message</label>
					<textarea name="message" id="message" rows="15" class="form-control" placeholder="Enter your message"><?= !empty($app->getValues('message')) ? h($app->getValues('message')) : h($profile->message); ?></textarea>
				</div>
				
				<?php } ?>
				<button type="button" class="btn btn-primary box-shadow" data-toggle="modal" data-target="#profile">Preserve</button>
			
				<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profileModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="profileModalLongTitle">Profile</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								プロフィールの内容を更新します。
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
								<button type="submit" class="btn btn-primary">OK</button>
							</div>
						</div>
					</div>
				</div>
				<p class="my-3 ml-1"><a href="<?= !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'mypage.php' ?>">Back</a></p>
			</form>	
		</div>
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


