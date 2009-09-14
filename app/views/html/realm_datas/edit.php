<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("realm_datas_submenu"); ?>
</div>
<div id="realm">
	<p class="splash">
		Last modification timestamp is: <?php echo $realmd['ts']; ?>
	</p>
	<form action="" method="post" onsubmit="this.updaterealm.disabled=true;">
		<input type="hidden" name="action" value="updaterealmdata" />
		<label for="realmid">ID of Representative Realm</label>
		<?php
			echo select_tag($rids, 'realmid', $realmd['realmid']);
                ?>
		<label for="number_inst">Number of institutions eligible to participate</label>
			<input type="text" name="number_inst" value="<?php echo $realmd['number_inst'] ?>" />
		<label for="number_user">Number of users eligible to participate</label>
			<input type="text" name="number_user" value="<?php echo $realmd['number_user'] ?>" />
		<label for="number_id">Number of e-identities eligible to authentificate</label>
			<input type="text" name="number_id" value="<?php echo $realmd['number_id'] ?>" />
		<label for="number_IdP">Number of institutions as IdP</label>
			<input type="text" name="number_IdP" value="<?php echo $realmd['number_IdP'] ?>" />
		<label for="number_SP">Number of institutions as SP</label>
			<input type="text" name="number_SP" value="<?php echo $realmd['number_SP'] ?>" />
		<label for="number_SPIdP">Number of institutions as IdP and SP</label>
			<input type="text" name="number_SPIdP" value="<?php echo $realmd['number_SPIdP'] ?>" />
		<p>
			<input type="submit" name="updaterealmdata" value="Update">
		</p>
    </form>
</div>