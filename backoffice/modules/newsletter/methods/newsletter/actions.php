<br />
<script type="text/javascript" src ="/backoffice/modules/newsletter/methods/newsletter/actions.js"></script>
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];

switch($_action){
	default:
	case "post_ajouter":
	case "post_modifier":
	case "post_supprimer":
	case 'listing':
	case 'post_importer':
	case 'post_qualifier':
		if($_action == "post_importer"){
			$emails = array();
			if($_FILES['import_csv']['tmp_name']!=''){
				$ftp = ftp_connect($Config['FTP_HOSTNAME']);
				$ftp_login = ftp_login($ftp, $Config['FTP_USERNAME'], $Config['FTP_PASSWORD']);
				$ftp_path = split($Config['FTP_USERNAME']."/",$Config['ROOT_PATH']);
				ftp_chdir($ftp,$ftp_path[1]."backoffice/temp");
				$upload = ftp_put($ftp, "importation_email.csv", $_FILES['import_csv']['tmp_name'] , FTP_BINARY);
				ftp_close($ftp);
				$myFile = $_SERVER["DOCUMENT_ROOT"].'/backoffice/temp/importation_email.csv';
				$data = doreadFile($myFile);
				$emails = parseData($data);
				
			}else{
				$emails = split(';',$_POST['import_email']);
			}
			foreach($emails as $k=>$e){
				if(check_email(trim($e))){
					$sql_check = mysql_query("SELECT * FROM newsletter_abonnes WHERE abonne_email='".trim($e)."'");
					if(mysql_num_rows($sql_check)==0){
						$sql_add = mysql_query("INSERT INTO newsletter_abonnes (abonne_email,abonne_uid) VALUES ('".trim($e)."','".gen_rand_string(false)."')");
					}
				}
			}

			?><script type="text/javascript">alerte_message('Emails importées avec succès'); </script><?php
		}
		if($_action == "post_ajouter"){

			$newsletter_uid = gen_rand_string(true);
			$sql_add = mysql_query("INSERT INTO newsletter (newsletter_subject,newsletter_body ,newsletter_created,newsletter_uid ) VALUES ('".addslashes($_POST['subject'])."','".addslashes($_POST['body'])."','".time()."', '".$newsletter_uid."')");
			?><script type="text/javascript">alerte_message('Newsletter crée avec succès'); </script><?php
		}
		if($_action == "post_modifier"){

			$sql_upd = mysql_query("UPDATE newsletter SET newsletter_subject='".addslashes($_POST['subject'])."',newsletter_body='".addslashes($_POST['body'])."',newsletter_created='".time()."' WHERE newsletter_id='".$_POST['newsletter']."'");
			?><script type="text/javascript">alerte_message('Newsletter modifiée avec succès'); </script><?php
		}
		if($_action == "post_supprimer"){
			$sql_delete = @mysql_query("DELETE FROM newsletter WHERE newsletter_id='".$_POST['newsletter']."'");
			?><script type="text/javascript">alerte_message('Newsletter supprimée avec succès'); </script><?php
		}

		if($_action == "post_qualifier"){

			$sql_nl = mysql_query("SELECT * FROM newsletter_abonnes ORDER BY abonne_id DESC");
			while($res_nl = mysql_fetch_array($sql_nl)){
			
				$req_nlu = "UPDATE newsletter_abonnes SET ";
				$req_nlu .= (isset($_POST['bureau_'.$res_nl['abonne_id']])) ? "abonne_bureau='1'":"abonne_bureau='0'";
				$req_nlu .= (isset($_POST['ca_'.$res_nl['abonne_id']])) ? ",abonne_ca='1'":",abonne_ca='0'";
				$req_nlu .= (isset($_POST['bureauelargi_'.$res_nl['abonne_id']])) ? ",abonne_bureau_elargi='1'":",abonne_bureau_elargi='0'";
				$req_nlu .= (isset($_POST['persasso_'.$res_nl['abonne_id']])) ? ",abonne_pers_asso='1'":",abonne_pers_asso='0'";
				$req_nlu .= (isset($_POST['ecole_'.$res_nl['abonne_id']])) ? ",abonne_ecole='1'":",abonne_ecole='0'";
				$req_nlu .= (isset($_POST['assogrp_'.$res_nl['abonne_id']])) ? ",abonne_asso_groupe='1'":",abonne_asso_groupe='0'";
				$req_nlu .= (isset($_POST['parent_'.$res_nl['abonne_id']])) ? ",abonne_parent='1'":",abonne_parent='0'";
				$req_nlu .= " WHERE abonne_id='".$res_nl['abonne_id']."'";
				$sql_nlu = mysql_query($req_nlu);
			}
		
			?><script type="text/javascript">alerte_message('Emails mis à jour avec succès'); </script><?php
		}
		
		if($_action == "post_envoyer"){
			$send_date = time();
			$sql_upd = mysql_query("UPDATE newsletter SET newsletter_sended='".$send_date."' WHERE newsletter_id='".$_POST['newsletter']."'");
			$sql_newsletter =  mysql_query("SELECT * FROM newsletter WHERE newsletter_id='".$_POST['newsletter']."'");
			$res_newsletter = mysql_fetch_array($sql_newsletter);
			$subject = ucfirst(stripslashes($res_newsletter['newsletter_subject']));
			$body = stripslashes($res_newsletter['newsletter_body']);

			$body = preg_replace('/<a(.*)href=\"(.*?)\"(.*)>(.*?)<\/a>/', "<a \\1 href=\"\\2&_fnlid=".$res_newsletter['newsletter_uid']."\" \\3>\\4</a>", $body);
			$body = preg_replace('/\.html&/', ".html?&", $body);

			$body = ereg_replace('/\&', "/?&", $body);
			$listEmail = array();
			
			if(ereg('^admin_',$_POST['send_to'])){
				$admin_id = ereg_replace('^admin_','',$_POST['send_to']);
				$sql_admin = mysql_query("SELECT * FROM admin_users WHERE admin_id='".intval($admin_id)."'");
				while($res_admin = mysql_fetch_array($sql_admin)){
					$listEmail[] = array(
						'email'=>$res_admin['admin_email'],
						'desabo'=>''
					);
				}
			}else{
				if(($_POST['send_to']=="all")OR($_POST['send_to']=="newsletter_only")){
					$sql_abonnes = mysql_query("SELECT * FROM newsletter_abonnes");
					while($res_abonnes = mysql_fetch_array($sql_abonnes)){
						$listEmail[] = array(
							'email'=>$res_abonnes['abonne_email'],
							'desabo'=>$res_abonnes['abonne_uid']
						);
					}
				}else{
					
					$req_abonnes = "SELECT * FROM newsletter_abonnes WHERE ";
					switch($_POST['send_to']){
						case 'bureau':
							$req_abonnes .= "abonne_bureau=1";
						break;
						case 'ca':
							$req_abonnes .= "abonne_ca=1";
						break;
						case 'bureau_ca':
							$req_abonnes .= "abonne_bureau_elargi=1";
						break;
						case 'asso':
							$req_abonnes .= "abonne_pers_asso=1";
						break;
						case 'ecoles':
							$req_abonnes .= "abonne_ecole=1";
						break;
						case 'asso_groupe':
							$req_abonnes .= "abonne_asso_groupe=1";
						break;
						case 'parent':
							$req_abonnes .= "abonne_parent=1";
						break;
							
							
					}
					$sql_abonnes = mysql_query($req_abonnes);
					while($res_abonnes = mysql_fetch_array($sql_abonnes)){
						$listEmail[] = array(
							'email'=>$res_abonnes['abonne_email'],
							'desabo'=>$res_abonnes['abonne_uid']
						);
					}
				}
				
				
				
				
				
				
			}
			$res_perso = mysql_query("SELECT * FROM emails WHERE email_id='automate'");
			$row_perso = mysql_fetch_array($res_perso);


			foreach($listEmail as $k=>$e){
				
				$accept_email = true;

				$from_email = explode(";",$row_perso['email_adresse']);
				
				if($accept_email){
					$dlink = ($e['desabo']!='') ? 'Si vous ne souhaitez plus recevoir de newsletter de la part d\'Amitité Cévenole, cliquez ce lien <a href="http://'.$Config['HTTP_HOSTNAME'].'/newsletter.html?uid='.$e['desabo'].'">http://'.$Config['HTTP_HOSTNAME'].'/newsletter.html?uid='.$e['desabo'].'</a>' : '';
					$myEmail=new eMail($row_perso['email_nom'],trim($from_email[0]),$e['email']);
					$params = array(
						'SUBJECT'=>$subject,
						'BODY'=>$body,
						'CLIENT'=>$e['email'],
						'NLUID'=>$res_newsletter['newsletter_id'],
						'HTTP_HOST'=>$Config['HTTP_HOSTNAME'],
						'SERVER_HOST'=>$Config['HTTP_HOSTNAME'],
						'NLID'=>$res_newsletter['newsletter_uid'],
						'DATE'=>date_fr(time())." @ ".date('H:i:s'),
						'DESABO'=>$dlink
					);
					$myEmail->setTemplate(__PATH_MAIL__, "newsletter","fr");
					$myEmail->setSubject($subject);
					$myEmail->setBody($params);
					$result = $myEmail->send();
				}
			}
			
			?><script type="text/javascript">alerte_message('Newsletter envoyée avec succès'); </script><?php
			
		}



		
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Listing des newsletters</h1></td>
			</tr>
			<tr>
				<td>
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td colspan="7" align="center">Actuellement, <strong><?php

							$sql_e = mysql_query("SELECT * FROM newsletter_abonnes");
							$nb_e = mysql_num_rows($sql_e);
							echo ($nb_e>1) ? $nb_e.' abonnés':$nb_e.' abonné';
							$total_abonnes = $nb_e;
							?> </strong>à la newsletter
							</td>
						</tr>
						<tr>
							<td colspan="7" align="right">
								<input type="button" value="Créer une nouvelle newsletter" onclick="window.location=('newsletter.php?method=newsletter&amp;action=ajouter')" class="bt_ajouter" />
							</td>
						</tr>
						<tr>
							<th width="480" class="barre_titre">Sujet</th>
							<th width="80" class="barre_titre">Créée le</th>
							<th width="80" class="barre_titre">Envoyée le</th>
							<th width="90" colspan="4" class="barre_titre">&nbsp;</th>
						</tr>
						<?php
						$row=2;
						$sql_newsletter = mysql_query("SELECT * FROM newsletter ORDER BY newsletter_created DESC");
						while($res_newsletter = mysql_fetch_array($sql_newsletter)){
							$row = ($row==2) ? 1 : 2;
							?>
							<tr>
								<td class="row_<?php echo $row; ?>"><?php echo stripslashes($res_newsletter['newsletter_subject']); ?></td>
								<td class="row_<?php echo $row; ?>"><?php echo date('d-m-Y',$res_newsletter['newsletter_created']); ?></td>
								<td class="row_<?php echo $row; ?>"><?php echo ($res_newsletter['newsletter_sended']!='') ? date('d-m-Y',$res_newsletter['newsletter_sended']) :'--'; ?></td>
								<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="newsletter.php?method=newsletter&amp;action=modifier&amp;id=<?php echo $res_newsletter['newsletter_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
								<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="newsletter.php?method=newsletter&amp;action=supprimer&amp;id=<?php echo $res_newsletter['newsletter_id']; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
								<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="javascript:void(0);" onclick="preview_newsletter(<?php echo $res_newsletter['newsletter_id']; ?>);"><img src="/templates/backoffice/images/apercu.png" border="0" alt="apercu" /></a></td>
								<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="newsletter.php?method=newsletter&amp;action=envoyer&amp;id=<?php echo $res_newsletter['newsletter_id']; ?>"><img src="/templates/backoffice/images/newsletter_send.png" border="0" alt="envoyer" /></a></td>
							</tr>
							<?php
						}
						?>
						<tr>
							<td colspan="7"></td>
						</tr>
						<tr>
							<td colspan="7" align="right">
								<input type="button" value="Créer une nouvelle newsletter" onclick="window.location=('newsletter.php?method=newsletter&amp;action=ajouter')" class="bt_ajouter" />
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php
	break;


	case 'ajouter':
		
		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$('sub_nl').addEvent('click',function(e){
				var e = new Event(e).stop();
				$('body').value = CKEDITOR.instances.body.getData() ;
				$('form_nl').submit();
			});
			$('body').ckeditor({
				toolbar:"NL",
			});
		});
		</script>
		
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Créer une nouvelle newsletter</h1></td>
			</tr>
			<tr>
				<td>
					<form action="newsletter.php" id="form_nl" method="post">
					<input type="hidden" name="method" value="newsletter" />
					<input type="hidden" name="action" value="post_ajouter" />
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<th>Sujet</th>
							<td><input type="text" name="subject" id="subject" size="60" /></td>
						</tr>
						<tr>
							<th valign="top">Message</th>
							<td><textarea name="body" id="body"></textarea></td>
						</tr>
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" value="Enregistrer" id="sub_nl" class="bt_valider" />
							</td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>
		<?php
	break;
	
	case 'modifier' :
		$sql_newsletter = @mysql_query("SELECT * FROM newsletter WHERE newsletter_id='".$_GET['id']."'");
		$res_newsletter = @mysql_fetch_array($sql_newsletter);
		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$('sub_nl').addEvent('click',function(e){
				var e = new Event(e).stop();
				$('body').value = CKEDITOR.instances.body.getData() ;
				$('form_nl').submit();
			});
			$('body').ckeditor({
				toolbar:"NL",
			});
		});
		</script>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Modifier une newsletter</h1></td>
			</tr>
			<tr>
				<td>
					<form action="newsletter.php" id="form_nl" method="post">
					<input type="hidden" name="method" value="newsletter" />
					<input type="hidden" name="action" value="post_modifier" />
					<input type="hidden" name="newsletter" value="<?php echo $_GET['id']; ?>" />
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<th>Sujet</th>
							<td><input type="text" name="subject" id="subject" size="60" value="<?php echo stripslashes($res_newsletter['newsletter_subject']); ?>" /></td>
						</tr>
						<tr>
							<th valign="top">Message</th>
							<td><textarea name="body" id="body"><?php echo stripslashes($res_newsletter['newsletter_body']); ?></textarea></td>
						</tr>
						<tr>
							<td colspan="2"></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" value="Enregistrer" id="sub_nl" class="bt_valider" />
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
				<td><h1>Supprimer une newsletter</h1></td>
			</tr>
			<tr>
				<td>
					<form action="newsletter.php" method="post">
					<input type="hidden" name="method" value="newsletter" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="newsletter" value="<?php echo $_GET['id']; ?>" />
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
	case 'envoyer' :
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Envoyer une newsletter</h1></td>
			</tr>
			<tr>
				<td>
					<form name="newsletter" action="newsletter.php" method="post">
					<input type="hidden" name="method" value="newsletter" />
					<input type="hidden" name="action" value="post_envoyer" />
					<input type="hidden" name="newsletter" value="<?echo $_GET['id']; ?>" />
					<table border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td class="DeFont" align="left">Envoyer la newsletter :</td>
							<td class="DeFont" align="left"><select name="send_to">
								<option value="newsletter_only">à tous les abonnés de la newsletter</option>
								<option value="">------------------------------------------------------------</option>
								
								
								<option value="bureau">uniquement aux membres du Bureau</option>
								<option value="ca">uniquement aux membres du CA</option>
								<option value="bureau_ca">uniquement aux membres du Bureau / CA élargi</option>
								<option value="asso">uniquement aux membres du Pers. Asso</option>
								<option value="ecoles">uniquement aux Ecoles</option>
								<option value="asso_groupe">uniquement aux Assos / Grp</option>
								<option value="parent">uniquement aux Parents</option>

								
								<option value="">------------------------------------------------------------</option>
								
								
								<?php
								$sql_admin = mysql_query("SELECT * FROM admin_users ORDER BY admin_nom ASC");
								while($res_admin = mysql_fetch_array($sql_admin)){
									?>
									<option value="admin_<?php echo $res_admin['admin_id']; ?>">à <?php echo stripslashes($res_admin['admin_nom']); ?> uniquement</option>
									<?php

								}
								?>
							</select></td>
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

	case 'import' :
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Importer des adresses emails</h1></td>
			</tr>
			<tr>
				<td>
					<form name="newsletter" action="newsletter.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="method" value="newsletter" />
					<input type="hidden" name="action" value="post_importer" />
					<table border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td align="left">Collez les adresses emails séparées par un point virgule (;)</td>
						</tr>
						<tr>
							<td align="left"><textarea name="import_email" rows="25" cols="95"></textarea></td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" value="Valider" class="bt_valider" />
							</td>
						</tr>
						<tr>
							<td align="left">Importation de fichier CSV</td>
						</tr>
						<tr>
							<td align="left"><input type="file" name="import_csv" size="45" /></td>
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
	case 'qualif' :
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Classement des adresses emails</h1></td>
			</tr>
			<tr>
				<td>
					<form name="newsletter" action="newsletter.php" method="post">
					<input type="hidden" name="method" value="newsletter" />
					<input type="hidden" name="action" value="post_qualifier" />
					<table width="100%" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<th width="200" align="left" class="barre_titre">Email</th>
							<th width="50" align="center" class="barre_titre">Bureau</th>
							<th width="50" align="center" class="barre_titre">CA</th>
							<th width="50" align="center" class="barre_titre">Bureau/<br />CA élargi</th>
							<th width="50" align="center" class="barre_titre">Pers. Asso</th>
							<th width="50" align="center" class="barre_titre">Ecoles</th>
							<th width="50" align="center" class="barre_titre">Assos/Grp</th>
							<th width="50" align="center" class="barre_titre">Parents</th>
						</tr>

						<?php
						$sql_nl = mysql_query("SELECT * FROM newsletter_abonnes ORDER BY abonne_id DESC");
						while($res_nl = mysql_fetch_array($sql_nl)){
							?>
							<tr>
								<td align="left"><?php echo $res_nl['abonne_email']; ?></td>
								<td align="center"><input type="checkbox" name="bureau_<?php echo $res_nl['abonne_id']; ?>" value="1" <?php echo ($res_nl['abonne_bureau']=='1')?'checked':''; ?> /></td>
								<td align="center"><input type="checkbox" name="ca_<?php echo $res_nl['abonne_id']; ?>" value="1" <?php echo ($res_nl['abonne_ca']=='1')?'checked':''; ?> /></td>
								<td align="center"><input type="checkbox" name="bureauelargi_<?php echo $res_nl['abonne_id']; ?>" value="1" <?php echo ($res_nl['abonne_bureau_elargi']=='1')?'checked':''; ?> /></td>
								<td align="center"><input type="checkbox" name="persasso_<?php echo $res_nl['abonne_id']; ?>" value="1" <?php echo ($res_nl['abonne_pers_asso']=='1')?'checked':''; ?> /></td>
								<td align="center"><input type="checkbox" name="ecole_<?php echo $res_nl['abonne_id']; ?>" value="1" <?php echo ($res_nl['abonne_ecole']=='1')?'checked':''; ?> /></td>
								<td align="center"><input type="checkbox" name="assogrp_<?php echo $res_nl['abonne_id']; ?>" value="1" <?php echo ($res_nl['abonne_asso_groupe']=='1')?'checked':''; ?> /></td>
								<td align="center"><input type="checkbox" name="parent_<?php echo $res_nl['abonne_id']; ?>" value="1" <?php echo ($res_nl['abonne_parent']=='1')?'checked':''; ?> /></td>
							</tr>
							<?php
						}
						?>
						<tr>
							<td align="left">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" align="right">
								<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" value="Enregistrer" class="bt_valider" />
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