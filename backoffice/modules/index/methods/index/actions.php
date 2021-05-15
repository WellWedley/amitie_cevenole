<br />
<script type="text/javascript" src ="/backoffice/modules/index/methods/index/actions.js"></script>
<?php
$_action = ($_POST['action']!='') ? $_POST['action'] : $_GET['action'];


switch($_action){
	default:
		?>
		<table width="750" border="0" cellpadding="4" cellspacing="0">
			<tr>
				<td><h1>Accueil</h1></td>
			</tr>
			<?php
			if($Config['TEST_MODE']){
				?>
					<tr>
						<td align="center"><?php echo '<p><strong>ATTENTION : Mode de Test Actif !</strong></p>'; ?></td>
					</tr>
				<?php
			}
			?>
		</table>
		<?php
	break;

}
?>