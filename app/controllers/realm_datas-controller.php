<?php
    class realm_datas_controller {
        
        function index() {
            $realms = new Realm();
            $r = new Realm_data();
            pass_var("realms", $realms->find_all());
            pass_var("r", $r->find_all());
            pass_var('title', "Realm Data Index");
            pass_var('message', "List of Realm Data");
        }
        
        function add() {
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if($_POST["action"] == "addrealmdata") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addrealmdata"]);
                $data["ts"] = date("Y-m-d");
                $r = new Realm_data($data);
                $r->save();
            }
            pass_var("rids",$rids);
            pass_var('title', "Add Realm Data");
            pass_var('message', "Add Realm Data");
        }
        
        function delete() {
            global $runtime;
            $i = new Realm_data();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('realm_datas/');
        }
        
        function edit() {
            $r = new Realm();
            $r = $r->find_all();
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            if($_POST["action"] == "updaterealmdata") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updaterealmdata"]);
                $data["ts"] = date("Y-m-d");
                $r = new Realm_data();
                $r = $r->find_one_by_id($runtime['ident']);
                $r->data = $data;
                $r->dirty = array(
                                    'realmid',
                                    'number_inst',
                                    'number_user',
                                    'number_id',
                                    'number_IdP',
                                    'number_SP',
                                    'number_SPIdP',
                                    'ts'
                                );
                $r->save();
                $r = $r->find_one_by_id($runtime['ident']);
                pass_var("realmd", $r->data);
            }
            else {
                global $runtime;
                $r = new Realm_data();
                $r = $r->find_one_by_id($runtime['ident']);
                pass_var("realmd", $r->data);
            }
            
            pass_var("rids",$rids);
            pass_var('title', "Edit Realm Data");
            pass_var('message', "Edit Realm Data");
        }
    }
?>