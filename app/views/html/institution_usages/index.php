<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("institution_usages_submenu"); ?>
</div>
<div id="realms">
    <ol id="allrealms">
    <?php 
	if(!empty($instsu))
		foreach($instsu as $instu) {
			foreach($insts as $inst) {
				if($inst->data['id'] == $instu->institutionid)
					$inst_name = $inst->data['org_name'];
			}
			echo "<li><span class=\"delete\">";
			echo getLink("X", "realm_usages/delete/".$instu->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($inst_name, "realm_usages/edit/".$instu->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>