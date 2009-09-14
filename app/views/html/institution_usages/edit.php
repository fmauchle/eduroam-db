<div class="help">
	<?php load_partial("menu"); ?>
	<?php load_partial("institution_usages_submenu"); ?>
</div>
<div id="realmusage">
	<form action="" method="post" onsubmit="this.updateinstusage.disabled=true;">
		<input type="hidden" name="action" value="updateinstusage" />
		<label for="institutionid">ID of Representative Realm</label>
		<?php
			echo select_tag($insts, 'institutionid', $instu['institutionid']);
                ?>
		<label for="local_sn">Number of Successfully Authenticated Sessions per Day (Local Level)</label>
			<input type="text" name="local_sn" value="<?php echo $instu['local_sn'] ?>" />
		<label for="national_sn">Number of Successfully Authenticated Sessions per Day (National level)</label>
			<input type="text" name="national_sn" value="<?php echo $instu['national_sn'] ?>" />
		<label for="international_sn">Number of Successfully Authenticated Sessions per Day (International level)</label>
			<input type="text" name="international_sn" value="<?php echo $instu['international_sn'] ?>" />
		<p>
			<input type="submit" name="updateinstusage" value="Update">
		</p>
    </form>
</div>