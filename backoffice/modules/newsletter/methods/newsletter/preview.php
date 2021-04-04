<?php
session_start();
$_GET['module'] = 'newsletter';
include('../../../../includes/config.php');
include('../../../../includes/fonctions.php');
include('../../../../includes/bdd.php');
include('../../../../modules/newsletter/includes/config.php');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body, html {margin:0;padding:0;}
* {outline:none;font-family:Verdana, Arial, sans-serif;font-size:11px;}

</style>
</head>
<body>
<?php
$sql_newsletter =  mysql_query("SELECT * FROM newsletter WHERE newsletter_id='".$_GET['id']."'");
$res_newsletter = mysql_fetch_array($sql_newsletter);
$sql_auth = mysql_query("SELECT * FROM admin_users WHERE admin_id='".$_SESSION['user_registered']."'");
$res_auth = mysql_fetch_array($sql_auth);


$newsletter_body=stripslashes($res_newsletter['newsletter_body']);
$newsletter_body = preg_replace('/<a(.*)href=\"(.*?)\"(.*)>(.*?)<\/a>/', "<a \\1 href=\"\\2&_fnlid=".$res_newsletter['newsletter_uid']."\" \\3>\\4</a>", $newsletter_body);
$newsletter_body = preg_replace('/\.html&/', ".html?&", $newsletter_body);
$newsletter_body = ereg_replace('/\&', "/?&", $newsletter_body);
?>
<table border="0" width="100%" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td><a href="/" title="Centre de vacances à la mer"><img src="/templates/backoffice/images/bo_logo.gif" alt="Centre de vacances à la mer" border="0"></a><td>
	</tr>
	<tr>
		<td><blockquote><? echo stripslashes($newsletter_body); ?></blockquote><td>
	</tr>
	<?php
	/*
	<tr>
		<td align="center"><em>Message envoyé par <?php echo stripslashes($res_auth['admin_nom']); ?> le <?php echo date_fr(time()); ?></em><td>
	</tr>
	*/
	?>
	<tr>
		<td><td>
	</tr>
</table>
</body>
</html>