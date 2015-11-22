<?php
    //check what language was selected, English by default
    $language = 'en';
    if(isset($_GET['lang'])){ $language = $_GET['lang'];}
    include_once('languages/'. $language . '.php');
?>

<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Test task</title>
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">
        <link rel="stylesheet" type="text/css" href="assets/css/t-mainStyle.css">
        <link rel="stylesheet" type="text/css" href="assets/css/t-profileStyle.css">
    </head>
    <body>
    <header>
        <nav class="container navbar navbar-default">
          <div class="container-fluid">
              <div class="navbar-header">
                  <a class="navbar-brand" href="#"><?= TEST_REG ?></a>
              </div>
              <div class="pull-right" id="t-nav-lang">
                  <!--  go to current page, exept GET parametres from url-->
                  <a href="<?=strtok($_SERVER['REQUEST_URI'], '?').'?lang=en'?>">En</a>|<a href="<?=strtok($_SERVER['REQUEST_URI'], '?').'?lang=ru'?>">Ru</a>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                      <li class="active"><a href="<?=strtok('t-main.php', '?').'?lang='.$language?>"><?= HOME ?></a></li>
                  </ul>
              </div>
          </div>
        </nav>
    </header>

