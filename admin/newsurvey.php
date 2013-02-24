<?php
error_reporting(0);

//SQL Configuration
$dbhost = "localhost";
$dbuser = "USERNAME";
$dbpass = "PASSWORD";
$dbname = "DATABASE NAME";
$link = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $link) or die(mysql_error());

//SQL Query Cleaner
function cleanQuery($string) {
	$string = stripslashes($string);
    $string = mysql_real_escape_string($string);
	$string = str_replace('`','',$string);
	$string = htmlspecialchars($string);
	return $string;
}

mysql_query("TRUNCATE TABLE `options`;");
mysql_query("TRUNCATE TABLE `votes`;");
mysql_query("DELETE FROM `surveys` WHERE `current` = '1';");
mysql_query("INSERT INTO `surveys` (`id`,`current`) VALUES (NULL,'1');");
$sql = mysql_query("SELECT `id` FROM `surveys` WHERE current='1';");
$surveyid = mysql_fetch_row($sql);
$surveyid = $surveyid[0];

$options = $_POST['optionarray'];
$optarray = explode('|', $options);
foreach($optarray as $name) {
	$name = cleanQuery($name);
	mysql_query("INSERT INTO `options` (`id`,`surveyno`,`title`) VALUES (NULL,'$surveyid','$name');");
}
header('Location: /admin/index.php?e=1');
?>