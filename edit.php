<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Edit();

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

	<link rel="stylesheet" href="css/detail.css">
	
	<title>
		<?php
		foreach($app->getValues('editpost') as $editpost){
			echo "Edit - ".h($editpost->title)." | ELEL（エレル）一橋大教授のオススメ図書";
		}
		?>
	</title>
</head>
<body>
	<div id="container">
	<h1>Edit</h1>
		<form action="" method="post" id="edit">
		<?php foreach($app->getValues('editpost') as $editpost){ ?>
			<p>
				<input type="text" name="title" placeholder="title" value="<?= !empty($app->getValues('title')) ? h($app->getValues('title')) : h($editpost->title); ?>">
			</p>
			<p>
				<textarea name="text" cols="30" rows="10" placeholder="text"><?= !empty($app->getValues('text')) ? h($app->getValues('text')) : h($editpost->text); ?></textarea>
			</p>
			<?php } ?>
			<div class="btn" onclick="document.getElementById('edit').submit();">Edit</div>
			<p><span class="fs12"><a href="mypage.php">Back</a></span></p>
		</form>
		
	</div>
</body>
</html>


