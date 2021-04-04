<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];

if($_action == "post_modifier"){
	$sql_sejour = mysql_query("UPDATE sejours_catalogue SET
		lien_catalogue='".mysql_real_escape_string($_POST['lien_catalogue'])."',
		issuu_catalogue='".mysql_real_escape_string($_POST['issuu_catalogue'])."',
		titre_issuu_catalogue='".mysql_real_escape_string($_POST['titre_issuu_catalogue'])."',
		titre_catalogue='".mysql_real_escape_string($_POST['titre_catalogue'])."'
	");
	if(($_FILES['couverture_catalogue']['tmp_name']!='')){
		if($ftp = ftp_connect($Config['FTP_HOSTNAME'])){
			if($log = ftp_login($ftp,$Config['FTP_USERNAME'],$Config['FTP_PASSWORD'])){
				unlink($Config['ROOT_PATH']."templates/catalogue.png");
				move_uploaded_file($_FILES['couverture_catalogue']["tmp_name"],$Config['ROOT_PATH']."templates/catalogue.png");
				$sql_upd = mysql_query("UPDATE sejours_catalogue SET couverture_catalogue='templates/catalogue.png'");
			}
			ftp_quit($ftp);
			clearstatcache();
		}
	}
	
	
	
	?><script type="text/javascript">alerte_message('Catalogue modifié avec succès'); </script><?php
}

switch($_action){
	default:
	case 'ajouter':
	case 'modifier':
		$sql_sejours = mysql_query("SELECT * FROM sejours_catalogue");
		$res_sejours = mysql_fetch_array($sql_sejours);
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Mise à jour du catalogue</h1></td>
			</tr>
			<tr>
				<td>
				<form id="sejour_form" action="sejours.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="catalogue" />
				<input type="hidden" name="action"  id="action" value="post_modifier" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<th class="barre_titre">Titre pour télécharger le catalogue</th>
					</tr>
					<tr>
						<td><input type="text" name="titre_catalogue" value="<?php echo stripslashes($res_sejours['titre_catalogue']); ?>" size="60" /></td>
					</tr>
					<tr>
						<th class="barre_titre">Lien pour télécharger le catalogue</th>
					</tr>
					<tr>
						<td><input type="text" name="lien_catalogue" value="<?php echo stripslashes($res_sejours['lien_catalogue']); ?>" size="60" /></td>
					</tr>
					<tr>
						<th class="barre_titre">Titre pour consulter le catalogue en ligne</th>
					</tr>
					<tr>
						<td><input type="text" name="titre_issuu_catalogue" value="<?php echo stripslashes($res_sejours['titre_issuu_catalogue']); ?>" size="60" /></td>
					</tr>
					<tr>
						<th class="barre_titre">Lien ISSUU pour consulter le catalogue en ligne</th>
					</tr>
					<tr>
						<td><input type="text" name="issuu_catalogue" value="<?php echo stripslashes($res_sejours['issuu_catalogue']); ?>" size="60" /></td>
					</tr>
					<tr>
						<th class="barre_titre">Image de couverture du catalogue</th>
					</tr>
					<tr>
						<td><input type="file" name="couverture_catalogue" value="" size="60" /></td>
					</tr>
					<?php
					if(file_exists($Config['ROOT_PATH'].'templates/catalogue.png')){
						?>
						<tr>
							<td><img src="/templates/catalogue.png" /></td>
						</tr>
						<?php
					}
					?>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_periode" value="Enregistrer" class="bt_valider" />
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