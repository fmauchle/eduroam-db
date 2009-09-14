<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_realm_logs_submenu"); ?>
</div>
<div id="monrealm">
	<p class="splash">
		Last modification timestamp is: <?php echo $monr['ts']; ?>
	</p>
	<form action="" method="post" onsubmit="this.updatemonrealmlog.disabled=true;">
		<input type="hidden" name="action" value="updatemonrealmlog" />
		<label for="mon_realmid">ID of Monitored Realm</label>
                        <?php echo select_tag($rids, 'mon_realmid', $monr['mon_realmid']); ?>
		<label for="mon_type">Type of Tests to Be Preformed</label>
                        <?php
                            $tests = array(
				'0' => 'PAP',
				'1' => 'EAP-TTLS',
				'10' => 'PAP & EAP-TTLS'
			    );
			    
			    echo select_tag($tests, 'mon_type', $monr['mon_type']);
                        ?>
		<label for="status">Federation Status:</label>
			<?php
				$statuses = array(
					'0' => 'Ok (default)',
					'-1' => 'Reject logic test failed',
					'-2' => 'Accept logic test failed',
					'-3' => 'Both tests failed'
				);
				
				echo select_tag($statuses, 'status', $monr['status']);
			?>
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
			<?php echo select_tag($mls, 'mon_logid', $monr['mon_logid']);?>
		<p>
			<input type="submit" name="updatemonrealmlog" value="Update">
		</p>
    </form>
</div>