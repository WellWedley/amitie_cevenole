<table width="950" height="50" border="0" cellpadding="4" cellspacing="0" id="topmenu">
	<tr>
		<td valign="bottom" width="190">&nbsp;</td>

		<td valign="bottom" align="left">
			<table height="50" border="0" cellpadding="4" cellspacing="0">
				<tr>
					<?php
					foreach($ModulesOrder as $k=>$e){
						$sql = mysql_query("SELECT * FROM admin_privileges WHERE admin_id='".$_SESSION['user_registered']."' AND module='".$e[0]."'");
						if(mysql_num_rows($sql)>0){
							?>
							<td valign="bottom"><a href="<?php echo $e[0]; ?>.php"><?php echo $e[1]; ?></a></td>
							<td valign="bottom">|</td>
							<?php
						}
					}
					?>
					<td valign="bottom"><a href="logout.php">Déconnexion</a></td>
					<td>&nbsp;</td>
				</tr>
			</table>

		</td>

	</tr>
</table>