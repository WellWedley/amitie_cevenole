<?php
include('includes/config.php');
include('includes/fonctions.php');
include('includes/init.php');
$user_login = (isset($_POST['user_login']))?$_POST['user_login']:'';
$user_pwd = (isset($_POST['user_pwd']))?$_POST['user_pwd']:'';
$login_error = false;
if(($user_login != "") AND ($user_pwd != "")){
	$sql = mysql_query("SELECT * FROM admin_users WHERE admin_login='".$user_login."' AND admin_pwd='".md5($user_pwd)."'");
	if($res = mysql_fetch_array($sql)){
		$_SESSION['user_registered'] = $res['admin_id'];
		header("Location: index.php");


	}else{
		$login_error = true;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Amitié Cevenole Admin | Identification</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<link href="/templates/backoffice/backoffice.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="950" height="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="backoffice">
	<tr>
		<td height="100"><?php include('includes/bandeau.php'); ?></td>
	</tr>
	<tr>
		<td height="50" align="right">&nbsp;</td>
	</tr>
	<tr>
		<td height="95%" valign="top" align="right">
			<table width="650" border="0" cellpadding="10" cellspacing="0">
				<tr>
					<td align="left"><h1>Identification</h1></td>
				</tr>
				<tr>
					<td align="left" valign="top">
					<form name="admin_login" action="login.php" method="post">
					<?php
					if($login_error){
						?><p class="warning_notok">Identifiant ou mot de passe incorrect</p><?php
					}
					?>
					<table border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td width="100">Identifiant : </td>
							<td align="right"><input type="text" name="user_login" id="user_login" /></td>
						</tr>
						<tr>
							<td width="100">Mot de passe : </td>
							<td align="right"><input type="password" name="user_pwd" id="user_pwd" /></td>
						</tr>
						<tr>
							<td colspan="2" align="right"><input type="submit" value="s'identifier" /></td>
						</tr>
					</table>
					</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
