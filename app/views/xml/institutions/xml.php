<?php
function t_or_f($test) {
	if($test)
		return 'true';
	else
		return 'false';
}
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<institutions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="institution.xsd">
<?php
foreach ($realms as $r):
	if(!empty($r->data['ins'])) foreach($r->data['ins'] as $ins):
?>
	<institution>
		<country><?php echo $r->data['country']?></country>
		<type><?php echo $ins->data['type']?></type>
		<inst_realm><?php echo $ins->data['inst_realm']?></inst_realm>
		<org_name lang="<?php echo $r->data['country']?>"><?php echo $ins->data['org_name']?></org_name>
		<address>
			<street><?php echo $ins->data['address_street']?></street>
			<city><?php echo $ins->data['address_city']?></city>
		</address>
		<contact>
			<name><?php echo $ins->data['contact_name']?></name>
			<email><?php echo $ins->data['contact_email']?></email>
			<phone><?php echo $ins->data['contact_phone']?></phone>
		</contact>
		<contact>
			<name><?php echo $r->data['contact_name']?></name>
			<email><?php echo $r->data['contact_email']?></email>
			<phone><?php echo $r->data['contact_phone']?></phone>
		</contact>
		<info_URL lang="<?php echo $r->data['country']?>"><?php echo $ins->data['info_url']?></info_URL>
		<policy_URL lang="<?php echo $r->data['country']?>"><?php echo $ins->data['policy_url']?></policy_URL>
		<ts><?php echo $ins->data['ts']?></ts>
<?php 
if($ins->data['sl']): foreach($ins->data['sl'] as $s): ?>
		<location>
			<longitude><?php echo $s->data['longitude']?></longitude>
			<latitude><?php echo $s->data['latitude']?></latitude>
			<loc_name lang="<?php echo $r->data['country']?>"><?php echo $s->data['loc_name']?></loc_name>
			<address>
				<street><?php echo $s->data['address_street']?></street>
				<city><?php echo $s->data['address_city']?></city>
			</address>
			<SSID><?php echo $s->data['SSID']?></SSID>
			<enc_level><?php echo $s->data['enc_level']?></enc_level>
			<port_restrict><?php echo t_or_f($s->data['port_restrict'])?></port_restrict>
			<transp_proxy><?php echo t_or_f($s->data['transp_proxy'])?></transp_proxy>
			<IPv6><?php echo t_or_f($s->data['IPv6'])?></IPv6>
			<NAT><?php echo t_or_f($s->data['NAT'])?></NAT>
			<AP_no><?php echo $s->data['AP_no']?></AP_no>
			<wired><?php echo t_or_f($s->data['wired'])?></wired>
			<info_URL lang="<?php echo $r->data['country']?>"><?php echo $s->data['info_URL']?></info_URL>
		</location>
<?php endforeach; endif; ?>
	</institution>
<?php
	endforeach;
endforeach;
?>
</institutions>