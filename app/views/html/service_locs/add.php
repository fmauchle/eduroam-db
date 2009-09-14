<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("service_locs_submenu"); ?>
</div>
<div id="service">
	<form action="" method="post" onsubmit="this.updateinst.disabled=true;">
		<input type="hidden" name="action" value="addservice" />
		<label for="institutionid">Institution it belongs</label>
		<?php
			echo select_tag($ins, 'institutionid');
                ?>
		<label for="longitude">Longitude</label>
			<input type="text" name="longitude" />
		<label for="latitude">Latitude</label>
			<input type="text" name="latitude" />
		<label for="loc_name">Location Name</label>
			<input type="text" name="loc_name" />
		<label for="address_street">Location Address</label>
			<input type="text" name="address_street" />
		<label for="address_city">Institution City</label>
			<input type="text" name="address_city" />
		<label for="contact_name">Contact Name</label>
			<input type="text" name="contact_name" />
		<label for="contact_email">Contact Email</label>
			<input type="text" name="contact_email" />
		<label for="contact_phone">Contact Phone</label>
			<input type="text" name="contact_phone" />
		<label for="SSID">SSID</label>
			<input type="text" name="ssid" />
		<label for="enc_level">Supported Encryption Levels <small>(separated by ",", ex: WPA/TKIP, WPA/AES, WPA2/TKIP, WPA2/AES)</small></label>
			<input type="text" name="enc_level" />
		<label for="port_restrict">Port Restrictions</label>
			<select name="port_restrict" >
				<option value="0">Inactive</option>
				<option value="1">Active</option>
			</select>
		<label for="transp_proxy">Uses Transparent Proxy</label>
			<select name="transp_proxy" >
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
		<label for="ipv6">Has IPv6</label>
			<select name="IPv6" >
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
		<label for="NAT">Uses NAT</label>
			<select name="NAT" >
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
		<label for="AP_no">Number of APs <small>(number of enabled sockets for wired access)</small></label>
			<input type="text" name="AP_no" />
		<label for="wired">Wired Access</label>
			<select name="wired" >
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
		<label for="info_URL">Institution Web Page</label>
			<input type="text" name="info_URL" />
		<p>
			<input type="submit" value="Add">
		</p>
    </form>
</div>