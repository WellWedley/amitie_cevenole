<?php
session_start();
include('../../../../includes/config.php');
include('../../../../includes/fonctions.php');
include('../../../../includes/bdd.php');
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];
$_carnet = ($_POST['carnet_id']!='') ? $_POST['carnet_id'] : $_GET['carnet_id'];
$_image = ($_POST['image_id']!='') ? $_POST['image_id'] : $_GET['image_id'];

?>
<html>
<head>
<link href="/templates/backoffice/backoffice.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/jscript/lib/mootools-1.2.3-core-nc.js"></script>
<script type="text/javascript" src="/jscript/lib/mootools-1.2.3-more-nc.js"></script>
<script type="text/javascript" src="/jscript/lib/functions.js"></script>
<script type="text/javascript" src="/backoffice/jscript/backoffice.js"></script>

<script type="text/javascript" src="/backoffice/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/backoffice/ckeditor/adapters/mootools.js"></script>
<style type="text/css">
body,html {margin:0;padding:0;height:100%; background: none;}
</style>
</head>

<body>
<?php
if($_action=="post_ajouter"){
	if(isset($_FILES['diapo_img']['tmp_name'])){
		if($ftp = ftp_connect($Config['FTP_HOSTNAME'])){
			if($log = ftp_login($ftp,$Config['FTP_USERNAME'],$Config['FTP_PASSWORD'])){
				if(!is_dir($Config['ROOT_PATH']."carnets/".$_POST['carnet_id']))
					mkdir($Config['ROOT_PATH']."carnets/".$_POST['carnet_id']);
					
				if(!is_dir($Config['ROOT_PATH']."carnets/".$_POST['carnet_id']."/diapos"))
					mkdir($Config['ROOT_PATH']."carnets/".$_POST['carnet_id']."/diapos");


		
				

				$sql_sejour = mysql_query("INSERT INTO carnets_diapo (
					diapo_carnet
				) VALUES (
					'".$_POST['carnet_id']."'
				)");
				$img_id = mysql_insert_id();

				$img_url = "carnets/".$_POST['carnet_id']."/diapos/".$img_id.".jpg";
					
				move_uploaded_file($_FILES['diapo_img']["tmp_name"],$Config['ROOT_PATH'].$img_url);
				
				$sql_upd = mysql_query("UPDATE carnets_diapo SET diapo_path='".$img_url."' WHERE diapo_id='".$img_id."'");



			}
			ftp_quit($ftp);
			clearstatcache();
		}
	}
	$_GET['carnet_id'] = $_POST['carnet_id'];

}

if($_action == "post_supprimer"){
	$sql_actu = mysql_query("SELECT * FROM carnets_diapo WHERE diapo_id='".$_GET['diapo_id']."' AND diapo_carnet='".$_GET['carnet_id']."'");
	$res_actu = mysql_fetch_array($sql_actu);
	@unlink($Config['ROOT_PATH'].$res_actu['diapo_path']);
	$sql_sejour = mysql_query("DELETE FROM carnets_diapo WHERE diapo_id='".$_GET['diapo_id']."' AND diapo_carnet='".$_GET['carnet_id']."'");
}
switch($_action){
	default:
	case 'listing':
	case 'post_ajouter':
	case 'post_modifier':
	case 'post_supprimer':
		?>
		<script type="text/javascript">
		window.addEvent('load', function(){
			$$('a[id^=delete_actu]').each(function(el){
				$(el).addEvent('click',function(e){
					if(confirm('Attention, toute suppression est définitive, cliquez sur OK pour continuer')){
						return true;
					}else{
						var e = new Event(e).stop();
						return false;
					}
				})
			})

		});
		</script>
		<table border="0" width="100%" cellspacing="4" cellmargin="0">
			<?php
			
			$sql_sejours = mysql_query("SELECT * FROM carnets_diapo WHERE diapo_carnet='".$_carnet."'");
			$nb_diapo = mysql_num_rows($sql_sejours);
			if($nb_diapo<5){
				?>
				<tr>
					<td align="right">
						

					<script type="text/javascript">
					window.addEvent('load', function(){
						$('projet_add').addEvent('click',function(e){
							var e = new Event(e).stop();
							document.location='/backoffice/modules/sejours/methods/sejours/carnet_diapo.php?action=ajouter&carnet_id=<?php echo $_carnet; ?>';
						})
			
					});
					</script>						
						
						
						<input type="button" value="Ajouter une image" id="projet_add" class="bt_ajouter" /></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td>
					<?php
					$sql_actu = mysql_query("SELECT * FROM carnets_diapo WHERE diapo_carnet='".$_carnet."'");
					if(mysql_num_rows($sql_actu)>0){
						while($res_actu = mysql_fetch_array($sql_actu)){
							?>
							<div style="float:left;margin:0 28px 10px 0 ; text-align:center;">
							<div style="height:85px;overflow:hidden; width:110px;background:#ede9e5 url('/misc/getImage.php?img=<?php echo $res_actu['diapo_path']; ?>&size=125') no-repeat center center;"><a href="/<?php echo $res_actu['diapo_path']; ?>" target="_blank" style="display:block; width:110px;height:85px; "></a></div>

							
							<p><a href="?action=post_supprimer&amp;diapo_id=<?php echo $res_actu['diapo_id']; ?>&amp;carnet_id=<?php echo $_carnet; ?>" id="delete_actu_<?php echo $res_actu['diapo_id']; ?>">Supprimer</a></p></div>
							<?php
						}
					}else{
						?>
						<p><strong>Aucune image pour ce carnet</strong></p>
						
						<?php
					}
					?>
				</td>
			</tr>
		</table>
		<?php
	break;

	case 'ajouter':
	case 'modifier':
		$sql_sejours = mysql_query("SELECT * FROM carnets_diapo WHERE diapo_carnet='".$_carnet."'");
		$res_sejours = mysql_fetch_array($sql_sejours);
		?>
		<form name="projet_frm" id="projet_frm" action="/backoffice/modules/sejours/methods/sejours/carnet_diapo.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="action" value="post_<?php echo $_action; ?>" />
		
		<input type="hidden" name="carnet_id" id="carnet_id" value="<?php echo $_carnet; ?>" />
		<table border="0" width="100%" cellspacing="0" cellpadding="4">
			<tr>
				<th class="barre_titre">Fichier image (*.JPG uniquement)</th>
			</tr>
			<tr>
				<td><input type="file" name="diapo_img" size="60" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="button" onclick="history.go(-1)" value="Annuler" class="bt_annuler" />&nbsp;<input type="submit" id="save_img" value="Enregistrer" class="bt_valider" />
				</td>
			</tr>
		</table>
		</form>
		<?php
	break;

}
?>

</body>
</html>
         