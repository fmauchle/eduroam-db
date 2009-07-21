<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_sers_submenu"); ?>
</div>
<div id="monsers">
    <ol>
    <?php 
	if(!empty($m))
		foreach($m as $mons) {
			foreach($realms as $realm) {
				if($realm->data['id'] == $mons->mon_realmid)
					$realm_name = $realm->data['org_name'];
			}
			echo "<li><span class=\"delete\">";
			echo getLink("X", "mon_sers/delete/".$mons->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($realm_name." &rarr; ".$mons->name, "mon_sers/edit/".$mons->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>