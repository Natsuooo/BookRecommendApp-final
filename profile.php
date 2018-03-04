<?php

require_once(__DIR__.'/config/config.php');

$app=new lib\Controller\Profile();

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
		<?php foreach($app->getValues('profile') as $profile){ ?>
		Profile - <?= h($profile->name) ?> | ELEL（エレル）一橋大教授のオススメ図書
		<?php } ?>
	</title>
</head>
<body>
	<header>
		<h1 class="text-center my-3">Profile</h1>
	</header>
	<main>
		<div class="container">
			<form action="" method="post">
			<?php foreach($app->getValues('profile') as $profile){ ?>
				<div class="form-row">
					<div class="col-6">
						<label for="firstName">First name</label>
						<input type="text" name="firstName" id="firstName" class="form-control" placeholder="First name" value="<?= !empty($app->getValues('firstName')) ? h($app->getValues('firstName')) : h($profile->firstName); ?>" required autofocus>
					</div>
					<div class="col-6">
						<label for="lastName">Last name</label>
						<input type="text" name="lastName" id="lastName" class="form-control" placeholder="Last name" value="<?= !empty($app->getValues('lastName')) ? h($app->getValues('lastName')) : h($profile->lastName); ?>" required autofocus>
					</div>
				</div>
				<div class="form-row">
					<div class="col-6">
						<label for="sei">姓</label>
						<input type="text" name="sei" id="sei" class="form-control" placeholder="姓" value="<?= !empty($app->getValues('sei')) ? h($app->getValues('sei')) : h($profile->sei); ?>" required>
					</div>
					<div class="col-6">
						<label for="mei">名</label>
						<input type="text" name="mei" id="mei" class="form-control" placeholder="名" value="<?= !empty($app->getValues('mei')) ? h($app->getValues('mei')) : h($profile->mei); ?>" required>
					</div>
				</div>
				
				
				<div class="form-group">
					<label for="professionalCategory">Professional category</label>
     			<select name="professionalCategory" class="custom-select mr-sm-2" id="professionalCategory" required>
						<option value="commerce" <?= h($profile->professionalCategory)==='commerce' ? 'selected' : '' ?>>commerce</option>
						<option value="economics" <?= h($profile->professionalCategory)==='economics' ? 'selected' : '' ?>>economics</option>
						<option value="law" <?= h($profile->professionalCategory)==='law' ? 'selected' : '' ?>>law</option>
						<option value="sociology" <?= h($profile->professionalCategory)==='sociology' ? 'selected' : '' ?>>sociology</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="department">Department</label>
					<input type="text" class="form-control" id="department" name="department" placeholder="Enter your department" value="<?= !empty($app->getValues('department')) ? h($app->getValues('department')) : h($profile->department); ?>">
				</div>
				
				<div class="form-group">
					<label for="professional">Professional</label>
					<input type="text" class="form-control" id="professional" name="professional" placeholder="Enter your professional" value="<?= !empty($app->getValues('professional')) ? h($app->getValues('professional')) : h($profile->professional); ?>">
				</div>
				
				<div class="form-group">
					<label for="textarea">Message</label>
					<textarea name="message" id="message" rows="5" class="form-control" placeholder="Enter your message"><?= !empty($app->getValues('message')) ? h($app->getValues('message')) : h($profile->message); ?></textarea>
				</div>
				
				<?php } ?>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profile">Preserve</button>
			
				<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profileModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="profileModalLongTitle">Profile</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								プロフィールの内容を更新します。
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
								<button type="submit" class="btn btn-primary">OK</button>
							</div>
						</div>
					</div>
				</div>
				<p class="my-3"><a href="mypage.php">Back</a></p>
			</form>	
		</div>
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


