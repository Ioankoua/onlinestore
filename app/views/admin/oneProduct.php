<div style="margin-top: 20vh; margin-left: 20vw;">
<?php foreach ($product as $prod): ?>

	<div class="card mb-3" style="max-width: 65vw; background-color: #eaf2b1;">
		<div class="row g-0">
			<div class="col-md-4">
				<img src="../public/img/<?php echo $prod['avatar']; ?>" class="card-img-top" style="min-height: 30vh;">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 style="text-align: center;" class="card-title"><?php echo $prod['title']?></h5>
					<p class="card-text"><?php echo $prod['smallDeckr']?></p>
					<p class="card-text"><?php echo $prod['fullDeckr']?></p>
					<p class="card-text"><?php echo 'Price: '.' '. $prod['price'] . ' '.'грн'?></p>
					<p class="card-text"><?php echo 'This category:'.' '.$prod['cat']?></p>
				</div>
			</div>
		</div>
	</div>

<?php endforeach ?>