<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_ser_logs_submenu"); ?>
</div>
<div id="monser">
	<form action="" method="post" onsubmit="this.addmonserlog.disabled=true;">
		<input type="hidden" name="action" value="addmonserlog" />
		<label for="mon_serid">ID of Monitored Server</label>
                    <?php echo select_tag($mons, 'mon_serid'); ?>
		<label for="mon_type">Type of performed tests:</label>
			<select name="mon_type">
				<option value="0" >PAP</option>
				<option value="1" >EAP-TTLS</option>
			</select>
		<label for="status">Status:</label>
			<select name="status">
				<option value="0" >Ok (default)</option>
                                <option value="-1" >Reject logic test failed</option>
                                <option value="-2" >Accept logic test failed</option>
				<option value="-3" >Both tests failed</option>
			</select>
		<label for="a_resp_time">Response time for accept test</label>
			<input type="text" name="a_resp_time" />
		<label for="r_resp_time">Response time for reject test</label>
			<input type="text" name="r_resp_time" />
		<label for="last_mon_logid">ID of The Last Successful Monitoring Job</label>
			<?php echo select_tag($mls, 'mon_logid'); ?>
		<p>
			<input type="submit" name="addmonserlog" value="Add">
		</p>
    </form>
</div>