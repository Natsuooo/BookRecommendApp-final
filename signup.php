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
	
	<link rel="stylesheet" href="css/signup.css">
	
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
					
					<label for="name" class="sr-only">Name</label>
     			<input type="text" name="name" id="name" class="form-control" placeholder="Name" value="<?= !empty($app->getValues('name')) ? h($app->getValues('name')) : '' ?>" required autofocus>
				
					<label for="email" class="sr-only">Email address</label>
     			<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?= !empty($app->getValues('email')) ? h($app->getValues('email')) : '' ?>" required>
     			<span class="err"><?= h($app->getErrors('email')); ?></span>
     			
					<label for="password" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					<span class="err"><?= h($app->getErrors('password')); ?></span>
					
					<button class="btn btn-lg btn-primary btn-block my-3" type="submit">Sign up</button>
					
					<p class="fs12 my-1"><a href="/login.php">Log in</a></p>
					<p class="fs12 my-1"><a href="index.php">Home</a></p>
					<p class="fs12 my-1"><a href="forgetPassword.php">Forget password?</a></p>
					
					<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
				</form>
			</div>
		</section>
	</main>
	<footer></footer>
	
	
</body>
</html>