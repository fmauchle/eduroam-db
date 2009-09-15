<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("institution_usages_submenu"); ?>
</div>
<div id="realmusage">
	<form action="" method="post" onsubmit="this.addinstusage.disabled=true;">
		<input type="hidden" name="action" value="addinstusage" />
		<label for="institutionid">ID of Representative Realm</label>
		<?php
			echo select_tag($insts, 'institutionid');
                ?>
		<label for="local_sn">Number of Successfully Authenticated Sessions per Day (Local Level)</label>
			<input type="text" name="local_sn" />
		<label for="national_sn">Number of Successfully Authenticated Sessions per Day (National Level)</label>
			<input type="text" name="national_sn" />
		<label for="international_sn">Number of Successfully Authenticated Sessions per Day (International Level)</label>
			<input type="text" name="international_sn" />
		<p>
			<input type="submit" name="addinstusage" value="Add">
		</p>
    </form>
</div>