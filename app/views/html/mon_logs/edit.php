<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_logs_submenu"); ?>
</div>
<div id="monlogs">
	<form action="" method="post" onsubmit="this.addmonlog.disabled=true;">
		<input type="hidden" name="action" value="updatemonlog" />
		<label for="scheduled">Scheduling:</label>
		    <select name="scheduled" >
                        <?php
                            $types = array(
				'0' => 'Automatic',
				'1' => 'Manual',
			    );
			    foreach($types as $i => $tid) {
                                if($i == $monl['scheduled'])
                                    echo "<option value=\"$i\" selected=\"selected\" >$tid</option>";
                                else
                                    echo "<option value=\"$i\" >$tid</option>";
                            }
                        ?>
                    </select>
		<label for="ts_scheduled">Scheduled time</label>
			<input type="text" name="ts_scheduled" class="calendar" value="<?php if($monl['ts_scheduled']) echo $monl['ts_scheduled']; ?>" />
		<label for="ts_start">Start time</label>
			<input type="text" name="ts_start" class="calendar" value="<?php if($monl['ts_start']) echo $monl['ts_start']; ?>" />
		<label for="ts_end">End time</label>
			<input type="text" name="ts_end" class="calendar" value="<?php if($monl['ts_end']) echo $monl['ts_end']; ?>" />
		<label for="type">Job types:</label>
			<select name="type">
				<?php
					$types = array(
						'10' => 'All servers',
						'11' => 'Single server',
						'20' => 'All realms',
						'21' => 'Single realm'
					);
					
					foreach($types as $i => $tid) {
                                            if($i == $monl['type'])
						echo "<option value=\"$i\" selected=\"selected\" >$tid</option>";
                                            else
                                                echo "<option value=\"$i\" >$tid</option>";
					}
				?>
			</select>
		<label for="type">Status:</label>
			<select name="status">
				<?php
					$statuses = array(
						'0' => 'END',
						'1' => 'RUNING',
						'2' => 'START',
						'-1' => 'ERROR'
					);
					
					foreach($statuses as $i => $sid) {
					    if($i == $monl['status'])
						echo "<option value=\"$i\" selected=\"selected\" >$sid</option>";
                                            else
                                                echo "<option value=\"$i\" >$sid</option>";
					}
				?>
			</select>
		<p>
			<input type="submit" name="updatemonlog" value="Update">
		</p>
    </form>
</div>