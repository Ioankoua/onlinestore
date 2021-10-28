<div style="margin-left: -15vw; width: 100vw; min-height: 90vh; margin-top: 5vh;">

<div style="min-height: 200px; background-color: #f7f5f5; width: 250px; position: absolute; margin-top: -5vh">
		<h4 style="margin-left: 4.5vw; margin-top: 2vh; color: blue; font-family: italic;">
			My Category
		</h4>
	<?php foreach ($cats as $cat): ?>

		<form action="../account/product/cat" method="post" style="margin-left: 3vw; padding: 2vh;">
			<button type="submit" name="cat" style="background: none!important; border: none; padding: 0!important; color: orange; font-size: 19px;"
			value="<?php echo $cat['cat'] ?>"><?php echo $cat['cat']; ?>
			<input style="height: 1px; width: 1px; opacity: 0" name="id" value="<?php echo $_SESSION['userid'] ?>">
			</button>
		</form>		

	<?php endforeach ?>
</div>

<div class="goods" style="margin-left: 20vw;">
	<?php foreach ($product as $prod): ?>

		<div class="card" style="width: 12rem;  border-width: 10px; border-color: white; background-color: #eaf2b1;">
			<img src="../public/img/<?php echo $prod['avatar']; ?>" class="card-img-top" style="height: 90px;">
			<div class="card-body">
				<h6 class="card-title"><?php echo $prod['title']; ?></h6>
				<p class="card-text" style="font-size: 12px;"><?php echo $prod['smallDeckr'] . '<br>' . 'Price:' . ' '. $prod['price']. ' '.'грн';?></p>

				<div class="btn-group" style="margin-left: -7px; margin-top: -10px;">
				<form action="/" method="get">
					<button type="submit" class="btn btn-primary btn-sm" name="id" value="<?php echo $prod['id']; ?>">Check</button>
				</form>
				<form action="product/edit" method="post">
					<button type="submit" class="btn btn-success btn-sm" name="id" value="<?php echo $prod['id']; ?>">Edit</button>
				</form>
				<form action="product/delete" method="post">
					<button type="submit" class="btn btn-danger btn-sm" name="id" value="<?php echo $prod['id']; ?>">Delete</button>
				</form>
			</div>
				
			</div>
		</div>

	<?php endforeach ?>
</div>

