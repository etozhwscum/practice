<?php /* @var $content_view View */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/style.css">
    <title><?= $title ?></title>
</head>
<body>
<header>
    <nav class="navbar-container">
       
        <a href="/site">Main</a>
        <a href="/site/news">News</a>
        <a href="/site/service">Service</a>
        <a href="/site/portfolio">Portfolio</a>
        <a href="/site/contact">Contacts</a>
        <?php if(isset($_SESSION['user'])): ?>
            <?php if ($_SESSION['user']['role'] == 1): ?>
                <a href="/administration">Admin</a>
            <?php endif; ?>
            <a href="/sign/logout">LogOut</a>
        <?php else: ?>
            <a href="/sign/registration">SignUp</a>
            <a href="/sign/authentication">SignIn</a>
        <?php endif; ?>
    </nav>
</header>

<main>
    <?php include 'views/'.$content_view;?>
</main>

<footer>

</footer>

</body>
</html>