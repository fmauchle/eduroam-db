<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<realms xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="realm.xsd">
<?php foreach($realms as $r): ?>
	<realm>
		<country><?php echo $r->data['country'] ?></country>
		<stype><?php echo $r->data['stype'] ?></stype>
		<org_name lang="en"><?php echo $r->data['org_name'] ?></org_name>
<?php if(strtolower($r->data['country']) != "en"): ?>
		<org_name lang="<?php echo strtolower($r->data['country']) ?>"><?php echo $r->data['org_name'] ?></org_name>
<?php endif; ?>
		<address>
			<street><?php echo $r->data['address_street'] ?></street>
			<city><?php echo $r->data['address_city'] ?></city>
		</address>
		<contact>
			<name><?php echo $r->data['contact_name'] ?></name>
			<email><?php echo $r->data['contact_email'] ?></email>
			<phone><?php echo $r->data['contact_phone'] ?></phone>
		</contact>
		<info_URL lang="en"><?php echo $ins->data['info_url']?></info_URL>
<?php if(strtolower($r->data['country']) != "en"): ?>
		<info_URL lang="<?php echo strtolower($r->data['country'])?>"><?php echo $ins->data['info_url']?></info_URL>
<?php endif; ?>
		<policy_URL lang="en"><?php echo $ins->data['policy_url']?></policy_URL>
<?php if(strtolower($r->data['country']) != "en"): ?>
		<policy_URL lang="<?php echo strtolower($r->data['country'])?>"><?php echo $ins->data['policy_url']?></policy_URL>
<?php endif; ?>
		<ts><?php echo $r->data['ts'] ?></ts>
	</realm>
<?php endforeach; ?>
</realms>
