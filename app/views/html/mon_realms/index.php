<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_realms_submenu"); ?>
</div>
<div id="monrealms">
    <ol id="monrealm">
    <?php 
	if(!empty($m))
		foreach($m as $monr) {
			foreach($realms as $realm) {
				if($realm->data['id'] == $monr->realmid)
					$realm_name = $realm->data['org_name'];
			}
			echo "<li><span class=\"delete\">";
			echo getLink("X", "mon_realms/delete/".$monr->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($realm_name, "mon_realms/edit/".$monr->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>