<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("realm_datas_submenu"); ?>
</div>
<div id="realms">
    <ol id="allrealms">
    <?php 
	if(!empty($r))
		foreach($r as $realmd) {
			foreach($realms as $realm) {
				if($realm->data['id'] == $realmd->realmid)
					$realm_name = $realm->data['org_name'];
			}
			echo "<li><span class=\"delete\">";
			echo getLink("X", "realm_datas/delete/".$realmd->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($realm_name, "realm_datas/edit/".$realmd->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>