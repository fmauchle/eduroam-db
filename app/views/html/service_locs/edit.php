<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("service_locs_submenu"); ?>
</div>
<div id="service">
	<p class="splash">
		Last modification timestamp is: <?php echo $service['ts']; ?>
	</p>
	<form action="" method="post" onsubmit="this.updateinst.disabled=true;">
		<input type="hidden" name="action" value="addservice" />
		<label for="institutionid">Institution it belongs</label>
		<?php
			echo select_tag($ins, 'institutionid', $service['institutionid']);
                ?>
		<label for="longitude">Longitude</label>
			<input type="text" name="longitude" value="<?php echo $service['longitude'] ?>" />
		<label for="latitude">Latitude</label>
			<input type="text" name="latitude" value="<?php echo $service['latitude'] ?>" />
		<label for="stage">Locations's stage:</label>
			<select name="stage">
				<option value="0" <?php if($service['stage'] == 0) echo'selected=\"selected\"'; ?>>preproduction/test</option>
				<option value="1" <?php if($service['stage'] == 1) echo'selected=\"selected\"'; ?>>active</option>
			</select>
		<label for="loc_name">Location Name</label>
			<input type="text" name="loc_name" value="<?php echo $service['loc_name'] ?>" />
		<label for="address_street">Location Address</label>
			<input type="text" name="address_street" value="<?php echo $service['address_street'] ?>" />
		<label for="address_city">Institution City</label>
			<input type="text" name="address_city" value="<?php echo $service['address_city'] ?>" />
		<label for="contact_name">Contact Name</label>
			<input type="text" name="contact_name" value="<?php echo $service['contact_name'] ?>" />
		<label for="contact_email">Contact Email</label>
			<input type="text" name="contact_email" value="<?php echo $service['contact_email'] ?>" />
		<label for="contact_phone">Contact Phone</label>
			<input type="text" name="contact_phone" value="<?php echo $service['contact_phone'] ?>" />
		<label for="SSID">SSID</label>
			<input type="text" name="SSID" value="<?php echo $service['SSID'] ?>" />
		<label for="enc_level">Supported Encryption Levels <small>(separated by ",", ex: WPA/TKIP, WPA/AES, WPA2/TKIP, WPA2/AES)</small></label>
			<input type="text" name="enc_level" value="<?php echo $service['enc_level'] ?>" />
		<label for="port_restrict">Port Restrictions</label>
			<select name="port_restrict" >
				<option value="0" <?php if($service['port_restrict'] == 0) echo 'selected="selected"';?> >Inactive</option>
				<option value="1" <?php if($service['port_restrict'] == 1) echo 'selected="selected"';?> >Active</option>
			</select>
		<label for="transp_proxy">Uses Transparent Proxy</label>
			<select name="transp_proxy" >
				<option value="0" <?php if($service['transp_proxy'] == 0) echo 'selected="selected"';?> >No</option>
				<option value="1" <?php if($service['transp_proxy'] == 1) echo 'selected="selected"';?> >Yes</option>
			</select>
		<label for="IPv6">Has IPv6</label>
			<select name="IPv6" >
				<option value="0" <?php if($service['IPv6'] == 0) echo 'selected="selected"';?> >No</option>
				<option value="1" <?php if($service['IPv6'] == 1) echo 'selected="selected"';?> >Yes</option>
			</select>
		<label for="NAT">Uses NAT</label>
			<select name="NAT" >
				<option value="0" <?php if($service['NAT'] == 0) echo 'selected="selected"';?> >No</option>
				<option value="1" <?php if($service['NAT'] == 1) echo 'selected="selected"';?> >Yes</option>
			</select>
		<label for="HS20">Provides Hotspot2.0</label>
			<select name="HS20" >
				<option value="0" <?php if($service['HS20'] == 0) echo 'selected="selected"';?>>No</option>
				<option value="1" <?php if($service['HS20'] == 1) echo 'selected="selected"';?>>Yes</option>
			</select>
		<label for="AP_no">Number of APs <small>(put 0 for none or unknown)</small></label>
			<input type="text" name="AP_no" value="<?php echo $service['AP_no'] ?>" />
		<label for="wired_no">Number of wired access ports <small>(put 0 for none or unknown)</small></label>
			<input type="text" name="wired_no" value="<?php echo $service['wired_no'] ?>" />
		<label for="info_URL">Institution Web Page</label>
			<input type="text" name="info_URL" value="<?php echo $service['info_URL'] ?>" />
		<p>
			<input type="submit" value="Update">
		</p>
    </form>
</div>