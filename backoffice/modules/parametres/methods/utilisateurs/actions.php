<br />
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
switch($_action){
	default:
	case 'post_modifier':
	case 'post_ajouter':
	case 'post_supprimer':
		if($_action == 'post_ajouter'){
			$sql_ins = mysql_query("INSERT INTO admin_users (admin_nom, admin_pwd, admin_login, admin_email) VALUES ('".addslashes($_POST['nom'])."','".md5($_POST['pwd'])."','".$_POST['login']."','".$_POST['email']."')");
			$admin_id = mysql_insert_id();
			foreach($ModulesOrder as $k=>$e){
				if($_POST['perm_'.$e[0]] == $e[0]){
					$sql_ins = mysql_query("INSERT INTO admin_privileges (admin_id, module) VALUES ('".$admin_id."','".$e[0]."')");
				}
			}
			?><script type="text/javascript">alerte_message('Utilisateur ajouté avec succès'); </script><?php

		}

		if($_action == 'post_modifier'){
			$sql_upd = mysql_query("UPDATE admin_users  SET
				admin_nom='".addslashes($_POST['nom'])."',
				admin_login='".$_POST['login']."',
				admin_email='".$_POST['email']."'
			WHERE admin_id='".$_POST['utilisateur']."'");
			

			$sql_client = mysql_query("SELECT * FROM admin_users WHERE admin_id='".$_POST['utilisateur']."'");
			$res_client = mysql_fetch_array($sql_client);
			if(($_POST['pwd']!='') AND ($res_client['admin_pwd']!= md5($_POST['pwd']))){
				$sql_upd = mysql_query("UPDATE admin_users SET admin_pwd='".md5($_POST['pwd'])."' WHERE admin_id='".$_POST['utilisateur']."'");
			}


			$sql_client = mysql_query("DELETE FROM admin_privileges WHERE admin_id='".$_POST['utilisateur']."'");
			foreach($ModulesOrder as $k=>$e){
			
				if($_POST['perm_'.$e[0]] == $e[0]){
					$sql_ins = mysql_query("INSERT INTO admin_privileges (admin_id, module) VALUES ('".$_POST['utilisateur']."','".$e[0]."')");
				}
			}
			
			?><script type="text/javascript">alerte_message('Utilisateur modifié avec succès'); </script><?php
		}
		
		if($_action == 'post_supprimer'){
			$sql_client = mysql_query("DELETE FROM admin_privileges WHERE admin_id='".$_POST['utilisateur']."'");
			$sql_del = mysql_query("DELETE FROM admin_users WHERE admin_id='".$_POST['utilisateur']."'");
			
			?><script type="text/javascript">alerte_message('Utilisateur supprimé avec succès'); </script><?php

		}

		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Utilisateurs du Backoffice</h1></td>
			</tr>
			<tr>
				<td>
					<table width="730" border="0" cellpadding="4" cellspacing="0">
						<tr>
							<td colspan="5" align="right">
								<input type="button" value="Ajouter un utilisateur" onclick="window.location=('parametres.php?method=utilisateurs&amp;action=ajouter')" class="bt_ajouter" />
							</td>
						</tr>
						<tr>
							<td>
								<table width="730" border="0" cellpadding="4" cellspacing="0">
									<tr>
										<th class="barre_titre">Utilisateur</th>
										<th class="barre_titre" colspan="2"></th>
									<?php
									$sql_users = mysql_query("SELECT * FROM admin_users");
									$row=2;
									while($res_users  = mysql_fetch_array($sql_users )){
										$row = ($row==2) ? 1 : 2;
										?>
										<tr>
											<td class="row_<?php echo $row; ?>"><?php echo stripslashes($res_users['admin_nom']); ?></td>
											<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="parametres.php?method=utilisateurs&amp;action=modifier&amp;id=<?php echo $res_users['admin_id']; ?>"><img src="/templates/backoffice/images/modifier.png" border="0" alt="modifier" /></a></td>
											<td class="row_<?php echo $row; ?>" width="20" align="center"><a href="parametres.php?method=utilisateurs&amp;action=supprimer&amp;id=<?php echo $res_users['admin_id']; ?>"><img src="/templates/backoffice/images/supprimer.png" border="0" alt="supprimer" /></a></td>
										</tr>
										<?php
									}
									?>
								</table>
							</td>
						</tr>
						<tr>
							<td colspan="5" align="right">
								<input type="button" value="Ajouter un utilisateur" onclick="window.location=('parametres.php?method=utilisateurs&amp;action=ajouter')" class="bt_ajouter" />
							</td>
						</tr>
					</table>
					</form>
				</td>
			</tr>
		</table>
		<?php
	break;
	case 'ajouter':
		?>

		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Editer un utilisateur</h1></td>
			</tr>
			<tr>
			<td>
				<form action="parametres.php" method="post">
				<input type="hidden" name="method" value="utilisateurs" />
				<input type="hidden" name="action" value="post_ajouter" />
				<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<th class="barre_titre" colspan="2">Identifiants de connexion</th>
					</tr>
					<tr>
						<th>Login</th>
						<td><input type="text" id="login" name="login" value="<?php echo $res_client['admin_login']; ?>" size="45" /></td>
					</tr>
					<tr>
						<th>Nouveau mot de passe</th>
						<td><input type="text" id="pwd" name="pwd" size="45" /></td>
					</tr>
					<tr>
						<th class="barre_titre" colspan="2">Infos utilisateur</th>
					</tr>
					<tr>
						<th>Nom complet</th>
						<td><input type="text" id="nom" name="nom" size="45" value="<?php echo stripslashes($res_client['admin_nom']); ?>" /></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><input type="text" id="email" name="email" size="45" value="<?php echo stripslashes($res_client['admin_email']); ?>" /></td>
					</tr>
					<tr>
						<th class="barre_titre" colspan="2">Autorisations</th>
					</tr>
					<?php
					foreach($ModulesOrder as $k=>$e){
						$sql = mysql_query("SELECT * FROM admin_privileges WHERE admin_id='".$res_client['admin_id']."' AND module='".$e[0]."'");
						?>
						<tr>
							<th><?php echo $e[1]; ?></th>
							<td><input type="checkbox" id="perm_<?php echo $e[0]; ?>" name="perm_<?php echo $e[0]; ?>" value="<?php echo $e[0]; ?>"<?php echo (mysql_num_rows($sql)>0)?'checked':''; ?> /></td>
						</tr>
						<?php
					}
					?>

					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_client" value="Enregistrer" class="bt_valider" />
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
		$sql_client = mysql_query("SELECT * FROM admin_users WHERE admin_id='".$_GET['id']."'");
		$res_client = mysql_fetch_array($sql_client);
		?>

		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Editer un utilisateur</h1></td>
			</tr>
			<tr>
			<td>
				<form action="parametres.php" method="post">
				<input type="hidden" name="method" value="utilisateurs" />
				<input type="hidden" name="action" value="post_modifier" />
				<input type="hidden" name="utilisateur" id="utilisateur" value="<?php echo $_GET['id']; ?>" />
				<table border="0" cellpadding="4" cellspacing="0">
					<tr>
						<th class="barre_titre" colspan="2">Identifiants de connexion</th>
					</tr>
					<tr>
						<th>Login</th>
						<td><input type="text" id="login" name="login" value="<?php echo $res_client['admin_login']; ?>" size="45" /></td>
					</tr>
					<tr>
						<th>Nouveau mot de passe</th>
						<td><input type="text" id="pwd" name="pwd" size="45" /></td>
					</tr>
					<tr>
						<th class="barre_titre" colspan="2">Infos utilisateur</th>
					</tr>
					<tr>
						<th>Nom complet</th>
						<td><input type="text" id="nom" name="nom" size="45" value="<?php echo stripslashes($res_client['admin_nom']); ?>" /></td>
					</tr>
					<tr>
						<th>Email</th>
						<td><input type="text" id="email" name="email" size="45" value="<?php echo stripslashes($res_client['admin_email']); ?>" /></td>
					</tr>
					<tr>
						<th class="barre_titre" colspan="2">Autorisations</th>
					</tr>
					<?php
					foreach($ModulesOrder as $k=>$e){
						$sql = mysql_query("SELECT * FROM admin_privileges WHERE admin_id='".$res_client['admin_id']."' AND module='".$e[0]."'");
						?>
						<tr>
							<th><?php echo $e[1]; ?></th>
							<td><input type="checkbox" id="perm_<?php echo $e[0]; ?>" name="perm_<?php echo $e[0]; ?>" value="<?php echo $e[0]; ?>"<?php echo (mysql_num_rows($sql)>0)?'checked':''; ?> /></td>
						</tr>
						<?php
					}
					?>

					<tr>
						<td colspan="2" align="right">
							<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_client" value="Enregistrer" class="bt_valider" />
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
				<td><h1>Supprimer un utilisateur</h1></td>
			</tr>
			<tr>
				<td>
					<form action="parametres.php" method="post">
					<input type="hidden" name="method" value="utilisateurs" />
					<input type="hidden" name="action" value="post_supprimer" />
					<input type="hidden" name="utilisateur" value="<?php echo $_GET['id']; ?>" />
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