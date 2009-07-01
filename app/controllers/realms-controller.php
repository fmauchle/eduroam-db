<?php
    class realms_controller {
        
        function index() {
            $realm = $this->get("1");
            if($realm != null) {
                if($_POST["updaterealm"] == "updaterealm")
                {
                    $this->update_realm($_POST);
                }
            }
            else {
                if($_POST["action"] == "updaterealm")
                {
                    $this->add_realm($_POST);
                }
            }
            
            $realm = $this->get("1");
            pass_var("realm", $realm->data);
            
            pass_var('title', "Realm");
            pass_var('message', "Update the realm");
        }
        
        function get($id) {
            $r = new Realm();
            return $r->find_one_by_id($id);
        }
        
        function add_realm($data) {
            unset($data["action"]);
            unset($data["updaterealm"]);
            $data["ts"] = date("Y-m-d");
            $r = new Realm($data);
            $r->save();
        }
        
        function update_realm($data) {
            unset($data["action"]);
            unset($data["updaterealm"]);
            $data["ts"] = date("Y-m-d");
            $r = new Realm();
            $r = $r->find_one_by_id("1");
            $r->data = $data;
            $r->dirty = array(
                                'country',
                                'stype',
                                'org_name',
                                'address_street',
                                'address_city',
                                'contact_name',
                                'contact_email',
                                'contact_phone',
                                'info_URL',
                                'policy_URL',
                                'ts'
                            );
            $r->save();
        }
        
    }
?>