<!doctype html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<title>Comment Form</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</head>


<!---------------------	Form Block START	--------------------------->
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-1">
			<h1 class="text-center" name='title_add'>Create a comment!</h1>
			<hr stlyle="background-color: black; color: black; height: 1px; ">
		</div>
	</div>
</div>
<div class="container">
	<div class="row justify-content-center">
		<div class="col text-center">
			<form class=" form-inline" method="post" id="form_add">
				<div class="form-group">
					<input type="text" name="name" id="name" placeholder="Name/Nickname">
					<input type="email" name="email" id="email" placeholder="E-mail" required>
				</div>
				<br>
				<div class="form-group">
		<textarea name="comment" id="comment" rows="8" cols="45" placeholder="Enter your comment..."
		></textarea>
				</div>

				<div class="form-group">
					<input type="button" name="send" id="send" value="Send" style="cursor:pointer;">
				</div>
				<input type="button" name="cancel" id="cancel_load" value="Cancel"
					   style="display:none; cursor:pointer;">

				<div id="errorMess"></div>

			</form>
		</div>
	</div>
</div>


<!---------------------	Form Block END	--------------------------->


<!---------------------	Comments Block START	--------------------------->
<div class="container">
	<div class="row">
		<div class="col-md-12 mt-5">
			<h1 class="text-center" name='title_add'>Comments</h1>
			<hr stlyle="background-color: black;color: black; height: 1px; ">
		</div>
	</div>


	<div id="comment_all">
		<ul>
			<?php
			if (count($comments) === 0) : ?>

				<p>Add comment<p>

			<?php else: ?>
				<?php foreach ($comments as $comment): ?>

					<div style="border: 1px solid blue; margin: 5px 0 20px 0; padding: 5px 0 20px 5px;">
						<div>
							<h3><?php echo $comment->name ?></h3>
						</div>
						<div>
							<p><?php echo $comment->comment ?></p>
						</div>
						<div>
							<p><strong><?php echo $comment->created_at ?></strong></p>
						</div>
					</div>

				<?php endforeach; ?>
			<?php endif; ?>

		</ul>
		<div class="col-5 mx-auto">
			<nav aria-label="...">
				<? echo $this->pagination->create_links(); ?>
			</nav>
		</div>
	</div>
</div>


</div>
<!---------------------	Paginator END	--------------------------->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="http://chenges.loc/js/form.js" charset="utf-8"></script>
<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
</body>
</>
