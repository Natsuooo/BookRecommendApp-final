<?php

require(__DIR__.'/config/config.php');

$app=new lib\Controller\Signup();

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
	
	<title>Sign Up</title>
	
</head>
<body>
	<header>
		
	</header>
	
	<main>
		<section>
			<div class="container text-center">
				<form action="" method="post" class="form-signin">
					<h1 class="h3 mb-3 font-weight-normal">Sign up</h1>
					
					
					
					<div class="form-row">
						<div class="col-6">
							<label for="firstName" class="sr-only">First name</label>
							<input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name" value="<?= !empty($app->getValues('firstName')) ? h($app->getValues('firstName')) : '' ?>" required autofocus>
						</div>
						<div class="col-6">
							<label for="lastName" class="sr-only">Last name</label>
							<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" value="<?= !empty($app->getValues('lastName')) ? h($app->getValues('lastName')) : '' ?>" required autofocus>
						</div>
     			</div>
     			
     			<div class="form-row" id="namae">
						<div class="col-6">
							<label for="sei" class="sr-only">姓</label>
							<input type="text" name="sei" id="sei" class="form-control" placeholder="姓" value="<?= !empty($app->getValues('sei')) ? h($app->getValues('sei')) : '' ?>" required autofocus>
						</div>
						<div class="col-6">
							<label for="mei" class="sr-only">名</label>
							<input type="text" name="mei" id="mei" class="form-control" placeholder="名" value="<?= !empty($app->getValues('mei')) ? h($app->getValues('mei')) : '' ?>" required autofocus>
						</div>
     			</div>
     			
     			<label for="professionalCategory" class="sr-only" >Professional category</label>
     			<select name="professionalCategory" class="custom-select mr-sm-2" id="professionalCategory" required>
						<option selected>Professional category</option>
						<option value="commerce">Commerce</option>
						<option value="economics">Economics</option>
						<option value="law">Law</option>
						<option value="sociology">Sociology</option>
					</select>
				
					<label for="email" class="sr-only">Email address</label>
     			<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?= !empty($app->getValues('email')) ? h($app->getValues('email')) : '' ?>" required>
     			<span class="err"><?= h($app->getErrors('email')); ?></span>
     			
					<label for="password" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					<span class="err"><?= h($app->getErrors('password')); ?></span>
					
					<button class="btn btn-lg btn-primary btn-block my-3" type="submit">Sign up</button>
					
					<p class="fs12 my-1"><a href="/login.php">Login</a></p>
					<p class="fs12 my-1"><a href="index.php">Top</a></p>
					
					
					<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
				</form>
			</div>
		</section>
		
		<!-- Modal -->
		<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modal" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="signup-modalTitle">Sign up</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						This page is only for Hitotsubashi professors. Don't tell others this page link.
					</div>
					<div class="modal-footer">
						<a href="<?= $_SERVER['HTTP_REFERER'] ?>" class="btn btn-secondary">Back</a>
						<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
		
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
		
	</main>
	<footer></footer>
	
	
</body>
</html>