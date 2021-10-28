<div style="margin-left: -15vw; width: 100vw; min-height: 90vh; margin-top: 5vh;">
<div style="min-height: 200px; background-color: #f7f5f5; width: 250px; position: absolute; margin-top: -10vh;">
		<h4 style="margin-left: 4.5vw; margin-top: 2vh; color: blue; font-family: italic;">
			<a class="nav-link active" aria-current="page" href="/category">Category</a>
		</h4>
	<?php foreach ($cats as $cat): ?>

		<form action="/cat/product" method="post" style="margin-left: 3vw; padding: 2vh;">
			<button type="submit" name="cat" style="background: none!important; border: none; padding: 0!important; color: orange; font-size: 19px;"
			value="<?php echo $cat['cat']; ?>"><?php echo $cat['cat']; ?>
			</button>
		</form>		

	<?php endforeach ?>
</div>


<div style="margin-top: 10vh; margin-left: 20vw;">
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
</div>
