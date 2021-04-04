<br />
<script type="text/javascript" src ="/backoffice/modules/sejours/methods/themes/actions.js"></script>
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];

if($_action == "post_ajouter"){

	$sql_sejour = mysql_query("INSERT INTO sejours_themes (
		theme_nom
	) VALUES (
		'".mysql_real_escape_string($_POST['theme_nom'])."'
	)");
	?><script type="text/javascript">alerte_message('Thème ajouté avec succès'); </script><?php
}

if($_action == "post_modifier"){
	$sql_sejour = mysql_query("UPDATE sejours_themes SET
		theme_nom='".mysql_real_escape_string($_POST['theme_nom'])."'
	WHERE theme_id='".$_POST['theme_id']."'");
	?><script type="text/javascript">alerte_message('Thème modifié avec succès'); </script><?php
}

if($_action == "post_supprimer"){
	$sql_sejour = mysql_query("DELETE FROM sejours_themes WHERE theme_id='".$_POST['theme_id']."'");
	?><script type="text/javascript">alerte_message('Thème supprimé avec succès'); </script><?php
}

switch($_action){
	default:
	case 'listing':
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td colspan="5"><h1>Listing des thèmes</h1></td>
			</tr>
			<?php
			$row=2;
			$sql_themes = mysql_query("SELECT * FROM sejours_themes ORDER BY theme_nom ASC");
			while($res_themes = mysql_fetch_array($sql_themes)){
				$row = ($row==2) ? 1 : 2;
				?>
				<tr>
					<td class="row_<?php echo $row; ?>"><?php echo stripslashes($res_themes['theme_nom']); ?></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=themes&amp;action=modifier&amp;id=<?php echo $res_themes['theme_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=themes&amp;action=supprimer&amp;id=<?php echo $res_themes['theme_id']; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
				</tr>
				<?php
			}
			?>

		</table>
			
		<?php
	break;


	case 'ajouter':
	case 'modifier':
		$sql_sejours = mysql_query("SELECT * FROM sejours_themes WHERE theme_id='".$_GET['id']."'");
		$res_sejours = mysql_fetch_array($sql_sejours);
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1><?php echo ucfirst($_action); ?> un thème</h1></td>
			</tr>
			<tr>
				<td>
				<form id="sejour_form" action="sejours.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="themes" />
				<input type="hidden" name="action"  id="action" value="post_<?php echo $_action; ?>" />
				<input type="hidden" name="theme_id" id="theme_id" value="<?php echo $_GET['id']; ?>" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th class="barre_titre">Thème</th>
					</tr>
					<tr>
						<td><input type="text" name="theme_nom" value="<?php echo stripslashes($res_sejours['theme_nom']); ?>" size="45" /></td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_theme" value="Enregistrer" class="bt_valider" />
						</td>
					</tr>
				</table>
				</form>
				</td>
			</tr>
		</table>
		<?php
	break;

	case 'supprimer' :
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Supprimer un Thème</h1></td>
			</tr>
			<tr>
				<td>
					<form action="sejours.php" method="post">
					<input type="hidden" name="method" value="themes" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="theme_id" value="<?php echo $_GET['id']; ?>" />
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td><strong>Attention</strong> : Toute suppression est définitive.</td>
						</tr>
						<tr>
							<td><strong>Cliquez sur "valider" pour confirmer la suppression.</td>
						</tr>
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" value="Valider" class="bt_valider" />
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