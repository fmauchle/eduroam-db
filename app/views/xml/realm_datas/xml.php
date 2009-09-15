<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<realm_data_root xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceSchemaLocation="realm_data.xsd">
<?php foreach($rds as $rd): ?>
	<realm_data>
		<country><?php echo $rd->realm['country']; ?></country>
		<number_IdP><?php echo $rd->data['number_IdP']; ?></number_IdP>
		<number_SP><?php echo $rd->data['number_SP']; ?></number_SP>
		<number_SPIdP><?php echo $rd->data['number_SPIdP']; ?></number_SPIdP>
		<ts><?php echo $rd->data['ts']; ?></ts>
	</realm_data>
<?php endforeach; ?>
</realm_data_root>
