<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <?php if (isset($content['title']) && !empty($content['title'])): ?>
        <title><?= $content['title'] ?></title>
    <?php endif; ?>
    <?php if (isset($styles) && !empty($styles)): ?>
        <?= $styles ?>
    <?php endif; ?>
</head>
<body class="is-preload">

<!-- Header -->
<header id="header">
    <a class="logo" href="index.html">Industrious</a>
    <nav>
        <a href="#menu">Menu</a>
    </nav>
</header>

<!-- Nav -->
<nav id="menu">
    <ul class="links">
        <li><a href="/">Home</a></li>
        <li><a href="?page=elements">Elements</a></li>
        <li><a href="?page=generic">Generic</a></li>
    </ul>
</nav>