<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Update();

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
	
	<title>Update email/password | Elel（エレル）一橋大教授のオススメ図書</title>
</head>
<body>
	<header>
		
	</header>
	
	<main>
		<section>
			<div class="container text-center">
				<form action="" method="post" class="form-signin">
					<h1 class="h3 mb-3 font-weight-normal">Update<br>Email/Password</h1>

				
					<label for="email" class="sr-only">Email address</label>
     			<input type="email" id="email" name="email" class="form-control" placeholder="Email address" value="<?= h($app->me()->email) ?>" required>
     			<span class="err"><?= h($app->getErrors('email')); ?></span>
     			
					<label for="password" class="sr-only">Password</label>
					<input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
					<span class="err"><?= h($app->getErrors('password')); ?></span>
					
					<button class="btn btn-lg btn-primary btn-block my-3" type="button" data-toggle="modal" data-target="#update">Update</button>
					
					<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="updateModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="updateModalLongTitle">Update Email/Password</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body text-left">
									ご登録のメールアドレスとパスワードを変更します。
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
									<button type="submit" class="btn btn-primary">Save changes</button>
								</div>
							</div>
						</div>
					</div>
					
					<p class="fs12"><a href="<?= $_SERVER['HTTP_REFERER'] ?>">Back</a></p>
					
					<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
				</form>
			</div>
		</section>
	</main>
	<footer></footer>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		$('#myModal').on('shown.bs.modal', function () {
			$('#myInput').trigger('focus')
		})
	</script>
</body>
</html>