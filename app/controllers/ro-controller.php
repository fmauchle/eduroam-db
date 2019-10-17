<?php
    include PATH_TO_CONTROLLERS."realms-controller.php";
    class ro_controller {

        function xml() {
            $forward_controller = new realms_controller();
            $forward_controller->xml();
        }       
    }
?>