<div class="help">
	<?php load_partial("menu"); ?>
</div>
<div id="realm">
	<p class="splash">
		Last modification timestamp is: <?php echo $realm["ts"]; ?>
	</p>
	<form action="" method="post" onsubmit="this.updaterealm.disabled=true;">
		<input type="hidden" name="action" value="updaterealm" />
		<label for="country">Federation’s two letter country code</label>
		    <input type="text" name="country" value="<?php echo $realm["country"] ?>" />
		<label for="stype">Service type:</label>
			<select name="stype">
				<option value="0" <?php if($realm["stype"] == 0) echo'selected=\"selected\"'; ?>>FLRS</option>
				<option value="1" <?php if($realm["stype"] == 1) echo'selected=\"selected\"'; ?>>(E)TLRS</option>
			</select>
		<label for="org_name">NRO Corporate name</label>
			<input type="text" name="org_name" value="<?php echo $realm["org_name"] ?>" />
		<label for="address_street">NRO Adress</label>
			<input type="text" name="address_street" value="<?php echo $realm["address_street"] ?>"/>
		<label for="address_city">NRO City</label>
			<input type="text" name="address_city" value="<?php echo $realm["address_city"] ?>"/>
		<label for="contact_name">NRO Representative Name</label>
			<input type="text" name="contact_name" value="<?php echo $realm["contact_name"] ?>"/>
		<label for="contact_email">NRO Representative Email</label>
			<input type="text" name="contact_email" value="<?php echo $realm["contact_email"] ?>"/>
		<label for="contact_phone">NRO Representative Phone</label>
			<input type="text" name="contact_phone" value="<?php echo $realm["contact_phone"] ?>"/>
		<label for="info_URL">NRO Web Page</label>
			<input type="text" name="info_URL" value="<?php echo $realm["info_URL"] ?>"/>
		<label for="policy_URL">NRO Policy Web Page</label>
			<input type="text" name="policy_URL" value="<?php echo $realm["policy_URL"] ?>"/>
		<p>
			<input type="submit" name="updaterealm" value="Update">
		</p>
    </form>
</div>