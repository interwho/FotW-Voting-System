<!-- Protect me with an htaccess file! -->
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
<abbr class="noborder" title="Question 1"></abbr><?php if($_GET['e'] == '1') { echo '<h1>Success! Survey Created.</h1>'; } ?></h3><br>
<div class="qBody">
<h4>Create A New Survey - Separate All Options With a '|' (pipe) character:</h4>
<form action="newsurvey.php" method="post">
<textarea name="optionarray" cols="100" rows="10"></textarea>
<br><br>
<button type="submit">Submit And Create Survey - WARNING: This Will Delete The Old Survey And ALL Old Votes</button></form>
<br><br><br><br>
<a href="winning.php">Click Here To View The Current Votes >></a>
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

<script type="text/javascript">
/* <![CDATA[ */
function nes(e){e=(e)?e:event;var c=(e.which)?e.which:e.keyCode;return(c!=13);}var is=document.getElementsByTagName("input");for(var i=0;i<is.length;i++){var _i=is[i];if(_i.type=="text")_i.onkeypress=function(e){ return nes(e); };}
/* ]]> */
</script>
</body>
</html>