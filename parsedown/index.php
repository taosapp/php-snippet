<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-touch-fullscreen" content="no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="Description" content="">
<meta name='Keywords' content="">
<title>Parsedown demo</title>
<link rel="stylesheet" href="assets/style.css" />
</head>
<body>

<?php
include('Parsedown.php');

$dir = './data';
$scanned_directory = array_diff(scandir($dir), array('..', '.', 'ReadMe.md'));
$md_name = isset($_GET['atitle'])?$_GET['atitle']:"ReadMe.md";
$html = file_get_contents('./data/'.$md_name);

echo "<div class='sidebar'>";
foreach ($scanned_directory as $filename) {
    echo '<a href=./index.php?atitle='.str_ireplace(".md", "", $filename).'.md>'.str_ireplace(".md", "", $filename).'</a>';
}
echo "</div>";

echo "<div class='main'>";
echo Parsedown::instance()->text($html);
echo "</div>";
?>

</body>
</html>