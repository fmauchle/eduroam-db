<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("service_locs_submenu"); ?>
</div>
<div id="services">
    <ol id="allservices">
    <?php
	if(!empty($s))
		foreach($s as $service) {
		    echo "<li><span class=\"delete\">";
		    echo getLink("X", "service_locs/delete/".$service->id);
		    echo "</span>";
		    echo " | ";
		    echo "<strong>";
		    echo getLink($service->loc_name, "service_locs/edit/".$service->id);
		    echo "</strong></li>";
		}
    ?>
    </ol>
</div>