<div class="my_tittle" style="margin-left: 15vw;">
	<h5>Here you can change your personal data</h5>
</div>

<?php foreach ($data as $el): ?>

<div class="my_form">
		<form action="" method="post" id="ajax">

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Name</label>
				<input type="text" name="username"class="form-control" value="<?php echo $el['username']; ?>">
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Email</label>
				<input type="text" name="email"class="form-control" value="<?php echo $el['email']; ?>">
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Login</label>
				<input type="text" name="login"class="form-control" value="<?php echo $el['login']; ?>">
			</div>

			<div class="form-group" style="width: 40vw; margin-top: 1vh;">
				<label class="message_word">Password</label>
				<input type="password" name="password"class="form-control" value="<?php echo $el['password']; ?>">
			</div>

			<div style="margin-top: 2vh;">
				<button type="submit" class="btn btn-success">Change</button>
			</div>
			
		</form>
</div>

<?php endforeach ?>