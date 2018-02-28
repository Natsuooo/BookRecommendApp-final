<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Mypage();

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
	
	<title>Mypage | ELEL（エレル）一橋大教授のオススメ図書</title>
	
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<header>
		
      
		<h1>Mypage</h1>
		<ul>
			<li><a href="update.php">Update Emial/Password</a></li>
			<li><a href="logout.php">Log Out</a></li>
			<li><a href="search.php">Post</a></li>
			<li><a href="index.php">Home</a></li>
			<li><a href="profile.php">My Profile</a></li>
		</ul>
		
		<form action="" method="post">
			<a href="" data-toggle="modal" data-target="#logout">
				Log Out
			</a>
			
			<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="logoutModalLongTitle">Log Out</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							ログアウトします。
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
							<button type="submit" class="btn btn-primary">OK</button>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="logout" value="logout">
		</form>
		
	</header>
	<main>
		<section>
			<div class="container">
				<div id="newEntry" class="tab-pane active">
							<?php
							foreach($app->getValues('myposts') as $mypost){
							?>
							<div class="post">
								<div class="row my-3">
									<div class="col-5">
										<a href="edit.php?post=<?= h($mypost->postId) ?>"><img src="<?= h($mypost->img) ?>" alt="<?= h($mypost->title) ?>" class="post-img"></a>
									</div>
									<div class="col-7 post-content">
										<h4 class="post-title"><a href="edit.php?post=<?= h($mypost->postId) ?>"><?= h($mypost->title) ?></a></h4>
										<p><span class="text-muted post-tag border rounded"><?= h($mypost->name) ?></span>
										<span class="text-muted post-tag border rounded"><?= h($mypost->category) ?></span>
										<span class="text-muted post-tag border rounded"><?= h($mypost->difficulty) ?></span></p>
										<p class="post-text"><?= h(mb_substr($mypost->text, 0, 40)) ?>...</p>
										
										<form action="" method="post">
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#delete">
												Delete
											</button>
											<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="deleteModalLongTitle">Delete Post</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<?= h($mypost->title) ?>の投稿の削除します。
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
															<button type="submit" class="btn btn-primary">OK</button>
														</div>
													</div>
												</div>
											</div>
										<input type="hidden" name="deletePostId" value="<?= h($mypost->postId) ?>">
										</form>
										
										
									</div>
								</div>
							</div>	
							<?php } ?>
							
            </div>
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