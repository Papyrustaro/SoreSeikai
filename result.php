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

  echo '<h1>『' . $init . '』からはじまる「' . $odai . '」といえば?</h1>';
  echo '<h2>みんなの解答</h2>';

  try{
    $dsn = 'mysql:dbname=soreseikai;host=localhost';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->query('SET NAMES utf8');

    $init = htmlspecialchars($init);
    $odai = htmlspecialchars($odai);
    $answer = htmlspecialchars($answer);

    $sql = "SELECT COUNT(*) FROM answer
            WHERE initial = '$init'
            AND odai = '$odai'
            AND answer = '$answer'
            LIMIT 1";

    //すでに同じ解答があったとき
    if($res = $dbh->query($sql)){
    if($res->fetchColumn() > 0){
      $sql = "UPDATE answer SET count = count + 1
              WHERE initial = '$init'
              AND odai = '$odai'
              AND answer = '$answer'
              LIMIT 1";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
    }else{ //同じ解答がなかったとき
      $sql = "INSERT INTO answer(initial, odai, answer, count)
              VALUES ('$init', '$odai', '$answer', 1)";
      $stmt = $dbh->prepare($sql);
      $stmt->execute();
    }
    }

    //みんなの解答を表示
    $sql = "SELECT * FROM answer WHERE initial = '$init' AND odai = '$odai'";

    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    while(1){
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if($rec == false) break;

      echo $rec['answer'] . ': ' . $rec['count'] . '<br>';
    }

  } catch(PDOException $e){
    echo $e->getMessage();
    exit;
  }

  $dbh = null;
  ?>
</body>
</html>
