<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_realms_submenu"); ?>
</div>
<div id="monrealm">
	<form action="" method="post" onsubmit="this.addmonrealm.disabled=true;">
		<input type="hidden" name="action" value="addmonrealm" />
		<label for="tested_realm">Realm Used for Testing <small>(usually eduroam)</small></label>
			<input type="text" name="tested_realm" />
		<label for="tested_country">Country Code Used for Testing</label>
			<input type="text" name="tested_country" />
		<label for="realmid">ID of Monitored Realm</label>
		    <select name="realmid" >
                        <?php
                            foreach($rids as $i => $rid) {
                                echo "<option value=\"$i\" >$rid</option>";
                            }
                        ?>
                    </select>
		<label for="mon_type_sel">Type of Tests to Be Preformed</label>
		    <select name="mon_type_sel" >
                        <?php
                            $tests = array(
				'0' => 'PAP',
				'1' => 'EAP-TTLS',
				'10' => 'PAP & EAP-TTLS'
			    );
			    foreach($tests as $i => $tid) {
                                echo "<option value=\"$i\" >$tid</option>";
                            }
                        ?>
                    </select>
		<label for="last_mon_logid">ID of The Last Successful Monitoring Job</label>
			<?php echo select_tag($mls, 'last_mon_logid'); ?>
		<p>
			<input type="submit" name="addmonrealm" value="Add">
		</p>
    </form>
</div>