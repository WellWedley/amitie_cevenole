<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
switch($_action){
	default:
	case 'post_modifier':
	case 'modifier':
		
		if($_action == 'post_modifier'){
			
			if(($_FILES['arriere_plan']['tmp_name']!='')){
				if($ftp = ftp_connect($Config['FTP_HOSTNAME'])){
					if($log = ftp_login($ftp,$Config['FTP_USERNAME'],$Config['FTP_PASSWORD'])){
						move_uploaded_file($_FILES['arriere_plan']["tmp_name"],$Config['ROOT_PATH']."templates/dynbg.jpg");
						$sql_upd = mysql_query("UPDATE contenu_bg SET arriere_plan='templates/dynbg.jpg'");
					}
					ftp_quit($ftp);
					clearstatcache();
				}
			}
			?><script type="text/javascript">alerte_message('Arrière plan modifié avec succès'); </script><?php
		}
		

		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Modifier l'arriere plan du site</h1></td>
			</tr>
			<tr>
				<td>
				<form id="page_form" action="contenu.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="bg" />
				<input type="hidden" name="action"  id="action" value="post_modifier" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th>Fichier (Format : JPG uniquement, Taille : 2000px * 1600px, Résolution : 72dpi)</th>
					</tr>
					<tr>
						<td><input type="file" name="arriere_plan" id="arriere_plan" size="60" value="" /></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_page" value="Enregistrer" class="bt_valider" />
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
