<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Delete();

$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>Delete</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<div id="container">
		<h1>Delete</h1>
		<h2>
			<?php
			foreach($app->getValues('delete') as $delete){
				echo "<h2>".h($delete->title)."</h2>";
				echo "<p>".h($delete->text)."</p>";
			}
			?>
		</h2>
		<form action="" method="post" id="delete">
			<div class="btn" onclick="document.getElementById('delete').submit()">Delete</div>
			<p class="fs12"><a href="mypage.php">Back</a></p>
		</form>
	</div>
</body>
</html>