<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
switch($_action){
	default:
	case 'post_ajouter':
	case 'post_modifier':
	case 'post_supprimer':
	case 'move_up':
	case 'move_down':
	case 'listing':
		if($_action == "move_up"){
			$sql_banniere = mysql_query("SELECT * FROM contenu_categories WHERE categorie_id='".$_GET['id']."'");
			$res_banniere = mysql_fetch_array($sql_banniere);
			$current_pos = $res_banniere['categorie_ordre'];
			if(($current_pos-1)>0){

				$prev_pos = (($current_pos-1)>0) ? ($current_pos-1) : 1;

				$sql_banniere = mysql_query("SELECT * FROM contenu_categories WHERE categorie_ordre='".$prev_pos."'");
				$res_banniere = mysql_fetch_array($sql_banniere);
				$banniere_to_move = $res_banniere['categorie_id'];
				$sql_banniere = mysql_query("UPDATE contenu_categories SET categorie_ordre='".$prev_pos."' WHERE categorie_id='".$_GET['id']."'");
				$sql_banniere = mysql_query("UPDATE contenu_categories SET categorie_ordre='".$current_pos."' WHERE categorie_id='".$banniere_to_move."'");
			}

		}
		if($_action == "move_down"){
			$sql_banniere = mysql_query("SELECT * FROM contenu_categories");
			$nb_banniere = mysql_num_rows($sql_banniere);

			$sql_banniere = mysql_query("SELECT * FROM contenu_categories WHERE categorie_id='".$_GET['id']."'");
			$res_banniere = mysql_fetch_array($sql_banniere);
			$current_pos = $res_banniere['categorie_ordre'];
			if(($current_pos+1)<=$nb_banniere){
				$next_pos = (($current_pos+1)<=$nb_banniere) ? ($current_pos+1) : $nb_banniere;

				$sql_banniere = mysql_query("SELECT * FROM contenu_categories WHERE categorie_ordre='".$next_pos."'");
				$res_banniere = mysql_fetch_array($sql_banniere);
				$banniere_to_move = $res_banniere['categorie_id'];

				$sql_banniere = mysql_query("UPDATE contenu_categories SET categorie_ordre='".$next_pos."' WHERE categorie_id='".$_GET['id']."'");
				$sql_banniere = mysql_query("UPDATE contenu_categories SET categorie_ordre='".$current_pos."' WHERE categorie_id='".$banniere_to_move."'");
			}
			$order=1;
			$sql_banniere = mysql_query("SELECT * FROM contenu_categories ORDER BY categorie_ordre ASC");
			while($res_banniere = @mysql_fetch_array($sql_banniere)){
				$sql_order = mysql_query("UPDATE contenu_categories SET categorie_ordre='".$order."' WHERE categorie_id='".$res_banniere['categorie_id']."'");
				$order++;
			}

		}
	
		if($_action == 'post_ajouter'){
			$sql_order = mysql_query("SELECT MAX(categorie_ordre) as dernier FROM contenu_categories");
			$res_order = mysql_fetch_array($sql_order);
			$ordre = $res_order['dernier']+1;
			
			$sql_ins = mysql_query("INSERT INTO contenu_categories (categorie_nom,categorie_ordre) VALUES ('".mysql_real_escape_string($_POST['categorie_nom'])."','".$ordre."')");
			$page_id = mysql_insert_id();
			?><script type="text/javascript">alerte_message('Rubrique ajoutée avec succès'); </script><?php
		}

		if($_action == 'post_modifier'){
			$sql_upd = mysql_query("UPDATE contenu_categories  SET
				categorie_nom='".mysql_real_escape_string($_POST['categorie_nom'])."'
			WHERE categorie_id='".$_POST['categorie_id']."'");

			?><script type="text/javascript">alerte_message('Rubrique modifiée avec succès'); </script><?php
		}
		
		if($_action == 'post_supprimer'){
			$sql_del = mysql_query("DELETE FROM contenu_categories WHERE categorie_id='".$_POST['categorie_id']."'");
			$sql_del = mysql_query("DELETE FROM contenu_pages WHERE page_categorie='".$_POST['categorie_id']."'");
			
			?><script type="text/javascript">alerte_message('Rubrique supprimée avec succès'); </script><?php
		}
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td colspan="5"><h1>Listing des rubriques</h1></td>
			</tr>
			<tr>
				<td class="barre_titre"><strong>Titre</strong></td>
				<td class="barre_titre" colspan="4">&nbsp;</td>
			</tr>
			<?php
			$row=2;
			$sql_categorie = mysql_query("SELECT * FROM contenu_categories ORDER BY categorie_ordre ASC");
			while($res_categorie = mysql_fetch_array($sql_categorie)){
				$row = ($row==2) ? 1 : 2;
				?>
				<tr>
					<td class="row_<?php echo $row; ?>"><strong><?php echo stripslashes($res_categorie['categorie_nom']); ?></strong></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=rubriques&amp;action=move_up&amp;id=<?php echo $res_categorie['categorie_id']; ?>"><img src="/templates/backoffice/images/move_up.png" border="0" alt="monter" /></a></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=rubriques&amp;action=move_down&amp;id=<?php echo $res_categorie['categorie_id']; ?>"><img src="/templates/backoffice/images/move_down.png" border="0" alt="descendre" /></a></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=rubriques&amp;action=modifier&amp;id=<?php echo $res_categorie['categorie_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
					<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=rubriques&amp;action=supprimer&amp;id=<?php echo $res_categorie['categorie_id']; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
					
					
				</tr>
				<?php

			}
			?>

		</table>
		<?php
	break;
	case 'ajouter':

		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Ajouter une nouvelle rubrique</h1></td>
			</tr>
			<tr>
				<td>
				<form id="page_form" action="contenu.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="rubriques" />
				<input type="hidden" name="action"  id="action" value="post_ajouter" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th>Titre</th>
					</tr>
					<tr>
						<td><input type="text" name="categorie_nom" id="categorie_nom" size="60" value="<?php echo stripslashes($res_page['categorie_nom']); ?>" /></td>
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
	
	case 'modifier':
		$sql_page = mysql_query("SELECT * FROM contenu_categories WHERE categorie_id='".$_GET['id']."'");
		$res_page = mysql_fetch_array($sql_page);
		?>

		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Editer une rubrique</h1></td>
			</tr>
			<tr>
				<td>
				<form id="page_form" action="contenu.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="rubriques" />
				<input type="hidden" name="action"  id="action" value="post_modifier" />
				<input type="hidden" name="categorie_id" id="categorie_id" value="<?php echo $_GET['id']; ?>" />
				<table width="730" border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th>Titre</th>
					</tr>
					<tr>
						<td><input type="text" name="categorie_nom" id="categorie_nom" size="60" value="<?php echo stripslashes($res_page['categorie_nom']); ?>" /></td>
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


	case 'supprimer' :
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Supprimer une rubrique</h1></td>
			</tr>
			<tr>
				<td>
					<form action="contenu.php" method="post">
					<input type="hidden" name="method" value="rubriques" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="categorie_id" value="<?php echo $_GET['id']; ?>" />
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
