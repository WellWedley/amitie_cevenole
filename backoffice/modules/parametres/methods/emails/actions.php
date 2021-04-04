<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
switch($_action){
	default:
	case 'post_modifier':
		if($_action == 'post_modifier'){
			$sql_emails = mysql_query("SELECT * FROM emails");
			while($res_emails  = mysql_fetch_array($sql_emails )){
				$sql_upd_emails = mysql_query("UPDATE emails SET email_adresse='".$_POST[$res_emails['email_id']]."' WHERE email_id='".$res_emails['email_id']."'");
			}
			
			?><script type="text/javascript">alerte_message('Modifications enregistrées avec succès'); </script><?php
		}
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Adresses emails du site</h1></td>
			</tr>
			<tr>
				<td>
					<form action="parametres.php" method="post">
					<input type="hidden" name="method" value="emails" />
					<input type="hidden" name="action" value="post_modifier" />
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td>
								<table width="730" border="0" cellpadding="4" cellspacing="0">
									<?php
									$sql_emails = mysql_query("SELECT * FROM emails");
									while($res_emails  = mysql_fetch_array($sql_emails )){
										?>
										<tr>
											<th width="200"><?php echo stripslashes($res_emails['email_nom']); ?></th>
											<td><input type="text" name="<?php echo $res_emails['email_id']; ?>" size="45" value="<?php echo stripslashes($res_emails['email_adresse']); ?>" /></td>
										</tr>
										<?php
									}
									?>
								</table>
							</td>
						</tr>
						<tr>
							<td></td>
						</tr>
						<tr>
							<td align="right">
								<input type="submit" value="Enregistrer les modifications" class="bt_valider" />
							</td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>
		<?php
	break;

}
?>