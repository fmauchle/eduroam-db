<?php
    class mon_realms_controller {
        
        function index() {
            $realms = new Realm();
            $m = new Mon_realm();
            pass_var("realms", $realms->find_all());
            pass_var("m", $m->find_all());
            pass_var('title', "Monitor Realm Index");
            pass_var('message', "List of Monitor Realm");
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $r = new Realm();
            $r = $r->find_all();
            
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            if($_POST["action"] == "addmonrealm") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addmonrealm"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_realm($data);
                $m->save();
            }
            
            pass_var("rids",$rids);
            pass_var("mls",$mls);
            pass_var('title', "Add Monitor Realm");
            pass_var('message', "Add Monitor Realm");
        }
        
        function delete() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            global $runtime;
            $i = new Mon_realm();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('mon_realms/');
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $r = new Realm();
            $r = $r->find_all();
            
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->org_name;
            }
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            if($_POST["action"] == "updatemonrealm") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updatemonrealm"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_realm();
                $m = $m->find_one_by_id($runtime['ident']);
                $m->data = $data;
                $m->dirty = array(
                                    'tested_realm',
                                    'tested_country',
                                    'realmid',
                                    'mon_type_sel',
                                    'last_mon_logid',
                                    'ts'
                                );
                $m->save();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monr", $m->data);
            }
            else {
                global $runtime;
                $m = new Mon_realm();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monr", $m->data);
            }
            
            pass_var("rids",$rids);
            pass_var("mls",$mls);
            pass_var('title', "Edit Monitor Realm");
            pass_var('message', "Edit Monitor Realm");
        }
    }
?>