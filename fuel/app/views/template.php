<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Book app</title>

    <?php echo Asset::css('bootstrap.min.css'); ?>
    <?php echo Asset::css('style.css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">

    <?php echo Asset::js('jquery.min.js'); ?>
    <?php echo Asset::js('popper.min.js'); ?>
    <?php echo Asset::js('bootstrap.min.js'); ?>
    <?php echo Asset::js('parsley.js'); ?>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.0.2/cleave.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<div class="logo-menu">
    <div class="container d-flex justify-content-between align-items-center">
        <h2 style="color:#2c9676">Book app</h2>
        <div>
            <?php if (Auth::check()) : ?>
                <a href="/logout">Logout</a>
            <?php else : ?>
                <a href="/login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="navigation-bar">
    <div class="container">
        <div class="row">
            <nav class="navbar navbar-expand-sm d-flex justify-content-between">
                <button class="navbar-toggler" type="button">
                    <span class="bar1"></span>
                    <span class="bar2"></span>
                    <span class="bar3"></span>
                </button>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link <?= strpos(Uri::main(), 'book') == true ? 'active' : '' ?>" href="/book">Book</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link <?= strpos(Uri::main(), 'author') == true ? 'active' : '' ?>" href="/author">Author</a>
                        </li>
                    </ul>
                </div>

                <div class="left-bar d-none d-sm-block">
                    <i class="fas fa-user"></i>
                </div>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <?= $formSuccess ?? '' ?>
    <?= $formError ?? '' ?>
    <?= $content ?>
</div>

</body>
</html>