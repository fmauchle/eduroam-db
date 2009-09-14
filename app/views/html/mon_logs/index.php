<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("mon_logs_submenu"); ?>
</div>
<div id="monlogs">
    <ol>
    <?php 
	if(!empty($m))
		foreach($m as $monl) {
			echo "<li><span class=\"delete\">";
			echo getLink("X", "mon_logs/delete/".$monl->id);
			echo "</span>";
			echo " | ";
			echo "<strong>";
			echo getLink($monl->ts_scheduled, "mon_logs/edit/".$monl->id);
			echo "</strong></li>";
		}
	?>
    </ol>
</div>