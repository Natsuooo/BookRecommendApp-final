<?php

require(__DIR__.'/config/config.php');

$app=new lib\Controller\ForgetPassword();

$app->run();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Forget Password</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="container">
		<form action="" method="post" id="forgetPassword">
			<p>
				<input type="text" name="email" placeholder="email" value="<?= !empty($app->getValues('email')) ? h($app->getValues('email')) : '' ?>">
			</p>
			<p class="err"><?= h($app->getErrors('forgetPassword')); ?></p><p class="err"><?= h($app->getErrors('successEmail')); ?></p><p class="err"><?= h($app->getErrors('failEmail')); ?></p>
			<div class="btn" onclick="document.getElementById('forgetPassword').submit()">Send</div>
			<p class="fs12"><a href="/siginup.php">Sign Up</a></p>
			<p class="fs12"><a href="/login.php">Log In</a></p>
			<p class="fs12"><a href="index.php">Home</a></p>
			<input type="hidden" name="token" value="<?= h($_SESSION['token']); ?>">
		</form>
	</div>
</body>
</html>