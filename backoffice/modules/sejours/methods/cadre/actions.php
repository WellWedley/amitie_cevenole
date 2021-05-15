<br />
<script type="text/javascript" src ="/backoffice/modules/sejours/methods/periodes/actions.js"></script>
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];

if($_action == "post_modifier"){
	$sql_sejour = mysql_query("UPDATE sejours_saison SET
		saison_courante='".mysql_real_escape_string($_POST['saison_courante'])."'
	");
	?><script type="text/javascript">alerte_message('Titre modifié avec succès'); </script><?php
}

switch($_action){
	default:
	case 'ajouter':
	case 'modifier':
		$sql_sejours = mysql_query("SELECT * FROM sejours_saison");
		$res_sejours = mysql_fetch_array($sql_sejours);
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Titre saison séjours</h1></td>
			</tr>
			<tr>
				<td><p><strong>Modifiez le titre du cadre "Nouveaux Séjour"</strong></p></td>
			</tr>
			<tr>
				<td>
				<form id="sejour_form" action="sejours.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="cadre" />
				<input type="hidden" name="action"  id="action" value="post_modifier" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th class="barre_titre">Titre</th>
					</tr>
					<tr>
						<td><input type="text" name="saison_courante" value="<?php echo stripslashes($res_sejours['saison_courante']); ?>" size="60" /></td>
					</tr>
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