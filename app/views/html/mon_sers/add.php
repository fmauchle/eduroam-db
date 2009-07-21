<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_sers_submenu"); ?>
</div>
<div id="monser">
	<form action="" method="post" onsubmit="this.addmonser.disabled=true;">
		<input type="hidden" name="action" value="addmonser" />
		<label for="name">Server's (host)name</label>
			<input type="text" name="name" />
		<label for="mon_realmid">ID of Monitored Realm</label>
		    <select name="mon_realmid" >
                        <?php
                            foreach($rids as $i => $rid) {
                                echo "<option value=\"$i\" >$rid</option>";
                            }
                        ?>
                    </select>
		<label for="ip">Server's IP</label>
			<input type="text" name="ip" />
		<label for="port">Server's port</label>
			<input type="text" name="port" />
		<label for="timeout">Timeout for this server</label>
			<input type="text" name="timeout" />
		<label for="retry">Number of retries for this server</label>
			<input type="text" name="retry" />
		<label for="secret">Secret for this server</label>
			<input type="text" name="secret" />
		<label for="stype">Service type:</label>
			<select name="stype">
				<option value="0" >TLRS</option>
				<option value="1" >FLRS</option>
			</select>
		<label for="reject_only">Reject only for tests:</label>
			<select name="reject_only">
				<option value="0" >No (default)</option>
				<option value="1" >Yes</option>
			</select>
		<label for="radsec">Is a RadSec server:</label>
			<select name="radsec">
				<option value="0" >No (default)</option>
				<option value="1" >Yes</option>
			</select>
		<label for="monitoring">Monitor this server:</label>
			<select name="monitoring">
				<option value="-1" >No</option>
				<option value="0" >Yes (default)</option>
			</select>
		<label for="last_mon_logid">ID of The Last Successful Monitoring Job</label>
			<input type="text" name="last_mon_logid" />
		<p>
			<input type="submit" name="addmonser" value="Add">
		</p>
    </form>
</div>