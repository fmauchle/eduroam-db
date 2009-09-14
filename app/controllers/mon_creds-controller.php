<?php
    class mon_creds_controller {
        
        function index() {
            $realms = new Realm();
            $m = new Mon_cred();
            pass_var("realms", $realms->find_all());
            pass_var("m", $m->find_all());
            pass_var('title', "Monitor Credentials Index");
            pass_var('message', "List of Monitor Credentials");
        }
        
        function add() {
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if($_POST["action"] == "addmoncred") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addmonrealm"]);
                $m = new Mon_cred($data);
                $m->save();
            }
            pass_var("rids",$rids);
            pass_var('title', "Add Monitor Credential");
            pass_var('message', "Add Monitor Credential");
        }
        
        function delete() {
            global $runtime;
            $i = new Mon_cred();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('mon_creds/');
        }
        
        function edit() {
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if($_POST["action"] == "updatemoncred") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updatemonrealm"]);
                $m = new Mon_cred();
                $m = $m->find_one_by_id($runtime['ident']);
                $m->data = $data;
                $m->dirty = array(
                                    'username',
                                    'password',
                                    'mon_realmid'
                                );
                $m->save();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monc", $m->data);
            }
            else {
                global $runtime;
                $m = new Mon_cred();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monc", $m->data);
            }
            
            pass_var("rids",$rids);
            pass_var('title', "Edit Monitor Realm");
            pass_var('message', "Edit Monitor Realm");
        }
    }
?>