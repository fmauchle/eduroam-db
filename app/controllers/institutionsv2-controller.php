<?php
    include PATH_TO_CONTROLLERS."institutions-controller.php";

    class institutionsv2_controller {
        
        function xml() {
            $forward_controller = new institutions_controller();
            $forward_controller->xml();
        }
    }
?>