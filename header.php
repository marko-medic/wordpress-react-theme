<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="main-header">
        <a class="main-header__logo-link" href="<?= get_home_url() ?>">
            Home
        </a>
        <nav class="main-header__nav">
            <button class="main-header__btn">
                <span class="main-header__btn-text">Go to...</span>
                <i class="fa fa-bars main-header__hamburger"></i>
            </button>
        </nav>
    </header>

    <div class="page-container">
        <div class="page-wrapper">