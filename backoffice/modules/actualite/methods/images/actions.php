<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
switch($_action){
	default:
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Gestion des images aléatoires du bandeau</h1></td>
			</tr>
			<tr>
				<td>
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<td><iframe src="/backoffice/modules/contenu/methods/images/images.php" frameborder="0" width="100%" height="300"></iframe></td>
					</tr>
					<tr>
						<td></td>
					</tr>
				</table>
			</tr>
		</table>
		<?php
	break;

}
?>
