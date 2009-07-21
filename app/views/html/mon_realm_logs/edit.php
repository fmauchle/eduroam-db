<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_realm_logs_submenu"); ?>
</div>
<div id="monrealm">
	<form action="" method="post" onsubmit="this.updatemonrealmlog.disabled=true;">
		<input type="hidden" name="action" value="updatemonrealmlog" />
		<label for="mon_realmid">ID of Monitored Realm</label>
		    <select name="mon_realmid" >
                        <?php
                            foreach($rids as $i => $rid) {
				if($i == $monr['mon_realmid'])
					echo "<option value=\"$i\" selected=\"selected\" >$rid</option>";
				else
					echo "<option value=\"$i\" >$rid</option>";
                            }
                        ?>
                    </select>
		<label for="mon_type">Type of Tests to Be Preformed</label>
		    <select name="mon_type" >
                        <?php
                            $tests = array(
				'0' => 'PAP',
				'1' => 'EAP-TTLS',
				'10' => 'PAP & EAP-TTLS'
			    );
			    foreach($tests as $i => $tid) {
				if($i == $monr['mon_type'])
					echo "<option value=\"$i\" selected=\"selected\" >$tid</option>";
				else
					echo "<option value=\"$i\" >$tid</option>";
                            }
                        ?>
                    </select>
		<label for="status">Federation Status:</label>
			<select name="status">
				<?php
					$statuses = array(
						'0' => 'Ok (default)',
						'-1' => 'Reject logic test failed',
						'-2' => 'Accept logic test failed',
						'-3' => 'Both tests failed'
					);
					foreach($statuses as $i => $sid) {
						if($i == $monr['status'])
							echo "<option value=\"$i\" selected=\"selected\" >$sid</option>";
						else
							echo "<option value=\"$i\" >$sid</option>";
					}
				?>
			</select>
		<label for="a_resp_time">Response time for accept test</label>
			<input type="text" name="a_resp_time" value="<?php echo $monr['a_resp_time'] ?>" />
		<label for="r_resp_time">Response time for reject test</label>
			<input type="text" name="r_resp_time" value="<?php echo $monr['r_resp_time'] ?>" />
		<label for="mon_serid">ID of TLRS used for test</label>
		    <select name="mon_serid" >
                        <?php
                            foreach($mons as $i => $mid) {
				if($i == $monr['mon_serid'])
					echo "<option value=\"$i\" selected=\"selected\" >$mid</option>";
				else
					echo "<option value=\"$i\" >$mid</option>";
                            }
                        ?>
                    </select>
		<label for="mon_logid">ID of the respective monitoring job</label>
			<input type="text" name="mon_logid" value="<?php echo $monr['r_resp_time'] ?>" />
		<p>
			<input type="submit" name="updatemonrealmlog" value="Update">
		</p>
    </form>
</div>