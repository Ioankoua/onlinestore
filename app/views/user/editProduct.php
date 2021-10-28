<div style="margin-top: 10vh; margin-left: 20vw;">
	<?php foreach ($product as $prod): ?>

		<div class="my_tittle">
			<h5>Here you can add your product</h5>
		</div>

		<div class="my_form">
			<form action="" method="post" enctype="multipart/form-data" id="ajax">

				<input type="text" style="opacity: 0; width: 1px; height: 1px;" name="id" value="<?php echo $prod['id']; ?>">

				<div class="form-group" style="width: 40vw; margin-top: 1vh;">
					<label class="message_word">Product Name</label>
					<input type="text" name="title"class="form-control" value="<?php echo $prod['title']; ?>">
				</div>

				<div class="form-group" style="width: 40vw; margin-top: 1vh;">
					<label class="message_word">Small description</label>
					<input type="text" name="smallDeckr"class="form-control" value="<?php echo $prod['smallDeckr']; ?>">
				</div>

				<div class="form-group" style="width: 40vw; margin-top: 1vh;">
					<label class="message_word">Full description</label>
					<textarea  type="text" name="fullDeckr"class="form-control" style="height: 15vh;">
						<?php echo $prod['fullDeckr']; ?>
					</textarea>
				</div>

				<div class="form-group" style="width: 40vw; margin-top: 1vh;">
					<label class="message_word">Price</label>
					<input type="text" name="price"class="form-control" value="<?php echo $prod['price']; ?>">
				</div>

				<div class="form-group" style="width: 40vw; margin-top: 1vh;">
					<label class="message_word">Category</label>
					<input type="text" name="category"class="form-control" value="<?php echo $prod['category']; ?>">
				</div>

				<div class="form_button_position" style="margin-top: 2vh;">
					<button type="submit" class="btn btn-success">Edit product</button>
				</div>

			</form>
		</div>

	<?php endforeach ?>
</div>