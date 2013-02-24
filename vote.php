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

$voteid = cleanQuery($_POST['voteoption']);
$ip = cleanQuery($_SERVER['REMOTE_ADDR']);

if(strlen($voteid) == '0') {
	header("Location: /?e=1");
	exit();
}

$sql = mysql_query("SELECT * FROM `votes` WHERE `ip`='$ip';");

if(mysql_num_rows($sql) == '0') {
	$unique = 'true';
} else {
	header("Location: /static/error.html");
	exit();
}
mysql_query("INSERT INTO `votes` (`id`,`option`,`date`,`ip`) VALUES (NULL,'$voteid', NOW(),'$ip');");
$sql = mysql_query("SELECT `id` FROM `surveys` WHERE `current`='1';");
$surveyid = mysql_fetch_row($sql);
$surveyid = $surveyid[0];
setcookie($surveyid, 'x', time()+320000000, "/");
header("Location: /static/success.html");
?>