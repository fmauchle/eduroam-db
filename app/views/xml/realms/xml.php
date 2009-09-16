<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<realms xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="realm.xsd">
<?php foreach($realms as $r): ?>
	<realm>
		<country><?php echo $r->data['country'] ?></country>
		<stype><?php echo $r->data['stype'] ?></stype>
		<org_name lang="en"><?php echo $r->data['org_name'] ?></org_name>
		<address>
			<street><?php echo $r->data['address_street'] ?></street>
			<city><?php echo $r->data['address_city'] ?></city>
		</address>
		<contact>
			<name><?php echo $r->data['contact_name'] ?></name>
			<email><?php echo $r->data['contact_email'] ?></email>
			<phone><?php echo $r->data['contact_phone'] ?></phone>
		</contact>
		<info_URL lang="en"><?php echo $r->data['info_URL'] ?></info_URL>
		<policy_URL lang="en"><?php echo $r->data['policy_URL'] ?></policy_URL>
		<ts><?php echo $r->data['ts'] ?></ts>
	</realm>
<?php endforeach; ?>
</realms>
