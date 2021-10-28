<div class="my_tittle" style="margin-left: 25vw;">
	<h5>Here you can add your product</h5>
</div>

<div style="margin-left: 15vw;">
		<form action="" method="post" enctype="multipart/form-data" id="ajax">

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Product Name</label>
				<input type="text" name="title"class="form-control" placeholder="Product Name">
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Small description</label>
				<input type="text" name="smallDeckr"class="form-control" placeholder="Short product description no more than 30 characters">
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Full description</label>
				<textarea  type="text" name="fullDeckr"class="form-control" style="height: 15vh;">
				</textarea>
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Price</label>
				<input type="text" name="price"class="form-control" placeholder="Price of your product">
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Category</label>
				<select class="form-control" name="category">
					<?php foreach ($cats as $prod): ?>
						<option value="<?php echo $prod['cat']; ?>"><?php echo $prod['cat']; ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label>Image</label>
				<input class="form-control" type="file" name="img">
			</div>

			<div class="form_button_position" style="margin-top: 2vh;">
				<button type="submit" class="btn btn-success">Add product</button>
			</div>
			
		</form>
</div>