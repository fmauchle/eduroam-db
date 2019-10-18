<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("realms_submenu"); ?>
</div>
<div id="realm">
	<form action="" method="post" onsubmit="this.updaterealm.disabled=true;">
		<input type="hidden" name="action" value="addrealm" />
		<label for="country">Federation’s two letter country code</label>
		    <input type="text" name="country" />
		<label for="roid">Federation’s ROid (assigned by GEANT)</label>
		    <input type="text" name="roid" />
		<label for="stype">Service type:</label>
			<select name="stype">
				<option value="0" >FLRS</option>
				<option value="1" >(E)TLRS</option>
			</select>
		<label for="stage">Federations's stage:</label>
			<select name="stage">
				<option value="0" >preproduction/test</option>
				<option value="1" selected>active</option>
			</select>
		<label for="org_name">NRO Corporate name</label>
			<input type="text" name="org_name" />
		<label for="address_street">NRO Adress</label>
			<input type="text" name="address_street" />
		<label for="address_city">NRO City</label>
			<input type="text" name="address_city" />
		<label for="contact_name">NRO Representative Name</label>
			<input type="text" name="contact_name" />
		<label for="contact_email">NRO Representative Email</label>
			<input type="text" name="contact_email" />
		<label for="contact_phone">NRO Representative Phone</label>
			<input type="text" name="contact_phone" />
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
		<label for="info_URL">NRO Web Page</label>
			<input type="text" name="info_URL" />
		<label for="policy_URL">NRO Policy Web Page</label>
			<input type="text" name="policy_URL" />
		<p>
			<input type="submit" name="addrealm" value="Add">
		</p>
    </form>
</div>