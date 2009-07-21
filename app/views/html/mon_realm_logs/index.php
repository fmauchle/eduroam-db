<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_realm_logs_submenu"); ?>
</div>
<div id="monrealms">
    <ol>
    <?php 
	if(!empty($m))
		foreach($m as $monr) {
			foreach($realms as $realm) {
				if($realm->data['id'] == $monr->mon_realmid)
					$realm_name = $realm->data['org_name'];
			}
			echo "<li><span class=\"delete\">";
			echo getLink("X", "mon_realm_logs/delete/".$monr->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($realm_name, "mon_realm_logs/edit/".$monr->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>