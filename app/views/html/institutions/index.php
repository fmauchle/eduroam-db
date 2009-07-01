<div class="help">
	<?php load_partial("menu"); ?>
        <?php load_partial("institutions_submenu"); ?>
</div>
<div id="institution">
    <ol id="allinstitutions">
    <?php
        foreach($ins as $in) {
            echo "<li><span class=\"delete\">";
	    echo getLink("X", "institutions/delete/".$in->id);
	    echo "</span>";
	    echo " | ";
	    echo "<h4>";
	    echo getLink($in->org_name, "institutions/edit/".$in->id);
	    echo "</h4></li>";
        }
    ?>
    </ol>
</div>