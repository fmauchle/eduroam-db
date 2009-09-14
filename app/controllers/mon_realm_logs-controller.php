<?php
    class mon_realm_logs_controller {
        
        function index() {
            $realms = new Realm();
            $m = new Mon_realm_log();
            pass_var("realms", $realms->find_all());
            pass_var("m", $m->find_all());
            pass_var('title', "Monitored Realm Logs Index");
            pass_var('message', "List of Monitored Realm Logs");
        }
        
        function add() {
            $r = new Mon_realm();
            $r = $r->find_all();
            
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $ms = new Mon_ser();
            $ms = $ms->find_all();
            
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->tested_realm;
            }
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            $mons = array();
            foreach($ms as $mon) {
                $mons[$mon->id] = $mon->name;
            }
            
            if($_POST["action"] == "addmonrealmlog") {
                $data = $_POST;
                unset($data["action"]);
                unset($data["addmonrealmlog"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_realm_log($data);
                $m->save();
            }
            pass_var("rids",$rids);
            pass_var("mons",$mons);
            pass_var("mls",$mls);
            pass_var('title', "Add Monitored Realm Log");
            pass_var('message', "Add Monitored Realm Log");
        }
        
        function delete() {
            global $runtime;
            $i = new Mon_realm_log();
            $i = $i->find_one_by_id($runtime['ident']);
            $i->delete();
            redirect('mon_realm_logs/');
        }
        
        function edit() {
            $r = new Mon_realm();
            $r = $r->find_all();
            
            $ml = new Mon_log();
            $ml = $ml->find_all();
            
            $ms = new Mon_ser();
            $ms = $ms->find_all();
            
            $rids = array();
            foreach($r as $realm) {
                $rids[$realm->id] = $realm->tested_realm;
            }
            
            $mls = array();
            foreach($ml as $m) {
                $mls[$m->id] = $m->ts_scheduled;
            }
            
            $mons = array();
            foreach($ms as $mon) {
                $mons[$mon->id] = $mon->name;
            }
            
            if($_POST["action"] == "updatemonrealmlog") {
                global $runtime;
                $data = $_POST;
                unset($data["action"]);
                unset($data["updatemonrealmlog"]);
                $data["ts"] = date("c"); // Let's store directly ISO 860 timestamps
                $m = new Mon_realm_log();
                $m = $m->find_one_by_id($runtime['ident']);
                $m->data = $data;
                $m->dirty = array(
                                    'mon_realmid',
                                    'mon_type',
                                    'status',
                                    'a_resp_time',
                                    'r_resp_time',
                                    'mon_serid',
                                    'mon_logid',
                                    'ts'
                                );
                $m->save();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monr", $m->data);
            }
            else {
                global $runtime;
                $m = new Mon_realm_log();
                $m = $m->find_one_by_id($runtime['ident']);
                pass_var("monr", $m->data);
            }
            
            pass_var("rids",$rids);
            pass_var("mons",$mons);
            pass_var("mls",$mls);
            pass_var('title', "Edit Monitored Realm Log");
            pass_var('message', "Edit Monitored Realm Log");
        }
    }
?>