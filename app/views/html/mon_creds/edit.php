<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_creds_submenu"); ?>
</div>
<div id="moncreds">
	<form action="" method="post" onsubmit="this.updatemoncred.disabled=true;">
		<input type="hidden" name="action" value="updatemoncred" />
		<label for="username">Username:</label>
			<input type="text" name="username" value="<?php if($monc['username']) echo $monc['username']; ?>" />
		<label for="password">Password:</label>
			<input type="text" name="password" value="<?php if($monc['username']) echo $monc['password']; ?>" />
		<label for="mon_realmid">Monitored Realm:</label>
		    <select name="mon_realmid" >
                        <?php
			    foreach($rids as $i => $tid) {
                                if($i == $monc['mon_realmid'])
                                    echo "<option value=\"$i\" selected=\"selected\" >$tid</option>";
                                else
                                     echo "<option value=\"$i\" >$tid</option>";
                            }
                        ?>
                    </select>
		<p>
			<input type="submit" name="updatemoncred" value="Update">
		</p>
    </form>
</div>