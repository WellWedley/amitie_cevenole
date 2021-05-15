<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
switch($_action){
	default:
	case 'post_ajouter':
	case 'post_modifier':
	case 'post_supprimer':
	case 'listing':
		if($_action == 'post_ajouter'){
			$sql_ins = mysql_query("INSERT INTO contenu_actualites (actualite_date, actualite_titre, actualite_texte, actualite_alaune) VALUES ('".mktime(0,0,0,$_POST['m_beg'],$_POST['d_beg'],$_POST['y_beg'])."','".addslashes($_POST['titre'])."','".addslashes($_POST['texte'])."','".addslashes($_POST['alaune'])."')");
			?><script type="text/javascript">alerte_message('News ajoutée avec succès'); </script><?php
		}

		if($_action == 'post_modifier'){
			$sql_upd = mysql_query("UPDATE contenu_actualites  SET
				actualite_date='".mktime(0,0,0,$_POST['m_beg'],$_POST['d_beg'],$_POST['y_beg'])."',
				actualite_titre='".addslashes($_POST['titre'])."',
				actualite_texte='".addslashes($_POST['texte'])."',
				actualite_alaune='".addslashes($_POST['alaune'])."'
			WHERE actualite_id='".$_POST['actualite']."'");
			?><script type="text/javascript">alerte_message('News modifiée avec succès'); </script><?php
		}
		
		if($_action == 'post_supprimer'){
			$sql_del = mysql_query("DELETE FROM contenu_actualites WHERE actualite_id='".$_POST['actualite']."'");
			?><script type="text/javascript">alerte_message('News supprimée avec succès'); </script><?php
		}


		
		$limit = 10;
		$start = ($_GET['start']!='')?$_GET['start']:0;
		$req_actualites = "SELECT * FROM contenu_actualites ";
		$req_actualites .= "ORDER BY actualite_date DESC ";
		
		$sql_actualites = mysql_query($req_actualites);
		
		$nb_actualites = mysql_num_rows($sql_actualites);
		
		if($nb_actualites>0){
			if($limit!=0){
				$nb_page = ceil($nb_actualites/$limit);
				$req_actualites .= "LIMIT ".$start.",".$limit;
			}
		}
		
		$sql_actualites = mysql_query($req_actualites);
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Listing des actualités</h1></td>
			</tr>
			<tr>
				<td>
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td colspan="9" align="right">
								<input type="button" value="Créer une nouvelle news" onclick="window.location=('contenu.php?method=actualites&amp;action=ajouter')" class="bt_ajouter" />
							</td>
						</tr>
						<?php
						if($nb_page>1){
							?>
							<tr>
								<td colspan="9" align="right"><?php
								$pagination = '';
								foreach($_GET as $k=>$e){
									if($k!='method' && $k!='action' && $k!='start')
										$gets .= "&".$k."=".$e;
								}
								for($p=0;$p<$nb_page;$p++){
									$pagination .= (($p*$limit)!=$start) ? '<a href="contenu.php?method='.$_GET['method'].'&action='.$_GET['action'].'&start='.($p*$limit) . $gets .'">'.($p+1).'</a> | ' : ($p+1).' | ';
								}
								$pagination = ereg_replace(' \| $','',$pagination);
								echo $pagination;
								?></td>
							</tr>
							<?php
						}
						?>
						<tr>
							<th width="70" class="barre_titre">Date</th>
							<th class="barre_titre">Titre</th>
							<th class="barre_titre" colspan="2"></th>
						</tr>
						<?php
						$row=2;
						if($nb_actualites>0){
							while($res_actualites = mysql_fetch_array($sql_actualites)){
								$row = ($row==2) ? 1 : 2;
								?>
								<tr>
									<td class="row_<?php echo $row; ?>" width="70" height="70"><?php
									echo date('d-m-Y',$res_actualites['actualite_date']);
									?></td>
									<td class="row_<?php echo $row; ?>"><?php
									echo stripslashes($res_actualites['actualite_titre']);
									?></td>
									<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=actualites&amp;action=modifier&amp;id=<?php echo $res_actualites['actualite_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
									<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="contenu.php?method=actualites&amp;action=supprimer&amp;id=<?php echo $res_actualites['actualite_id']; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
								</tr>
								<?php
							}
						}else{
								?>
								<tr>
									<th colspan="9" align="left">Aucune news n'a été trouvée</th>
								</tr>
								<?php
						}
						?>
						<?php
						if($nb_page>1){
							?>
							<tr>
								<td colspan="9" align="right"><?php
								echo $pagination;
								?></td>
							</tr>
							<?php
						}
						?>
						<tr>
							<td colspan="9"></td>
						</tr>
						<tr>
							<td colspan="9" align="right">
								<input type="button" value="Créer une nouvelle news" onclick="window.location=('contenu.php?method=actualites&amp;action=ajouter')" class="bt_ajouter" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php
	break;
	case 'ajouter':

		$sql_next = mysql_query("SHOW TABLE STATUS LIKE 'contenu_actualites'");
		$res_next = mysql_fetch_array($sql_next);
		$next_news_id = $res_next['Auto_increment'];

		list($d_beg,$m_beg,$y_beg)= split('-',date('d-m-Y'));
		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$('save_news').addEvent('click',function(e){
				var e = new Event(e).stop();
				$('texte').value = CKEDITOR.instances.texte.getData() ;

				$('page_form').submit();
			})
			
			$('texte').ckeditor({
				toolbar:"NL",


				
			});
		});
		</script>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Ajouter une nouvelle news</h1></td>
			</tr>
			<tr>
				<td>
				<form id="page_form" name="page_form" action="contenu.php" method="post">
				<input type="hidden" name="method" value="actualites" />
				<input type="hidden" name="action"  id="action" value="post_ajouter" />
				<input type="hidden" name="actualite_id" id="actualite_id" value="<?php echo $next_news_id; ?>" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<th>Date</th>
						<td>
							<select name="d_beg" id="d_beg">
								<?php
								for($i=1;$i<=31;$i++){
									?><option value="<?php echo $i; ?>" <?php echo ($i==$d_beg)?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
								}
								?>
							</select>
							<select name="m_beg" id="m_beg">
								<?php
								for($i=1;$i<=12;$i++){
									?><option value="<?php echo $i; ?>" <?php echo ($i==$m_beg)?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
								}
								?>
							</select>
							<select name="y_beg" id="y_beg">
								<?php
								for($i=date('Y')-1;$i<=date('Y')+1;$i++){
									?><option value="<?php echo $i; ?>" <?php echo ($i==$y_beg)?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"></td>
					</tr>
					<tr>
						<th>Affichage menu</th>
						<td><input type="radio" name="alaune" id="Oalaune" value="oui" checked /> Oui&nbsp;<input type="radio" name="alaune" id="Nalaune" value="non" /> Non</td>
					</tr>
					<tr>
						<th>Sujet</th>
						<td><input type="text" name="titre" id="titre" size="60" /></td>
					</tr>
					<tr>
						<th valign="top">Message</th>
						<td><textarea id="texte" name="texte" ><?php echo stripslashes($res_page['actualite_texte']); ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_news" value="Enregistrer" class="bt_valider" />
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
		$sql_actualite = mysql_query("SELECT * FROM contenu_actualites WHERE actualite_id='".$_GET['id']."'");
		$res_actualite = mysql_fetch_array($sql_actualite);
		list($d_beg,$m_beg,$y_beg) = split('-',date('d-m-Y',$res_actualite['actualite_date']));
		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$('save_news').addEvent('click',function(e){
				var e = new Event(e).stop();
				$('texte').value = CKEDITOR.instances.texte.getData() ;

				$('page_form').submit();
			})
			
			$('texte').ckeditor({
				toolbar:"NL",


				
			});
		});
		</script>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Editer une news</h1></td>
			</tr>
			<tr>
				<td>
				<form id="page_form" name="page_form" action="contenu.php" method="post">
				<input type="hidden" name="method" value="actualites" />
				<input type="hidden" name="action"  id="action" value="post_modifier" />
				<input type="hidden" name="actualite" id="actualite" value="<?php echo $_GET['id']; ?>" />
				<table width="730" border="0" cellpadding="4" cellspacing="0">
					<tr>
						<th>Date</th>
						<td>
							<select name="d_beg" id="d_beg">
								<?php
								for($i=1;$i<=31;$i++){
									?><option value="<?php echo $i; ?>" <?php echo ($i==$d_beg)?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
								}
								?>
							</select>
							<select name="m_beg" id="m_beg">
								<?php
								for($i=1;$i<=12;$i++){
									?><option value="<?php echo $i; ?>" <?php echo ($i==$m_beg)?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
								}
								?>
							</select>
							<select name="y_beg" id="y_beg">
								<?php
								for($i=date('Y')-1;$i<=date('Y')+1;$i++){
									?><option value="<?php echo $i; ?>" <?php echo ($i==$y_beg)?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"></td>
					</tr>
					<tr>
						<th>Affichage menu</th>
						<td><input type="radio" name="alaune" id="Oalaune" value="oui" <?php echo ($res_actualite['actualite_alaune']=='oui')?'checked':''; ?> /> Oui&nbsp;<input type="radio" name="alaune" id="Nalaune" value="non" <?php echo ($res_actualite['actualite_alaune']=='non')?'checked':''; ?> /> Non</td>
					</tr>
					<tr>
						<th>Sujet</th>
						<td><input type="text" name="titre" id="titre" size="60" value="<?php echo stripslashes($res_actualite['actualite_titre']); ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Message</th>
						<td><textarea id="texte" name="texte" ><?php echo stripslashes($res_actualite['actualite_texte']); ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_news" value="Enregistrer" class="bt_valider" />
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
				<td><h1>Supprimer une news</h1></td>
			</tr>
			<tr>
				<td>
					<form action="contenu.php" method="post">
					<input type="hidden" name="method" value="actualites" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="actualite" value="<?php echo $_GET['id']; ?>" />
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