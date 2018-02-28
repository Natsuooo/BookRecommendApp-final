<?php

require_once(__DIR__.'/config/config.php');

$_SESSION['post']=$_GET['post'];

$app=new lib\Controller\Detail();

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
		foreach($app->getValues('details') as $detail){
			echo h($detail->title)." | ELEL（エレル）一橋大教授のオススメ図書";
		}
		?>
	</title>
</head>
<body>
	<header></header>
	<main>
		<section>
			<div class="container">
				<?php
				foreach($app->getValues('details') as $detail){
				?>
				
					<h1 class="detail-title mt-4"><?= h($detail->title) ?></h1>
					
					<div class="detail-tags mt-3">
						<p><span class="text-muted detail-tag border rounded"><?= h($detail->name) ?></span>
					<span class="text-muted detail-tag border rounded"><?= h($detail->category) ?></span></p>
					</div>
					
					<div class="detail-info bg-light">
						<div class="row">
							<div class="col-7 detail-img">
								<img src="<?= h($detail->img) ?>" alt="<?= h($detail->title) ?>" class="w-100">
							</div>
							<div class="col-5 detail-content">
								<p class="mb-2">著者<br><?= h($detail->author) ?></p>
								<p class="my-2">出版社<br><?= h($detail->publisher) ?></p>
								<p class="mt-2">出版日<br><?= h($detail->publishDate) ?></p>
							</div>
						</div>
					</div>
					
					<div class="detail-text">
						<p class="my-4">
							<?= h($detail->text) ?>
						</p>
					</div>
					
				<?php
				}
				?>
			</div>
		</section>
		
		<section>
			<div class="container">
			<h2 class="comments-title">Comment</h2>
				<?php
				echo "<br>";
				foreach($app->getValues('comments') as $comment){
					echo "<p>".h($comment->name)."</p>";
					echo "<p>".h($comment->comment)."</p>";
					echo "<p>".h(substr($comment->created, 0, 10))."<p>";
				}
				?>
				<p class="comments"></p>
				
				<form action="" method="post" id="comment" class="mt-5">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
					</div>
					<div class="form-group">
						<label for="textarea">Comment</label>
						<textarea name="comment" id="textarea" rows="5" class="form-control" placeholder="Enter your comment"></textarea>
					</div>
					<div class="button">
						<div class="btn btn-primary" id="send">Submit</div>
					</div>
				</form>	
			</div>
		</section>
		
		<section>
			<div class="container">
				<h2 class="recommend-title mt-5">Recommend</h2>
				<?php
				foreach($app->getValues('recommends') as $recommend){
				?>
				<div class="post">
					<div class="row my-3">
						<div class="col-5">
							<a href="detail.php?post=<?= h($recommend->postId) ?>"><img src="<?= h($recommend->img) ?>" alt="<?= h($recommend->title) ?>" class="post-img"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="detail.php?post=<?= h($recommend->postId) ?>"><?= h($recommend->title) ?></a></h4>
							<p><span class="text-muted post-tag border rounded"><?= h($recommend->name) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($recommend->category) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($recommend->difficulty) ?></span></p>
							<p class="post-text"><?= h(mb_substr($recommend->text, 0, 40)) ?>...</p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		
		<section>
			<div class="container">
				<h2 class="related-title mt-5">Related</h2>
				<?php
				foreach($app->getValues('related') as $related){
				?>
				<div class="post">
					<div class="row my-3">
						<div class="col-5">
							<a href="detail.php?post=<?= h($related->postId) ?>"><img src="<?= h($related->img) ?>" alt="<?= h($related->title) ?>" class="post-img"></a>
						</div>
						<div class="col-7 post-content">
							<h4 class="post-title"><a href="detail.php?post=<?= h($related->postId) ?>"><?= h($related->title) ?></a></h4>
							<p><span class="text-muted post-tag border rounded"><?= h($related->name) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($related->category) ?></span>
							<span class="text-muted post-tag border rounded"><?= h($related->difficulty) ?></span></p>
							<p class="post-text"><?= h(mb_substr($related->text, 0, 40)) ?>...</p>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
		</section>
		
	</main>

	<footer class="text-center text-dark bg-light py-4 mt-5">
 		<div class="container">
 			<p>Home</p>
			<p>About</p>
			<p>Contact</p>
 		</div>
		<div class="container">
			<p>Copyright &copy; All Rights Reserved by Natsuo Yamashita</p>
		</div>
  </footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$(function() {

    $('#send').click(function() {
			
			var date = new Date();
			formattedDate = [
				date.getFullYear(),
				('0' + (date.getMonth() + 1)).slice(-2),
				('0' + date.getDate()).slice(-2)
			].join('-');
			
      $.ajax({
        type: "POST",
        url: "send.php",
				dataType: "json",
        data: {
					comment : $('#textarea').val(),
					name: $('#name').val()
				},
      }).done(function(data) {
      	$('.comments').append('<p>'+data.name+'</p><p>'+data.comment+'</p><p>'+formattedDate+'</p>');
      }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
       
        alert('Error : ' + errorThrown);
      });
			
    });

  });
	</script>
</body>
</html>