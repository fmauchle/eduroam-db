<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_creds_submenu"); ?>
</div>
<div id="moncreds">
    <ol>
    <?php 
	if(!empty($m))
		foreach($m as $monc) {
			foreach($realms as $realm) {
				if($realm->data['id'] == $monc->mon_realmid)
					$realm_name = $realm->data['org_name'];
			}
			echo "<li><span class=\"delete\">";
			echo getLink("X", "mon_creds/delete/".$monc->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($realm_name, "mon_creds/edit/".$monc->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>