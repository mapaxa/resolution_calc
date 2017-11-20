<!DOCTYPE HTML>
<html>
<head>
	<meta charset = "utf-8" />
	<title>Передача значений переменных</title>
</head>
<?php //вешаем событие ?>
<body 
<?php if (!isset($_POST['browserWidth']) && !isset($_POST['browserHeight'])) 
  { echo 'onload="document.forms[\'member_signup\'].submit();"'; 
} ?> >
<?php
if (!isset($_POST['browserWidth']) && !isset($_POST['browserHeight']))
{
    $form = "<script type='text/javascript'>";
    $form .= "var innerWidth = window.innerWidth;";
    $form .= "var innerHeight = window.innerHeight;";
    $form .= "document.write('<form style=\'visibility: hidden;\' name=\'member_signup\' method=\'POST\'>');";
    $form .= "document.write('<p>Ваше имя:<br />');";
    $form .= "document.write('<input type=\'hidden\' name=\'browserWidth\' value = \'' + innerWidth + '\'</p>');";
    $form .= "document.write('<input type=\'hidden\' name=\'browserHeight\' value = \'' + innerHeight + '\'</p>');";
    $form .= "document.write('<input type=\'submit\' />');";
    $form .= "document.write('</form>');";
    $form .= "</script>";
    echo $form;
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