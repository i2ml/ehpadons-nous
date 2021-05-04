<!doctype html>
<head>
	<title>
    <?
    wp_title( '|', true, 'right' );
    ?>
  </title>

  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta http-equiv="Content-Language" content="fr_FR" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">

  <link rel="shortcut icon" href="<?= get_stylesheet_directory_uri() ?>/assets/images/favicon-120x120.png">
  <link rel="apple-touch-icon" href="<?= get_stylesheet_directory_uri() ?>/assets/images/favicon-120x120.png">

  <meta name="google-site-verification" content="1OOkyToxjkcDc2Fxd2K2DsYDkRNx9YDZnDJCrNhLcMc" />

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link href="<?= get_stylesheet_directory_uri() ?>/app.css?noCache=4735a3cf" rel="stylesheet" />

  <script>
		var template_dir = "<?= get_stylesheet_directory_uri() ?>";
  </script>

  <?
  global $post, $parent;
  wp_head();
  ?>

</head>

<body <? body_class() ?>>
	<div class="wrapper">

    <header class="header">
      <div class="inner">
        <a class="header-logo" href="/">
          <img src="<?= get_stylesheet_directory_uri() ?>/assets/images/logo-full-export.png" alt="">
        </a>
        <? wp_nav_menu(['theme_location' => 'primary', 'container' => false, 'menu_class' => 'header-menu']) ?>
        <a href="https://www.facebook.com/EHPADONSNOUS/" target="_blank" class="header-social">
          <? icon('facebook') ?>
          Suivez nous !
        </a>
        <a class="header-mobile" href="#" data-mobilenav="toggle">
          <? icon('menu') ?>
        </a>
      </div>
    </header>

    <? get_view('mobileNav') ?>
