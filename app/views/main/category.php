<div style="margin-top: 5vh;"></div>
<div class="goods" style="max-width: 90vw; margin-left: -10vw;">
	<?php foreach ($cats as $prod): ?>

		<div class="card" style="width: 14rem;  border-width: 12px; border-color: white; background-color: #eaf2b1;">
			<img src="../public/catimg/<?php echo $prod['catimg']; ?>" class="card-img-top" style="height: 100px;">
			<div class="card-body">
				<h6 class="card-title"><?php echo $prod['cat']; ?></h6>
				<p class="card-text" style="font-size: 12px;"><?php echo $prod['catdesc']; ?></p>

				<form action="../cat/product" method="post" style="margin-left: 3.5vw;">
					<button type="submit" class="btn btn-primary btn-sm" name="cat" value="<?php echo $prod['cat']; ?>">Check</button>
				</form>
								
			</div>
		</div>

	<?php endforeach ?>
</div>
