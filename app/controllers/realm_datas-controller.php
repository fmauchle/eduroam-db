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
        
        function xml() {
            global $runtime;
            $runtime['format'] = 'xml';
            $rds = new Realm_data();
            $realms = new Realm();
            $rds = $rds->find_all();
            $realms = $realms->find_all();
            //Map all
            foreach($rds as $rd) {
                foreach($realms as $r) {
                    if($rd->data['realmid'] == $r->data['id']) {
                        $rd->realm = $r->data;
                    }
                }
            }
            pass_var("rds", $rds);
            load_view('xml');
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
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
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $r = new Realm_data($data);
                $r->save();
            }
            pass_var("rids",$rids);
            pass_var('title', "Add Realm Data");
            pass_var('message', "Add Realm Data");
        }
        
        function delete() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            global $runtime;
            $i = new Realm_data();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('realm_datas/');
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
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
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
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