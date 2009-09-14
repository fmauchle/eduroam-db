<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_ser_logs_submenu"); ?>
</div>
<div id="monser">
	<p class="splash">
		Last modification timestamp is: <?php echo $mons['ts']; ?>
	</p>
	<form action="" method="post" onsubmit="this.updatemonserlog.disabled=true;">
		<input type="hidden" name="action" value="updatemonserlog" />
		<label for="mon_serid">ID of Monitored Server</label>
                    <?php echo select_tag($ms, 'mon_serid', $mons['mon_serid']); ?>
		<label for="mon_type">Type of performed tests:</label>
			<select name="mon_type">
				<option value="0" <?php if($mons['mon_type'] == "0") echo "selected=\"selected\""; ?>>PAP</option>
				<option value="1" <?php if($mons['mon_type'] == "1") echo "selected=\"selected\""; ?>>EAP-TTLS</option>
			</select>
		<label for="status">Status:</label>
			<select name="status">
				<option value="0" <?php if($mons['status'] == "0") echo "selected=\"selected\""; ?>>Ok (default)</option>
                                <option value="-1" <?php if($mons['status'] == "-1") echo "selected=\"selected\""; ?>>Reject logic test failed</option>
                                <option value="-2" <?php if($mons['status'] == "-2") echo "selected=\"selected\""; ?>>Accept logic test failed</option>
				<option value="-3" <?php if($mons['status'] == "-3") echo "selected=\"selected\""; ?>>Both tests failed</option>
			</select>
		<label for="a_resp_time">Response time for accept test</label>
			<input type="text" name="a_resp_time" value="<?php echo $mons['a_resp_time'] ?>" />
		<label for="r_resp_time">Response time for reject test</label>
			<input type="text" name="r_resp_time" value="<?php echo $mons['r_resp_time'] ?>" />
		<label for="last_mon_logid">ID of The Last Successful Monitoring Job</label>
			<?php echo select_tag($ms, 'mon_logid', $mons['mon_logid']); ?>
		<p>
			<input type="submit" name="updatemonserlog" value="Update">
		</p>
    </form>
</div>