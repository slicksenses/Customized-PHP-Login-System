<?php
session_start();
include_once 'app/autoload.php';
$session = new Session();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Login System</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= $config->asset('css/material.min.css') ?>">
    <link rel="stylesheet" href="<?= $config->asset('css/styles.css') ?>">
    <link href="<?= $config->asset('css/toastr.css') ?>" rel="stylesheet"/>
    <style>
        #view-source {
            position: fixed;
            display: block;
            right: 0;
            bottom: 0;
            margin-right: 40px;
            margin-bottom: 40px;
            z-index: 900;
        }
    </style>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <div class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="<?= $config->asset('images/php-logo.png') ?>">
          </span>
            <div class="android-header-spacer mdl-layout-spacer"></div>
            <div class="android-search-box mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right mdl-textfield--full-width">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="search-field">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" id="search-field">
                </div>
            </div>
            <!-- Navigation -->
            <div class="android-navigation-container">
                <nav class="android-navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase <?= $config->page() == NULL ? 'active' : NULL ?> "
                       href="<?= $config->base_url() ?>">Home</a>
                    <?php
                    if ($session->getSession() == NULL) {
                        ?>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase <?= $config->page() == 'login' ? 'active' : NULL ?> "
                           href="<?= $config->base_url('login') ?>">Login</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase <?= $config->page() == 'register' ? 'active' : NULL ?> "
                           href="<?= $config->base_url('register') ?>">Register</a>
                    <?php } else { ?>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase <?= $config->page() == 'dashboard' ? 'active' : NULL ?> "
                           href="<?= $config->base_url('dashboard') ?>">Dashboard</a>
                        <a class="mdl-navigation__link mdl-typography--text-uppercase "
                           href="<?= $config->base_url('action/logout') ?>">Logout</a>
                    <?php } ?>

                </nav>
            </div>
            <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="<?= $config->asset('images/php-logo.png') ?>">
          </span>
            <?php if (isset($session->auth()['username'])) { ?>
                <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect"
                        id="more-button">
                    <i class="material-icons">more_vert</i>
                </button>
                <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
                    <li class="mdl-menu__item"><?= ucfirst($session->auth()['username']) ?></li>
                    <li class="mdl-menu__item"><a href="<?= $config->base_url('action/logout') ?>">Logout</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
    <?php include_once 'drawer.php'; ?>
    <div class="android-content mdl-layout__content">