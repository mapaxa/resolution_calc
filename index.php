<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8" />
	<title>Передача значений переменных</title>
</head>
<?php //вешаем событие ?>
<body onload="document.forms['member_signup'].submit()">
<?php
if (!isset($_POST['browserWidth']) && !isset($_POST['browserHeight']))
{
    echo "<script type='text/javascript'>";
    echo "var innerWidth = window.innerWidth;";
    echo "var innerHeight = window.innerHeight;";
    echo "document.write('<form name=\'member_signup\' method=\'POST\'>');";
    echo "document.write('<p>Ваше имя:<br />');";
    echo "document.write('<input type=\'hidden\' name=\'browserWidth\' value = \'' + innerWidth + '\'</p>');";
    echo "document.write('<input type=\'hidden\' name=\'browserHeight\' value = \'' + innerHeight + '\'</p>');";
    echo "document.write('<input type=\'submit\' />');";
    echo "document.write('</form>');";
    echo "</script>";
}
else { 
  $time = date('d-m-Y H:i:s');
  $ip = $_SERVER['REMOTE_ADDR'];

  $content = $time . '   ' . $_POST['browserWidth'] . ' х ' . $_POST['browserHeight'] . ' : ' . $ip;
  $path = __DIR__.'/sendfile/';
  $filename = 'userinfo.txt';
echo $path.$filename;
  if(!file_exists($path.$filename)){
    $f = fopen($path.$filename, 'w');
    fwrite($f, $content . PHP_EOL);    
  }
  else {
    $f = fopen($path.$filename, 'a');
    fwrite($f, $content . PHP_EOL);
  }
  fclose($f);

}
?>

</body>
</html>