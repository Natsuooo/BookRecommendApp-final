<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Logout();

$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Log Out</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="container">
		<h1>Log Out</h1>
		<form action="" method="post" id="logout">
			<div class="btn" onclick="document.getElementById('logout').submit()">Log Out</div>
			<p class="fs12"><a href="mypage.php">Back</a></p>
			<input type="hidden" name="token" value="<?= h($_SESSION['token']) ?>">
		</form>
	</div>
</body>
</html>