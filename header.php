<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru" data-bs-theme="dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>песочница</title>
  <link rel="shortcut icon" href="icons8-pink-cute-folder-96.png" type="image/png">
  <link<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<div class="header">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <img src="https://img.icons8.com/?size=100&id=ZF21qafI2GAR&format=png&color=000000" alt="Work to fair" width="30" height="30">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index.php">Work to fair</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/chat.php">Чаты</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Для исполнителя
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href='/TestWEB.php'>Тесты на сайте</a></li>
              <li><a class="dropdown-item" href="">Форум Заказов</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Правила сайта</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Для Заказчика
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/TestWEB.php">Тесты на сайте</a></li>
              <li><a class="dropdown-item" href="/home/add_zadania.php">Размемтить задпние</a></li>
              <li><a class="dropdown-item" href="/all_users.php">Исполнители</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Правила сайта</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <?php if (isset($_SESSION['status_entry'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://img.icons8.com/?size=100&id=85050&format=png&color=000000" alt="Work to fair" width="30" height="30"><?= $_SESSION['user_data']['login_data']; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/home/homePage.php">Мой аккаунт</a></li>
              <li><a class="dropdown-item" href="/home/settings.php">Настройки</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="/home/logout.php">Выход</a></li>
            </ul>
          </li>
        <?php else: ?>
          <a class="nav-link" href="/door.php">Войти</a>
        <?php endif; ?>
        </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="На всем сайте" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Поиск</button>
        </form>
      </div>
    </div>
  </nav>
</div>
<br>
<br>
<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<style>
  .header {
    position: fixed;
    top: 0;
    width: 100%;
    /* Шапка займёт всю ширину окна браузера */
    z-index: 1000;
    /* Высокое значение, чтобы шапка была всегда на первом плане */
  }
</style>