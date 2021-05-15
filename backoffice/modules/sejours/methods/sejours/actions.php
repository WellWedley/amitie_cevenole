<br />
<script type="text/javascript" src ="/backoffice/modules/sejours/methods/sejours/actions.js"></script>
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];

// if($_action=="duree"){
// 	$sql = mysql_query("SELECT * FROM sejours_dates");
// 	while($res = mysql_fetch_array($sql)){
// 		$d = intval($res['sejour_duree'])+1;
// 		$sqlu = mysql_query("UPDATE sejours_dates SET sejour_duree='".$d."' WHERE sejour_id='".$res['sejour_id']."' AND sejour_date_beg='".$res['sejour_date_beg']."' AND sejour_date_end='".$res['sejour_date_end']."'");
// 	}
// }
/*

$sql_p = mysql_query("SELECT * FROM sejours_periodes");
while($res_p = mysql_fetch_array($sql_p)){
	$order=1;
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_periode='".$res_p['periode_id']."' ORDER BY sejour_ordre ASC");
	while($res_banniere = mysql_fetch_array($sql_banniere)){
		$sql_order = mysql_query("UPDATE sejours SET sejour_ordre='".$order."' WHERE sejour_id='".$res_banniere['sejour_id']."'");
		$order++;
	}
}

*/

if($_action == "post_ajouter"){
	$themes = "";
	foreach($_POST as $k=>$e){
		if(eregi('^sejour_theme_',$k)){
			$themes .= $e.';';
		}
	}
	$themes = ereg_replace(';$','',$themes);

// 	foreach($_POST as $k=>$e){
// 		if(eregi('^sejour_tarif_',$k)){
// 			$row_id = intval(ereg_replace('sejour_tarif_','',$k));
// 			if($e != ''){
// 				$date_beg = mktime(0,0,0,intval($_POST['m_beg_'.$row_id]),intval($_POST['d_beg_'.$row_id]),intval($_POST['y_beg_'.$row_id]));
// 				$date_end = mktime(0,0,0,intval($_POST['m_end_'.$row_id]),intval($_POST['d_end_'.$row_id]),intval($_POST['y_end_'.$row_id]));
// 				$duree = ($date_end-$date_beg)/(3600*24);
// 			}
// 		}
// 	}

	
	$sql_sejour = mysql_query("INSERT INTO sejours (
		sejour_alaune,
		sejour_periode,
		sejour_theme,
		sejour_titre,
		sejour_soustitre,
		sejour_introduction,
		sejour_activites,
		sejour_hebergement,
		sejour_effectif,
		sejour_depart,
		sejour_transport,
		sejour_lieu
	) VALUES (
		'".($_POST['sejour_alaune'])."',
		'".intval($_POST['sejour_periode'])."',
		'".$themes."',
		'".mysql_real_escape_string($_POST['sejour_titre'])."',
		'".mysql_real_escape_string($_POST['sejour_soustitre'])."',
		'".mysql_real_escape_string($_POST['sejour_introduction'])."',
		'".mysql_real_escape_string($_POST['sejour_activites'])."',
		'".mysql_real_escape_string($_POST['sejour_hebergement'])."',
		'".mysql_real_escape_string($_POST['sejour_effectif'])."',
		'".mysql_real_escape_string($_POST['sejour_depart'])."',
		'".mysql_real_escape_string($_POST['sejour_transport'])."',
		'".mysql_real_escape_string($_POST['sejour_lieu'])."'
	)");

	$sejour_id = mysql_insert_id();
	foreach($_POST as $k=>$e){
		if(eregi('^sejour_tarif_',$k)){
			$row_id = intval(ereg_replace('sejour_tarif_','',$k));
			if($e != ''){
				$date_beg = mktime(0,0,0,intval($_POST['m_beg_'.$row_id]),intval($_POST['d_beg_'.$row_id]),intval($_POST['y_beg_'.$row_id]));
				$date_end = mktime(0,0,0,intval($_POST['m_end_'.$row_id]),intval($_POST['d_end_'.$row_id]),intval($_POST['y_end_'.$row_id]));
				$duree = (($date_end-$date_beg)/(3600*24))+1;
				$complet = (isset($_POST['sejour_complet_'.$row_id])) ? 'Y':'N';
				$mini = $_POST['sejour_age_mini_'.$row_id];
				$maxi = $_POST['sejour_age_maxi_'.$row_id];
				$classe = mysql_real_escape_string($_POST['sejour_classe_'.$row_id]);
				$sql_date = mysql_query("INSERT INTO sejours_dates (sejour_id, sejour_date_beg, sejour_date_end, sejour_duree, sejour_tarif, sejour_complet,sejour_age_mini,sejour_age_maxi,sejour_classe) VALUES ('".$sejour_id."','".$date_beg."','".$date_end."','".$duree."','".intval($e)."','".$complet."','".intval($mini)."','".intval($maxi)."','".$classe."')");
			}
		}
	}
	
	?><script type="text/javascript">alerte_message('Séjour ajouté avec succès'); </script><?php
}

if($_action == "post_modifier"){
	$themes = "";
	foreach($_POST as $k=>$e){
		if(eregi('^sejour_theme_',$k)){
			$themes .= $e.';';
		}
	}
	
	$themes = ereg_replace(';$','',$themes);

	foreach($_POST as $k=>$e){
		if(eregi('^sejour_tarif_',$k)){
			$row_id = intval(ereg_replace('sejour_tarif_','',$k));
			if($e != ''){
				$date_beg = mktime(0,0,0,intval($_POST['m_beg_'.$row_id]),intval($_POST['d_beg_'.$row_id]),intval($_POST['y_beg_'.$row_id]));
				$date_end = mktime(0,0,0,intval($_POST['m_end_'.$row_id]),intval($_POST['d_end_'.$row_id]),intval($_POST['y_end_'.$row_id]));
				$duree = (($date_end-$date_beg)/(3600*24))+1;
			}
		}
	}
	
	$sql_sejour = mysql_query("UPDATE sejours SET
		sejour_alaune='".($_POST['sejour_alaune'])."',
		sejour_periode='".intval($_POST['sejour_periode'])."',
		sejour_theme='".$themes."',
		sejour_titre='".mysql_real_escape_string($_POST['sejour_titre'])."',
		sejour_soustitre='".mysql_real_escape_string($_POST['sejour_soustitre'])."',
		sejour_introduction='".mysql_real_escape_string($_POST['sejour_introduction'])."',
		sejour_activites='".mysql_real_escape_string($_POST['sejour_activites'])."',
		sejour_hebergement='".mysql_real_escape_string($_POST['sejour_hebergement'])."',
		sejour_effectif='".mysql_real_escape_string($_POST['sejour_effectif'])."',
		sejour_depart='".mysql_real_escape_string($_POST['sejour_depart'])."',
		sejour_transport='".mysql_real_escape_string($_POST['sejour_transport'])."',
		sejour_lieu='".mysql_real_escape_string($_POST['sejour_lieu'])."'
	WHERE sejour_id='".$_POST['sejour_id']."'");
	
	$sejour_id = $_POST['sejour_id'];
	//$sql_date = mysql_query("DELETE FROM sejours_dates WHERE sejour_id='".$sejour_id."'");
	
	
	
	for($k=1;$k<=10;$k++){
		/*if(eregi('^sejour_date_id_',$k)){
			$date_id = intval(ereg_replace('sejour_date_id_','',$k));
		}
	
		$test_date_id = ($date_id!='')?true:false;
		if(!$test_date_id){
			$sql_date = mysql_query("DELETE FROM sejours_dates WHERE sejour_id='".$sejour_id."'");
		}
		***/
		if(($_POST['sejour_date_id_'.$k] != '')AND(($_POST['sejour_tarif_'.$k] == '')OR($_POST['sejour_tarif_'.$k] == '0'))){
			$sql_date = mysql_query("DELETE FROM sejours_dates WHERE sejour_date_id='".$_POST['sejour_date_id_'.$k]."'");
		}
		if($_POST['sejour_tarif_'.$k] != ''){
			$date_beg = mktime(0,0,0,intval($_POST['m_beg_'.$k]),intval($_POST['d_beg_'.$k]),intval($_POST['y_beg_'.$k]));
			$date_end = mktime(0,0,0,intval($_POST['m_end_'.$k]),intval($_POST['d_end_'.$k]),intval($_POST['y_end_'.$k]));
			$duree = (($date_end-$date_beg)/(3600*24))+1;
			$complet = (isset($_POST['sejour_complet_'.$k])) ? 'Y':'N';
			$mini = $_POST['sejour_age_mini_'.$k];
			$maxi = $_POST['sejour_age_maxi_'.$k];
			//$date_id = $_POST['sejour_date_id_'.$row_id];
			$classe = mysql_real_escape_string($_POST['sejour_classe_'.$k]);
			if($_POST['sejour_date_id_'.$k]!=''){
				
				$sql_date = mysql_query("UPDATE sejours_dates 
				SET
				sejour_id='".$sejour_id."', 
				sejour_date_beg='".$date_beg."', 
				sejour_date_end='".$date_end."', 
				sejour_duree='".$duree."', 
				sejour_tarif='".intval($_POST['sejour_tarif_'.$k] )."', 
				sejour_complet='".$complet."',
				sejour_age_mini='".intval($mini)."',
				sejour_age_maxi='".intval($maxi)."',
				sejour_classe='".mysql_real_escape_string($classe)."'
				WHERE sejour_date_id='".$_POST['sejour_date_id_'.$k]."'");
			
				
			}else{
				$sql_date = mysql_query("INSERT INTO sejours_dates (sejour_id, sejour_date_beg, sejour_date_end, sejour_duree, sejour_tarif, sejour_complet,sejour_age_mini,sejour_age_maxi,sejour_classe) VALUES ('".$sejour_id."','".$date_beg."','".$date_end."','".$duree."','".intval($_POST['sejour_tarif_'.$k] )."','".$complet."','".intval($mini)."','".intval($maxi)."','".mysql_real_escape_string($classe)."')");
			}		
		}
		
	}
	
	
	/*
	
	foreach($_POST as $k=>$e){
		if(eregi('^sejour_date_id_',$k)){
			$date_id = intval(ereg_replace('sejour_date_id_','',$k));
		}
	//}
	
	
	//foreach($_POST as $k=>$e){
		if(eregi('^sejour_tarif_',$k)){
			$row_id = intval(ereg_replace('sejour_tarif_','',$k));
			if($e != ''){
				$date_beg = mktime(0,0,0,intval($_POST['m_beg_'.$row_id]),intval($_POST['d_beg_'.$row_id]),intval($_POST['y_beg_'.$row_id]));
				$date_end = mktime(0,0,0,intval($_POST['m_end_'.$row_id]),intval($_POST['d_end_'.$row_id]),intval($_POST['y_end_'.$row_id]));
				$duree = (($date_end-$date_beg)/(3600*24))+1;
				$complet = (isset($_POST['sejour_complet_'.$row_id])) ? 'Y':'N';
				$mini = $_POST['sejour_age_mini_'.$row_id];
				$maxi = $_POST['sejour_age_maxi_'.$row_id];
				//$date_id = $_POST['sejour_date_id_'.$row_id];
				$classe = mysql_real_escape_string($_POST['sejour_classe_'.$row_id]);
				if($date_id!=''){
					if(trim($e)!=''){
						$sql_date = mysql_query("UPDATE sejours_dates 
						SET
						sejour_id='".$sejour_id."', 
						sejour_date_beg='".$date_beg."', 
						sejour_date_end='".$date_end."', 
						sejour_duree='".$duree."', 
						sejour_tarif='".intval($e)."', 
						sejour_complet='".$complet."',
						sejour_age_mini='".intval($mini)."',
						sejour_age_maxi='".intval($maxi)."',
						sejour_classe='".mysql_real_escape_string($classe)."'
						WHERE sejour_date_id='".$date_id."'");
					}else{
						$sql_date = mysql_query("DELETE FROM sejours_dates WHERE sejour_date_id='".$date_id."'");
					}
					
				}else{
					$sql_date = mysql_query("INSERT INTO sejours_dates (sejour_id, sejour_date_beg, sejour_date_end, sejour_duree, sejour_tarif, sejour_complet,sejour_age_mini,sejour_age_maxi,sejour_classe) VALUES ('".$sejour_id."','".$date_beg."','".$date_end."','".$duree."','".intval($e)."','".$complet."','".intval($mini)."','".intval($maxi)."','".mysql_real_escape_string($classe)."')");
				}
				
				
				
			}
		}
	}
	*/
	?><script type="text/javascript">alerte_message('Séjour modifié avec succès'); </script><?php
}







if($_action == "post_supprimer"){
	
	
	
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_id='".$_POST['sejour_id']."'");
	$res_banniere = mysql_fetch_array($sql_banniere);
	$sejour_periode = $res_banniere['sejour_periode'];
	

	$sql_sejour = mysql_query("DELETE FROM sejours WHERE sejour_id='".$_POST['sejour_id']."'");
	$sql_sejour = mysql_query("DELETE FROM sejours_dates WHERE sejour_id='".$_POST['sejour_id']."'");


	$order=1;
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_periode='".$sejour_periode."' ORDER BY sejour_ordre ASC");
	while($res_banniere = mysql_fetch_array($sql_banniere)){
		$sql_order = mysql_query("UPDATE sejours SET sejour_ordre='".$order."' WHERE sejour_id='".$res_banniere['sejour_id']."'");
		$order++;
	}	
	
	
	
	?><script type="text/javascript">alerte_message('Séjour supprimé avec succès'); </script><?php
}

if($_action == "move_up"){
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_id='".$_GET['id']."'");
	$res_banniere = mysql_fetch_array($sql_banniere);
	$current_pos = $res_banniere['sejour_ordre'];
	$sejour_periode = $res_banniere['sejour_periode'];
	
	
	if(($current_pos-1)>0){

		$prev_pos = (($current_pos-1)>0) ? ($current_pos-1) : 1;

		$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_ordre='".$prev_pos."' AND sejour_periode='".$sejour_periode."'");
		$res_banniere = mysql_fetch_array($sql_banniere);
		$banniere_to_move = $res_banniere['sejour_id'];
		
		$sql_banniere = mysql_query("UPDATE sejours SET sejour_ordre='".$prev_pos."' WHERE sejour_id='".$_GET['id']."'");
		$sql_banniere = mysql_query("UPDATE sejours SET sejour_ordre='".$current_pos."' WHERE sejour_id='".$banniere_to_move."'");
	}
	$order=1;
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_periode='".$sejour_periode."' ORDER BY sejour_ordre ASC");
	while($res_banniere = mysql_fetch_array($sql_banniere)){
		$sql_order = mysql_query("UPDATE sejours SET sejour_ordre='".$order."' WHERE sejour_id='".$res_banniere['sejour_id']."'");
		$order++;
	}

}
if($_action == "move_down"){
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_id='".$_GET['id']."'");
	$res_banniere = mysql_fetch_array($sql_banniere);
	$current_pos = $res_banniere['sejour_ordre'];
	$sejour_periode = $res_banniere['sejour_periode'];
	
	
	
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_periode='".$sejour_periode."'");
	$nb_banniere = mysql_num_rows($sql_banniere);

	
	if(($current_pos+1)<=$nb_banniere){
		$next_pos = (($current_pos+1)<=$nb_banniere) ? ($current_pos+1) : $nb_banniere;

		$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_ordre='".$next_pos."' AND sejour_periode='".$sejour_periode."'");
		$res_banniere = mysql_fetch_array($sql_banniere);
		$banniere_to_move = $res_banniere['sejour_id'];

		$sql_banniere = mysql_query("UPDATE sejours SET sejour_ordre='".$next_pos."' WHERE sejour_id='".$_GET['id']."'");
		$sql_banniere = mysql_query("UPDATE sejours SET sejour_ordre='".$current_pos."' WHERE sejour_id='".$banniere_to_move."'");
	}
	$order=1;
	$sql_banniere = mysql_query("SELECT * FROM sejours WHERE sejour_periode='".$sejour_periode."' ORDER BY sejour_ordre ASC");
	while($res_banniere = @mysql_fetch_array($sql_banniere)){
		$sql_order = mysql_query("UPDATE sejours SET sejour_ordre='".$order."' WHERE sejour_id='".$res_banniere['sejour_id']."'");
		$order++;
	}

}





switch($_action){
	default:
	case 'listing':
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td colspan="5"><h1>Listing des séjours</h1></td>
			</tr>
			<?php

			$sql_periodes = mysql_query("SELECT * FROM sejours_periodes ORDER BY periode_ordre ASC");
			while($res_periodes = mysql_fetch_array($sql_periodes)){
				?>
				<tr>
					<td class="barre_titre"><strong><?php echo stripslashes($res_periodes['periode_nom']); ?></strong></td>
					<td class="barre_titre" colspan="4" width="80"><input type="button" value="Ajouter un séjour" onclick="window.location=('sejours.php?method=sejours&amp;action=ajouter&amp;periode=<?php echo $res_periodes['periode_id']; ?>')" class="bt_ajouter" /></td>
				</tr>
				<?php
				$row=2;
				$sql_sejours = mysql_query("SELECT * FROM sejours WHERE sejour_periode='".$res_periodes['periode_id']."' ORDER BY sejour_ordre ASC");
				while($res_sejours = mysql_fetch_array($sql_sejours)){
					$row = ($row==2) ? 1 : 2;
					?>
					<tr>
						<td class="row_<?php echo $row; ?>"><?php echo stripslashes($res_sejours['sejour_titre']); ?></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=sejours&amp;action=move_up&amp;id=<?php echo $res_sejours['sejour_id']; ?>"><img src="/templates/backoffice/images/move_up.png" border="0" alt="modifier" /></a></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=sejours&amp;action=move_down&amp;id=<?php echo $res_sejours['sejour_id']; ?>"><img src="/templates/backoffice/images/move_down.png" border="0" alt="modifier" /></a></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=sejours&amp;action=modifier&amp;id=<?php echo $res_sejours['sejour_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
						<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="sejours.php?method=sejours&amp;action=supprimer&amp;id=<?php echo $res_sejours['sejour_id']; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
					</tr>
					<?php
				}
			}
			?>

		</table>
			
		<?php
	break;


	case 'ajouter':
	case 'modifier':
		
		
		
		
		
		
		
		$sql_sejours = mysql_query("SELECT * FROM sejours WHERE sejour_id='".$_GET['id']."'");
		$res_sejours = mysql_fetch_array($sql_sejours);

		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$('save_sejour').addEvent('click',function(e){
				var e = new Event(e).stop();
				$('sejour_introduction').value = CKEDITOR.instances.sejour_introduction.getData() ;
				$('sejour_activites').value = CKEDITOR.instances.sejour_activites.getData() ;
				$('sejour_hebergement').value = CKEDITOR.instances.sejour_hebergement.getData() ;
				$('sejour_effectif').value = CKEDITOR.instances.sejour_effectif.getData() ;
				$('sejour_depart').value = CKEDITOR.instances.sejour_depart.getData() ;
				$('sejour_transport').value = CKEDITOR.instances.sejour_transport.getData() ;
				$('sejour_lieu').value = CKEDITOR.instances.sejour_lieu.getData() ;

				$('sejour_form').submit();
			})
			
			$('sejour_introduction').ckeditor({
				toolbar:"NL",
			});
			$('sejour_activites').ckeditor({
				toolbar:"NL",
			});
			$('sejour_hebergement').ckeditor({
				toolbar:"NL",
			});
			$('sejour_effectif').ckeditor({
				toolbar:"NL",
			});
			$('sejour_depart').ckeditor({
				toolbar:"NL",
			});
			$('sejour_transport').ckeditor({
				toolbar:"NL",
			});
			$('sejour_lieu').ckeditor({
				toolbar:"NL",
			});
			$$('a[id^=msgdelete_]').each(function(el){
				el.addEvent('click',function(e){
					if(confirm("Cliquez sur OK pour supprimer les messages du carnet de bord de ce séjour.\n\nAttention, cette action est irréversible !")){
						var d = el.id.split('_');
						var beg = d[1];
						var end = d[2];
						var did = d[3];
						document.location = '/backoffice/sejours.php?method=sejours&action=modifier&id=<?php echo $res_sejours['sejour_id']; ?>&sub_action=vider_messages&b='+beg+'&e='+end+'&did='+did;
					}
				})
			})
		});
		</script>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1><?php echo ucfirst($_action); ?> un séjour</h1></td>
			</tr>
			<?php
			if($_GET['sub_action']=='vider_messages'){
				
				$sql_message = mysql_query("DELETE FROM sejours_messages WHERE message_sejour='".$res_sejours['sejour_id']."' AND message_sejour_beg='".$_GET['b']."' AND message_sejour_end='".$_GET['e']."' AND message_date_id='".$_GET['did']."'");
				?>
				<tr>
					<td><div style="border:1px solid #ccc; padding:20px;margin:0 20px; font-weight:bold; color:green; text-align: center;">Messages supprimés avec succès</div></td>
				</tr>
				
				<?php
			}
			?>
			<tr>
				<td>
				<form id="sejour_form" action="sejours.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="method" value="sejours" />
				<input type="hidden" name="action"  id="action" value="post_<?php echo $_action; ?>" />
				<input type="hidden" name="sejour_id" id="sejour_id" value="<?php echo $res_sejours['sejour_id']; ?>" />
				<table width="730"  border="0" cellpadding="4" cellspacing="0">
					<tr>
						<td></td>
					</tr>
					<tr>
						<th class="barre_titre">Période</th>
					</tr>
					<tr>
						<td>
						<select name="sejour_periode">
						<?php
						$sql_periodes = mysql_query("SELECT * FROM sejours_periodes ORDER BY periode_ordre ASC");
						while($res_periodes = mysql_fetch_array($sql_periodes)){
							?>
							<option value="<?php echo $res_periodes['periode_id']; ?>" <?php echo (($res_periodes['periode_id']==$_GET['periode'])OR($res_periodes['periode_id']==$res_sejours['sejour_periode'])) ? 'selected':''; ?>><?php echo stripslashes($res_periodes['periode_nom']); ?></option>
							<?php
						}
						?>
						</select>
						</td>
					</tr>
					<tr>
						<th class="barre_titre">Thème</th>
					</tr>
					<tr>
						<td>
						<table border="0" cellspacing="0" cellpadding="4">
						<?php
						$sejour_theme = (is_array(explode(';',$res_sejours['sejour_theme']))) ? explode(';',$res_sejours['sejour_theme']) : array($res_sejours['sejour_theme']);
						
						$r = 0;
						$sql_theme = mysql_query("SELECT * FROM sejours_themes ORDER BY theme_nom ASC");
						while($res_theme = mysql_fetch_array($sql_theme)){
							if($r==0){
								?><tr><?php
							}
							?><td><input type="checkbox" name="sejour_theme_<?php echo $res_theme['theme_id']; ?>" value="<?php echo $res_theme['theme_id']; ?>" <?php echo (in_array($res_theme['theme_id'],$sejour_theme)) ? 'checked':''; ?> /> <?php echo stripslashes($res_theme['theme_nom']); ?></td><?php
							if($r==6){
								?></tr><?php
								$r=0;
							}else{
								$r++;
							}
						}
						?>
						</table>
						</td>
					</tr>
					<?php
					/*
					<tr>
						<th class="barre_titre">Age</th>
					</tr>
					<tr>
						<td>de <input type="text" name="sejour_age_mini" value="<?php echo ($res_sejours['sejour_age_mini']!='') ? $res_sejours['sejour_age_mini']:'6'; ?>" size="4" /> ans à <input type="text" name="sejour_age_maxi" value="<?php echo ($res_sejours['sejour_age_maxi']!='') ? $res_sejours['sejour_age_maxi']:'18'; ?>" size="4" /> ans</td>
					</tr>
					*/
					?>
					<tr>
						<th class="barre_titre">Dates des séjours</th>
					</tr>
					<tr>
						<td>
							<?php
							if($res_sejours['sejour_periode']==3){
								?>
								
								<p><strong>Note</strong> : Pour supprimer une date d'une classe découverte, effacez le nom de la classe et enregistrez les modifications.</p>
								<?php
							}
							?>
							<table border="0" cellspacing="0" cellpadding="4">
								<tr>
									<?php
									if($res_sejours['sejour_periode']==3){
										?>
										
										<th width="180">Classe</th>
										<?php
									}else{
										?>
										
										<th width="90">De</th>
										<th width="90">A</th>
										<?php
									}
									?>
									<th width="180">Du</th>
									<th width="180">Au</th>
									<th>Tarif &euro;</th>
									<th align="center">Complet</th>
									<th align="center" width="30">Messages</th>
								</tr>
								<?php
								$aDates = array();
								$s=1;
								$sql_dates = mysql_query("SELECT * FROM sejours_dates WHERE sejour_id='".$_GET['id']."' ORDER BY sejour_date_beg ASC");
								if(mysql_num_rows($sql_dates)>0){
									while($res_dates = mysql_fetch_array($sql_dates)){
										$aDates[$s] = array('beg'=>$res_dates['sejour_date_beg'],'end'=>$res_dates['sejour_date_end'],'tar'=>$res_dates['sejour_tarif'],'complet'=>$res_dates['sejour_complet'],'mini'=>$res_dates['sejour_age_mini'],'maxi'=>$res_dates['sejour_age_maxi'],'classe'=>$res_dates['sejour_classe'],'date_id'=>$res_dates['sejour_date_id']);
										$s++;
									}
								}
								
								for($s=1;$s<=10;$s++){
									if(is_array($aDates[$s])){
										list(${'d_beg_'.$s},${'m_beg_'.$s},${'y_beg_'.$s})= split('-',date('d-m-Y',$aDates[$s]['beg']));
										list(${'d_end_'.$s},${'m_end_'.$s},${'y_end_'.$s})= split('-',date('d-m-Y',$aDates[$s]['end']));
										${'sejour_tarif_'.$s} = $aDates[$s]['tar'];
										${'sejour_complet_'.$s} = $aDates[$s]['complet'];
										${'sejour_age_mini_'.$s} = $aDates[$s]['mini'];
										${'sejour_age_maxi_'.$s} = $aDates[$s]['maxi'];
										${'sejour_classe_'.$s} = $aDates[$s]['classe'];
										${'sejour_date_id_'.$s} = $aDates[$s]['date_id'];
									}else{
										list(${'d_beg_'.$s},${'m_beg_'.$s},${'y_beg_'.$s})= split('-',date('d-m-Y'));
										list(${'d_end_'.$s},${'m_end_'.$s},${'y_end_'.$s})= split('-',date('d-m-Y'));
										${'sejour_date_id_'.$s} = $aDates[$s]['date_id'];
									}
								
									?>
									<tr>
										
										<?php
										if($res_sejours['sejour_periode']==3){
											?>
											<td><input type="text" name="sejour_classe_<?php echo $s; ?>" value="<?php echo stripslashes(${'sejour_classe_'.$s}); ?>" size="25" /></td>
											<?php
										}else{
											?>
											<td><input type="text" name="sejour_age_mini_<?php echo $s; ?>" value="<?php echo ${'sejour_age_mini_'.$s}; ?>" size="4" /> ans </td>
											<td><input type="text" name="sejour_age_maxi_<?php echo $s; ?>" value="<?php echo ${'sejour_age_maxi_'.$s}; ?>" size="4" /> ans</td>
											<?php
										}
										?>
										
										
										<td>
											<select name="d_beg_<?php echo $s; ?>" id="d_beg_<?php echo $s; ?>">
												<?php
												for($i=1;$i<=31;$i++){
													?><option value="<?php echo $i; ?>" <?php echo ($i==${'d_beg_'.$s})?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
												}
												?>
											</select>
											<select name="m_beg_<?php echo $s; ?>" id="m_beg_<?php echo $s; ?>">
												<?php
												for($i=1;$i<=12;$i++){
													?><option value="<?php echo $i; ?>" <?php echo ($i==${'m_beg_'.$s})?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
												}
												?>
											</select>
											<select name="y_beg_<?php echo $s; ?>" id="y_beg_<?php echo $s; ?>">
												<?php
												for($i=date('Y')-1;$i<=date('Y')+1;$i++){
													?><option value="<?php echo $i; ?>" <?php echo ($i==${'y_beg_'.$s})?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
												}
												?>
											</select>
										</td>
										<td>
											<select name="d_end_<?php echo $s; ?>" id="d_end_<?php echo $s; ?>">
												<?php
												for($i=1;$i<=31;$i++){
													?><option value="<?php echo $i; ?>" <?php echo ($i==${'d_end_'.$s})?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
												}
												?>
											</select>
											<select name="m_end_<?php echo $s; ?>" id="m_end_<?php echo $s; ?>">
												<?php
												for($i=1;$i<=12;$i++){
													?><option value="<?php echo $i; ?>" <?php echo ($i==${'m_end_'.$s})?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
												}
												?>
											</select>
											<select name="y_end_<?php echo $s; ?>" id="y_end_<?php echo $s; ?>">
												<?php
												for($i=date('Y')-1;$i<=date('Y')+1;$i++){
													?><option value="<?php echo $i; ?>" <?php echo ($i==${'y_end_'.$s})?'selected':''; ?>><?php echo str_pad($i,2,'0',STR_PAD_LEFT); ?></option><?php
												}
												?>
											</select>
										</td>
										<td><input type="text" name="sejour_tarif_<?php echo $s; ?>" id="sejour_tarif_<?php echo $s; ?>" size="5" value="<?php echo stripslashes(${'sejour_tarif_'.$s}); ?>" /><input type="hidden" name="sejour_date_id_<?php echo $s; ?>" id="sejour_date_id_<?php echo $s; ?>" value="<?php echo stripslashes(${'sejour_date_id_'.$s}); ?>" /></td>
										<td align="center"><input type="checkbox" name="sejour_complet_<?php echo $s; ?>" id="sejour_complet_<?php echo $s; ?>" value="1" <?php echo (${'sejour_complet_'.$s}=='Y')?'checked':''; ?> /></td>
										<td align="center"><a href="javascript:void(0);" id="msgdelete_<?php echo $aDates[$s]['beg']; ?>_<?php echo $aDates[$s]['end']; ?>_<?php echo $aDates[$s]['date_id']; ?>"><img src="/templates/backoffice/images/remove.gif" /></a></td>
									</tr>
									<?php
								}
								?>
							</table>

						</td>
					</tr>
					
					<tr>
						<th class="barre_titre">Diaporama</th>
					</tr>
					<?php
					if($_action=="modifier"){
						?>
						<tr>
							<td><iframe src="/backoffice/modules/sejours/methods/sejours/sejours_diapo.php?sejour_id=<?php echo $_GET['id']; ?>" frameborder="0" width="100%" height="150"></iframe></td>
						</tr>
						<?php
					}else{
						?>
						<tr>
							<td><strong>La gestion du diaporama n'est possible qu'en mode "Edition".</strong></td>
						</tr>
						<?php
					}
					?>
					
					
					<tr>
						<th class="barre_titre">Description complète</th>
					</tr>
					<tr>
						<th>Titre</th>
					</tr>
					<tr>
						<td><input type="text" name="sejour_titre" id="sejour_titre" size="60" value="<?php echo stripslashes($res_sejours['sejour_titre']); ?>" /></td>
					</tr>
					<tr>
						<th>Sous titre</th>
					</tr>
					<tr>
						<td><input type="text" name="sejour_soustitre" id="sejour_soustitre" size="60" value="<?php echo stripslashes($res_sejours['sejour_soustitre']); ?>" /></td>
					</tr>
					<tr>
						<th valign="top">Introduction</th>
					</tr>
					<tr>
						<td><textarea id="sejour_introduction" name="sejour_introduction" ><?php echo stripslashes($res_sejours['sejour_introduction']); ?></textarea></td>
					</tr>
					<tr>
						<th valign="top">Activités</th>
					</tr>
					<tr>
						<td><textarea id="sejour_activites" name="sejour_activites" ><?php echo stripslashes($res_sejours['sejour_activites']); ?></textarea></td>
					</tr>
					<tr>
						<th valign="top">Hébergement</th>
					</tr>
					<tr>
						<td><textarea id="sejour_hebergement" name="sejour_hebergement" ><?php echo stripslashes($res_sejours['sejour_hebergement']); ?></textarea></td>
					</tr>
					<tr>
						<th valign="top">Effectif</th>
					</tr>
					<tr>
						<td><textarea id="sejour_effectif" name="sejour_effectif" ><?php echo stripslashes($res_sejours['sejour_effectif']); ?></textarea></td>
					</tr>
					<tr>
						<th valign="top">Depart</th>
					</tr>
					<tr>
						<td><textarea id="sejour_depart" name="sejour_depart" ><?php echo stripslashes($res_sejours['sejour_depart']); ?></textarea></td>
					</tr>
					<tr>
						<th valign="top">Transport</th>
					</tr>
					<tr>
						<td><textarea id="sejour_transport" name="sejour_transport" ><?php echo stripslashes($res_sejours['sejour_transport']); ?></textarea></td>
					</tr>
					<tr>
						<th valign="top">Lieu</th>
					</tr>
					<tr>
						<td><textarea id="sejour_lieu" name="sejour_lieu" ><?php echo stripslashes($res_sejours['sejour_lieu']); ?></textarea></td>
					</tr>
					<tr>
						<th valign="top">Afficher dans le menu</th>
					</tr>
					<tr>
						<td><input type="radio" id="sejour_alaune_non" name="sejour_alaune" value="N" <?php echo (($res_sejours['sejour_alaune']=='N')OR($res_sejours['sejour_alaune']==''))?'checked':''; ?>> Non <input type="radio" id="sejour_alaune_oui" name="sejour_alaune" value="Y" <?php echo ($res_sejours['sejour_alaune']=='Y')?'checked':''; ?> > Oui </td>
					</tr>
					<tr>
						<td></td>
					</tr>
					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_sejour" value="Enregistrer" class="bt_valider" />
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
				<td><h1>Supprimer un séjour</h1></td>
			</tr>
			<tr>
				<td>
					<form action="sejours.php" method="post">
					<input type="hidden" name="method" value="sejours" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="sejour_id" value="<?php echo $_GET['id']; ?>" />
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