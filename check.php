<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>朝からそれ正解</title>
</head>
<body>
  <?php
  $init = $_POST['init'];
  $odai = $_POST['odai'];
  $answer = $_POST['answer'];

  $init = htmlspecialchars($init);
  $odai = htmlspecialchars($odai);
  $answer = htmlspecialchars($answer);

  echo "init = " . $init . "<br>";
  echo "odai = " . $odai . "<br>";
  echo "answer = " . $answer . "<br>";
  if($answer == ''){
    echo "なにも入力してませんよー<br>";
  }

  if($answer == ''){
    echo '<form>';
    echo '<input type="button" onclick="histroy.back()" value="戻る">';
    echo '</form>';
  }else{
    print '<form method="post" action="result.php">';
    print '<input name="init" type="hidden" value="'.$init.'">';
    print '<input name="odai" type="hidden" value="'.$odai.'">';
    print '<input name="answer" type="hidden" value="'.$answer.'">';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';
  }
  ?>
</body>
</html>
