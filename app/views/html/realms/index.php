<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("realms_submenu"); ?>
</div>
<div id="realms">
    <ol id="allrealms">
    <?php
	if(!empty($r))
		foreach($r as $realm) {
		    echo "<li><span class=\"delete\">";
		    echo getLink("X", "realms/delete/".$realm->id);
		    echo "</span>";
		    echo " | ";
		    echo "<strong>";
		    echo getLink($realm->org_name, "realms/edit/".$realm->id);
		    echo "</strong></li>";
		}
    ?>
    </ol>
</div>