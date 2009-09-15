<?php
    class mon_sers_controller {
        
        function index() {
            $realms = new Realm();
            $m = new Mon_ser();
            pass_var("realms", $realms->find_all());
            pass_var("m", $m->find_all());
            pass_var('title', "Monitored servers Index");
            pass_var('message', "List of monitored servers");
        }
        
        function add() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $r = new Mon_realm();
            $r = $r->find_all();
            
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->tested_realm;
            }
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            if($_POST["action"] == "addmonser") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addmonser"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_ser($data);
                $m->save();
            }
            pass_var("rids",$rids);
            pass_var("mls",$mls);
            pass_var('title', "Add a monitored server");
            pass_var('message', "Add a monitored server");
        }
        
        function delete() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            global $runtime;
            $i = new Mon_ser();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('mon_sers/');
        }
        
        function edit() {
            // Is logged in?
            $this->session = new Session;
            if(!$this->session->get('email') && !$this->session->get('id'))
                die(redirect(''));
            
            $r = new Mon_realm();
            $r = $r->find_all();
            
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->tested_realm;
            }
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            if($_POST["action"] == "updatemonser") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updatemonser"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_ser();
                $m = $m->find_one_by_id($runtime['ident']);
                $m->data = $data;
                $m->dirty = array(
                                    'name',
                                    'mon_realmid',
                                    'ip',
                                    'port',
                                    'timeout',
                                    'retry',
                                    'secret',
                                    'stype',
                                    'reject_only',
                                    'radsec',
                                    'monitoring',
                                    'last_mon_logid',
                                    'ts'
                                );
                $m->save();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("mons", $m->data);
            }
            else {
                global $runtime;
                $m = new Mon_ser();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("mons", $m->data);
            }
            
            pass_var("rids",$rids);
            pass_var("mls",$mls);
            pass_var('title', "Edit monitored server");
            pass_var('message', "Edit monitored server");
        }
    }
?>