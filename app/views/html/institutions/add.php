<div class="help">
	<?php load_partial("menu"); ?>
        <?php load_partial("institutions_submenu"); ?>
</div>
<div id="institution">
	<form action="" method="post" onsubmit="this.updateinst.disabled=true;">
		<label for="realmid">Institution realm</label>
		<?php
			echo select_tag($rids, 'realmid');
                ?>
		<label for="type">Type:</label>
			<select name="type">
				<option value="1" <?php if($institution["type"] == 1) echo'selected=\"selected\"'; ?>>idP</option>
				<option value="2" <?php if($institution["type"] == 2) echo'selected=\"selected\"'; ?>>SP</option>
				<option value="3" <?php if($institution["type"] == 3) echo'selected=\"selected\"'; ?>>idP & SP</option>
			</select>
		<label for="stage">Institutions's stage:</label>
			<select name="stage">
				<option value="0" >preproduction/test</option>
				<option value="1" selected>active</option>
			</select>
		<label for="inst_realm">Institution Realm (for IdPs only)</label>
			<input type="text" name="inst_realm" value="<?php echo $institution["inst_realm"] ?>" />
		<label for="org_name">Institution Corporate Name</label>
			<input type="text" name="org_name" value="<?php echo $institution["org_name"] ?>"/>
		<label for="address_street">Institution Adress</label>
			<input type="text" name="address_street" value="<?php echo $realm["address_street"] ?>"/>
		<label for="address_city">Institution City</label>
			<input type="text" name="address_city" value="<?php echo $institution["address_city"] ?>"/>
		<label for="contact_name">Institution Representative Name</label>
			<input type="text" name="contact_name" value="<?php echo $institution["contact_name"] ?>"/>
		<label for="contact_email">Institution Representative Email</label>
			<input type="text" name="contact_email" value="<?php echo $institution["contact_email"] ?>"/>
		<label for="contact_phone">Institution Representative Phone</label>
			<input type="text" name="contact_phone" value="<?php echo $institution["contact_phone"] ?>"/>
		<label for="contact_type">Contact type:</label>
			<select name="contact_type">
				<option value="0" >person</option>
				<option value="1" >service/department</option>
			</select>
		<label for="contact_privacy">Contact privacy:</label>
			<select name="contact_privacy">
				<option value="0" >private</option>
				<option value="1" >public</option>
			</select>
		<label for="info_URL">Institution Web Page</label>
			<input type="text" name="info_URL" value="<?php echo $institution["info_URL"] ?>"/>
		<label for="policy_URL">Institution Policy Web Page</label>
			<input type="text" name="policy_URL" value="<?php echo $institution["policy_URL"] ?>"/>
		<p>
			<input type="submit" value="Add">
		</p>
    </form>
</div>