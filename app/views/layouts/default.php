<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="../public/css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="../public/js/jquery-3.3.1.min.js"></script>
	<script src="../public/js/form.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="width: 100vw; height: 10vh;">
		<div class="container-fluid">
			<a class="navbar-brand" href="/" style="margin-left: 10vw;">OStore</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/category">Category</a>
					</li>

					<?php if (isset($_SESSION['auth'])): ?>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/account/myproduct">My product</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/account/add">Add product</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/account/settings">Account</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/account/exit">Exit</a>
					</li>

					<?php else: ?>
						
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/register">Register</a>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="/enter">Enter</a>
					</li>
					<?php endif ?>
					
				</ul>
				<form class="d-flex" action="/search" method="post" style="margin-right: 10vw;">
					<input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="my_content">
		<?php echo $content;?>
	</div>
	

</body>
</html>