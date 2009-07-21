<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_ser_logs_submenu"); ?>
</div>
<div id="monserlogs">
    <ol>
    <?php
	if(!empty($mls))
		foreach($mls as $monl) {
                    // find the monitored server name and id
                    foreach($mss as $ms) {
                            if($ms->data['id'] == $monl->mon_serid)
                                    $ms_name = $ms->data['name'];
                                    $ms_id = $ms->data['id'];
                    }
                    // find the monitored server realm
                    foreach($realms as $rid) {
                            if($rid->data['id'] == $ms_id)
                                    $realm_name = $rid->data['org_name'];
                    }
                    echo "<li><span class=\"delete\">";
                    echo getLink("X", "mon_ser_logs/delete/".$mons->id);
                    echo "</span>";
                    echo " | ";
                    echo "<strong>";
                    echo getLink($realm_name." &rarr; ".$ms_name, "mon_ser_logs/edit/".$monl->id);
                    echo "</strong></li>";
		}
	?>
    </ol>
</div>