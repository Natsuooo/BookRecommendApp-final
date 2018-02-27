<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Profile();

$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>My Profile</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="container">
	<h1>My Profile</h1>
		<form action="" method="post" id="profile">
		<?php foreach($app->getValues('profile') as $profile){ ?>
			<p>
				<input type="text" name="name" placeholder="name" value="<?= !empty($app->getValues('name')) ? h($app->getValues('name')) : h($profile->name); ?>">
			</p>
			<p>
				<input type="text" name="department" placeholder="department" value="<?= !empty($app->getValues('department')) ? h($app->getValues('department')) : h($profile->department); ?>">
			</p>
			<p>
				<input type="text" name="professional" placeholder="professional" value="<?= !empty($app->getValues('professional')) ? h($app->getValues('professional')) : h($profile->professional); ?>">
			</p>
			<p>
				<textarea name="message" cols="30" rows="10" placeholder="message"><?= !empty($app->getValues('message')) ? h($app->getValues('message')) : h($profile->message); ?></textarea>
			</p>
			<?php } ?>
			<div class="btn" onclick="document.getElementById('profile').submit();">Preserve</div>
			<p><span class="fs12"><a href="mypage.php">Back</a></span></p>
		</form>
		
	</div>
</body>
</html>


