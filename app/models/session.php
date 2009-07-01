<?php
    class Session {
        
        function session(){
            session_start();
            global $_SESSION;
        }
        
        function set($name, $value){
            if(!$name || !$value)
                return false;
            else
                $_SESSION[$name] = $value;
        }
        
        function get($name) {
                return $_SESSION[$name];
        }
        
        function del($name) {
            unset($_SESSION[$name]);
        }
        
        function destroy(){
            $_SESSION = null;
            session_destroy();
        }
    }
?>