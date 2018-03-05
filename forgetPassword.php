<?php

require(__DIR__.'/config/config.php');

$app=new lib\Controller\ForgetPassword();

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
	
	<title>Forget Password | Elel（エレル）一橋大教授のオススメ図書</title>
	
</head>
<body>
	<header>
		
	</header>
	
	<main>
		<section>
			<div class="container text-center">
				<form action="" method="post" class="form-signin">
					<h1 class="mb-3 font-weight-normal">Forget Password</h1>
					<h2 class="text-center">We'll send you email with new password.</h2>
				
					<label for="email" class="sr-only">Email address</label>
     			<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?= !empty($app->getValues('email')) ? h($app->getValues('email')) : '' ?>" required>
     			<span class="err"><?= h($app->getErrors('forgetPassword')); ?></span>
     			<span class="err"><?= h($app->getErrors('successEmail')); ?></span>
     			<span class="err"><?= h($app->getErrors('failEmail')); ?></span>
					
					<button class="btn btn-lg btn-primary btn-block my-3" type="submit">Send</button>
					
					<p class="fs12 my-1"><a href="/login.php">Login</a></p>
					<p class="fs12 my-1"><a href="index.php">Top</a></p>
					
					
					<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
				</form>
			</div>
		</section>
		
		
		
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

		<script>
			$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').trigger('focus')
			});
		</script>
		
	</main>
	<footer></footer>
	
	
</body>
</html>