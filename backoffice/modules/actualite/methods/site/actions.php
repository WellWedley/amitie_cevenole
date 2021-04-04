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
			$sql_banniere = mysql_query("SELECT * FROM contenu_pages WHERE page_id='".$_GET['id']."'");
			$res_banniere = mysql_fetch_array($sql_banniere);
			$current_pos = $res_banniere['page_ordre'];
			if(($current_pos-1)>0){

				$prev_pos = (($current_pos-1)>0) ? ($current_pos-1) : 1;

				$sql_banniere = mysql_query("SELECT * FROM contenu_pages WHERE page_ordre='".$prev_pos."' AND page_categorie='".$_GET['idc']."'");
				$res_banniere = mysql_fetch_array($sql_banniere);
				$banniere_to_move = $res_banniere['page_id'];
				$sql_banniere = mysql_query("UPDATE contenu_pages SET page_ordre='".$prev_pos."' WHERE page_id='".$_GET['id']."'");
				$sql_banniere = mysql_query("UPDATE contenu_pages SET page_ordre='".$current_pos."' WHERE page_id='".$banniere_to_move."'");
			}
			$order=1;
			$sql_banniere = mysql_query("SELECT * FROM contenu_pages WHERE page_categorie='".$_GET['idc']."' ORDER BY page_ordre ASC");
			while($res_banniere = mysql_fetch_array($sql_banniere)){
				$sql_order = mysql_query("UPDATE contenu_pages SET page_ordre='".$order."' WHERE page_id='".$res_banniere['page_id']."'");
				$order++;
			}

		}
		if($_action == "move_down"){
			$sql_banniere = mysql_query("SELECT * FROM contenu_pages");
			$nb_banniere = mysql_num_rows($sql_banniere);

			$sql_banniere = mysql_query("SELECT * FROM contenu_pages WHERE page_id='".$_GET['id']."'");
			$res_banniere = mysql_fetch_array($sql_banniere);
			$current_pos = $res_banniere['page_ordre'];
			if(($current_pos+1)<=$nb_banniere){
				$next_pos = (($current_pos+1)<=$nb_banniere) ? ($current_pos+1) : $nb_banniere;

				$sql_banniere = mysql_query("SELECT * FROM contenu_pages WHERE page_ordre='".$next_pos."' AND page_categorie='".$_GET['idc']."'");
				$res_banniere = mysql_fetch_array($sql_banniere);
				$banniere_to_move = $res_banniere['page_id'];

				$sql_banniere = mysql_query("UPDATE contenu_pages SET page_ordre='".$next_pos."' WHERE page_id='".$_GET['id']."'");
				$sql_banniere = mysql_query("UPDATE contenu_pages SET page_ordre='".$current_pos."' WHERE page_id='".$banniere_to_move."'");
			}
			$order=1;
			$sql_banniere = mysql_query("SELECT * FROM contenu_pages ORDER BY page_ordre ASC");
			while($res_banniere = @mysql_fetch_array($sql_banniere)){
				$sql_order = mysql_query("UPDATE contenu_pages SET page_ordre='".$order."' WHERE page_id='".$res_banniere['page_id']."'");
				$order++;
			}

		}
	
		if($_action == 'post_ajouter'){
			$sql_order = mysql_query("SELECT MAX(page_ordre) as dernier FROM contenu_pages WHERE page_categorie='".$_POST['categorie_id']."'");
			$res_order = mysql_fetch_array($sql_order);
			$ordre = $res_order['dernier']+1;
			
			$sql_ins = mysql_query("INSERT INTO contenu_pages (page_categorie, page_titre, page_contenu,page_ordre) VALUES ('".intval($_POST['categorie_id'])."','".mysql_real_escape_string($_POST['page_titre'])."','".mysql_real_escape_string($_POST['page_contenu'])."','".$ordre."')");
			$page_id = mysql_insert_id();
			?><script type="text/javascript">alerte_message('Page ajoutée avec succès'); </script><?php
		}

		if($_action == 'post_modifier'){
			$sql_upd = mysql_query("UPDATE contenu_pages  SET
				page_titre='".mysql_real_escape_string($_POST['page_titre'])."',
				page_contenu='".mysql_real_escape_string($_POST['page_contenu'])."'
			WHERE page_id='".$_POST['page_id']."'");

			?><script type="text/javascript">alerte_message('Page modifiée avec succès'); </script><?php
		}
		
		if($_action == 'post_supprimer'){
			$sql_del = mysql_query("DELETE FROM contenu_pages WHERE page_id='".$_POST['page_id']."'");
			?><script type="text/javascript">alerte_message('Page supprimée avec succès'); </script><?php
		}
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td colspan="5"><h1>Listing des rubriques et des pages</h1></td>
			</tr>
			<tr>
				<td class="barre_titre"><strong>Accueil</strong></td>
				<td class="barre_titre" colspan="4">&nbsp;</td>
			</tr>
			<?php
			$sql_page = mysql_query("SELECT * FROM contenu_pages WHERE page_categorie='0' AND page_variable='index'");
			$res_page = mysql_fetch_array($sql_page);
			?>
			<tr>
				<td class="row_<?php echo $row; ?>" colspan="3"><?php echo stripslashes($res_page['page_titre']); ?></td>
				<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=site&amp;action=modifier&amp;id=<?php echo $res_page['page_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
				<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="#"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
			</tr>
			<?php
			
			$sql_categorie = mysql_query("SELECT * FROM contenu_categories ORDER BY categorie_ordre ASC");
			while($res_categorie = mysql_fetch_array($sql_categorie)){
				?>
				<tr>
					<td class="barre_titre"><strong><?php echo stripslashes($res_categorie['categorie_nom']); ?></strong></td>
					<td class="barre_titre" colspan="4"><input type="button" value="Ajouter une page" onclick="window.location=('contenu.php?method=site&amp;action=ajouter&amp;categorie=<?php echo $res_categorie['categorie_id']; ?>')" class="bt_ajouter" /></td>
				</tr>
				<?php
				$row=2;
				$sql_page = mysql_query("SELECT * FROM contenu_pages WHERE page_categorie='".$res_categorie['categorie_id']."' ORDER BY page_ordre ASC");
				while($res_page = mysql_fetch_array($sql_page)){
					$row = ($row==2) ? 1 : 2;
					?>
					<tr>
						<td class="row_<?php echo $row; ?>"><?php echo stripslashes($res_page['page_titre']); ?></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=site&amp;action=move_up&amp;id=<?php echo $res_page['page_id']; ?>&amp;idc=<?php echo $res_categorie['categorie_id']; ?>"><img src="/templates/backoffice/images/move_up.png" border="0" alt="monter" /></a></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=site&amp;action=move_down&amp;id=<?php echo $res_page['page_id']; ?>&amp;idc=<?php echo $res_categorie['categorie_id']; ?>"><img src="/templates/backoffice/images/move_down.png" border="0" alt="descendre" /></a></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=site&amp;action=modifier&amp;id=<?php echo $res_page['page_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="<?php echo ($res_page['page_editable']=='Y') ? 'contenu.php?method=site&amp;action=supprimer&amp;id='.$res_page['page_id'] : '#'; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
					</tr>
					<?php
				}
			}
			?>

		</table>
		<?php
	break;
	case 'ajouter':

		$sql_next = mysql_query("SHOW TABLE STATUS LIKE 'contenu_pages'");
		$res_next = mysql_fetch_array($sql_next);
		$next_news_id = $res_next['Auto_increment'];

		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$('save_page').addEvent('click',function(e){
				var e = new Event(e).stop();
				$('page_contenu').value = CKEDITOR.instances.page_contenu.getData() ;

				$('page_form').submit();
			})
			
			$('page_contenu').ckeditor({
				toolbar:"NL",


				
			});
		});
		</script>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Ajouter une nouvelle page</h1></td>
			</tr>
			<tr>
				<td>
				<form id="page_form" action="contenu.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="site" />
				<input type="hidden" name="action"  id="action" value="post_ajouter" />
				<input type="hidden" name="page_id" id="page_id" value="<?php echo $page_id; ?>" />
				<input type="hidden" name="categorie_id" id="categorie_id" value="<?php echo $_GET['categorie']; ?>" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th>Titre</th>
					</tr>
					<tr>
						<td><input type="text" name="page_titre" id="page_titre" size="60" value="<?php echo stripslashes($res_page['page_titre']); ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Contenu</th>
					</tr>
					<tr>
						<td><textarea id="page_contenu" name="page_contenu" ><?php echo stripslashes($res_page['page_contenu']); ?></textarea></td>
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
		$sql_page = mysql_query("SELECT * FROM contenu_pages WHERE page_id='".$_GET['id']."'");
		$res_page = mysql_fetch_array($sql_page);
		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$('save_page').addEvent('click',function(e){
				var e = new Event(e).stop();
				$('page_contenu').value = CKEDITOR.instances.page_contenu.getData() ;

				$('page_form').submit();
			})
			
			$('page_contenu').ckeditor({
				toolbar:"NL"
			});
		});
		</script>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Editer une page</h1></td>
			</tr>
			<tr>
				<td>
				<form id="page_form" action="contenu.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="site" />
				<input type="hidden" name="action"  id="action" value="post_modifier" />
				<input type="hidden" name="page_id" id="page_id" value="<?php echo $_GET['id']; ?>" />
				<table width="730" border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th>Titre</th>
					</tr>
					<tr>
						<td><input type="text" name="page_titre" id="page_titre" size="60" value="<?php echo stripslashes($res_page['page_titre']); ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Contenu</th>
					</tr>
					<tr>
						<td><textarea id="page_contenu" name="page_contenu" ><?php echo stripslashes($res_page['page_contenu']); ?></textarea></td>
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
				<td><h1>Supprimer une page</h1></td>
			</tr>
			<tr>
				<td>
					<form action="contenu.php" method="post">
					<input type="hidden" name="method" value="site" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="page_id" value="<?php echo $_GET['id']; ?>" />
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
