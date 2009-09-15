<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<realm_usages xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceSchemaLocation="realm_usage.xsd">
<?php foreach($realms as $r):?>
	<realm_usage country="<?php echo $r->data['country'] ?>">
<?php foreach($r->usage as $u): ?>
		<usage date="<?php echo $u->data['date'] ?>">
			<national_sn><?php echo $u->data['national_sn'] ?></national_sn>
			<international_sn><?php echo $u->data['international_sn'] ?></international_sn>
		</usage>
<?php endforeach; ?>
	</realm_usage>
<?php endforeach; ?>
</realm_usages>
