  
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>
        <link rel="stylesheet" href="../public/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="../public/js/jquery-3.3.1.min.js"></script>
        <script src="../public/js/form.js"></script>
    </head>
    <body class="fixed-nav sticky-footer bg-dark">
        <?php if ($this->route['action'] != 'login'): ?>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
                <a class="navbar-brand" style="margin-left: 20vw;" href="/admin/products">Admin panel</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/products">
                                <i class="fa fa-fw fa-list"></i>
                                <span class="nav-link-text">All Products</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/category">
                                <i class="fa fa-fw fa-plus"></i>
                                <span class="nav-link-text">All Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/add">
                                <i class="fa fa-fw fa-plus"></i>
                                <span class="nav-link-text">Add Product</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/addcategory">
                                <i class="fa fa-fw fa-plus"></i>
                                <span class="nav-link-text">Add Category</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/logout">
                                <i class="fa fa-fw fa-sign-out"></i>
                                <span class="nav-link-text">Exit</span>
                            </a>
                        </li>
                        <form class="d-flex" action="../admin/search" method="post" style="margin-right: 10vw;">
                            <input class="form-control me-2" type="text" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </ul>
                </div>
            </nav>
        <?php endif; ?>
        <?php echo $content; ?>
        <?php if ($this->route['action'] != 'login'): ?>
        <?php endif; ?>
    </body>
</html>