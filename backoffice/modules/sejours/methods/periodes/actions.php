<br />
<script type="text/javascript" src ="/backoffice/modules/sejours/methods/periodes/actions.js"></script>
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];

if($_action == "post_ajouter"){

	$sql_ordre = mysql_query("SELECT MAX(periode_ordre) as dernier FROM sejours_periodes");
	$res_ordre = mysql_fetch_array($sql_ordre);
	$ordre = $res_ordre['dernier']+1;
	$sql_sejour = mysql_query("INSERT INTO sejours_periodes (
		periode_nom,
		periode_ordre
	) VALUES (
		'".mysql_real_escape_string($_POST['periode_nom'])."',
		'".$ordre."'
	)");
	?><script type="text/javascript">alerte_message('Période ajoutée avec succès'); </script><?php
}

if($_action == "post_modifier"){
	$sql_sejour = mysql_query("UPDATE sejours_periodes SET
		periode_nom='".mysql_real_escape_string($_POST['periode_nom'])."'
	WHERE periode_id='".$_POST['periode_id']."'");
	?><script type="text/javascript">alerte_message('Période modifiée avec succès'); </script><?php
}

if($_action == "post_supprimer"){
	$sql_sejour = mysql_query("SELECT * FROM sejours WHERE sejour_periode='".$_POST['periode_id']."'");
	while($res_sejour = mysql_fetch_array($sql_sejour)){
		$sql_del = mysql_query("DELETE FROM sejours_dates WHERE sejour_id='".$res_sejour['sejour_id']."'");
		$sql_del = mysql_query("DELETE FROM sejours_messages WHERE message_sejour='".$res_sejour['sejour_id']."'");
		$sql_del = mysql_query("DELETE FROM sejours WHERE sejour_id='".$res_sejour['sejour_id']."'");
	}
	$sql_sejour = mysql_query("DELETE FROM sejours_periodes WHERE periode_id='".$_POST['periode_id']."'");
	?><script type="text/javascript">alerte_message('Période supprimée avec succès'); </script><?php
}

if($_action == "move_up"){
	$sql_banniere = mysql_query("SELECT * FROM sejours_periodes WHERE periode_id='".$_GET['id']."'");
	$res_banniere = mysql_fetch_array($sql_banniere);
	$current_pos = $res_banniere['periode_ordre'];
	if(($current_pos-1)>0){

		$prev_pos = (($current_pos-1)>0) ? ($current_pos-1) : 1;

		$sql_banniere = mysql_query("SELECT * FROM sejours_periodes WHERE periode_ordre='".$prev_pos."'");
		$res_banniere = mysql_fetch_array($sql_banniere);
		$banniere_to_move = $res_banniere['periode_id'];
		$sql_banniere = mysql_query("UPDATE sejours_periodes SET periode_ordre='".$prev_pos."' WHERE periode_id='".$_GET['id']."'");
		$sql_banniere = mysql_query("UPDATE sejours_periodes SET periode_ordre='".$current_pos."' WHERE periode_id='".$banniere_to_move."'");
	}
	$order=1;
	$sql_banniere = mysql_query("SELECT * FROM sejours_periodes ORDER BY periode_ordre ASC");
	while($res_banniere = mysql_fetch_array($sql_banniere)){
		$sql_order = mysql_query("UPDATE sejours_periodes SET periode_ordre='".$order."' WHERE periode_id='".$res_banniere['periode_id']."'");
		$order++;
	}

}
if($_action == "move_down"){
	$sql_banniere = mysql_query("SELECT * FROM sejours_periodes");
	$nb_banniere = mysql_num_rows($sql_banniere);

	$sql_banniere = mysql_query("SELECT * FROM sejours_periodes WHERE periode_id='".$_GET['id']."'");
	$res_banniere = mysql_fetch_array($sql_banniere);
	$current_pos = $res_banniere['periode_ordre'];
	if(($current_pos+1)<=$nb_banniere){
		$next_pos = (($current_pos+1)<=$nb_banniere) ? ($current_pos+1) : $nb_banniere;

		$sql_banniere = mysql_query("SELECT * FROM sejours_periodes WHERE periode_ordre='".$next_pos."'");
		$res_banniere = mysql_fetch_array($sql_banniere);
		$banniere_to_move = $res_banniere['periode_id'];

		$sql_banniere = mysql_query("UPDATE sejours_periodes SET periode_ordre='".$next_pos."' WHERE periode_id='".$_GET['id']."'");
		$sql_banniere = mysql_query("UPDATE sejours_periodes SET periode_ordre='".$current_pos."' WHERE periode_id='".$banniere_to_move."'");
	}
	$order=1;
	$sql_banniere = mysql_query("SELECT * FROM sejours_periodes ORDER BY periode_ordre ASC");
	while($res_banniere = @mysql_fetch_array($sql_banniere)){
		$sql_order = mysql_query("UPDATE sejours_periodes SET periode_ordre='".$order."' WHERE periode_id='".$res_banniere['periode_id']."'");
		$order++;
	}

}
switch($_action){
	default:
	case 'listing':
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td colspan="5"><h1>Listing des périodes</h1></td>
			</tr>
			<?php
			$row=2;
			$sql_periodes = mysql_query("SELECT * FROM sejours_periodes ORDER BY periode_ordre ASC");
			while($res_periodes = mysql_fetch_array($sql_periodes)){
				$row = ($row==2) ? 1 : 2;
				?>
				<tr>
					<td class="row_<?php echo $row; ?>"><?php echo stripslashes($res_periodes['periode_nom']); ?></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=periodes&amp;action=move_up&amp;id=<?php echo $res_periodes['periode_id']; ?>"><img src="/templates/backoffice/images/move_up.png" border="0" alt="modifier" /></a></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=periodes&amp;action=move_down&amp;id=<?php echo $res_periodes['periode_id']; ?>"><img src="/templates/backoffice/images/move_down.png" border="0" alt="modifier" /></a></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=periodes&amp;action=modifier&amp;id=<?php echo $res_periodes['periode_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=periodes&amp;action=supprimer&amp;id=<?php echo $res_periodes['periode_id']; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
				</tr>
				<?php
			}
			?>

		</table>
			
		<?php
	break;


	case 'ajouter':
	case 'modifier':
		$sql_sejours = mysql_query("SELECT * FROM sejours_periodes WHERE periode_id='".$_GET['id']."'");
		$res_sejours = mysql_fetch_array($sql_sejours);
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1><?php echo ucfirst($_action); ?> une période</h1></td>
			</tr>
			<tr>
				<td>
				<form id="sejour_form" action="sejours.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="periodes" />
				<input type="hidden" name="action"  id="action" value="post_<?php echo ($_action); ?>" />
				<input type="hidden" name="periode_id" id="periode_id" value="<?php echo $_GET['id']; ?>" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th class="barre_titre">Période</th>
					</tr>
					<tr>
						<td><input type="text" name="periode_nom" value="<?php echo stripslashes($res_sejours['periode_nom']); ?>" size="45" /></td>
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

	case 'supprimer' :
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Supprimer une période</h1></td>
			</tr>
			<tr>
				<td>
					<form action="sejours.php" method="post">
					<input type="hidden" name="method" value="periodes" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="periode_id" value="<?php echo $_GET['id']; ?>" />
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td><strong>Attention</strong> : Toute suppression est définitive.</td>
						</tr>
						<tr>
							<td><strong>Tous les séjours et carnets de bords liés à cette période seront supprimés.</strong></td>
						</tr>
						<tr>
							<td>Cliquez sur "valider" pour confirmer la suppression.</td>
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