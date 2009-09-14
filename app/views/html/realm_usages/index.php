<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("realm_usages_submenu"); ?>
</div>
<div id="realms">
    <ol id="allrealms">
    <?php 
	if(!empty($rus))
		foreach($rus as $realmd) {
			foreach($realms as $realm) {
				if($realm->data['id'] == $realmd->realmid)
					$realm_name = $realm->data['org_name'];
			}
			echo "<li><span class=\"delete\">";
			echo getLink("X", "realm_usages/delete/".$realmd->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($realm_name, "realm_usages/edit/".$realmd->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>