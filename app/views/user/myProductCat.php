<div style="margin-top: 5vh;"></div>
<div style="min-height: 200px; background-color: #f7f5f5; width: 250px; position: absolute; margin-top: -5vh">
		<h4 style="margin-left: 4.5vw; margin-top: 2vh; color: blue; font-family: italic;">
			My Category
		</h4>
	<?php foreach ($cats as $cat): ?>

		<form action="" method="post" style="margin-left: 3vw; padding: 2vh;">
			<button type="submit" name="cat" style="background: none!important; border: none; padding: 0!important; color: orange; font-size: 19px;"
			value="<?php echo $cat['cat'] ?>"><?php echo $cat['cat']; ?>
			<input style="height: 1px; width: 1px; opacity: 0" name="id" value="<?php echo $_SESSION['userid'] ?>">
			</button>
		</form>		

	<?php endforeach ?>
</div>

	<div style="margin-left: 20vw; max-width: 70vw; display: flex;flex-wrap: wrap; justify-content: left;">
		<?php foreach ($product as $prod): ?>

			<div class="card" style="width: 11rem;  border-width: 10px; border-color: white; background-color: #eaf2b1;">
				<img src="http://onstore/public/img/<?php echo $prod['avatar']; ?>" class="card-img-top" style="height: 90px;">
				<div class="card-body">
					<h6 class="card-title"><?php echo $prod['title']; ?></h6>
					<p class="card-text" style="font-size: 12px;"><?php echo $prod['smallDeckr'] . '<br>' . 'Price:' . ' '. $prod['price']. ' '.'грн';?></p>

					<form action="/" method="get" style="margin-left: 35px; margin-top: -10px;">
						<button type="submit" class="btn btn-primary btn-sm" name="id" value="<?php echo $prod['id']; ?>">Check</button>
					</form>

				</div>
			</div>

		<?php endforeach ?>
	</div>
