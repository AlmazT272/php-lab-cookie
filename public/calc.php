<?php
$result = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['num1'], $_POST['num2'], $_POST['operator']) &&
        trim($_POST['num1']) !== '' &&
        trim($_POST['num2']) !== '' &&
        trim($_POST['operator']) !== ''
    ) {
        $num1 = (int) $_POST['num1'];
        $num2 = (int) $_POST['num2'];
        $operator = trim(strip_tags($_POST['operator']));

        // Упражнение 2: switch конструкциясы арқылы амалдарды орындау
        switch ($operator) {
            case '+':
                $res = $num1 + $num2;
                $result = "Результат $num1 + $num2 = $res";
                break;
            case '-':
                $res = $num1 - $num2;
                $result = "Результат $num1 - $num2 = $res";
                break;
            case '*':
                $res = $num1 * $num2;
                $result = "Результат $num1 * $num2 = $res";
                break;
            case '/':
                // Нөлге бөлуді тексеру
                if ($num2 == 0) {
                    $result = "Ошибка: На ноль делить нельзя!";
                } else {
                    $res = $num1 / $num2;
                    $result = "Результат $num1 / $num2 = $res";
                }
                break;
            default:
                // Қате операторды анықтау
                $result = "Ошибка: Неверный оператор '$operator'! Используйте только +, -, * или /.";
        }
    } else {
        $result = "Заполните все поля формы!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Калькулятор</title>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <div id="header">
    <img src="logo.gif" width="187" height="29" alt="Наш логотип" class="logo" />
    <span class="slogan">приходите к нам учиться</span>
  </div>

  <div id="content">
    <h1>Калькулятор школьника</h1>
    <?php
    if ($result) {
        echo "<h3>$result</h3>";
    }
    ?>
    <form action='' method='post'>
      <label>Число 1:</label>
      <br />
      <input name='num1' type='text' />
      <br />
      <label>Оператор: </label>
      <br />
      <input name='operator' type='text' />
      <br />
      <label>Число 2: </label>
      <br />
      <input name='num2' type='text' />
      <br />
      <br />
      <input type='submit' value='Считать'>
    </form>
  </div>
  <div id="nav">
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Домой</a></li>
      <li><a href='about.php'>О нас</a></li>
      <li><a href='contact.php'>Контакты</a></li>
      <li><a href='table.php'>Таблица умножения</a></li>
      <li><a href='calc.php'>Калькулятор</a></li>
    </ul>
  </div>
  <div id="footer">
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 2021
  </div>
</body>

</html>