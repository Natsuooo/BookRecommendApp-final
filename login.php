<?php

require(__DIR__.'/config/config.php');

$app=new lib\Controller\Login();

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
	
	<link rel="stylesheet" href="css/form.css">
	
	<title>Login | Elel（エレル）一橋大教授のオススメ図書</title>
	
</head>
<body>
	<header>
		
	</header>
	
	<main>
		<section>
			<div class="container text-center">
				<form action="" method="post"  class="form-signin">
					<h1 class="h3 mb-3 font-weight-normal">Login</h1>
				
					<label for="email" class="sr-only">Email address</label>
     			<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?= !empty($app->getValues('email')) ? h($app->getValues('email')) : '' ?>" required autofocus>
     			<span class="err"><?= h($app->getErrors('email')); ?></span>
     			
					<label for="password" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					<span class="err"><?= h($app->getErrors('password')); ?></span>
					
					<button class="btn btn-lg btn-primary btn-block my-3" type="submit">login</button>
					
					<p class="fs12 my-1"><a href="signup.php">Sign Up</a></p>
					<p class="fs12 my-1"><a href="index.php">Top</a></p>
					<p class="fs12 my-1"><a href="forgetPassword.php">Forget password?</a></p>
					
					<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
				</form>
			</div>
		</section>
		
		
		
		<!-- Modal -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="login-modalTitle">Login</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						My page is only for hitotsubashi professors.
					</div>
					<div class="modal-footer">
						<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-secondary">Back</a>
						<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
		
	</main>
	<footer></footer>
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<script>
		$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').trigger('focus')
		});
		
		$(function(){
			$('.modal').modal('show');
		});
	</script>
</body>
</html>