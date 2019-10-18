<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<ROs xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="ro.xsd">
<?php foreach($realms as $r): ?>
	<RO>
		<ROid><?php echo $r->data['roid'] ?></ROid>
		<country><?php echo $r->data['country'] ?></country>
		<stage><?php echo $r->data['stage'] ?></stage>
		<org_name lang="en"><?php echo $r->data['org_name'] ?></org_name>
<?php if(strtolower($r->data['country']) != "en"): ?>
		<org_name lang="<?php echo strtolower($r->data['country']) ?>"><?php echo $r->data['org_name'] ?></org_name>
<?php endif; ?>
		<address>
			<street lang="en"><?php echo $r->data['address_street'] ?></street>
			<city lang="en"><?php echo $r->data['address_city'] ?></city>
		</address>
		<contact>
			<name><?php echo $r->data['contact_name'] ?></name>
			<email><?php echo $r->data['contact_email'] ?></email>
			<phone><?php echo $r->data['contact_phone'] ?></phone>
			<type><?php echo $r->data['contact_type'] ?></type>
			<privacy><?php echo $r->data['contact_privacy'] ?></privacy>
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
	</RO>
<?php endforeach; ?>
</ROs>
