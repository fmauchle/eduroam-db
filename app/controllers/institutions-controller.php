<?php
    class institutions_controller {
        
        function index() {
            $i = new Institution();
            pass_var("ins", $i->find_all());
            pass_var("title", "Manage Institutions");
            pass_var("message", "Manage Institutions");
        }
        
        function add() {
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if(!empty($_POST)) {
                $_POST["ts"] = date("Y-m-d");
                $i = new Institution($_POST);
                $i->save();
            }
            
            pass_var("rids",$rids);
            pass_var("title", "Add Institution");
            pass_var("message", "Add Institution");
        }
        
        function delete() {
            global $runtime;
            $i = new Institution();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('institutions/');
        }
        
        function edit() {
            global $runtime;
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if(!empty($_POST)) {
                $_POST["ts"] = date("Y-m-d");
                $i = new Institution();
                $i = $i->find_one_by_id($runtime['ident']);
                $i->data = $_POST;
                            $i->dirty = array(
                                'realmid',
                                'type',
                                'inst_realm',
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
                $i->save();
            }
            
            $inst = new Institution();
            $inst = $inst->find_one_by_id($runtime['ident']);
            
            pass_var("rids",$rids);
            pass_var("institution",$inst);
            pass_var("title", "Edit Institution");
            pass_var("message", "Edit Institution");
        }
        
    }
?>