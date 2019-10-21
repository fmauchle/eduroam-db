<?php
function taglist($loc) {
	$tags = array();
	if ($loc->data['port_restrict']) array_push($tags,"port_restrict");
	if ($loc->data['transp_proxy']) array_push($tags,"transp_proxy");
	if ($loc->data['IPv6']) array_push($tags,"IPv6");
	if ($loc->data['NAT']) array_push($tags,"NAT");
	if ($loc->data['HS20']) array_push($tags,"HS2.0");
	return join(',',$tags);
}
?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<institutions xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="institution.xsd">
<?php
foreach ($realms as $r):
	if(!empty($r->data['ins'])) foreach($r->data['ins'] as $ins):
?>
	<institution>
		<instid><?php echo $ins->data['id'] ?></instid>
		<ROid><?php echo $r->data['roid']?></ROid>
		<type><?php switch($ins->data['type']):
			case 1: ?>IdP<?php break; 
			case 2: ?>SP<?php break;
			case 3: ?>IdP+SP<?php endswitch; ?></type>
		<stage><?php echo $ins->data['stage'] ?></stage>
<?php if($ins->data['type'] != 2): ?>
		<inst_realm><?php echo $ins->data['inst_realm']?></inst_realm>
<?php endif ?>
		<inst_name lang="en"><?php echo $ins->data['org_name']?></inst_name>
<?php if(strtolower($r->data['country']) != "en"): ?>
		<inst_name lang="<?php echo strtolower($r->data['country'])?>"><?php echo $ins->data['inst_name']?></inst_name>
<?php endif; ?>
		<address>
			<street lang="en"><?php echo $ins->data['address_street']?></street>
			<city lang="en"><?php echo $ins->data['address_city']?></city>
		</address>
		<contact>
			<name><?php echo $ins->data['contact_name']?></name>
			<email><?php echo $ins->data['contact_email']?></email>
			<phone><?php echo $ins->data['contact_phone']?></phone>
			<type><?php echo $ins->data['contact_type'] ?></type>
			<privacy><?php echo $ins->data['contact_privacy'] ?></privacy>
		</contact>
		<contact>
			<name><?php echo $r->data['contact_name']?></name>
			<email><?php echo $r->data['contact_email']?></email>
			<phone><?php echo $r->data['contact_phone']?></phone>
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
		<ts><?php echo $ins->data['ts']?></ts>
<?php 
if($ins->data['sl']): foreach($ins->data['sl'] as $s): ?>
		<location>
			<locationid><?php echo $s->data['id'] ?></locationid>
			<coordinates><?php echo $s->data['longitude']?>,<?php echo $s->data['latitude']?></coordinates>
			<stage><?php echo $s->data['stage'] ?></stage>
			<type>0</type>
			<loc_name lang="en"><?php echo $s->data['loc_name']?></loc_name>
<?php if(strtolower($r->data['country']) != "en"): ?>
			<loc_name lang="<?php echo strtolower($r->data['country'])?>"><?php echo $s->data['loc_name']?></loc_name>
<?php endif; ?>
			<address>
				<street lang="en"><?php echo $s->data['address_street']?></street>
				<city lang="en"><?php echo $s->data['address_city']?></city>
			</address>
			<SSID><?php echo $s->data['SSID']?></SSID>
			<enc_level><?php echo $s->data['enc_level']?></enc_level>
			<AP_no><?php echo $s->data['AP_no']?></AP_no>
<?php if($s->data['wired_no']): ?>
			<wired_no><?php echo $s->data['wired_no']?></wired_no>
<?php endif; ?>
			<tag><?php echo taglist($s) ?></tag>
			<info_URL lang="en"><?php echo $s->data['info_URL']?></info_URL>
<?php if(strtolower($r->data['country']) != "en"): ?>
			<info_URL lang="<?php echo strtolower($r->data['country'])?>"><?php echo $s->data['info_URL']?></info_URL>
<?php endif; ?>
		</location>
<?php endforeach; endif; ?>
	</institution>
<?php
	endforeach;
endforeach;
?>
</institutions>
