<div class="help">
    <?php load_partial("menu"); ?>
</div>
<div id="infos">
    <h3>Location of the xml files</h3>
    <ul>
        <li><?php echo getLink("Institution", "institutions/xml") ?></li>
        <li><?php echo getLink("Institution usage", "institution_usages/xml") ?></li>
        <li><?php echo getLink("Realm", "realms/xml") ?></li>
        <li><?php echo getLink("Realm data", "realm_datas/xml") ?></li>
        <li><?php echo getLink("Realm usage", "realm_usages/xml") ?></li>
    </ul>
    <h3>Location of the xml files for eduroam DB v2</h3>
    <ul>
        <li><?php echo getLink("RO", "ro/xml") ?></li>
        <li><?php echo getLink("Institution", "institutionsv2/xml") ?></li>
    </ul>
</div>