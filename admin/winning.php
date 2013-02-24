<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="Berries">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>FOTW Voter - Admin Panel</title>
<meta name="viewport" content="width=device-width, user-scalable=yes">
<meta http-equiv="Content-Language" content="en">
<link rel="stylesheet" type="text/css" href="/assets/default_themes.css" media="all">
</head>
<body onload="setup();" class="notranslate">
<form name="frmS" method="post" action="/vote.php" id="frmS">
<div>
</div>
<!--content area-->
<div id="PageContentDiv">
<h1 class="sTitle">
<div>FOTW Voter - Admin Panel</div>
<div class="sExit">
<a class="ExitBtn" target="_self" href="http://reddit.com/r/gamecollecting">Exit this voter</a>
</div>&nbsp;<br class="clear">
</h1>
<div class="pTitle">
<h2>
</h2>&nbsp;<br class="clear">
</div>
<div class="pgHdr">
<div id="q1" class="question" style="margin:0 0 0 0;width:auto">
<div class="qContent">
<h3 class="qHeader">
<abbr class="noborder" title="Question 1"></abbr>Current Voting Results:</h3><br>
<div class="qBody">
<pre>
Legend: # of Votes - Title


<?php
error_reporting(0);

//SQL Configuration
$dbhost = "localhost";
$dbuser = "USERNAME";
$dbpass = "PASSWORD";
$dbname = "DATABASE NAME";
$link = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());
mysql_select_db($dbname, $link) or die(mysql_error());

$sql = mysql_query("SELECT `id` FROM `surveys` WHERE current='1';");
$surveyid = mysql_fetch_row($sql);
$surveyid = $surveyid[0];

$sql = mysql_query("SELECT * FROM `options` WHERE surveyno='$surveyid';");
$i = 0;
$a = array();
while($i=mysql_fetch_row($sql)) {
	array_push($a,$i[0].'|'.$i[2]);
}

$b = array();
foreach($a as $id) {
	$vars = explode('|',$id);
	$id = $vars[0];
	$title = $vars[1];
	$sql = mysql_query("SELECT `id` FROM `votes` WHERE `option`='$id';");
	array_push($b,mysql_num_rows($sql).' - '.$title);
}

print_r($b);
?>
</pre>
<br><br><br>
<a href="index.php">Back To Admin Panel Home</a>
</div>
</div>
</div>
</div>
</div>
<!--end content area-->
<div id="panButtonBar">

<div style="text-align:center;">

</div>


</div>


<div class="pbf">
    Script by: <a href="http://reddit.com/user/interwhos">interwhos</a>
</div>
<div>

</div>
</form>

<script type="text/javascript">
/* <![CDATA[ */
function nes(e){e=(e)?e:event;var c=(e.which)?e.which:e.keyCode;return(c!=13);}var is=document.getElementsByTagName("input");for(var i=0;i<is.length;i++){var _i=is[i];if(_i.type=="text")_i.onkeypress=function(e){ return nes(e); };}
/* ]]> */
</script>
</body>
</html>