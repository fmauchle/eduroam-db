<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<institution_usages xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
	xsi:noNamespaceSchemaLocation="institution_usage.xsd">
<?php foreach($ins as $i): ?>
	<?php if($i->usage) :?>
<institution_usage inst_realm="<?php echo $i->data['inst_realm'] ?>">
		<usage date="<?php echo $i->usage['date'] ?>">
			<local_sn><?php echo $i->usage['local_sn'] ?></local_sn>
			<national_sn><?php echo $i->usage['national_sn'] ?></national_sn>
			<international_sn><?php echo $i->usage['international_sn'] ?></international_sn>
		</usage>
	</institution_usage><?php endif; endforeach; ?>

</institution_usages>
