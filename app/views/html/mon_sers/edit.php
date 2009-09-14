<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_sers_submenu"); ?>
</div>
<div id="monser">
	<p class="splash">
		Last modification timestamp is: <?php echo $mons['ts']; ?>
	</p>
	<form action="" method="post" onsubmit="this.updatemonser.disabled=true;">
		<input type="hidden" name="action" value="updatemonser" />
		<label for="name">Server's (host)name</label>
			<input type="text" name="name" value="<?php echo $mons['name'] ?>" />
		<label for="mon_realmid">ID of Monitored Realm</label>
                    <?php
                        echo select_tag($rids, 'mon_realmid', $mons['mon_realmid']);
                    ?>
		<label for="ip">Server's IP</label>
			<input type="text" name="ip" value="<?php echo $mons['ip'] ?>" />
		<label for="port">Server's port</label>
			<input type="text" name="port" value="<?php echo $mons['port'] ?>" />
		<label for="timeout">Timeout for this server</label>
			<input type="text" name="timeout" value="<?php echo $mons['timeout'] ?>" />
		<label for="retry">Number of retries for this server</label>
			<input type="text" name="retry" value="<?php echo $mons['retry'] ?>" />
		<label for="secret">Secret for this server</label>
			<input type="text" name="secret" value="<?php echo $mons['secret'] ?>" />
		<label for="stype">Service type:</label>
			<select name="stype">
				<option value="0" <?php if($mons['stype'] == "0") echo "selected=\"selected\""; ?> >TLRS</option>
				<option value="1" <?php if($mons['stype'] == "1") echo "selected=\"selected\""; ?> >FLRS</option>
			</select>
		<label for="reject_only">Reject only for tests:</label>
			<select name="reject_only">
				<option value="0" <?php if($mons['reject_only'] == "0") echo "selected=\"selected\""; ?> >No (default)</option>
				<option value="1" <?php if($mons['reject_only'] == "1") echo "selected=\"selected\""; ?> >Yes</option>
			</select>
		<label for="radsec">Is a RadSec server:</label>
			<select name="radsec">
				<option value="0" <?php if($mons['radsec'] == "0") echo "selected=\"selected\""; ?> >No (default)</option>
				<option value="1" <?php if($mons['radsec'] == "1") echo "selected=\"selected\""; ?> >Yes</option>
			</select>
		<label for="monitoring">Monitor this server:</label>
			<select name="monitoring">
				<option value="-1" <?php if($mons['monitoring'] == "-1") echo "selected=\"selected\""; ?> >No</option>
				<option value="0" <?php if($mons['monitoring'] == "0") echo "selected=\"selected\""; ?> >Yes (default)</option>
			</select>
		<label for="last_mon_logid">ID of The Last Successful Monitoring Job</label>
                    <?php
                        echo select_tag($mls, 'last_mon_logid', $mons['last_mon_logid']);
                    ?>
                <p>
			<input type="submit" name="updatemonser" value="Update">
		</p>
    </form>
</div>