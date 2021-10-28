<div style="margin-top: 10vh;"></div>
<div class="goods" style="margin-left: 20vw; max-width: 90vw;">
	<?php foreach ($product as $prod): ?>
		<div class="card" style="width: 12rem;  border-width: 10px; border-color: #212529; background-color: #eaf2b1;">
			<img src="../public/img/<?php echo $prod['avatar']; ?>" class="card-img-top" style="height: 90px;">
			<div class="card-body">
				<h6 class="card-title"><?php echo $prod['title']; ?></h6>
				<p class="card-text" style="font-size: 12px;"><?php echo $prod['smallDeckr'] . '<br>' . 'Price:' . ' '. $prod['price']. ' '.'грн';?></p>

				<div class="btn-group" style="margin-left: -7px; margin-top: -10px;">
					<form action="../admin/product" method="post">
						<button type="submit" class="btn btn-primary btn-sm" name="id" value="<?php echo $prod['id']; ?>">Check</button>
					</form>
					<form action="../admin/edit" method="post">
						<button type="submit" class="btn btn-success btn-sm" name="id" value="<?php echo $prod['id']; ?>">Edit</button>
					</form>
					<form action="../admin/delete" method="post">
						<button type="submit" class="btn btn-danger btn-sm" name="id" value="<?php echo $prod['id']; ?>">Delete</button>
					</form>
				</div>
				
			</div>
		</div>

	<?php endforeach ?>
</div>