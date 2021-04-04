<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
switch($_action){
	default:
	case 'post_modifier':
		if($_action == 'post_modifier'){
			$sql_config = mysql_query("SELECT * FROM configuration");
			while($res_config  = mysql_fetch_array($sql_config )){
				$sql_upd_config = mysql_query("UPDATE configuration SET configuration_value='".$_POST[$res_config['configuration_key']]."' WHERE configuration_key='".$res_config['configuration_key']."'");
			}
			
			?><script type="text/javascript">alerte_message('Modifications enregistrées avec succès'); </script><?php
		}
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Configuration générale</h1></td>
			</tr>
			<tr>
				<td>
					<form action="parametres.php" method="post">
					<input type="hidden" name="method" value="configuration" />
					<input type="hidden" name="action" value="post_modifier" />
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td>
								<table width="730" border="0" cellpadding="4" cellspacing="0">
									<?php
									$sql_config = mysql_query("SELECT * FROM configuration");
									while($res_config  = mysql_fetch_array($sql_config )){
										?>
										<tr>
											<th><?php echo stripslashes($res_config['configuration_info']); ?></th>
										</tr>
										<tr>
											
											<td><input type="text" name="<?php echo $res_config['configuration_key']; ?>" size="45" value="<?php echo stripslashes($res_config['configuration_value']); ?>" /></td>
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