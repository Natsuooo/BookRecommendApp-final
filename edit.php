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
	<header></header>
	<main>
		<section>
			<div class="container">
			<?php foreach($app->getValues('editpost') as $editpost){ ?>
				<h1 class="detail-title mt-4"><?= h($editpost->title) ?></h1>

				<div class="detail-info bg-light">
					<div class="row">
						<div class="col-7 detail-img">
							<img src="<?= h($editpost->img) ?>" alt="<?= h($editpost->title) ?>" class="w-100">
						</div>
						<div class="col-5 detail-content">
							<p class="mb-2">著者<br><?= h($editpost->author) ?></p>
							<p class="my-2">出版社<br><?= h($editpost->publisher) ?></p>
							<p class="mt-2">出版日<br><?= h($editpost->publishDate) ?></p>
						</div>
					</div>
				</div>

				<form action="" method="post">
				<h6 class="my-2">Category</h6>

				<div class="custom-control custom-radio">
					<input type="radio" id="category1" name="category" class="custom-control-input" value="commerce" <?= h($editpost->category)==='commerce' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="category1">commerce</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="category2" name="category" class="custom-control-input" value="economics" <?= h($editpost->category)==='economics' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="category2">economics</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="category3" name="category" class="custom-control-input" value="law" <?= h($editpost->category)==='law' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="category3">law</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="category4" name="category" class="custom-control-input" value="sociology" <?= h($editpost->category)==='sociology' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="category4">sociology</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="category5" name="category" class="custom-control-input" value="science" <?= h($editpost->category)==='science' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="category5">science</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="category6" name="category" class="custom-control-input" value="liberalArts" <?= h($editpost->category)==='liberalArts' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="category6">liberalArts</label>
				</div>


				<h6 class="my-2">Difficulty</h6>

				<div class="custom-control custom-radio">
					<input type="radio" id="difficulty1" name="difficulty" class="custom-control-input" value="易しめ" <?= h($editpost->difficulty)==='易しめ' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="difficulty1">易しめ</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="difficulty2" name="difficulty" class="custom-control-input" value="普通" <?= h($editpost->difficulty)==='普通' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="difficulty2">普通</label>
				</div>
				<div class="custom-control custom-radio">
					<input type="radio" id="difficulty3" name="difficulty" class="custom-control-input" value="難しめ" <?= h($editpost->difficulty)==='難しめ' ? 'checked' : '' ?>>
					<label class="custom-control-label" for="difficulty3">難しめ</label>
				</div>

				<div class="form-group mt-3">
					<label for="textarea">Comment</label>
					<textarea name="text" id="textarea" rows="10" class="form-control" placeholder="Enter your comment for the book" required><?= !empty($app->getValues('text')) ? h($app->getValues('text')) : h($editpost->text); ?></textarea>
				</div>

				<div class="form-group text-center">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">Edit</button>
				</div>

				<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editModalLongTitle">Edit Post</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<?= h($editpost->title) ?>の投稿内容を変更します。
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
								<button type="submit" class="btn btn-primary">OK</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<?php } ?>
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


