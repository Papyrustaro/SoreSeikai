<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>朝からそれ正解</title>
</head>
<body>
<?php
$init_array = array("あ", "い", "う", "え", "お");
$odai_array = array("かわいいもの", "かっこいいもの", "尊敬するもの", "嫌いなもの", "子どもが好きなもの");

$init = $init_array[random_int(0, 4)];
$odai = $odai_array[random_int(0, 4)];
?>
  <h1>朝からそれ正解</h1>
  <h2><?php echo "「" . $init . "」から始まる『" . $odai . "』といえば?"?></h2>
  <form action="check.php" method="post">
    <input type="hidden" name="init" value="<?php echo $init;?>">
    <input type="hidden" name="odai" value="<?php echo $odai;?>">
    <input type="text" name="answer" value="" size=32>
    <input type="submit" name="submit" value="答える">
  </form>
</body>
</html>
