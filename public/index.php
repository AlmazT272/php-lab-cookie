<?php
include 'inc/cookie.inc.php';

// Имя файла журнала
define('PATH_LOG', 'path.log');
include 'inc/log.inc.php';

// Мәзір пункттері сақталған массив
$leftMenu = [
    ['link' => 'Домой', 'href' => 'index.php'],
    ['link' => 'О нас', 'href' => 'about.php'],
    ['link' => 'Контакты', 'href' => 'contact.php'],
    ['link' => 'Таблица умножения', 'href' => 'table.php'],
    ['link' => 'Калькулятор', 'href' => 'calc.php'],
    ['link' => 'Журнал посещений', 'href' => 'index.php?id=log']
];

// Мәзірді салатын функция
function drawMenu($menu, $vertical = true) {
    $style = '';
    if (!$vertical) {
        $style = " style='display:inline; margin-right:15px;'";
    }
    echo "<ul>";
    foreach ($menu as $item) {
        echo "<li$style>";
        echo "<a href='{$item['href']}'>{$item['link']}</a>";
        echo "</li>";
    }
    echo "</ul>";
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Сайт нашей школы</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <div id="header">
    <!-- Верхняя часть страницы -->
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">приходите к нам учиться</span>
    <!-- Верхняя часть страницы -->
  </div>

  <div id="content">
    <!-- Заголовок -->
    <h1>Добро пожаловать на наш сайт!</h1>
    <!-- Заголовок -->
    <blockquote>
      <?php
      if ($visitCounter == 1) {
          echo "Спасибо, что зашли на огонек";
      } else {
          echo "Вы зашли к нам $visitCounter раз<br>";
          echo "Последнее посещение: $lastVisit";
      }
      ?>
    </blockquote>
    <!-- Область основного контента -->
    <?php
    if (isset($_GET['id']) && $_GET['id'] === 'log') {
        include 'inc/view-log.inc.php';
    } else {
    ?>
    <h3>Зачем мы ходим в школу?</h3>
    <p>У каждого человека есть своя точка зрения на то, зачем ему учиться. Некоторые понимают, что в жизни без знаний никуда, а некоторые ходят просто ради общения с друзьями или ради новых впечатлений.</p>
    <h3>Что такое школа?</h3>
    <p>Школа — это учебное заведение для получения общего образования. В широком смысле слово может применяться к названию любого образовательного учреждения.</p>
    <h3>Сколько учиться?</h3>
    <p>Продолжительность обучения зависит от выбранной программы, но базовые знания закладываются с самых первых классов и сопровождают нас всю жизнь.</p>
    <?php
    }
    ?>
    <!-- Область основного контента -->
  </div>
  <div id="nav">
    <h2>Навигация по сайту</h2>
    <!-- Меню -->
    <?php
    drawMenu($leftMenu);
    ?>
    <!-- Меню -->
  </div>
  <div id="footer">
    <!-- Нижняя часть страницы -->
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 2021
    <!-- Нижняя часть страницы -->
  </div>
</body>

</html>